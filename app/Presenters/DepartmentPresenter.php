<?php

namespace App\Presenters;


use App\Models\Department;
use Illuminate\Support\Collection;


/**
 * Class DepartmentPresenter
 *
 * @method array list(Department | Department[]  | Collection $department)
 */
class DepartmentPresenter extends Presenter
{
    protected function transformList(Department $department)
    {
        return [
            'id' => $department->id,
            'title' => $department->title,
            'status' => $department->status,
        ];
    }
}
