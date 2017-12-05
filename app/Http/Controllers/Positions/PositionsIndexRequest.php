<?php


namespace App\Http\Controllers\Positions;


use Illuminate\Foundation\Http\FormRequest;


class PositionsIndexRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        return [
            'presenter'       => 'sometimes|in:list,grid',
            'offset'          => 'sometimes|integer',
            'limit'           => 'sometimes|integer|max:100',
            'order.field'     => 'sometimes|in:name',
            'order.direction' => 'sometimes|in:asc,desc',
        ];
    }
}
