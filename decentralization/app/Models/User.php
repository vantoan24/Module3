<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function UserGroup(){
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

    function hasPermission($name){
        return false;

        // $roles = $this->UserGroup->roles->contains('name', $name);
        $roles = $this->UserGroup->roles;
        foreach ($roles as $role){
            if($role->name == $name){
                return true;
            }
        }
        return false;
        // dd($roles);
    }
}
