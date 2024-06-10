<?php

namespace V1\Sliders\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title_ar' => ['required','min:2'],
            'title_en' => ['required','min:2'],
            'image' => ['required','image'],
        ];

        $update = [
            'title_ar' => ['required','min:2'],
            'title_en' => ['required','min:2'],
            'image' => ['image'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
