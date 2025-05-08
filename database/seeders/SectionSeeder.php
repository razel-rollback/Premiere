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
            ['sectionName' => 'Stem-11-A', 'strandID' => 1, 'gradeLevelID' => 1, 'room' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-11-B', 'strandID' => 1, 'gradeLevelID' => 1, 'room' => '2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-11-C', 'strandID' => 1, 'gradeLevelID' => 1, 'room' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-11-D', 'strandID' => 1, 'gradeLevelID' => 1, 'room' => '4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'ABM-11-A', 'strandID' => 2, 'gradeLevelID' => 1, 'room' => '5', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-11-B', 'strandID' => 2, 'gradeLevelID' => 1, 'room' => '6', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-11-C', 'strandID' => 2, 'gradeLevelID' => 1, 'room' => '7', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'Stem-12-A', 'strandID' => 1, 'gradeLevelID' => 2, 'room' => '8', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-12-B', 'strandID' => 1, 'gradeLevelID' => 2, 'room' => '9', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-12-C', 'strandID' => 1, 'gradeLevelID' => 2, 'room' => '10', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'Stem-12-D', 'strandID' => 1, 'gradeLevelID' => 2, 'room' => '11', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['sectionName' => 'ABM-12-A', 'strandID' => 2, 'gradeLevelID' => 2, 'room' => '12', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-12-B', 'strandID' => 2, 'gradeLevelID' => 2, 'room' => '13', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['sectionName' => 'ABM-12-C', 'strandID' => 2, 'gradeLevelID' => 2, 'room' => '14', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Insert the sections into the database
        DB::table('sections')->insert($sections);
    }
}
