<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'password' => ['nullable', 'string', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama pengguna tidak boleh kosong.',
            'email.required' => 'Email pengguna tidak boleh kosong.',
            'email.email' => 'Email pengguna harus berisi email yang valid.',
            'email.unique' => 'Email pengguna sudah terdaftar.',
            'password.confirmed' => 'Kata sandi harus sama dengan kolom konfirmasi.',
        ];
    }
}
