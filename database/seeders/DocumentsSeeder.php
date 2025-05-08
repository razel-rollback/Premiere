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
        // Ensure storage directories exist
        Storage::disk('public')->makeDirectory('documents/samples');
        Storage::disk('public')->makeDirectory('documents/students');

        // Only these two document types
        $sampleDocuments = [
            [
                'type' => 'Birth Certificate',
                'path' => 'documents/samples/sample_birth_cert.jpg',
                'fake_file' => 'Samplebirth_certificate.jpg'
            ],
            [
                'type' => 'Form 137',
                'path' => 'documents/samples/sample_form_137.jpg',
                'fake_file' => 'Sampleform_137.jpg'
            ]
        ];

        // Create sample files if they don't exist
        foreach ($sampleDocuments as $sample) {
            if (!Storage::disk('public')->exists($sample['path'])) {
                Storage::disk('public')->put($sample['path'], '');
            }
        }

        // Create documents for students 1-5
        for ($studentId = 1; $studentId <= 5; $studentId++) {
            $documentsToInsert = [];

            foreach ($sampleDocuments as $doc) {
                $studentDocPath = "documents/students/{$studentId}/" . $doc['fake_file'];

                // Copy sample to student's directory
                Storage::disk('public')->copy($doc['path'], $studentDocPath);

                $documentsToInsert[] = [
                    'studentID' => $studentId,
                    'documentType' => $doc['type'],
                    'documentPath' => $studentDocPath,
                    'documentStatus' => 'Pending', // or 'Pending'
                    'UploadDate' => Carbon::now()->subDays(rand(1, 30)),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }

            DB::table('student_documents')->insert($documentsToInsert);
        }
    }
}
