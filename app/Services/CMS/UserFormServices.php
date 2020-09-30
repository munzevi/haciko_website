<?php 
namespace App\Services\CMS;
use Illuminate\Http\Request;

class UserFormServices {

    /**
     * check if input contains the empty password
     * and process accordingly to that
     * @param  object $request -Illuminate\Http\Request;
     * @return object $req  
     */
    public function extractEmptyPasswords($request){
        // if password field is empty
        // extract password and password confirmation 
        // fields from the request
        if(empty($request->password)){
            $req = $request->except(['password','password_confirmation','roles','permission']);
        }else{
        // otherwise get all request fields
            $req = $request->except(['roles','permission']);
        }
        
        return $req;
    }
    /**
     * get the appropriate verification 
     * rules for the request
     * @param  object $req 
     * @return array $rules  
     */
    public function getValidateRules($req){       
        if(isset($req['id'])){
            // get rules to update a existing user
            $rules['rules'] = [
                'name' => 'sometimes|required|string',
                'email' => 'sometimes|required|unique:users,id,'.$req['id'],
                'password' => 'sometimes|required|min:6|confirmed',
            ];
        }else{
            // get rules to create a new user
            $rules['rules'] = [
                'name' => 'required|string',
                'email' => 'required|unique:users',
                'password' => 'required|min:6|confirmed',
            ];
        }
        $rules['messages'] = [
            'email.unique' => '<strong>Tekrarlanan veri!</strong> Bu mail adresi kullanılmaktadır.',
            'email.required' => '<strong>Eksik veri!</strong> Kullanıcı mail adresi kayıt için mecburidir.',
            'name.required' => '<strong>Eksik veri!</strong> Kullanıcı ismi kayıt için mecburidir.',
            'password.required' => '<strong>Eksik veri!</strong> Kullanıcı şifresi kayıt için mecburidir.'
        ];

        return $rules;
    }

    public function requestInstance($arr){
    	$requestInstance = new Request;
    	$requestInstance->replace($arr);
    	return $requestInstance;
    }

}