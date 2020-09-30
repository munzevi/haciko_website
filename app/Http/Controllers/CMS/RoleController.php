<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\DataTables\RolesDataTable;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.  
     * @return \Illuminate\Http\Response
     */		
    
    public function index(RolesDataTable $dataTable){
        $permissions = Permission::get();
        return $dataTable->render('backend.pages.roles',['permissions'=>$permissions]);            
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request){
        if(empty($request->id)){
            $permissions = $request->permissions;
            $role = Role::create($request->except('permissions'));
            $role->syncPermissions($permissions);
        }else{
            $permissions = $request->permissions;
            $role = Role::find($request->id);
            $role->update($request->except(['id','permissions']));
            $role->syncPermissions($permissions);
        }
        return response()->json(['success','Rol başarıyla kayıt edildi.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Role::with('permissions')->find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
     
        return response()->json(['success'=>'Role deleted successfully.']);
    } 
    /**
     * using for edit 
     * serving relationship data
     */
    public function create(Request $request){
        $list = Permission::pluck('title','id');
         foreach ($list as $key => $value) {
            $arr[] = ['text'=>$value,'value'=>$key];
        }
       
        return response()->json($arr);
    }


}
