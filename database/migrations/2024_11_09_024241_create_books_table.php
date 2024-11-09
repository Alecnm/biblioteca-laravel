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
        {
            Schema::create('books', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('author')->nullable();
                $table->year('published_year')->nullable();
                $table->bigInteger('classification_id')->unsigned()->nullable();
                $table->string('isbn', 20)->unique()->nullable();
                $table->integer('copies')->default(1);
                $table->integer('available_copies')->default(1);
                $table->timestamps();
    
                $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
