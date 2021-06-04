<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
            'name'      => 'required|max:255',
            'email'     => 'required|email|unique:users',
            'password'   => 'required|string|min:8',
            'avatar'        => 'sometimes|nullable|file|mimes:jpg,jpeg,png|max:1024',
            'avatar_remove' => 'sometimes|nullable|boolean',
            'roles'         => 'required|array'
        ];
    }
}
