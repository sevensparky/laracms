<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->string('external_link')->nullable();
            $table->longText('content')->nullable();
            $table->longText('voice')->nullable();
            $table->longText('video')->nullable();
            $table->longText('image')->nullable();
            $table->text('picture')->nullable();
            $table->string('source_address')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->boolean('main_news')->default(false);
            $table->boolean('headline_news')->default(false);
            $table->boolean('magazine')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
