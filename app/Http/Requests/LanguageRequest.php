<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LanguageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function prepareForValidation(){
        if(!$this->filled('slug')){
            $this->merge(['slug' => Str::slug($this->name)]);
        }
        $this->author = $this->user()->id;  
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(isset($this->id)){            
            //get rules to update a existing role
            return [
                'name' => 'unique:languages,id,'.$this->id,
                'code' => 'unique:languages,id,'.$this->id,
                'slug' => 'nullable',
            ];
        }else{
            //get rules to create a new role
            return [
                'name' => 'required|unique:roles',
                'code' => 'required',
                'slug' => 'nullable',
            ];
        }
    }

    /**
     * set the validation rules error messages
     * @return array
     */
    public function messages(){
        return [
            'name.unique' => 'Girilen dil ismi kullanımda.',
            'code.unique' => 'Girilen kod kullanımda.',
            'name.required' => 'Dil ismi mecburidir.',
            'code.required' => 'Dil kodu mecburidir.',
            'guard_name.required' => 'Rol muhafız adı mecburidir.',
        ];
    }
}
