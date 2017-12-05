<?php


namespace App\Http\Controllers\Logs;


use Illuminate\Foundation\Http\FormRequest;


class LogsIndexRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        return [
            'operation_type'      => 'nullable|in:create,update,delete',
            'user_id'             => 'nullable|exists:user,id',
            'object_type'         => 'nullable|string',
            'object_id'           => 'nullable|integer',
            'object_field'        => 'nullable|string',
            'operation_date_from' => 'nullable|date',
            'operation_date_to'   => 'nullable|date',
            'limit'               => 'integer|max:100',
            'offset'              => 'integer',
        ];
    }
}
