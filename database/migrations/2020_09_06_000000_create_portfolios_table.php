<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('portfolio');
            $table->string('portfolio_description')->nullable();
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
