<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        if(isset($this->id)){            
            //get rules to update a existing role
            return [
                'name' => 'unique:permissions,id,'.$this->id,
                'roles' => 'required'
            ];
        }else{
            //get rules to create a new role
            return [
                'name' => 'required|unique:permissions',
                'roles' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'roles.required' => 'Her yetki en az 1 role atanmak zorunda!',
            'name.unique' => 'Girilen yetki ismi kullanımda.',
            'name.required' => 'Yetki ismi mecburidir.',
        ];
    }    


    
}
