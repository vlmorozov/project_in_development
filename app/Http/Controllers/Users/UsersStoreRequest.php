<?php


namespace App\Http\Controllers\Users;


use Illuminate\Foundation\Http\FormRequest;


class UsersStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }


    public function rules()
    {
        return [
            'name' => 'required|string',
            'company_id' => 'sometimes|integer',
            'company_unit_id' => 'sometes|integer',
            'position_id' => 'sometimes|integer',
            'personnel_number' => 'sometimes|string',
            'source' => 'sometimes|string',
            'date_birth' => 'sometimes|string',
            'date_hire' => 'sometimes|string',
            'date_dismissal' => 'sometimes|string',
            'phone_work' => 'sometimes|string',
            'phone_work_add' => 'sometimes|string',
            'phone_add' => 'sometimes|string',
            'phone_mobile' => 'sometimes|string',
            'email_work' => 'sometimes|email',
            'is_load_call' => 'sometimes|string',
        ];
    }
}
