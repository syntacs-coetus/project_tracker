<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post_votes', function (Blueprint $table) {
            $table->bigIncrements('upv_id');
            $table->boolean('positive_vote');
            $table->Integer('voter');
            $table->bigInteger('up_id')->unsigned();
            $table->timestamp('date_voted')->useCurrent();
        });

        Schema::table('user_post_votes', function (Blueprint $table){
            $table->foreign('up_id')
            ->references('post_id')
            ->on('user_posts')
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
        Schema::dropIfExists('user_post_votes');
    }
}
