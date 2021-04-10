<?php

namespace App\Http\Requests;

use App\trackLoves;
use Illuminate\Foundation\Http\FormRequest;

class StoreTrackLoveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()/*->can('love-this-track')*/){
            //TrackLoves::where('track_id', $request->track_id)->where('user_id', auth()->id())->get()->count()
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
        ];
    }
}
