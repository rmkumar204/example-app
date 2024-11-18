<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('recruiter')->nullable(); 
            $table->string('jobTitle')->nullable(); 
            $table->integer('jobType')->nullable(); 
            $table->string('state')->nullable(); 
            $table->integer('salaryFromMonthly')->nullable(); 
            $table->integer('salaryToMonthly')->nullable(); 
            $table->integer('salaryFromCTC')->nullable(); 
            $table->integer('salaryToCTC')->nullable(); 
            $table->integer('opening')->nullable(); 
            $table->integer('experience')->nullable(); 
            $table->text('skills')->nullable(); 
            $table->text('jobDescription')->nullable(); 
            $table->string('company')->nullable(); 
            $table->string('jobImage')->nullable();
            $table->integer('jobStatus')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
