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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('address');
            $table->string('birthDate');
            $table->string('gender');
            $table->string('Address');
            $table->string('contactNumber');
            $table->string('guardianName');
            $table->string('guardianContactNumber');
            $table->string('status');
            $table->unsignedBigInteger('gradeLevelID');
            $table->unsignedBigInteger('roleID');
            $table->unsignedBigInter('strandID');
            $table->timestamps();

            $table->foreign('gradeLevelID')->references('gradeLevelID')->on('grade_levels')->onDelete('cascade');
            $table->foreign('roleID')->references('roleID')->on('roles')->onDelete('cascade');
            $table->foreign('strandID')->references('strandID')->on('strands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
