<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbl_admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_name',
        'admin_email',
        'password',
        'admin_phone',
        'admin_birthday',
        'admin_address',
        'admin_avatar',
        'admin_active',
        'job_id',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs(){
        return $this->belongsTo('App\Models\Job', 'job_id');   
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
    }

    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRole($role){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }



    public function getAuthPassword()
    {
        return $password = $this->password;
    }
}
