<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Driver
 *
 * @mixin \Eloquent
 * @property int         $id
 * @property int|null    $company_id   ID компании
 * @property int         $user_id      ID сотрудника
 * @property string|null $num          Табельный номер
 * @property int|null    $foto_file_id ID файла фотографии
 * @property int|null    $form_file_id ID файла анкеты
 * @property string|null $status       1 - активен, 2 - не активен
 * @method static Builder|Driver whereCompanyId($value)
 * @method static Builder|Driver whereFormFileId($value)
 * @method static Builder|Driver whereFotoFileId($value)
 * @method static Builder|Driver whereId($value)
 * @method static Builder|Driver whereNum($value)
 * @method static Builder|Driver whereStatus($value)
 * @method static Builder|Driver whereUserId($value)
 */
class Driver extends Model
{
    public $timestamps = false;

    public $fillable = [
        'company_id',
        'user_id',
        'num',
        'foto_file_id',
        'form_file_id',
        'status',
    ];

    protected $table = 'driver';
}
