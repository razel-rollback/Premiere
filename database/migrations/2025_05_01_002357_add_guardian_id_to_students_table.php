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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('guardianID')->nullable()->after('gradeLevelID'); // Add guardianID column
            $table->foreign('guardianID')->references('guardianID')->on('guardians')->onDelete('set null'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['guardianID']); // Drop the foreign key constraint
            $table->dropColumn('guardianID'); // Drop the guardianID column
        });
    }
};
