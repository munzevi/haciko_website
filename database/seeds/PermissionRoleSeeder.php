<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
        $userRole = Role::create(['title'=>'User','description'=>'Basic Site User','name'=>'user','guard_name'=>'web']);
        $dashboard = Permission::create(['title'=>'See Dashboard','description'=>'can see dashboard area','name' => 'dashboard','guard_name'=>'web']);
        $userRole->givePermissionTo($dashboard);
        echo 'created: User Role and permissions.'."\n";
        $adminRole = Role::create(['title'=>'Admin','description'=>'Managers of the all users and the contents','name'=>'admin','guard_name'=>'web']);
        $createContent = Permission::create(['title'=>'Create Content','description'=>'Can create contents on the site','name' => 'create_content','guard_name'=>'web']);
        $editContent = Permission::create(['title'=>'Edit Content','description'=>'Can edit all the contents of the site','name' => 'edit_content','guard_name'=>'web']);
        $deleteContent = Permission::create(['title'=>'Delete Content','description'=>'Can delete all the contents of the site','name' => 'delete_content','guard_name'=>'web']);
        $createUser = Permission::create(['title'=>'Create User','description'=>'Can create users on the site','name' => 'create_user','guard_name'=>'web']);
        $editUser = Permission::create(['title'=>'Edit User','description'=>'Can edit all the users of the site','name' => 'edit_user','guard_name'=>'web']);
        $deleteUser = Permission::create(['title'=>'Delete User','description'=>'Can delete all the users of the site','name' => 'delete_user','guard_name'=>'web']);
        $createSetting = Permission::create(['title'=>'Create Setting','description'=>'Can create settings on the site','name' => 'create_setting','guard_name'=>'web']);
        $editSetting = Permission::create(['title'=>'Edit Setting','description'=>'Can edit all the settings of the site','name' => 'edit_setting','guard_name'=>'web']);
        $deleteSetting = Permission::create(['title'=>'Delete Setting','description'=>'Can delete all the settings of the site','name' => 'delete_setting','guard_name'=>'web']);
        $adminRole->givePermissionTo($createContent,$editContent,$deleteContent,$createUser,$editUser,$deleteUser,$createSetting,$editSetting,$deleteSetting);
        $superAdmin = Role::create(['title'=>'Super Admin','description'=>'Managers of all admins, run the site','name'=>'super-admin','guard_name'=>'web']);
        echo 'created: Admin Role and Permissions.'."\n";
        Permission::create(['title'=>'Create Admin','description'=>'Can create admin on the site','name' => 'create_admin','guard_name'=>'web']);
        Permission::create(['title'=>'Edit Admin','description'=>'Can edit all the admins of the site','name' => 'edit_admin','guard_name'=>'web']);
        Permission::create(['title'=>'Delete Admin','description'=>'Can delete all the admins of the site','name' => 'delete_admin','guard_name'=>'web']);
        $permissions = Permission::get();
        $superAdmin->givePermissionTo($permissions);
        echo 'created: Super Admin Role and Permissions.'."\n";

    }
}
