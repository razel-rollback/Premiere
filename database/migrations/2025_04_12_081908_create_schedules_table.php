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
            $table->string('timeStart');
            $table->string('timeEnd');
            $table->string('RoomNum');
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
        Schema::dropIfExists('schedules');
    }
};
