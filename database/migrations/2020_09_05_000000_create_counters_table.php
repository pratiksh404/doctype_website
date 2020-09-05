<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
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
        Schema::create('counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('counter_name');
            $table->bigInteger('count');
            $table->string('counter_icon')->nullable();
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
        //
    }
}
