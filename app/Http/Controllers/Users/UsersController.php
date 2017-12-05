<?php


namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Presenters\UsersPresenter;
use Illuminate\Database\Eloquent\Builder;


class UsersController extends Controller
{
    public function index(UsersIndexRequest $request, UsersPresenter $userPresenter)
    {
        $limit = $request->input('limit', config('kis.limits.small'));
        $offset = $request->input('offset', 0);
        $orderField = $request->input('order.field', 'name');
        $orderDirection = $request->input('order.direction', 'asc');

        $presenter = $request->input('presenter', config('kis.defaults.presenter'));

        $search = $request->input('search');
        $company_id = $request->input('company_id');
        $status = $request->input('status');

        /** @var Builder $builder */
        $builder = User::query()
            ->when($this->presenterIs('grid'), function (Builder $builder) {
                $builder->with('driver', 'position');
            })
            ->when($search, function (Builder $builder) use ($search) {
                $builder->where(function (Builder $builder) use ($search) {
                    $builder
                        ->whereHas('position', function (Builder $builder) use ($search) {
                            $builder->where('title', 'like', "%{$search}%");
                        })
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('id', 'like', "%{$search}%");
                });
            })
            ->when($status, function (Builder $builder) use ($status) {
                $builder->where('status', $status);
            })
            ->when($request->filled('company_id'), function (Builder $builder) use ($company_id) {
                $builder->where('company_id', $company_id);
            }, function (Builder $builder) {
                $builder->whereNotNull('company_id');
            })
            ->orderBy($orderField, $orderDirection);

        $total = $builder->count();
        $users = $builder->limit($limit)->offset($offset)->get();

        return $this->response($userPresenter->$presenter($users), [
            'total' => $total
        ]);
    }


    public function show(User $user, UsersPresenter $userPresenter)
    {
        return $this->response($userPresenter->single($user));
    }


    public function store(UsersStoreRequest $usersStoreRequest, UsersPresenter $userPresenter)
    {
        $data = $usersStoreRequest->input();
        $user = new User();
        $user->fill($data);
        $user->login = '';
        $user->password = '';
        $user->save();

        return $this->response($userPresenter->single($user));
    }


    public function update(
        UsersStoreRequest $usersStoreRequest,
        User $user,
        UsersPresenter $userPresenter
    ) {
        $data = $usersStoreRequest->input();
        $user->fill($data);
        $user->save();

        return $this->response($userPresenter->single($user));
    }
}
