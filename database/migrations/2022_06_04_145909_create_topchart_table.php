<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopchartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topchart', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('id_gamer');
            $table->foreign('id_gamer')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();

            $table->integer('voices');

            $table->unsignedBigInteger('id_vote');
            $table->foreign('id_vote')
                ->references('id')
                ->on('vote')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('topchart');
    }
}
