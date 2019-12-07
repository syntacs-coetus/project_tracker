<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAssignedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'project_assigned_users', function (Blueprint $table) {
                $table->bigIncrements('assoc_id');
                $table->bigInteger('project_id')->unsigned();
                $table->Integer('user_id')->unsigned();
                $table->boolean('project_creatorauth')->default(0);
                $table->boolean('project_authedit')->default(0);
                $table->boolean('project_sanctioncommentsauth')->default(0);
                $table->boolean('project_sanctionlabelsauth')->default(0);
                $table->boolean('project_sanctionmilestonesauth')->default(0);
                $table->boolean('project_assignmembers')->default(0);
                $table->boolean('project_creatissues')->default(0);
                $table->boolean('project_editissues')->default(0);
                $table->timestamp('project_assigneddate')->useCurrent();
                $table->date('project_assignexpiry')->nullable();
            }
        );

        Schema::table(
            'project_assigned_users', function (Blueprint $table) {
                $table->foreign('project_id')
                    ->references('project_id')
                    ->on('projects')
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
        Schema::dropIfExists('project_assigned_users');
    }
}
