<?php

namespace App\Presenters;


use App\Models\Department;
use Illuminate\Support\Collection;


/**
 * Class DepartmentsPresenter
 *
 * @method array list(Department | Department[]  | Collection $department)
 */
class DepartmentsPresenter extends Presenter
{

    /**
     * @var CompanyPresenter
     */
    private $companyPresenter;


    public function __construct(CompanyPresenter $companyPresenter)
    {
        $this->companyPresenter = $companyPresenter;
    }

    protected function transformList(Department $department)
    {
        return [
            'id' => $department->id,
            'title' => $department->title,
            'status' => $department->status,
        ];
    }
}
