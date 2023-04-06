<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('content');
            $table->string('age',255);
            $table->integer('count_list')->default(0);
            $table->integer('year')->default(0);
            $table->string('image',255);
            $table->string('file_path',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
