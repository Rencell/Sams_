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
        Schema::create('attendance_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->string('student_id');
            $table->foreign('subject_id')
                  ->references('subject_id')
                  ->on('subject_student')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('student_id')
                  ->references('student_id')
                  ->on('subject_student')
                  ->onDelete('cascade')
                  ->onUpdate('cascade'); 
            $table->boolean('status')->default('0');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_subject');
    }
};
