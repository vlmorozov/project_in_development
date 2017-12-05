<?php

namespace App\Http\Controllers\Positions;

use App\Models\PositionCategory;
use App\Presenters\PositionCategoryPresenter;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CategoriesController extends Controller
{
    public function index(CategoriesIndexRequest $request, PositionCategoryPresenter $positionCategoryPresenter)
    {
        $limit = $request->input('limit', config('kis.limits.small'));
        $offset = $request->input('offset', 0);
        $orderField = $request->input('order.field', 'title');
        $orderDirection = $request->input('order.direction', 'asc');

        $presenter = $request->input('presenter', config('kis.defaults.presenter'));

        $title = $request->input('title');

        $query = PositionCategory::query()
            ->when($title, function (Builder $builder) use ($title) {
                return $builder->where('title', 'like', "%{$title}%");
            });
        if ($limit) {
            $query->limit($limit)->offset($offset);
        }
        if ($orderField) {
            $query->orderBy($orderField, $orderDirection);
        }
        $positionCategories = $query->get();

        return $this->response($positionCategoryPresenter->$presenter($positionCategories));
    }
}
