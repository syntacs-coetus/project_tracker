<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_followed', function (Blueprint $table) {
            $table->bigIncrements('follow_id');
            $table->boolean('followed')->default(1);
            $table->Integer('follower_id')->unsigned();
            $table->Integer('followed_id')->unsigned();
            $table->timestamp('followed_date')->useCurrent();
            $table->timestamp('unfollowed_date')->nullable();
        });

        Schema::table('user_followed', function (Blueprint $table){
            $table->foreign('follower_id')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('followed_id')
            ->references('user_id')
            ->on('user_accounts')
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
        Schema::dropIfExists('user_followed');
    }
}
