<?php

namespace V1\Inspire\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspireRequest extends FormRequest
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
            'title_ar' => ['required','min:2','unique:inspires'],
            'title_en' => ['required','min:2','unique:inspires'],
            'description_ar' => ['required','min:2'],
            'description_en' => ['required','min:2'],
            'file' => ['required'],
        ];

        $update = [
            'title_ar' => ['required','min:2','unique:inspires,id,:id'],
            'title_en' => ['required','min:2','unique:inspires,id,:id'],
            'description_ar' => ['required','min:2'],
            'description_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
