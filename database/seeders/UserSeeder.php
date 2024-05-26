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
            'name' => 'Admin Rex',
            'email' => 'admin@pktj.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'name' => 'User John',
            'email' => 'user@pktj.com',
            'role' => 'user',
            'password' => bcrypt('john123'),
        ]);
    }
}
