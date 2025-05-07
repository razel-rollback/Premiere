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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id('guardianID');
            $table->string('guardianFirstName');
            $table->string('guardianMiddleName');
            $table->string('guardianLastName');
            $table->string('guardianSuffixName')->nullable();
            $table->date('guardianBirthDate');
            $table->string('guardianRelation');
            $table->string('email')->unique();
            $table->string('guardianPhone');
            $table->string('guardianAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
