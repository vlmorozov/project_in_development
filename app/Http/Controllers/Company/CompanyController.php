<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Defaults;
use App\Models\Status;
use App\Presenters\CompanyPresenter;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CompanyController extends Controller
{
    public function index(CompanyIndexRequest $request, CompanyPresenter $companyPresenter)
    {
        $limit = $request->input('limit', config('kis.limits.small'));
        $offset = $request->input('offset', 0);
        $orderField = $request->input('order.field', 'title');
        $orderDirection = $request->input('order.direction', 'asc');

        $presenter = $request->input('presenter', config('kis.defaults.presenter'));

        $title = $request->input('title');
        $status = $request->input('status');

        $query = Company::query()
            ->when($title, function (Builder $builder) use ($title) {
                return $builder->where('title', 'like', "%{$title}%");
            })
            ->when($status, function (Builder $builder) use ($status) {
                return $builder->where('status', $status);
            });
        if ($limit) {
            $query->limit($limit)->offset($offset);
        }
        if ($orderField) {
            $query->orderBy($orderField, $orderDirection);
        }
        $companies = $query->get();

        return $this->response($companyPresenter->$presenter($companies));
    }
}
