<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->foreignId('author_id')->constrained()->cascadeOnDelete();
            $table->json('description');
            $table->boolean('is_active');
            $table->date('publication_date');
            $table->json('files');
            $table->integer('pages');
            $table->decimal('ratting', 10, 1)->default(4.5);
            $table->integer('readen_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
