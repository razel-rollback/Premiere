<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $strands = [
            ['strandName' => 'STEM', 'trackID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['strandName' => 'ABM', 'trackID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['strandName' => 'HUMSS', 'trackID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['strandName' => 'GAS', 'trackID' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('strands')->insert($strands);
    }
}
