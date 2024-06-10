<?php

namespace V1\OurGoal\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurGoalRequest extends FormRequest
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
            'goal_ar' => ['required','min:2'],
            'goal_en' => ['required','min:2'],
        ];

        $update = [
            'goal_ar' => ['required','min:2'],
            'goal_en' => ['required','min:2'],
        ];

        if ($this->getMethod() == 'POST')
            return $store;
        return $update;
    }
}
