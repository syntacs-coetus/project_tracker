<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'ic_votes', function (Blueprint $table) {
                $table->bigIncrements('icv_id');
                $table->boolean('positive_vote')->default(1);
                $table->Integer('voter')->unsigned();
                $table->bigInteger('ic_id')->unsigned();
                $table->timestamp('date_voted')->useCurrent();
            }
        );

        Schema::table(
            'ic_votes', function (Blueprint $table) {
                $table->foreign('voter')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('ic_id')
                    ->references('ic_id')
                    ->on('issue_comments')
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
        Schema::dropIfExists('ic_votes');
    }
}
