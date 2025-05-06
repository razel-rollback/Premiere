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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('paymentID');
            $table->unsignedBigInteger('enrollmentID');
            $table->integer('amountPaid');
            $table->string('paymentMethod');
            $table->integer('totalFee');
            $table->string('paymentType');
            $table->date('paymentDate');
            $table->string('paymentStatus');
            $table->timestamps();
            $table->foreign('enrollmentID')->references('enrollmentID')->on('enrollments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['enrollmentID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('payments');
    }
};
