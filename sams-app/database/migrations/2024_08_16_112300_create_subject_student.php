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
        Schema::create('subject_student', function (Blueprint $table) {
            
            $table->foreignId('subject_id')
                            ->constrained()
                            ->onDelete('cascade')
                            ->onUpdate('cascade')
                            ->references('id')
                            ->on('subjects');
            $table->string('student_id');   
            $table->foreign('student_id')
                            ->constrained()
                            ->onDelete('cascade')
                            ->onUpdate('cascade')
                            ->references('id')
                            ->on('students');
            $table->primary(['subject_id', 'student_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_student');
    }
};
