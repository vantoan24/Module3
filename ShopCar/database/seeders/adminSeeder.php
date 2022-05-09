<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'Văn Toàn';
        $admin->username = 'admin@gmail.com';
        $admin->password = 'admin123';
        $admin->save();
    }
}
