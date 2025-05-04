<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert roles into the roles table
        DB::table('roles')->insert([
            [
                'username' => 'admin_user',
                'password' => Hash::make('adminpassword'), // Hash the password
                'userType' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'student_user',
                'password' => Hash::make('studentpassword'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
