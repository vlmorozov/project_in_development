<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\PositionCategory
 *
 * @property int $id
 * @property string|null $title Название
 * @property string|null $id_1c ID в базе 1С
 * @method static Builder|PositionCategory whereId($value)
 * @method static Builder|PositionCategory whereId1c($value)
 * @method static Builder|PositionCategory whereTitle($value)
 * @mixin \Eloquent
 */
class PositionCategory extends Model
{
    protected $table = 'position_category';
    public $timestamps = false;
}
