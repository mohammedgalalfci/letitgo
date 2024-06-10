<?php

namespace V1\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $store = [
            "name" => ['required','min:2'],
            "email" => ['required','unique:users,email','email'],
            "password" => ['required','min:6'],
            "image" => ['image'],
        ];

        $update = [
            "name" => ['required','min:2'],
            "email" => ['required','unique:users,id,:id','email'],
            "image" => ['image'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
