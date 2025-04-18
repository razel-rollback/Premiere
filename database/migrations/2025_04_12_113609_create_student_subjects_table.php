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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->id('studentSubjectID');
            $table->unsignedBigInteger('studentID');
            $table->unsignedBigInteger('subjectID');
            $table->timestamps();
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subjects');
    }
};
