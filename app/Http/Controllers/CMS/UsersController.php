<?php

namespace App\Http\Controllers\CMS;

use App\Services\CMS\UserFormServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Hash;

class UsersController extends Controller
{
    /**
     * The user form depedencies.
     *
     * @var UserFormservices
     */
    protected $form;

    /**
     * Create a new ocntroller instance.
     *
     * @param  UserFormservices  $users
     * @return void
     */
    public function __construct(UserFormServices $form)
    {
        $this->form = $form;
    }

    /**
     * Display a listing of the resource.  
     * @return \Illuminate\Http\Response
     */	
    public function index(UsersDataTable $dataTable)
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return $dataTable->render('backend.pages.users',['permissions'=>$permissions,'roles' => $roles]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if($request->filled('id') && !$request->filled('password')){
            $user = User::updateOrCreate(
                ['id'=>$request->id],
                $request->except(['password','roles','permissions','password_confirmation'])
            );
        }else{
            $user = User::updateOrCreate(
                ['id'=>$request->id],
                $request->except(['roles','permissions','password_confirmation'])
            );            
        }
        if($request->filled('permissions')){
            $user->syncPermissions($request->permissions);
        }
        if($request->filled('roles')){
            $user->syncRoles($request->roles);
        }
        return response()->json(['success','Kullanıcı başarıyla kayıt edildi.']);

    }    
    public function show(){
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(User::with(['roles','permissions'])->find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
     
        return response()->json(['success'=>'User deleted successfully.']);
    }
}
