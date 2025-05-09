<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        Storage::disk('public')->makeDirectory('documents/samples');

        // Sample documents (shared by all students)
        $sampleDocuments = [
            [
                'type' => 'Birth Certificate',
                'path' => 'documents/samples/sample_birth_cert.jpg',
            ],
            [
                'type' => 'Form 137',
                'path' => 'documents/samples/sample_form_137.jpg',
            ]
        ];

        // Create sample files if they don't exist
        foreach ($sampleDocuments as $sample) {
            if (!Storage::disk('public')->exists($sample['path'])) {
                Storage::disk('public')->put($sample['path'], '');
            }
        }

        // Assign the SAME documents to students 1-5
        for ($studentId = 1; $studentId <= 5; $studentId++) {
            $documentsToInsert = [];

            foreach ($sampleDocuments as $doc) {
                $documentsToInsert[] = [
                    'studentID' => $studentId,
                    'documentType' => $doc['type'],
                    'documentPath' => $doc['path'], // Same path for all students
                    'documentStatus' => 'Pending',
                    'UploadDate' => Carbon::now()->subDays(rand(1, 30)),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }

            DB::table('student_documents')->insert($documentsToInsert);
        }
    }
}
