<?php


namespace App\Helpers;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


/**
 * Cms Helper functions
 * @package App\Helpers
 */
class Helpers{
    /**
     * get content type from current route
     * @return mixed|string
     */
    public static function getContentType(){
        return explode('.',Route::currentRouteName())[1];
    }


    /**
     * get language id
     * @return mixed
     */
    public static function getLocaleId()
    {
        return Language::where('code', App::getLocale())->first()->id;
    }


    /**
     * check if has content
     * @param $content
     * @return bool|void
     */
    public static function findContentOrFail(){
        $content = Helpers::getContentType();
        if(Arr::has(config('cms.contents'),$content)){
            return $content;
        } else {
            return abort(404);
        }
    }

    public static function feature_title($collection){
        if(isset($collection->extra_fields)){
            $fields = collect($collection->extra_fields);
            if($fields->where('key','feature_title')){
                return $fields->where('key','feature_title');
            }
        }
    }

    public static function title($collection){
        if(isset($collection->extra_fields)){
            $fields = collect($collection->extra_fields);
            if($fields->where('key','title')){
                return $fields->where('key','title');
            }
        }
    }
    public static function top($collection){
        if(isset($collection->extra_fields)){
            $fields = collect($collection->extra_fields);
            if($fields->where('key','top')){
                return $fields->where('key','top');
            }
        }
    }

    public static function subtitle($collection){
        if(isset($collection->extra_fields)){
            $fields = collect($collection->extra_fields);
            if($fields->where('key','subtitle')){
                return $fields->where('key','subtitle');
            }
        }else{
            return [];
        }
    }  
    public static function feature_subtitle($collection){
        if(isset($collection->extra_fields)){
            $fields = collect($collection->extra_fields);
            if($fields->where('key','feature_subtitle')){
                return $fields->where('key','feature_subtitle');
            }
        }else{
            return [];
        }
    }    
    public static function breadcrumbs($content){
        return $content->parent->parent->slug.'/'.$content->parent->slug.'/'.$content->slug;
    }
}
