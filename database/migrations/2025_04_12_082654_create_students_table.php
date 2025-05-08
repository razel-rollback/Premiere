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
            $table->string('suffixName')->nullable();
            $table->date('birthDate');
            $table->string('gender');
            $table->string('address');
            $table->string('contactNumber');
            $table->string('email')->unique();
            $table->string('status');
            $table->unsignedBigInteger('gradeLevelID');
            $table->unsignedBigInteger('roleID')->nullable();
            $table->unsignedBigInteger('strandID');
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
        if (Schema::hasTable('enrollments')) {
            Schema::table('enrollments', function (Blueprint $table) {
                $table->dropForeign(['studentID']); // Only if this FK exists
            });
        }

        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['gradeLevelID']); // Drop foreign key for gradeLevelID
            $table->dropForeign(['roleID']); // Drop foreign key for roleID
            $table->dropForeign(['strandID']); // Drop foreign key for strandID
        });

        Schema::dropIfExists('students');
    }
};
