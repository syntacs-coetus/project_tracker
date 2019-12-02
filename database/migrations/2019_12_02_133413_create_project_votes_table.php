<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_votes', function (Blueprint $table) {
            $table->bigIncrements('vote_id');
            $table->boolean('postive_vote')->default(1);
            $table->Integer('voter')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->timestamp('date_voted');
        });

        Schema::table('project_votes', function (Blueprint $table){
            $table->foreign('voter')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('project_id')
            ->references('project_id')
            ->on('projects')
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
        Schema::dropIfExists('project_votes');
    }
}
