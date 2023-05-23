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
        Schema::create('links_articles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('article_id')->nullable();
            $table->unsignedBigInteger('external_link_id')->nullable();

            $table->foreign('article_id')
                ->references('id')->on('articles')->onDelete('cascade');

            $table->foreign('external_link_id')
            ->references('id')->on('external_links')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links_articles');
    }
};
