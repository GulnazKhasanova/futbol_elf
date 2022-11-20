<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnInTopchartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topchart', function (Blueprint $table) {
                $table->dropForeign('topchart_id_gamer_foreign');
                $table->dropForeign('topchart_id_vote_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topchart', function (Blueprint $table) {
            //
        });
    }
}
