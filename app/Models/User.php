<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasPermissions;
//
//    protected static function boot()
//    {
//        parent::boot();
//        static::saving(function ($model) {
//            $model->password = \Hash::make($model->password);
//        });
//    }

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    //guarded  ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime:d-m-Y',
        'created_at' => 'datetime:d/m/Y h:m:i',
        'updated_at' => 'datetime:d-m-Y',
    ];

    /**
     * date attributes
     * @var [type]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
