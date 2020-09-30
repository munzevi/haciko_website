<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->index();
            $table->string('slug')->unique()->index();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image_path')->nullable();
            $table->longText('content')->nullable();
            $table->text('feature_content')->nullable();
            $table->json('banner')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('layout')->nullable();
            $table->boolean('show_at_parent')->default('0');
            $table->boolean('show_on_menu')->default('0');
            $table->boolean('status')->default('1');
            $table->bigInteger('parent_id')->unsigned()->nullable()->index();
            $table->bigInteger('author_id')->unsigned()->index();
            $table->bigInteger('language_id')->unsigned()->index();
            $table->json('extra_fields')->nullable();
            $table->string('type')->index();
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
        Schema::dropIfExists('contents');
    }
}
