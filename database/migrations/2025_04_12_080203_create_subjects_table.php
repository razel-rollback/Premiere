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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('subjectID');
            $table->string('subjectName');
            $table->string('subjectType');
            $table->unsignedBigInteger('gradeLevelID');
            $table->unsignedBigInteger('strandID')->nullable();
            $table->timestamps();
            $table->foreign('gradeLevelID')->references('gradeLevelID')->on('grade_levels')->onDelete('cascade');
            $table->foreign('strandID')->references('strandID')->on('strands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['gradeLevelID']); // Drop foreign key in referencing table first
            $table->dropForeign(['strandID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('subjects');
    }
};
