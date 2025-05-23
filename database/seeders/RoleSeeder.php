<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'username' => 'student_user1',
                'password' => Hash::make('studentpassword1'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'student_user2',
                'password' => Hash::make('studentpassword2'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'student_user3',
                'password' => Hash::make('studentpassword3'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'student_user4',
                'password' => Hash::make('studentpassword4'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'student_user5',
                'password' => Hash::make('studentpassword5'), // Hash the password
                'userType' => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
