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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('scheduleID');
            $table->unsignedBigInteger('subjectID');
            $table->unsignedBigInteger('sectionID');
            $table->unsignedBigInteger('teacherID');
            $table->string('timeSlot');
            $table->timestamps();
            $table->foreign('subjectID')->references('subjectID')->on('subjects')->onDelete('cascade');
            $table->foreign('sectionID')->references('sectionID')->on('sections')->onDelete('cascade');
            $table->foreign('teacherID')->references('teacherID')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['subjectID']); // Drop foreign key in referencing table first
            $table->dropForeign(['sectionID']); // Drop foreign key in referencing table first
            $table->dropForeign(['teacherID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('schedules');
    }
};
