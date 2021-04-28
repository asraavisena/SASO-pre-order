<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('menus')->insert([
            'category_id' => 1,
            'event_id' => 2,
            'name' => 'Sate Padang',
            'desc'=> 'Sate padang dari lidah sapi',
            'quantity' => 25,
            'price' => 8.50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('menus')->insert([
            'category_id' => 1,
            'event_id' => 2,
            'name' => 'Pempek',
            'desc'=> 'Pempek khas palembang',
            'quantity' => 20,
            'price' => 10.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('menus')->insert([
            'category_id' => 2,
            'event_id' => 2,
            'name' => 'Tiramisu',
            'desc'=> 'Tiramisu manis',
            'quantity' => 50,
            'price' => 2.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('menus')->insert([
            'category_id' => 3,
            'event_id' => 2,
            'name' => 'Teh Boba',
            'desc'=> 'Teh masa kini',
            'quantity' => 20,
            'price' => 3.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('menus')->insert([
            'category_id' => 1,
            'event_id' => 1,
            'name' => 'Mie Ayam',
            'desc'=> 'Mie Ayam / Bakso',
            'quantity' => 25,
            'price' => 7.0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('menus')->insert([
            'category_id' => 3,
            'event_id' => 1,
            'name' => 'Bajigur',
            'desc'=> 'Bajigur',
            'quantity' => 20,
            'price' => 2.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
