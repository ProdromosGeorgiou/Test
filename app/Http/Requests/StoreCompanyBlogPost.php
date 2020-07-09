<?php
/*
 * This class specifies the validation rules of the companies.
 * All the attributes of the company are required.
 * The Start_Date should be a valid date and a day before tomorrow.
 * The End_Date should be a valid date, after or equal the Start_Date and a day before tomorrow.
 * The Email should be a valid email address.
 */
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



