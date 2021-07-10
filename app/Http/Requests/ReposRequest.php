<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReposRequest extends FormRequest
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
        $date = '2019-01-10';
        $today = today();
        return [
            'date'      => ['bail', 'nullable', 'date', "after_or_equal:$date" , "before:$today"],
            'limit'     => ['bail', 'required', 'numeric', 'regex:/^(10|50|100)$/'],
            'language'  => ['nullable', 'string'],
        ];
    }
}
