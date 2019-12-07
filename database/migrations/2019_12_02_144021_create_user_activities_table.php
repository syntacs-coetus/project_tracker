<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_activities', function (Blueprint $table) {
                $table->bigIncrements('act_id');
                $table->text('act_desc');
                $table->Integer('act_user')->unsigned();
                $table->timestamp('act_datelogged')->useCurrent();
            }
        );

        Schema::table(
            'user_activities', function (Blueprint $table) {
                $table->foreign('act_user')
                    ->references('user_id')
                    ->on('user_accounts')
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
        Schema::dropIfExists('user_activities');
    }
}
