<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->Increments('milestone_id');
            $table->string('milestone_title');
            $table->text('milestone_desc');
            $table->Integer('milestone_creator')->unsigned();
            $table->bigInteger('milestone_project')->unsigned();
            $table->boolean('milestone_achieved');
            $table->boolean('milestone_weekleft')->default(0);
            $table->boolean('milestone_threeleft')->default(0);
            $table->boolean('milestone_oneleft')->default(0);
            $table->date('milestone_targetdate')->nullable();
            $table->timestamp('milestone_datecreated')->useCurrent();
            $table->timestamp('milestone_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('project_milestones', function (Blueprint $table){
            $table->foreign('milestone_project')
            ->references('project_id')
            ->on('projects')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('milestone_creator')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_milestones');
    }
}
