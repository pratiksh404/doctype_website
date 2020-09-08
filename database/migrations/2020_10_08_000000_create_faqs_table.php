<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
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
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->text('answer');
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
        Schema::dropIfExists('faqs');
    }
}
