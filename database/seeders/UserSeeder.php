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
                'email' => 'superadmin@gmail.com',
                'name' => 'owner',
                'no_hp' => '08123456789',
                'tgL_lahir' => '1997-03-11',
                'address' => 'Irian jaya barat',
                'role' => 'superadmin',
                'gender' => 'laki-laki',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
            ]
        );

    }
}
