<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrjcommentVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'prjcomment_votes', function (Blueprint $table) {
                $table->bigIncrements('vote_id');
                $table->boolean('positive_vote')->default(1);
                $table->Integer('owner')->unsigned();
                $table->bigInteger('comment_id')->unsigned();
                $table->timestamp('date_voted');
            }
        );

        Schema::table(
            'prjcomment_votes', function (Blueprint $table) {
                $table->foreign('owner')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('comment_id')
                    ->references('comment_id')
                    ->on('project_comments')
                    ->onUpdate('cascade')->onDelete('restrict');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prjcomment_votes');
    }
}
