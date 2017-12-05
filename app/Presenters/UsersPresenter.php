<?php


namespace App\Presenters;


use App\Models\User;
use Illuminate\Support\Collection;


/**
 * Class UsersPresenter
 *
 * @method array single(User | User[]  | Collection $user)
 * @method array list(User | User[]  | Collection $user)
 * @method array grid(User | User[]  | Collection $user)
 * @method array auth(User | User[]  | Collection $user)
 * @method array authUser(User | User[]  | Collection $user)
 */
class UsersPresenter extends Presenter
{
    /**
     * @var CompanyPresenter
     */
    private $companyPresenter;

    /**
     * @var DepartmentPresenter
     */
    private $departmentPresenter;

    /**
     * @var PositionPresenter
     */
    private $positionPresenter;


    public function __construct(
        CompanyPresenter $companyPresenter,
        DepartmentPresenter $departmentPresenter,
        PositionPresenter $positionPresenter
    ) {
        $this->companyPresenter = $companyPresenter;
        $this->departmentPresenter = $departmentPresenter;
        $this->positionPresenter = $positionPresenter;
    }

    protected function transformSingle(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'personnel_number' => $user->personnel_number,
            'source' => $user->source,
            'date_birth' => $user->date_birth,
            'date_hire' => $user->date_hire,
            'date_dismissal' => $user->date_dismissal,
            'phone_work' => $user->phone_work,
            'phone_work_add' => $user->phone_work_add,
            'phone_add' => $user->phone_add,
            'phone_mobile' => $user->phone_mobile,
            'email_work' => $user->email_work,
            'is_load_call' => $user->is_load_call,
            'mail_signature' => (bool) $user->mail_signature,
            'status' => $user->status,
            'company_id' => $user->company_id,
            'company' => $this->companyPresenter->list($user->company),
            'company_unit' => $this->departmentPresenter->list($user->department),
            'position' => $this->positionPresenter->list($user->position),
        ];
    }


    protected function transformList(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'status' => $user->status,
        ];
    }

    protected function transformGrid(User $user)
    {
        return [
            'id' => $user->id,
            'can_auth' => $user->can_auth,
            'is_driver' => (bool) $user->driver,
            'name' => $user->name,
            'import_1c' => $user->import_1c,
            'source' => $user->source,
            'position' => $this->positionPresenter->list($user->position),
            'date_hire' => $user->date_hire,
            'date_dismissal' => $user->date_dismissal,
            'status' => $user->status,
        ];
    }

    protected function transformAuth(User $user)
    {
        return [
            'user' => $this->authUser($user),
        ];
    }


    protected function transformAuthUser(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'permissions' => [],
        ];
    }
}
