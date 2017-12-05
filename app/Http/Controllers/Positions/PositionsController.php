<?php

namespace App\Http\Controllers\Positions;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Status;
use App\Presenters\PositionPresenter;
use Illuminate\Database\Eloquent\Builder;

class PositionsController extends Controller
{
    public function index(PositionsIndexRequest $request, PositionPresenter $positionPresenter)
    {
        $limit = $request->input('limit', config('kis.limits.small'));
        $offset = $request->input('offset', 0);
        $orderField = $request->input('order.field', 'title');
        $orderDirection = $request->input('order.direction', 'asc');

        $presenter = $request->input('presenter', config('kis.defaults.presenter'));

        $title = $request->input('title');
        $positionCategory = $request->input('position_category_id');
        $status = $request->input('status');

        $query = Position::query()
            ->when($title, function (Builder $builder) use ($title) {
                return $builder->where('title', 'like', "%{$title}%");
            })
            ->when($status, function (Builder $builder) use ($status) {
                return $builder->where('status', $status);
            })
            ->when($positionCategory, function (Builder $builder) use ($positionCategory) {
                return $builder->where('position_category_id', $positionCategory);
            });
        if ($limit) {
            $query->limit($limit)->offset($offset);
        }
        if ($orderField) {
            $query->orderBy($orderField, $orderDirection);
        }
        $positions = $query->get();

        return $this->response($positionPresenter->$presenter($positions));
    }
}
