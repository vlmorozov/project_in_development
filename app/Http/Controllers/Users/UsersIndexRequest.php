<?php


namespace App\Http\Controllers\Users;


use Illuminate\Foundation\Http\FormRequest;


class UsersIndexRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        return [
            'presenter'       => 'sometimes|in:list,grid',
            'limit'           => 'sometimes|max:100',
            'order.field'     => 'sometimes|in:name',
            'order.direction' => 'sometimes|in:asc,desc',
        ];
    }
}
