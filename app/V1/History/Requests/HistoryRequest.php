<?php

namespace V1\History\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'history_ar' => ['required','min:2'],
            'history_en' => ['required','min:2'],
        ];

        $update = [
            'history_ar' => ['required','min:2'],
            'history_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
