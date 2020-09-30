<?php 	

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

return [
	'pages' => [
		'roles' => [
			'title' => 'User Roles',
			'header' => 'Role Management ',
			'names' => 'Name',
			'description' => 'Description',
			'permissions' => 'Permissions',
			'code' => 'Code',
			'create' => 'Create New Role',
		],
		'permissions' => [
			'title' => 'User Permissions',
			'header' => 'Permission Management',
			'names' => 'Name',
			'description' => 'Description',
			'roles' => 'Roles',
			'code' => 'Code',		
			'create' => 'Create New Permission',
		],
		'users' => [
			'title' => 'Users',
			'header' => 'User Management',
			'names' => 'Name',
			'description' => 'Description',
			'roles' => 'Roles',
			'permissions' => 'Permissions',
			'email' => 'Email',	
			'create' => 'Create New User',					
		],
		'languages' => [
			'header' => 'Languages',
			'title' => 'Language Settings',
			'name' => 'Name',
			'code' => 'Code',
			'slug' => 'Slug',
			'owner' => 'Created by',
			'created_at' => 'Created at',
			'create' => 'Add a new Language',
		],
		'settings' => [
			'header' => 'Settings',
			'title' => 'Site Settings',
			'segment' => 'Segment',
			'key' => 'Key',
			'value' => 'Value',
			'lang' => 'Language',
			'created_at' => 'Created at',
			'create' => 'Create a new Setting',
			'edit' => 'Edit Setting',
		],
	],
	'modals' => [
		'roles'=>[
			'title'	=> 'Permission Name',
			'name'	=> 'Permission Code',
			'description' => 'Permission Description',
			'roles' => 'Roles',
			'edit' => 'Edit Role',
			'create' => 'Create a New Role',					
		],
		'permissions'=>[
			'title'	=> 'Permission Name',
			'code'	=> 'Permission Code',
			'description' => 'Permission Description',
			'roles' => 'Roles',			
			'edit' => 'Edit Permission',
			'create' => 'Create a New Permission ',					
		],
		'users'=>[
			'title' => 'User Name',
			'password' => 'Password',
			'password-confirm' => 'Password Confirm',
			'roles' => 'User Roles',
			'permissions' => 'User Permissions',
			'email' => 'Email',	
			'create' => 'Create a New User ',					
			'edit' => 'Edit User',		
		],
	],
	'actions' => [
		'actions' => 'Actions',
		'delete' => 'Delete',
		'edit' => 'Edit',
		'add' => 'Add',
	],
	'alerts' => [
		'success'=>'Success!',
		'completed'=>'Has been successfully completed.',
		'error' => 'Something went wrong!',
		'warning-title'=>'Can not be undone!',
		'warning-text'=>'Are you sure?',
		'confirm-yes'=>'Sure!',
		'confirm-no'=>'Nope!',
		'fail-title' => 'Error!',
		'fail-text' => 'Something Wrong!',
		'Create' => 'Create',
	],
];