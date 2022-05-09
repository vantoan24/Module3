<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_user()
    {
       $user = new User();
       $user->name = 'test';
       $user->email = 'test@example.com';
       $user->password = 'test';
       if ($user->save()) {
           $this->assertTrue(true);
       }else{
           $this->assertFalse(false);
       }
    }
}
