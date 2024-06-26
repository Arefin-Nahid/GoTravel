<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('slug')->unique();
            $table->string('location');
            $table->integer('price');
            $table->text('description');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
