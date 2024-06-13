<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_users')->updateOrInsert(
            [
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'no_hp' => '08123456789',
                'tgL_lahir' => '2003-08-11',
                'address' => 'Irian jaya barat',
                'foto' => 'avatars/admin.jpg',
                'role' => 'admin',
                'gender' => 'laki-laki',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
            ],
            [
                'email' => 'user@gmail.com',
                'name' => 'user',
                'no_hp' => '08123456789',
                'tgL_lahir' => '2003-08-11',
                'address' => 'Irian jaya barat',
                'foto' => 'avatars/admin.jpg',
                'role' => 'user',
                'gender' => 'laki-laki',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
            ]
        );
    }
}
