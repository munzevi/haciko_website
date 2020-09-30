<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                'name' => 'unique:roles,id,'.$this->id,
            ];
        }else{
            //get rules to create a new role
            return [
                'name' => 'required|unique:roles',
                'guard_name' => 'required',
            ];
        }
    }

    /**
     * set the validation rules error messages
     * @return array
     */
    public function messages(){
        return [
            'name.unique' => 'Girilen rol ismi kullanımda.',
            'name.required' => 'Rol ismi mecburidir.',
            'guard_name.required' => 'Rol muhafız adı mecburidir.',
        ];
    }
}
