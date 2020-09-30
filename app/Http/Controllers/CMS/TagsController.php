<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use DataTables;

class TagsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tag::latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    return '<a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Düzenle" class="btn btn-primary btn-sm editTag" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.edit") .'</a><a href="javascript:void(0)" data-id="'.$row->id.'" data-original-title="Sil" class="btn btn-danger btn-sm deleteTag" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>'.trans("datatables.actions.delete") .'</a>';
                })
                ->rawColumns(['action'])->toJson();
        }

        return view('backend.pages.tags');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request){
        Tag::updateOrCreate(['id'=>$request->id],$request->all());

        return response()->json(['success','Dil başarıyla kayıt edildi.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Tag::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return response()->json(['success'=>'Tag deleted successfully.']);
    }




}
