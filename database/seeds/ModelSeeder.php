<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModelSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('owners')->insert([
            'name' => Str::random(10),
            'contact_email' => Str::random(10).'@gmail.com',
        ]);

        DB::table('buildings')->insert([
            'building_name' => Str::random(30),
            'building_address' => Str::random(20),
        ]);
    }
}
