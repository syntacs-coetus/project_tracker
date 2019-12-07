<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueMilestoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'issue_milestone', function (Blueprint $table) {
                $table->bigIncrements('imilestone_id');
                $table->Integer('milestone_id')->unsigned();
                $table->Integer('issue_id')->unsigned();
            }
        );

        Schema::table(
            'issue_milestone', function (Blueprint $table) {
                $table->foreign('milestone_id')
                    ->references('milestone_id')
                    ->on('project_milestones')
                    ->onUpdate('cascade')->onDelete('restrict');

                $table->foreign('issue_id')
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
        Schema::dropIfExists('issue_milestone');
    }
}
