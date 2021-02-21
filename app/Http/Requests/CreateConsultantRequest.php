<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConsultantRequest extends FormRequest
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
            'image'     => 'required',
            'phone'     => 'required',
            'experince' => 'required',
            // 'badges'    => 'required',
            'cost'      => 'required|min:0',
            'comession' => 'required|min:0',
        ];

        foreach (config('translatable.locales') as $locale){
            $rules += [$locale.'.name' => ['required']];
            $rules += [$locale.'.bio' => ['required']];
            $rules += [$locale.'.address' => ['required']];
        }

        return $rules;
    }
}
