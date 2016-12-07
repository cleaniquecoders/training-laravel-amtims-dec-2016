<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if(Auth::guest() == false) {
        //     return true,
        // } else {
        //     return false;
        // }

        // return (Auth::guest() == false ? true : false);

        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         'name.min' => 'name tak cukup panjang tu..',
    //         'name.required' => 'name kena ada broo...',
    //     ];
    // }

}
