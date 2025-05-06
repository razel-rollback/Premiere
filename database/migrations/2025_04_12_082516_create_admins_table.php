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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminID');
            $table->unsignedBigInteger('roleID');
            $table->timestamps();
            $table->foreign('roleID')->references('roleID')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign(['roleID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('admins');
    }
};
