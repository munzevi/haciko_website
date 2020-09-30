<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    protected function prepareForValidation(){
        if ($this->filled('password')) {
            $password =  \Hash::make($this->password);
            $this->merge([
                'password' => $password,
                'password_confirmation' => $password
            ]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->filled('id')){
            // get rules to update a existing user
            $rules = [
                'name' => 'sometimes|required|string',
                'email' => 'sometimes|required|unique:users,id,'.$this->id,
                'roles' => 'nullable',
                'permissions' => 'nullable',
                'password' => 'nullable|min:6|confirmed',

            ];
        }else{
            // get rules to create a new user
            $rules = [
                'name' => 'required|string',
                'email' => 'required|unique:users',
                'roles' => 'nullable',
                'permissions' => 'nullable',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'same:password',
            ];
        }
        return $rules;
    }

    public function messages(){
        return [
            'email.unique' => '<strong>Tekrarlanan veri!</strong> Bu mail adresi kullanılmaktadır.',
            'email.required' => '<strong>Eksik veri!</strong> Kullanıcı mail adresi kayıt için mecburidir.',
            'name.required' => '<strong>Eksik veri!</strong> Kullanıcı ismi kayıt için mecburidir.',
            'password.required' => '<strong>Eksik veri!</strong> Kullanıcı şifresi kayıt için mecburidir.',
            'password.confirmed' => $this->password.' '.$this->password_confirmation,
        ];
    }
    

}
