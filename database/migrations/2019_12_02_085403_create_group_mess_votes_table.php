<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMessVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_mess_votes', function (Blueprint $table) {
            $table->bigIncrements('gmvote_id');
            $table->boolean('positive_vote')->default(1);
            $table->Integer('voter')->unsigned();
            $table->bigInteger('group_mess_id')->unsigned();
            $table->timestamp('date_voted');
        });

        Schema::table('group_mess_votes', function (Blueprint $table){
            $table->foreign('voter')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('group_mess_id')
            ->references('message_id')
            ->on('group_messages')
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
        Schema::dropIfExists('group_mess_votes');
    }
}
