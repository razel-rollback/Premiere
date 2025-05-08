<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuardianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardians = [
            [
                'guardianFirstName'   => 'Maria',
                'guardianMiddleName'  => 'Joe',
                'guardianLastName'    => 'Garcia',
                'guardianSuffixName'  => null,
                'email'               => 'mariagarcia@gmail.com',
                'guardianBirthDate'   => '1975-04-12',
                'guardianRelation'    => 'Mother',
                'guardianPhone'       => '09171234567',
                'guardianAddress'     => '123 Banana St, Davao City',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ],
            [
                'guardianFirstName'   => 'Jose',
                'guardianMiddleName'  => 'Reyes',
                'guardianLastName'    => 'Cruz',
                'guardianSuffixName'  => 'Sr',
                'email'               => 'josecruz@gmail.com',
                'guardianBirthDate'   => '1970-06-25',
                'guardianRelation'    => 'Father',
                'guardianPhone'       => '09182223333',
                'guardianAddress'     => '456 Mango St, Cotabato City',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ],
            [
                'guardianFirstName'   => 'Ana',
                'guardianMiddleName'  => 'Dela Cruz',
                'guardianLastName'    => 'Santos',
                'guardianSuffixName'  => null,
                'email'               => 'anasantos@gmail.com',
                'guardianBirthDate'   => '1980-03-10',
                'guardianRelation'    => 'Aunt',
                'guardianPhone'       => '09234567890',
                'guardianAddress'     => '789 Pineapple St, General Santos City',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ],
            [
                'guardianFirstName'   => 'Pedro',
                'guardianMiddleName'  => 'Mendoza',
                'guardianLastName'    => 'Torres',
                'guardianSuffixName'  => null,
                'email'               => 'pedrotorres@gmail.com',
                'guardianBirthDate'   => '1965-01-05',
                'guardianRelation'    => 'Uncle',
                'guardianPhone'       => '09193456789',
                'guardianAddress'     => '321 Papaya St, Koronadal City',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ],
            [
                'guardianFirstName'   => 'Luisa',
                'guardianMiddleName'  => 'Navarro',
                'guardianLastName'    => 'Fernandez',
                'guardianSuffixName'  => null,
                'email'               => 'luisafernandez@gmail.com',
                'guardianBirthDate'   => '1978-08-20',
                'guardianRelation'    => 'Sister',
                'guardianPhone'       => '09175556666',
                'guardianAddress'     => '654 Guava St, Kidapawan City',
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ],
        ];

        DB::table('guardians')->insert($guardians);
    }
}
