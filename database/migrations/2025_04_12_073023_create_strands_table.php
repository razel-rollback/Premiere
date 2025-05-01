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
        Schema::create('strands', function (Blueprint $table) {
            $table->id('strandID');
            $table->string('strandName');
            $table->unsignedBigInteger('trackID');
            $table->timestamps();

            $table->foreign('trackID')->references('trackID')->on('tracks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('strands', function (Blueprint $table) {
            $table->dropForeign(['trackID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('strands');
    }
};
