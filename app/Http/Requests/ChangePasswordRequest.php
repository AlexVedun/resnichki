<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => ['required', 'string', 'min:6'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Введите текущий пароль!',
            'new_password.required' => 'Введите новый пароль и подтвердите его!',
            'new_password.confirmed' => 'Новый пароль и его подтверждение не совпадают!',
            'new_password.min' => 'Пароль не может быть короче 6 символов!',
        ];
    }
}
