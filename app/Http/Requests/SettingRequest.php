<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * [rules description]
     * @return [type] [description]
     */
    public function rules()
    {
        if(isset($this->id)){            
            //get rules to update a existing role
            return [
                'segment' => 'sometimes|required',
                'key' => 'sometimes|required',
                'value' => 'sometimes|required',
                'language_id' => 'sometimes|required',
            ];
        }else{
            //get rules to create a new role
            return [
                'segment' => 'required',
                'key' => 'required',
                'value' => 'required',
                'language_id' => 'required',
            ];
        }
    }

    public function messages(){
        return [
            'segment.required' => 'Ayarın Segmenti (Kategorisi) mecburidir.',
            'key.required' => 'Ayarın anahtar değeri mecburidir.',
            'value.required' => 'Ayarın değeri mecburidir.',
            'language_id.required' => 'Ayarın dili mecburidir.',
        ];
    }    
}
