<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContentSliderPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_slider_pivot',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('content_id')->unsigned()->index();
            $table->bigInteger('slider_id')->unsigned()->index();
            $table->foreign('content_id')->references('id')->on('contents');
            $table->foreign('slider_id')->references('id')->on('sliders');
            $table->timestamps();
        });
    }
    /**
     *             $table->bigIncrements('id');
    $table->bigInteger('content_id')->unsigned()->index();
    $table->bigInteger('tag_id')->unsigned()->index();
    $table->foreign('content_id')->references('id')->on('contents');
    $table->foreign('tag_id')->references('id')->on('tags');
     */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
