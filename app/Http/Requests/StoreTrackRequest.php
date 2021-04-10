<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()/*->can('store-track')*/){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file_upload' => 'required',
//          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ];
    }

    public function messages()
    {
        return [
            'file_upload.required' => 'Track file is required',
        ];
    }
}
