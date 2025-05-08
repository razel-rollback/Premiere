<?php

namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            /*
                    'firstName',
        'middleName',
        'lastName',
        'suffixName',
        'birthDate',
        'gender',
        'address',
        'contactNumber',
        'email',
        'status',
        'gradeLevelID',
        'roleID',
        'strandID',
        'guardianID',
            */
            [
                'firstName' => 'John',
                'middleName' => 'Doe',
                'lastName' => 'Smith',
                'suffixName' => 'Jr.',
                'birthDate' => '2005-01-01',
                'gender' => 'Male',
                'address' => '123 Main St, Some City, Some Country',
                'contactNumber' => '09123456789',
                'email' => 'johndoe@gmail.com',
                'status' => 'Pending',
                'gradeLevelID' => 1,  // Example Grade Level ID
                'roleID' => 2,        // Example Role ID
                'strandID' => 1,      // Example Strand ID
                'guardianID' => 1, // Example Guardian ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'firstName' => 'Jane',
                'middleName' => 'Alice',
                'lastName' => 'Johnson',
                'suffixName' => null,
                'birthDate' => '2004-02-14',
                'gender' => 'Female',
                'address' => '456 Another St, Other City, Other Country',
                'contactNumber' => '09876543210',
                'email' => 'janejohnson@gmail.com',
                'status' => 'Pending',
                'gradeLevelID' => 1,  // Example Grade Level ID
                'roleID' => 3,        // Example Role ID
                'strandID' => 2,      // Example Strand ID
                'guardianID' => 2, // Example Guardian ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'firstName' => 'Mike',
                'middleName' => 'James',
                'lastName' => 'Williams',
                'suffixName' => null,
                'birthDate' => '2003-05-23',
                'gender' => 'Male',
                'address' => '789 Oak St, Another City, Some Country',
                'contactNumber' => '09182345678',
                'email' => 'mikewilliams@gmail.com',
                'status' => 'Pending',
                'gradeLevelID' => 1,
                'roleID' => 4,
                'strandID' => 3,
                'guardianID' => 3, // Example Guardian ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'firstName' => 'Emily',
                'middleName' => 'Rose',
                'lastName' => 'Brown',
                'suffixName' => null,
                'birthDate' => '2006-09-12',
                'gender' => 'Female',
                'address' => '321 Pine St, Yet Another City, Country',
                'contactNumber' => '09231234567',
                'email' => 'emilybrown@gmail.com',
                'status' => 'Pending',
                'gradeLevelID' => 1,
                'roleID' => 5,
                'strandID' => 1,
                'guardianID' => 4, // Example Guardian ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'firstName' => 'Chris',
                'middleName' => 'Daniel',
                'lastName' => 'Davis',
                'suffixName' => 'Sr.',
                'birthDate' => '2002-11-30',
                'gender' => 'Male',
                'address' => '654 Birch St, Some Town, Country',
                'contactNumber' => '09341234567',
                'email' => 'chrisdavis@gmail.com',
                'status' => 'Pending',
                'gradeLevelID' => 1,
                'roleID' => 6,
                'strandID' => 2,
                'guardianID' => 5, // Example Guardian ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert the students into the 'students' table
        DB::table('students')->insert($students);
    }
}
