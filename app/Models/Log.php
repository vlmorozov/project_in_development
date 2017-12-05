<?php


namespace App\Models;


use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Log
 *
 * @property int            $id
 * @property string         $object_type    Тип объекта, над которым совершается действие (название таблицы)
 * @property int            $object_id      ID объекта, над которым совершается действие
 * @property string         $operation_type Тип операции
 * @property string         $operation_date Дата и время операции
 * @property int|null       $user_id        ID пользователя, совершившего действие
 * @property array          $operation_data Данные операции
 * @property array          $current_data   Текущие данные
 * @property-read User|null $user
 * @method static Builder|Log whereCurrentData($value)
 * @method static Builder|Log whereId($value)
 * @method static Builder|Log whereObjectId($value)
 * @method static Builder|Log whereObjectType($value)
 * @method static Builder|Log whereOperationData($value)
 * @method static Builder|Log whereOperationDate($value)
 * @method static Builder|Log whereOperationType($value)
 * @method static Builder|Log whereUserId($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    protected $table = 'log';

    public $timestamps = false;

    protected $casts = [
        'operation_data' => 'array',
        'current_data'   => 'array',
    ];

    protected static $objectTypes;

    protected static $fieldTypes = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public static function objectTypes()
    {
        if (static::$objectTypes) {
            return static::$objectTypes;
        }

        $types = cache('object_types');

        if ($types) {
            return $types;
        }


        $types = collect(DB::table('information_schema.TABLES')
            ->select('TABLE_NAME', 'TABLE_COMMENT')
            ->where('TABLE_SCHEMA', config('database.connections.mysql.database'))
            ->get());

        cache(['object_types' => $types], 60);

        return $types;
    }


    public static function fieldTypes(string $table)
    {
        if (isset(static::$fieldTypes[$table])) {
            return static::$fieldTypes;
        }

        $fieldTypes = cache("field_types:{$table}");

        if ($fieldTypes) {
//            dd($fieldTypes);
            return $fieldTypes;
        }

        $fieldTypes = collect(DB::table('information_schema.COLUMNS')
            ->select('COLUMN_NAME', 'DATA_TYPE', 'COLUMN_COMMENT', 'COLUMN_DEFAULT')
            ->where('TABLE_SCHEMA', config('database.connections.mysql.database'))
            ->where('TABLE_NAME', $table)
            ->get());

        cache(["field_types:{$table}" => $fieldTypes], 60);

        return $fieldTypes;
    }
}
