<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class TagRequest extends FormRequest
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
        if ($this->filled('slug')) {
            $this->slug =  $this->slug;
        } else {
            $this->slug = Str::slug('name');
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(isset($this->id)){
            return [
                'name' => 'sometimes|max:50|unique:tags,id,'.$this->id,
                'slug' => 'sometimes|max:50|unique:tags,id,'.$this->id,
                'description' => 'nullable'
            ];
        }else{
            return [
                'name' => 'required|max:50|unique:tags',
                'slug' => 'sometimes|max:50|unique:tags',
                'description' => 'nullable'
            ];
        }
    }
}
