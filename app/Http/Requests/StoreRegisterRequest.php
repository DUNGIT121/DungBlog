<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=> 'required|max:255',
            'last_name' => 'required|max:255',
            'email'     => 'required|email|unique:users|max:255',
            'password'  => 'required|min:6|max:32|confirmed',
            'password_confirmation'  => 'required|min:6|max:32'
        ];
    }
}
