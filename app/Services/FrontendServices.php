<?php
namespace App\Services;

use App\Models\Content;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendServices {

    public $breadcrumbs = [];
    public $segments     = [];

    public function __construct()
    {
        $this->segments = request()->segments();
    }

   /**
    *  get requested page url from
    *  segments by index and format it
    * @param integer $index
    * @return string
    */
    public function getPageUrl($index){
        return "/".implode('/',array_slice($this->segments,0,$index+1));
    }

    // get requested page name from
    // segments by index  and format it
    public function getPageName($index){
        return Str::title(str_replace("-"," ",$this->segments[$index]));
    }

    // start the breadcrumbs function first, then return
    // user's requested url from request's segments
    public function getIntendedPage()
    {
        $this->getBreadcrumbs();
        return Arr::last($this->segments);
    }

    /**
     * get requested page name with
     * its parents names and their url
     * @return array
     */
    public function getBreadcrumbs(){
        $this->breadcrumbs['Anasayfa'] = '/';

        for($i=0; $i < count($this->segments); $i++){
            if($i === count($this->segments)-1){
                $this->breadcrumbs[$this->getPageName($i)] = '';
            }else{
                $this->breadcrumbs[$this->getPageName($i)] = $this->getPageUrl($i);
            }

        }

        return $this->breadcrumbs;
    }

    // return page's content or give http 404 code
    public function getPageContent(){
        $page = $this->getIntendedPage($this->segments);

        if(is_null($page) || $page === 'anasayfa')
            $contents = Content::where('slug','anasayfa')->first();
        elseif(Content::where('slug',$page)->exists())
            $contents = Content::where('slug',$page)->first();
        else
            abort(404);

        return $contents;
    }

    // format breadcrumb for the print
    // on html with classic ul > li tags
    public function breadcrumb()
    {
        $this->getBreadcrumbs();

        $list = "<ul>";
        foreach($this->breadcrumbs as $text => $link){
            if(empty($link)){
                $list .= "<li>".$text."</li>";
            } else {
                $list .= "<li><a href=".url($link).">".$text."</a></li>";
            }
        }
        $list .= "</ul>";
        return $list;
    }

    // get meta tags from settings
    public function setting($type)
    {
        return Setting::select('segment','key','value')
                ->where('segment',$type)
                ->orderBy('key')
                ->get();
    }

    public function settings()
    {
        return Setting::where('segment','genel')
                ->orWhere('segment','meta')
                ->orWhere('segment','seo');

    }

    public function pageLinks()
    {
        foreach(Content::where('type','pages')->where('status',true)->whereNotNull('parent_id')->get() as $key => $page){
            if(count($page->child) < 1){
                $pageLinks[] = [$page->name => $page->url];
            }
        }
        return $pageLinks;
    }
}
