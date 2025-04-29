<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;               // helpful for timestamps

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // example seed data ─ tailor this to your schema
        $tracks = [
            ['trackName' => 'Acedemic',     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        // Student::factory()->count(50)->create();
        // insert in one shot
        DB::table('tracks')->insert($tracks);
    }
}
