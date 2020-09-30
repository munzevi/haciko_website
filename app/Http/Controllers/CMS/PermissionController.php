<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use App\DataTables\PermissionsDataTable;

use DataTables;


class PermissionController extends Controller
{

   /**
     * Display a listing of the resource.  
     * @return \Illuminate\Http\Response
     */		
    public function index(PermissionsDataTable $dataTable){
        $roles = Role::get();
        return $dataTable->render('backend.pages.permissions',['roles'=>$roles]);            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request){

    	if(empty($request->id)){
            $roles = $request->roles;
    		$perm = Permission::create($request->except('roles'));
            $perm->assignRole($roles);
    	}else{
    		$perm = Permission::find($request->id);
            $roles = $request->roles;
            $perm->update($request->except(['id','roles']));
            $perm->syncRoles($roles);
    	}
    	return response()->json(['success','Yetki başarıyla kayıt edildi.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Permission::with('roles')->find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
     
        return response()->json(['success'=>'Permission deleted successfully.']);
    } 
    /**
     * using for edit 
     * serving relationship data
     */
    public function create(Request $request){
        $list = Role::pluck('title','id');
         foreach ($list as $key => $value) {
            $arr[] = ['text'=>$value,'value'=>$key];
        }
       
        return response()->json($arr);
    }
}
