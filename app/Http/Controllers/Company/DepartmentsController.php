<?php

namespace App\Http\Controllers\Company;

use App\Models\Department;
use App\Models\Defaults;
use App\Http\Controllers\Controller;
use App\Presenters\DepartmentPresenter;
use Illuminate\Database\Eloquent\Builder;

class DepartmentsController extends Controller
{
    public function index(DepartmentsIndexRequest $request, DepartmentPresenter $departmentPresenter)
    {
        $limit = $request->input('limit', config('kis.limits.no_limit'));
        $offset = $request->input('offset', 0);
        $orderField = $request->input('order.field', 'title');
        $orderDirection = $request->input('order.direction', 'asc');

        $presenter = $request->input('presenter', config('kis.defaults.presenter'));

        $title = $request->input('title');

        $query = Department::query()
            ->when($title, function (Builder $builder) use ($title) {
                $builder->where('title', 'like', "%{$title}%");
            });
        if ($limit) {
            $query->limit($limit)->offset($offset);
        }
        if ($orderField) {
            $query->orderBy($orderField, $orderDirection);
        }
        $departments = $query->get();

        return $this->response($departmentPresenter->$presenter($departments));
    }
}
