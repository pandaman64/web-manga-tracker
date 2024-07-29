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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publisher_id')->constrained();
            $table->string('feed_id');
            $table->string('title');
            // corresponds to content
            $table->string('work_title');
            $table->string('author');
            $table->string('permalink');
            $table->string('enclosure_url')->nullable();
            $table->timestampTz('feed_updated_at');
            $table->timestamps();

            $table->unique(['publisher_id', 'feed_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};