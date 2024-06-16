<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            // Rules for create
            $rules['username'] = 'required|string|max:100|unique:users,username';
            $rules['password'] = 'required|string|min:8';
        } elseif ($this->isMethod('put')) {
            // Rules for update
            $rules['username'] = 'required|string|max:100';
            $rules['password'] = 'nullable|string|min:8';
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 100 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',
            'password.min' => 'Kata sandi minimal harus terdiri dari 8 karakter.',
            'role.required' => 'Peran wajib diisi.',
            'role.string' => 'Peran harus berupa teks.',
            'role.max' => 'Peran tidak boleh lebih dari 10 karakter.',
        ];
    }
}
