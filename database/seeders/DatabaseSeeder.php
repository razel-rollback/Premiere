<?php

namespace Database\Seeders;

use App\Models\Register;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GuardianSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(TrackSeeder::class);
        $this->call(StrandSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GuardianTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(RegisterSeeder::class);
        $this->call(DocumentsSeeder::class);
    }
}
