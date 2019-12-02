<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_votes', function (Blueprint $table) {
            $table->bigIncrements('vote_id');
            $table->boolean('positive_vote')->default(1);
            $table->Integer('voter')->unsigned();
            $table->Integer('issue_id')->unsigned();
            $table->timestamp('date_voted')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('issue_votes', function (Blueprint $table){
            $table->foreign('voter')
            ->references('voter')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('issue_id')
            ->references('issue_id')
            ->on('project_issues')
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
        Schema::dropIfExists('issue_votes');
    }
}
