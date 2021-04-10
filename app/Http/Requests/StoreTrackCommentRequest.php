<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()/*->can('store-track-comment')*/){
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
            'track_id'=> ['required'] ,
            'comment'=> ['required'] ,
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Track comment is required',
        ];
    }
}
