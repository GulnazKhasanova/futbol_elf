<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
           $table->unsignedBigInteger('id_from_gamer');
           $table->foreign('id_from_gamer')
               ->references('id')
               ->on('news')
               ->cascadeOnDelete();

           $table->unsignedBigInteger('id_to_gamer');
           $table->foreign('id_to_gamer')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();

           $table->boolean('ball')->nullable();

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
        Schema::dropIfExists('likes');
    }
}
