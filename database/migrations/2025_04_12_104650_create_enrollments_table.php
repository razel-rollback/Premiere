<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('enrollmentID');
            $table->unsignedBigInteger('studentID');
            $table->unsignedBigInteger('sectionID');
            $table->string('AcademicYear');
            $table->date('dateEnrolled');
            $table->timestamps();
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
            $table->foreign('sectionID')->references('sectionID')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign(['studentID']); // Drop foreign key in referencing table first
            $table->dropForeign(['sectionID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('enrollments');
    }
};
