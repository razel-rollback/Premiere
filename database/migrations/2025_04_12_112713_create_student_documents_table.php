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
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id('studentDocumentID');
            $table->unsignedBigInteger('studentID');
            $table->string('documentType');
            $table->string('documentPath');
            $table->string('documentStatus');
            $table->date('UploadDate');
            $table->timestamps();
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_documents', function (Blueprint $table) {
            $table->dropForeign(['studentID']); // Drop foreign key in referencing table first
        });
        Schema::dropIfExists('student_documents');
    }
};
