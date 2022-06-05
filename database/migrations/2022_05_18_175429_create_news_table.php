<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',255);
            $table->string('lastname',255)->nullable();
            $table->string('patronymic',255)->nullable();
            $table->string('phone',150);
            $table->string('login',150);
            $table->string('password',150);
            $table->text('description')->nullable();
            $table->timestamp('date_appoint');
            $table->timestamp('birthday');
            $table->timestamp('enter_club_date');
            $table->integer('role_id')->nullable();

            $table->boolean('enable');
            $table->boolean('admin');

            $table->enum('status', ['ACTIVE','BLOCKED']);
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
        Schema::dropIfExists('news');
    }
}
