<?php

namespace App\Http\Controllers\Logs;


use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Presenters\LogPresenter;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LogsController extends Controller
{
    /**
     * @var LogPresenter
     */
    private $logsPresenter;


    public function __construct(LogPresenter $logsPresenter)
    {
        $this->logsPresenter = $logsPresenter;
    }


    public function index(LogsIndexRequest $request)
    {
        $limit = $request->input('limit', 15);
        $offset = $request->input('offset', 0);
        $type = $request->input('operation_type');
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $object_type = $request->input('object_type');
        $object_id = $request->input('object_id');
        $object_field = $request->input('object_field');
        $operation_date_from = $request->input('operation_date_from');
        $operation_date_to = $request->input('operation_date_to');

        /** @var Builder $builder */
        $builder = Log::query()
            ->when($type, function (Builder $builder) use ($type) {
                $builder->where('log.operation_type', $type);
            })
            ->when($user_id, function (Builder $builder) use ($user_id) {
                $builder->where('log.user_id', $user_id);
            })
            ->when($user_name, function (Builder $builder) use ($user_name) {
                $builder->whereHas('user', function(Builder $builder) use ($user_name) {
                    $builder->where('user.name', 'like', "%{$user_name}%");
                });
            })
            ->when($object_type, function (Builder $builder) use ($object_type) {
                $object_type_split = explode(' ', $object_type);
                $builder->where('log.object_type', array_shift($object_type_split));
            })
            ->when($object_id, function (Builder $builder) use ($object_id) {
                $builder->where('log.object_id', $object_id);
            })
            ->when($object_field, function (Builder $builder) use ($object_field) {
                $builder->where('log.operation_data', 'like', "%{$object_field}%");
            })
            ->when($operation_date_from, function (Builder $builder) use ($operation_date_from) {
                $builder->where('log.operation_date', '>=', Carbon::parse($operation_date_from)->startOfDay());
            })
            ->when($operation_date_to, function (Builder $builder) use ($operation_date_to) {
                $builder->where('log.operation_date', '<=', Carbon::parse($operation_date_to)->endOfDay());
            });

        $total = $builder->count();
        $logs = $builder->limit($limit)->offset($offset)->get();

        return $this->response($this->logsPresenter->grid($logs), [
            'total' => $total
        ]);
    }


    public function show(Log $log)
    {
        return $this->response($this->logsPresenter->changes($log));
    }


    public function objectTypes(Request $request)
    {
        $title = $request->input('title');
        $tables = Log::objectTypes();

        if ($title) {
            $tables = $tables->filter(function($tableData) use ($title) {
                return Str::contains($tableData->TABLE_NAME . $tableData->TABLE_COMMENT, $title);
            });
        }

        return $this->response($this->logsPresenter->objectType($tables));
    }
}
