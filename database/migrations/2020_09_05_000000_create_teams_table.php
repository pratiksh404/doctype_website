<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     *
     *Create Table
     *
     *@return void
     *
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->text('description')->nullable();
            $table->json('phone_no')->nullable();
            $table->string('image')->nullable();
            $table->json('social_media')->nullable();
            $table->timestamps();
        });
    }
    /**
     *
     *Drop Table
     *
     *@return void
     *
     */
    public function down()
    {
        Schema::drop('teams');
    }
}
