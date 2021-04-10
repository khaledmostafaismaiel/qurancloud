<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()/*->can('store-message')*/){
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
            'chat_id'=> ['required'] ,
            'to_user_id'=> ['required'] ,
            'body'=> ['required'] ,
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Message body is required',
        ];
    }
}
