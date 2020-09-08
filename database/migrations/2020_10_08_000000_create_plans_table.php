<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
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
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plan_name');
            $table->integer('plan_period');
            $table->string('plan_price');
            $table->string('plan_currency_symbol')->default('$');
            $table->string('plan_color')->default('#33ccff');
            $table->json('plan_services');
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
        Schema::dropIfExists('plans');
    }
}
