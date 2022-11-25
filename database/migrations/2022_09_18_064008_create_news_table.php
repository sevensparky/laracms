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
            $table->string('headline')->nullable();
            $table->string('title');
            $table->string('service')->nullable();
            $table->string('tag')->nullable();
            $table->text('description')->nullable();
            $table->string('external_link')->nullable();
            $table->longText('content')->nullable();
            $table->longText('voice')->nullable();
            $table->longText('video')->nullable();
            $table->longText('image')->nullable();
            $table->string('news_type')->nullable();
            $table->string('news_production_type')->nullable();
            $table->string('news_source')->nullable();
            $table->string('news_source_address')->nullable();
            $table->string('message_end_news')->nullable()->comment("Message at the end of the news");
            $table->string('company')->nullable();
            $table->string('author')->nullable();
            $table->string('journalist')->nullable();
            $table->string('photographer')->nullable();
            $table->string('translator')->nullable();
            $table->string('writer')->nullable();
            $table->string('published_at')->nullable();
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
