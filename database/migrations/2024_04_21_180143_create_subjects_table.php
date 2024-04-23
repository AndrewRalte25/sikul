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
    Schema::create('subjects', function (Blueprint $table) {
        $table->id();
        $table->string('subject_name');
        $table->foreignId('class_id')->constrained('classses')->onDelete('cascade');
        $table->unsignedBigInteger('teacher_id')->nullable();
        $table->foreign('teacher_id')->references('user_id')->on('teachers')->onDelete('set null');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
