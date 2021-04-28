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

        /* USERS AND ROLES SEEDER */
        $user1 = DB::table('users')->insert([
            'name' => 'Super Admin Saso',
            'username' => 'super_admin_saso',
            'email' => 'superadmin@iwkz-saso.com',
            'password' => bcrypt('saso1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2 = DB::table('users')->insert([
            'name' => 'Admin Saso',
            'username' => 'admin_saso',
            'email' => 'admin@iwkz-saso.com',
            'password' => bcrypt('saso1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $name1 = 'Super Admin';
        $slug1 = Str::of(Str::lower($name1))->slug('_');

        $role1 = DB::table('roles')->insert([
            'name' => $name1,
            'slug' => $slug1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $name2 = 'Admin';
        $slug2 = Str::of(Str::lower($name2))->slug('_');

        $role2 = DB::table('roles')->insert([
            'name' => $name2,
            'slug' => $slug2, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user1 = \App\Models\User::find(1);
        $role1 = \App\Models\Role::find(1);
        $user1->roles()->attach($role1);

        $user2 = \App\Models\User::find(2);
        $role2 = \App\Models\Role::find(2);
        $user2->roles()->attach($role2);
        /* USERS AND ROLES SEEDER END */

        $this->call(EventSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MenuSeeder::class);
        
    }
}
