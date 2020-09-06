<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     *
     *Creates Table
     *
     *@return void
     *
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->unsignedBigInteger('portfolio_id');
            $table->integer('image_type')->default(1);
            $table->string('youtube_link')->nullable();
            $table->string('image_description')->nullable();
            $table->string('redirect_link')->nullable();
            $table->foreign('portfolio_id')->references('id')->on('portfolios');
            $table->timestamps();
        });
    }

    /**
     *
     *Drops Table
     *
     *@return void
     *
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
