<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите ФИО или название фирмы!',
            'email.required' => 'Введите адрес электронной почты!',
            'email.unique' => 'Введенный адрес электронной почты уже используется!',
            'name.max' => 'ФИО или название фирмы не может быть длиннее 255 символов!',
            'email.max' => 'Адрес электронной почты не может быть длиннее 255 символов!',
        ];
    }
}
