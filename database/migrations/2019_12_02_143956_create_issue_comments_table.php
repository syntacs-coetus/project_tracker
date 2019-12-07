<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'issue_comments', function (Blueprint $table) {
                $table->bigIncrements('ic_id');
                $table->text('ic_desc');
                $table->Integer('ic_owner')->unsigned();
                $table->Integer('ic_target')->unsigned();
                $table->timestamp('ic_datecreated')->useCurrent();
                $table->timestamp('ic_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'issue_comments', function (Blueprint $table) {
                $table->foreign('ic_owner')
                    ->references('user_id')
                    ->on('user_accounts')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('ic_target')
                    ->references('issue_id')
                    ->on('project_issues')
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
        Schema::dropIfExists('issue_comments');
    }
}
