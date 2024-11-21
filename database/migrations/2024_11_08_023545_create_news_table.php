<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('text');
            $table->foreignId('news_category_id')->constrained('news_categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};