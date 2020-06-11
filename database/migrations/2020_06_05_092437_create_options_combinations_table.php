<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_combinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('variation_id');
            $table->text('combinations');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_combinations');
    }
}
