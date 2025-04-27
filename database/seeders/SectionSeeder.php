<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //change the strand id//
        $sections = [
            ['sectionName' => 'Stem-11-A', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-11-B', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-11-C', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'ABM-11-A', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-11-B', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-11-C', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'Stem-12-A', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-12-B', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-12-C', 'strandID' => 1, 'gradeLevelID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'ABM-12-A', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-12-B', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-12-C', 'strandID' => 2, 'gradeLevelID' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Insert the sections into the database
        DB::table('sections')->insert($sections);
    }
}
