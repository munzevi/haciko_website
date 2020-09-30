<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Language;
use App\Http\Requests\LanguageRequest;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Language::with('owner')->latest()->get();
            return Datatables::of($data)
                    ->addColumn('owner', function (Language $language) {
                        return $language->owner()->get()->map(function($owner){
                            return $owner->name;
                        })->implode(', ');
                    })
                    ->addColumn('action', function($row){
                           return '<a href="javascript:void(0)"
                           data-id="'.$row->id.'" data-original-title="Düzenle"
                           class="btn btn-primary btn-sm editLanguage" style="min-width:110px">
                           <i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'
                               .trans("datatables.actions.edit") .'</a>
                           <a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil"
                           class="btn btn-danger btn-sm deleteLanguage" style="min-width:110px">
                           <i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'
                               .trans("datatables.actions.delete") .'</a>';
                    })
                    ->rawColumns(['action'])->toJson();
        }

        return view('backend.pages.languages');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(LanguageRequest $request){
        Language::updateOrCreate(['id'=>$request->id],$request->all());

        return response()->json(['success','Dil başarıyla kayıt edildi.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return response()->json(Language::with('owner')->find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Language::find($id)->delete();

        return response()->json(['success'=>'Language deleted successfully.']);
    }


}
