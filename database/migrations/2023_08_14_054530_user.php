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
       Schema::create('user', function(Blueprint $table){
        $table->id();
        $table->string('name'); 
        $table->string('email')->unique(); 
        $table->string('password'); 
        $table->string('phonenumber')->unique(); 
        $table->enum('gender',['male', 'fmale']); 
        $table->enum('role',['admin', 'user']); 
        $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};