<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'image'         => 'required',
            'instructor_id' => 'required',
            'price'       => 'required',
            'start_date'  => 'required',
            'start_time'  => 'required',
            'end_date'    => 'required',
            'end_time'    => 'required',
            'video'       => 'required',
            'type'        => 'required',
        ];

        foreach (config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required']];
        }

        return $rules;
    }
}
