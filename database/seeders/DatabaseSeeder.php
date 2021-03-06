<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        // \App\Models\Role::factory(1)->create();

        // $this->call(UserSeeder::class);
        // $this->call(RoleSeeder::class);

        DB::table('users')->insert([
            'name' => 'Admin Saso',
            'username' => 'admin_saso',
            'email' => 'admin@iwkz-saso.com',
            'password' => bcrypt('test1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $name = 'Super Admin';
        $slug = Str::of(Str::lower($name))->slug('_');

        DB::table('roles')->insert([
            'name' => $name,
            'slug' => $slug, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = \App\Models\User::find(1);
        $role = \App\Models\Role::find(1);
        $user->roles()->attach($role);
    }
}
