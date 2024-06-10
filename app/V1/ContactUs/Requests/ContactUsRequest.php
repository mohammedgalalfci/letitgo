<?php

namespace V1\ContactUs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            "fullname" => ['nullable','min:3'],
            "email" => ['nullable'],
            "phone" => ['required'],
            "message" => ['required'],
        ];

        $update = [
            "fullname" => ['nullable','min:3'],
            "email" => ['nullable'],
            "phone" => ['required'],
            "message" => ['required'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.min' => __('validation.min'),
        ];
    }
}
