<?php

namespace App\Presenters;


use App\Models\Company;
use Illuminate\Support\Collection;


/**
 * Class CompanyPresenter
 *
 * @method array list(Company | Company[]  | Collection $company)
 */
class CompanyPresenter extends Presenter
{
    protected function transformList(Company $company)
    {
        return [
            'id' => $company->id,
            'title' => $company->title,
            'status' => $company->status,
        ];
    }
}
