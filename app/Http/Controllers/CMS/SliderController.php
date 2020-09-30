<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Content;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Arr;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Slider::with(['content'])->get();
            return Datatables::of($data)
                ->addColumn('picture', function (Slider $slider) {
                    $image = Arr::first($slider->path);
                    return "<a href='$image' target='_blank' ><img src=\"$image\" style='max-height:100px;'></a>";
                })
                ->addColumn('content', function (Slider $slider) {
                    if (isset($slider->content->name)) {
                        return '<button class="btn secondary btn-sm">' . $slider->content->name . '</button>';
                    } else {
                        return null;
                    }
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route("admin.sliders.edit",$row->id).'"
                    data-id="' . $row->id . '" data-original-title="Düzenle"
                    class="btn btn-primary btn-sm editSlider" style="min-width:110px">
                    <i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>' .
                        trans("datatables.actions.edit") . '</a><a href="javascript:void(0)" data-id="' .
                        $row->id . '" data-original-title="Sil" class="btn btn-danger btn-sm deleteSlider" style="min-width:110px">
                    <i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>' .
                        trans("datatables.actions.delete") . '</a>';
                })
                ->rawColumns(['action','content','picture'])->toJson();
        }
        $pages = Content::where('type','pages')->get();

        return view('backend.pages.sliders',compact('pages'));
    }


    public function create(){
        $pages = Content::where('type','pages')->get();
        return view('backend.pages.sliderEdit',compact('pages'));
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $s = Slider::create($request->all());
        $s->contents()->attach($request->name);
        return redirect()->route('admin.sliders.index')->with('success','slider oluşturuldu');
    }
    public function show($id,SliderRequest $request)
    { 
        Slider::find($id)->update($request->validated());

        return redirect()->route('admin.sliders.index')->with('success','slider oluşturuldu');
    }
    public function edit($id){
        $slider = Slider::with('content')->find($id);
        $pages = Content::where('type','pages')->get();
//        return response()->json($slider);
//
        return view("backend.pages.sliderEdit")->with(['slider'=>$slider,'pages'=>$pages]);
    }

    public function destroy($id){
        Slider::find($id)->delete();
        return redirect()->back()->with('success','kayıt silindi, işlem başarılı');
    }
    public function upload($id){
        dd('upload');
    }
}
//'.route("admin.sliders.edit",$row->id).'
