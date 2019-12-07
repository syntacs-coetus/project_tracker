<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'upc_votes', function (Blueprint $table) {
                $table->bigIncrements('upcv_id');
                $table->boolean('positive_vote')->default(1);
                $table->Integer('voter')->unsigned();
                $table->bigInteger('upc_id')->unsigned();
                $table->timestamp('date_voted');
            }
        );

        Schema::table(
            'upc_votes', function (Blueprint $table) {
                $table->foreign('voter')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('upc_id')
                    ->references('upc_id')
                    ->on('user_post_comments')
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
        Schema::dropIfExists('upc_votes');
    }
}
