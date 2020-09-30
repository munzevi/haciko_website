<?php

namespace App\Http\Controllers\CMS;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use DataTables;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show(Request $request){
        if ($request->ajax()) {
            $data = Setting::with('lang:id,name')->get();
            return Datatables::of($data)
                ->addColumn('lang', function (Setting $setting) {
                    return $setting->lang->name;
                })
                ->addColumn('action', function($row){
                    return '<a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Düzenle" class="btn btn-primary btn-sm editSetting" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.edit") .'</a><a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil" class="btn btn-danger btn-sm deleteSetting" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.delete") .'</a>';
                })
                ->rawColumns(['action'])->toJson();
        }

        return view('backend.pages.settings');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Setting::with('lang:id,name')->get();
            return Datatables::of($data)
                    ->addColumn('lang', function (Setting $setting) {
                        return $setting->lang->name;
                    })
                    ->addColumn('action', function($row){
                           return '<a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Düzenle" class="btn btn-primary btn-sm editSetting" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.edit") .'</a><a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil" class="btn btn-danger btn-sm deleteSetting" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.delete") .'</a>';
                    })
                    ->rawColumns(['action'])->toJson();
        }

        return view('backend.pages.settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request){
        $lang = Language::whereName($request->language_id)->first();
        $request->merge(['language_id' => $lang->id]);
        //dd($request->all());
        if($request->filled('id')){
            Setting::find($request->id)->update($request->except('id'));
        }else{
            Setting::create($request->all());
        }
        //Setting::updateOrCreate(['id',$request->id],$request->all());
        return response()->json(['success','Ayar başarıyla kayıt edildi.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Setting::with('lang')->find($id));
    }
    /**
     * using for edit
     * serving relationship data
     */
    public function create(Request $request){
        $list = Language::pluck('name','id');
         foreach ($list as $key => $value) {
            $arr[] = ['id'=>$key,'value'=>$value];
        }

        return response()->json($arr);
    }

    public function destroy($id){
        Setting::find($id)->delete();
        return redirect()->back()->with('success','başarılı');
    }
}
