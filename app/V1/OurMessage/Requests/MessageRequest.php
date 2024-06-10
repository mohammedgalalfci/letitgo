<?php

namespace V1\OurMessage\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'message_ar' => ['required','min:2'],
            'message_en' => ['required','min:2'],
        ];

        $update = [
            'message_ar' => ['required','min:2'],
            'message_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
