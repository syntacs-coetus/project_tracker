<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGmcVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gmc_votes', function (Blueprint $table) {
            $table->bigIncrements('gmcv_id');
            $table->boolean('postive_vote')->default(1);
            $table->Integer('voter')->unsigned();
            $table->bigInteger('gmcv_target')->unsigned();
            $table->timestamp('gmc_datecreated')->useCurrent();
            $table->timestamp('gmc_dateupdted')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('gmc_votes', function (Blueprint $table){
            $table->foreign('voter')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('gmcv_target')
            ->references('gmc_id')
            ->on('gm_comments')
            ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gmc_votes');
    }
}
