<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyBlogPost extends FormRequest
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
        return [
            'Company_Symbol' => 'required',
            'Start_Date'=> 'required|date|before:tomorrow',
            'End_Date'=>'required|date|after_or_equal:Start_Date|before:tomorrow',
            'Email'=>'required|email'
        ];
    }
}



