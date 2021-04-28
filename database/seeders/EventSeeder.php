<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'Saso 2020',
            'desc'=> 'Saso 2020 is the past',
            'started_at' => Carbon::create('2020', '05', '10'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // It should be changed
        DB::table('events')->insert([
            'name' => 'Saso 2021',
            'desc'=> 'Saso 2021 is the best',
            'started_at' => Carbon::create('2021', '10', '20'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('events')->insert([
            'name' => 'Saso 2022',
            'desc'=> 'Saso 2022 is the future',
            'started_at' => Carbon::create('2022', '12', '12'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
