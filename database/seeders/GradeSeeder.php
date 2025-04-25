<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grade = [
            ['gradeLevelName' => '11',     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['gradeLevelName' => '12',     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // insert in one shot
        DB::table('grade_levels')->insert($grade);
    }
}
