<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'username' => 'admin',
            'role' => 'A',
            'email' => 'admin' . '@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'first_name' => 'guest',
            'last_name' => 'guest',
            'username' => 'guest',
            'email' => 'guest' . '@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
