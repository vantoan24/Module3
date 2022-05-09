<?php

use App\Models\User;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Role_User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $user = User::find(1)->getPhone;
    // dd($user);
    // $phone = Phone::find(1)->getUser->email;
      //user_id = 1
    // dd($phone);
    // $post = Post::find(1)->getComment;
    // dd($post);
    $role = Role::find(2)->users->toArray();
    $user = User::find(1)->roles->toArray();
    dd($role);
  //   $params = [
  //   'role' => $role,
  //   'user' => $user
  // ];
  //   dd($params);
});
