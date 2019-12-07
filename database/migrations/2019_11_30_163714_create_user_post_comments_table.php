<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_post_comments', function (Blueprint $table) {
                $table->bigIncrements('upc_id');
                $table->text('upc_desc');
                $table->Integer('upc_owner')->unsigned();
                $table->bigInteger('upc_target')->unsigned();
                $table->timestamp('upc_datecreated')->useCurrent();
                $table->timestamp('upc_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'user_post_comments', function (Blueprint $table) {
                $table->foreign('upc_owner')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');
            
                $table->foreign('upc_target')
                    ->references('post_id')
                    ->on('user_posts')
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
        Schema::dropIfExists('user_post_comments');
    }
}
