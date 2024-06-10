<?php

namespace V1\CharacterizeUs\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterizeUsRequest extends FormRequest
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
            'characterize_ar' => ['required','min:2'],
            'characterize_en' => ['required','min:2'],
        ];

        $update = [
            'characterize_ar' => ['required','min:2'],
            'characterize_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
