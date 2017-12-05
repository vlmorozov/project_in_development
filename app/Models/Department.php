<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Department
 *
 * @property int          $id
 * @property string|null  $id_1c                 ID в базе 1С
 * @property int          $company_id            ID Организации
 * @property string       $title                 Название подразделения
 * @property int          $is_load_contact_event Загружать исх. события (из астериска)
 * @property string|null  $status                1-активен, 2-неактиване
 * @property-read Company $company
 * @method static Builder|Department whereCompanyId($value)
 * @method static Builder|Department whereId($value)
 * @method static Builder|Department whereId1c($value)
 * @method static Builder|Department whereIsLoadContactEvent($value)
 * @method static Builder|Department whereStatus($value)
 * @method static Builder|Department whereTitle($value)
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $table = 'company_unit';

    public $timestamps = false;

    protected $casts = [
        'status' => 'integer',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
