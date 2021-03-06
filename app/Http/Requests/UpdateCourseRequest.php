<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            // 'image' => 'required',
            'category_id' => 'required',
            'instructor_id' => 'required',
            'price' => 'required',
        ];

        foreach (config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required']];
            $rules += [$locale.'.description' => ['required']];
        }

        return $rules;
    }
}
