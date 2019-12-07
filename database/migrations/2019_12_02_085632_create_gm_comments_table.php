<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGmCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'gm_comments', function (Blueprint $table) {
                $table->bigIncrements('gmc_id');
                $table->text('gmc_desc');
                $table->Integer('owner')->unsigned();
                $table->bigInteger('gmc_target')->unsigned();
                $table->timestamp('gmc_datecreted')->useCurrent();
                $table->timestamp('gmc_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'gm_comments', function (Blueprint $table) {
                $table->foreign('owner')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('gmc_target')
                    ->references('message_id')
                    ->on('group_messages')
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
        Schema::dropIfExists('gm_comments');
    }
}
