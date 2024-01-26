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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedSmallInteger('year');
            $table->string('genre', 50);
            $table->string('country', 30);
            $table->unsignedInteger('duration'); // Change data type to unsigned integer
            $table->string('img_url', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films_actors');
    }
};
