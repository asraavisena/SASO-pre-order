<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name1 = 'Makanan Besar';
        $slug1 = Str::of(Str::lower($name1))->slug('_');

        $category = DB::table('categories')->insert([
            'name' => $name1,
            'slug' => $slug1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $name2 = 'Makanan Kecil';
        $slug2 = Str::of(Str::lower($name2))->slug('_');

        $category = DB::table('categories')->insert([
            'name' => $name2,
            'slug' => $slug2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $name3 = 'Minuman Kecil';
        $slug3 = Str::of(Str::lower($name3))->slug('_');

        $category = DB::table('categories')->insert([
            'name' => $name3,
            'slug' => $slug3, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
