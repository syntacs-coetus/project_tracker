<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueAssignedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'issue_assigned_users', function (Blueprint $table) {
                $table->bigIncrements('assoc_id');
                $table->Integer('issue_id')->unsigned();
                $table->Integer('user_id')->unsigned();
                $table->boolean('issue_creatorauth')->default(0);
                $table->boolean('issue_editauth')->default(0);
                $table->boolean('issue_assignlabel')->default(0);
                $table->boolean('issue_assignmilestone')->default(0);
                $table->boolean('issue_sanctioncomments')->default(0);
                $table->boolean('issue_assignmembers')->default(0);
                $table->boolean('issue_updateissue')->default(0);
                $table->timestamp('date_assigned')->useCurrent();
            }
        );

        Schema::table(
            'issue_assigned_users', function (Blueprint $table) {
                $table->foreign('issue_id')
                    ->references('issue_id')
                    ->on('project_issues')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('user_id')
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
        Schema::dropIfExists('issue_assigned_users');
    }
}
