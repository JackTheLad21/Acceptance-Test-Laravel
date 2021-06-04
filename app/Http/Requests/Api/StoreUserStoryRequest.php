<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserStoryRequest extends FormRequest
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
            'project_id'    => 'exists:user_stories',
            'code'          => 'required',
            'condition'     => 'required',
            'expectation'   => 'required',
            'objective'     => 'required',
            'test'          => 'required'
        ];
    }
}
