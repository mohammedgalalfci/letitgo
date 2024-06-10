<?php

namespace V1\OurVision\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisionRequest extends FormRequest
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
            'vision_ar' => ['required','min:2'],
            'vision_en' => ['required','min:2'],
        ];

        $update = [
            'vision_ar' => ['required','min:2'],
            'vision_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
