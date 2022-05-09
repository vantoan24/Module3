<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function Role_Users(){
        return $this->hasMany(RoleUser::class,'role_id','id');
    }

    public function users(){
        return $this->belongsToMany(Role::class,'role_users','role_id','user_id');
    }
}
