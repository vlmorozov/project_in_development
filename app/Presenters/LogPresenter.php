<?php

namespace App\Presenters;


use App\Models\Log;
use Illuminate\Support\Collection;


/**
 * Class LogPresenter
 *
 * @method array changes(Log | Log[]  | Collection $log)
 * @method array grid(Log | Log[]  | Collection $log)
 * @method array objectType($tableData)
 */
class LogPresenter extends Presenter
{
    /**
     * @var UsersPresenter
     */
    private $userPresenter;


    public function __construct(UsersPresenter $userPresenter)
    {
        $this->userPresenter = $userPresenter;
    }


    protected function transformChanges(Log $log)
    {
        $fieldTypes = Log::fieldTypes($log->object_type)->keyBy('COLUMN_NAME');
        $old = $log->current_data;
        $new = $log->operation_data;

        $fields = array_merge(array_keys($old), array_keys($new));

        $changes = [];

        foreach ($fields as $field) {
            $changes[] = [
                'field'       => $field,
                'translation' => optional($fieldTypes->get($field))->COLUMN_COMMENT,
                'old'         => array_get($old, $field),
                'new'         => array_get($new, $field),
            ];
        }

        return [
            'id'      => $log->id,
            'changes' => $changes,
        ];
    }


    protected function transformGrid(Log $log)
    {
        return [
            'id'             => $log->id,
            'user'           => $this->userPresenter->list($log->user),
            'object_type'    => $log->object_type,
            'object_id'      => $log->object_id,
            'operation_type' => $log->operation_type,
            'operation_date' => $log->operation_date,
        ];
    }


    protected function transformObjectType($tableData)
    {
        return [
            'id'    => $tableData->TABLE_NAME,
            'title' => $tableData->TABLE_NAME . ($tableData->TABLE_COMMENT ? " ({$tableData->TABLE_COMMENT})" : ''),
        ];
    }
}
