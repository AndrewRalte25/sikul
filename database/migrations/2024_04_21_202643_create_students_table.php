<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('email')->unique();
        $table->date('dob');
        $table->string('gender');
        $table->unsignedBigInteger('class_id'); 
        $table->foreign('class_id')->references('id')->on('classses')->onDelete('cascade'); 
        $table->unsignedBigInteger('guardian_id'); 
        $table->foreign('guardian_id')->references('user_id')->on('guardians')->onDelete('cascade'); 
        $table->string('marksheet');
        $table->text('address');
        $table->string('phone_number');
        $table->enum('status', ['Yes', 'No'])->default('No');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
