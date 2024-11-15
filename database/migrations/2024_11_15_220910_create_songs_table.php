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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('release_year');
            $table->time('duration');
            $table->foreignId('album_id')->constrained('albums', 'id');
            $table->foreignId('studio_id')->constrained('studios', 'id');
            $table->foreignId('agerating_id')->constrained('ageratings', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
