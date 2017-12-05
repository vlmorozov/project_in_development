<?php

namespace App\Presenters;


use App\Models\Position;
use App\Models\PositionCategory;
use Illuminate\Support\Collection;


/**
 * Class PositionPresenter
 *
 * @method array list(Position | Position[]  | Collection $position)
 * @method array grid(Position | Position[]  | Collection $position)
 */
class PositionPresenter extends Presenter
{

    /**
     * @var PositionCategoryPresenter
     */
    private $positionCategoryPresenter;


    public function __construct(PositionCategoryPresenter $positionCategoryPresenter)
    {
        $this->positionCategoryPresenter = $positionCategoryPresenter;
    }

    protected function transformList(Position $position)
    {
        return [
            'id' => $position->id,
            'title' => $position->title,
            'status' => $position->status,
        ];
    }

    protected function transformGrid(Position $position)
    {
        return [
            'id' => $position->id,
            'title' => $position->title,
            'status' => $position->status,
            'category' => $this->positionCategoryPresenter->list($position->category),
            'in_shift_mechanic' => $position->in_shift_mechanic,
        ];
    }

}
