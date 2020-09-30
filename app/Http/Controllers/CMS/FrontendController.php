<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Setting;


class FrontendController extends Controller
{
    public function design()
    {
        return view('design');
    }

    public function index(){
        $contents = Content::where('status',1);

        // return view('frontend.layouts.app',$contents);
        return view('frontend.layouts.app')->with('contents',$contents);
    }

    public function indexData(){
        $data['settings'] = Setting::select('segment','key','value')
        	->where('segment','Genel Ayarlar')->orWhere('segment','Meta Tagler')
        	->orWhere('segment','Sosyal Medya Hesapları')->get();
        $data['content'] = Content::with(['slider','child'])->where('slug','anasayfa')->first();
        $child = $data['content']->child()->first();
        $data['grand-childs'] = collect($child->child()->get());
        $data['blog-latest'] = Content::with('tags','parent')->where('type','posts')->take(3)->get();
        return $data;
    }
    public function settings(){
        $settings = Setting::select('segment','key','value')
            ->where('segment','Genel Ayarlar')->orWhere('segment','Meta Tagler')
            ->orWhere('segment','Sosyal Medya Hesapları')->get();
        return $settings;
    }
    public function about_us(){
        $data['settings'] = $this->settings();
        $data['page'] = Content::where('slug','hakkimizda')->first();

        return view('frontend.pages.single')->with(['data'=>$data]);
    }
    public function social_media(){
        $data['settings'] = $this->settings();
        $data['page'] = Content::where('slug','sosyal-medya-yonetimi')->first();

        return view('frontend.pages.service')->with(['data'=>$data]);
    }

    public function test(){
        $data['page'] = Content::where('slug','hakkimizda')->first();
        $data['settings'] = $this->settings();
        return view('frontend.pages.single-test',compact('data'));
    }
}
