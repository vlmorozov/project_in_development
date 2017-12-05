<?php

namespace App\Presenters;


use App\Models\Position;
use App\Models\PositionCategory;
use Illuminate\Support\Collection;


/**
 * Class PositionCategoryPresenter
 *
 * @method array list(PositionCategory | PositionCategory[]  | Collection $positionCategory)
 */
class PositionCategoryPresenter extends Presenter
{

    protected function transformList(PositionCategory $positionCategory)
    {
        return [
            'id' => $positionCategory->id,
            'title' => $positionCategory->title,
        ];
    }

}
