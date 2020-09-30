<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\Helpers;

class ContentRequest extends FormRequest
{

    public function prepareForValidation(){
        $content = Helpers::getContentType();
        if(!$this->filled('slug')){
            $this->merge(['slug' => Str::slug($this->name)]);
        }
        if($this->filled('status')){
            $this->merge(['status' => true]);
        }
        if($this->filled('show_on_menu')){
            $this->merge(['show_on_menu' => true]);
        }
        if($this->filled('show_at_parent')){
            $this->merge(['show_at_parent' => true]);
        }

        $this->merge([
                'author_id' => $this->user()->id,
                'type' => $content,
            ]);

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
                'name' => 'required|unique:contents,id,'.$this->id,
                'slug' => 'nullable|unique:contents,id,'.$this->id,
                'title' => 'nullable|max:255',
                'subtitle' => 'nullable|max:255',
                'image_path' => 'nullable|max:255',
                'content' => 'nullable',
                'feature_content' => 'nullable',
                'banner' => 'nullable',
                'seo_title' => 'nullable',
                'seo_description' => 'nullable',
                'seo_keywords' => 'nullable',
                'layout' => 'nullable',
                'show_on_menu' => 'nullable',
                'show_at_parent' => 'nullable',
                'status' => 'nullable',
                'parent_id' => 'nullable',
                'language_id' => 'required',
                'author_id' => 'required',
                'extra_fields' => 'nullable',
                'type' => 'required',

            ];
        }else{
            //get rules to create a new role
            return [
                'name' => 'required|unique:contents',
                'slug' => 'nullable|unique:contents',
                'language_id' => 'required',
                'type' => 'required',
                'author_id' => 'required',
                'title' => 'nullable|max:255',
                'subtitle' => 'nullable|max:255',
                'image_path' => 'nullable|max:255',
                'content' => 'nullable',
                'feature_content' => 'nullable',
                'banner' => 'nullable',
                'seo_title' => 'nullable',
                'seo_description' => 'nullable',
                'seo_keywords' => 'nullable',
                'layout' => 'nullable',
                'show_on_menu' => 'nullable',
                'show_at_parent' => 'nullable',
                'status' => 'nullable',
                'parent_id' => 'nullable',
                'extra_fields' => 'nullable',

            ];
        }
    }

    /**
     * set the validation rules error messages
     * @return array
     */
    public function messages(){
        return [
            'name.unique' => 'Girilen isim kullanımda.',
            'slug.unique' => 'Girilen adres kullanımda.',
            'name.required' => 'İsim mecburidir.',
            'slug.required' => 'Adres mecburidir.',
            'language_id.required' => 'Dil Mecburidir.',

        ];
    }

}
