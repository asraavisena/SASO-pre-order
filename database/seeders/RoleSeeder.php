<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $title = 'test title';
        $slug = Str::of(Str::lower($title))->slug('_');
        
        DB::table('roles')->insert([
            'name' => $title,
            'slug'=> $slug,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
