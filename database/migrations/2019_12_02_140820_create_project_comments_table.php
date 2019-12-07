<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'project_comments', function (Blueprint $table) {
                $table->bigIncrements('comment_id');
                $table->text('comment_desc');
                $table->Integer('comment_owner')->unsigned();
                $table->bigInteger('comment_project')->unsigned();
                $table->timestamp('comment_datecreated')->useCurrent();
                $table->timestamp('comment_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'project_comments', function (Blueprint $table) {
                $table->foreign('comment_owner')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('comment_project')
                    ->references('project_id')
                    ->on('projects')
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
        Schema::dropIfExists('project_comments');
    }
}
