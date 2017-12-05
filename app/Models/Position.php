<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Position
 *
 * @property int                        $id
 * @property string|null                $id_1c                ID в базе 1С
 * @property string                     $title                Название
 * @property string|null                $status               1-активен, 2-неактиване
 * @property int|null                   $in_shift_mechanic    Участвует в плнировании смен механиков
 * @property int|null                   $position_category_id Категория должности
 * @property-read PositionCategory|null $category
 * @method static Builder|Position whereId($value)
 * @method static Builder|Position whereId1c($value)
 * @method static Builder|Position whereInShiftMechanic($value)
 * @method static Builder|Position wherePositionCategoryId($value)
 * @method static Builder|Position whereStatus($value)
 * @method static Builder|Position whereTitle($value)
 * @mixin \Eloquent
 */
class Position extends Model
{
    protected $table = 'position';

    public $timestamps = false;

    protected $casts = [
        'in_shift_mechanic' => 'boolean',
        'status' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo(PositionCategory::class, 'position_category_id');
    }
}
