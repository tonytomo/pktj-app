<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'AdminRex',
            'email' => 'rexadminrex@go.com',
            'role' => 'admin',
            'password' => bcrypt('4dm1nr3x'),
        ]);

        DB::table('users')->insert([
            'name' => 'UserRex',
            'email' => 'rexuserrex@go.com',
            'role' => 'user',
            'password' => bcrypt('us3rr3x'),
        ]);
    }
}
