<?php

namespace App\Http\Requests;

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
        if(1/*! auth()->user()/*->can('love-store-user')*/){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=> ['required' , 'min:2'] ,
            'second_name'=> ['required' , 'min:2' ] ,
            'user_name'=> ['required' , 'min:3' ] ,
            'password'=> ['required' , 'confirmed' , 'min:8'] ,
            'gender'=> ['required'] ,
            'not_robot'=> ['required' ] ,
            'terms_of_conditions'=> ['required' ] ,
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'first_name.min:2' => 'Min characters for first name is 2',
            'second_name.required' => 'Second name is required',
            'second_name.min:2' => 'Min characters for second name is 2',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation is required',
            'password.min:8' => 'Track file is required',
            'gender.required' => 'Gender required',
            'not_robot.required' => 'Not robot is required',
            'terms_of_conditions.required' => 'Terms of conditions is required',

        ];
    }
}
