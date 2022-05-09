<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Hồ Lữ';
        $product->price = '12345';
        $product->image = '';
        $product->save();
    }
}
