<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { if(!Schema::hasTable('log_activity')){
        Schema::create('log_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject',120)->default('') ;
            $table->string('method', 50)->default('');
            $table->ipAddress('ip')->nullable(false);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();

            $table->string('session_id')->nullable(false);
//            $table->foreign('session_id')
//                ->references('id')
//                ->on('sessions')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');

            $table->unsignedBigInteger('to_user_id');
            $table->foreign('to_user_id')
                ->references('id')
                ->on('news')
                ->cascadeOnDelete();

            $table->timestamps();
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_activity');
    }
}
