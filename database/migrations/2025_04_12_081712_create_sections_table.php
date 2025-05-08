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
        Schema::create('sections', function (Blueprint $table) {
            $table->id('sectionID');
            $table->string('sectionName');
            $table->string('room')->unique();
            $table->integer('max_capacity')->default(40);
            $table->unsignedBigInteger('gradeLevelID');
            $table->unsignedBigInteger('strandID');
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
        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign(['gradeLevelID']); // Drop foreign key in referencing table first
            $table->dropForeign(['strandID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('sections');
    }
};
