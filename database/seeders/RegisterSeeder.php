<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $registers = [];

        for ($i = 1; $i <= 5; $i++) {
            $registers[] = [
                'studentID' => $i,
                'registerStatus' => 'Pending',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('registers')->insert($registers);
    }
}
