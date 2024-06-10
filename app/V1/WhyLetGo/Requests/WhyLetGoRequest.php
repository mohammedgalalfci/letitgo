<?php

namespace V1\WhyLetGo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyLetGoRequest extends FormRequest
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
            'why_ar' => ['required','min:2'],
            'why_en' => ['required','min:2'],
        ];

        $update = [
            'why_ar' => ['required','min:2'],
            'why_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
