<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /*
      Run the database seeds.  
      'subjectName',
        'subjectType',
        'gradeLevelID',
        'strandID',
     */
    public function run(): void
    {



        $subjects = [
            ['subjectName' => 'Oral Communication', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Reading and Writing', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Komunikasyon at Pananaliksik', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Contemporary Philippine Arts', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Media and Information Literacy', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'General Mathematics', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Earth Science', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => 1],
            ['subjectName' => 'Philosophy of the Human Person', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'PE and Health', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Personal Development', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Understanding Culture, Society, and Politics', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Earth and Life Science', 'subjectType' => 'Core', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Statistics and Probability', 'subjectType' => 'Core', 'gradeLevelID' => 2, 'strandID' => null],
            ['subjectName' => 'Physical Science', 'subjectType' => 'Core', 'gradeLevelID' => 2, 'strandID' => null],
            ['subjectName' => 'PE and Health', 'subjectType' => 'Core', 'gradeLevelID' => 2, 'strandID' => null],

            // Advanced
            ['subjectName' => 'English for Academic and Professional Purposes', 'subjectType' => 'Advanced', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Practical Research 1', 'subjectType' => 'Advanced', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Filipino sa Piling Larangan', 'subjectType' => 'Advanced', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Empowerment Technologies (E-Tech)', 'subjectType' => 'Advanced', 'gradeLevelID' => 1, 'strandID' => null],
            ['subjectName' => 'Practical Research 2', 'subjectType' => 'Advanced', 'gradeLevelID' => 2, 'strandID' => null],
            ['subjectName' => 'Entrepreneurship', 'subjectType' => 'Advanced', 'gradeLevelID' => 2, 'strandID' => null],
            ['subjectName' => 'Inquiries, Investigations, and Immersion', 'subjectType' => 'Advanced', 'gradeLevelID' => 2, 'strandID' => null],

            // Specialize for STEM
            ['subjectName' => 'Pre-Calculus', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 1],
            ['subjectName' => 'General Biology 1', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 1],
            ['subjectName' => 'General Chemistry 1', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 1],
            ['subjectName' => 'General Physics 1', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 1],
            ['subjectName' => 'Pre-Calculus', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 1],
            ['subjectName' => 'General Biology 2', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 1],
            ['subjectName' => 'General Chemistry 2', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 1],
            ['subjectName' => 'General Physics 2', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 1],

            // Specialize for ABM
            ['subjectName' => 'Applied Economics', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 2],
            ['subjectName' => 'Fundamentals of Accountancy 1', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 2],
            ['subjectName' => 'Business Math', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 2],
            ['subjectName' => 'Business and Management 1', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 2],

            ['subjectName' => 'Business Ethics and Social Responsibility', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 2],
            ['subjectName' => ' Fundamentals of Accountancy 2', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 2],
            ['subjectName' => 'Business Finance', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 2],
            ['subjectName' => 'Business and Management 2', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 2],
            ['subjectName' => 'Principles of Marketing', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 2],

            // Specialize for Humms
            ['subjectName' => 'Creative Writing', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 3],
            ['subjectName' => 'Introduction to World Religions and Belief Systems', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 3],
            ['subjectName' => 'Disciplines and Ideas in the Social Sciences', 'subjectType' => 'Specialized', 'gradeLevelID' => 1, 'strandID' => 3],

            ['subjectName' => 'Creative Nonfiction', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 3],
            ['subjectName' => 'Trends, Networks, and Critical Thinking in the 21st Century', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 3],
            ['subjectName' => 'Business Finance', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 3],
            ['subjectName' => 'Philippine Politics and Governance', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 3],
            ['subjectName' => 'Community Engagement', 'subjectType' => 'Specialized', 'gradeLevelID' => 2, 'strandID' => 3],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
