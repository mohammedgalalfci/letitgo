<?php

namespace V1\ProductComponent\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductComponentRequest extends FormRequest
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
            'name_ar' => ['required','min:2','unique:product_components'],
            'name_en' => ['required','min:2','unique:product_components'],
        ];

        $update = [
            'name_ar' => ['required','min:2','unique:product_components,id,:id'],
            'name_en' => ['required','min:2','unique:product_components,id,:id'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
