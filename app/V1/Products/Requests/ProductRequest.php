<?php

namespace V1\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_ar' => ['required','min:2','unique:products'],
            'name_en' => ['required','min:2','unique:products'],
            'description_ar' => ['required','min:2'],
            'description_en' => ['required','min:2'],
            'file' => ['required'],
        ];

        $update = [
            'name_ar' => ['required','min:2','unique:products,id,:id'],
            'name_en' => ['required','min:2','unique:products,id,:id'],
            'description_ar' => ['required','min:2'],
            'description_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
