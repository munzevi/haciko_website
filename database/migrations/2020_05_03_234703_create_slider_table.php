<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('path');
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('metaTitle')->nullable();
            $table->json('metaAlt')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('content_id')->unsigned()->index();
            $table->foreign('content_id')->references('id')->on('contents');
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
        Schema::dropIfExists('slider');
    }
}
