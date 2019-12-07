<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'projects', function (Blueprint $table) {
                $table->bigIncrements('project_id');
                $table->string('project_name');
                $table->text('project_description');
                $table->Integer('project_group')->unsigned();
                $table->date('project_targetdate')->nullable();
                $table->text('project_gitlink')->nullable();
                $table->text('project_filepath')->nullable();
                $table->timestamp('project_datecreated')->useCurrent();
                $table->timestamp('project_dateupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'projects', function (Blueprint $table) {
                $table->foreign('project_group')
                    ->references('group_id')
                    ->on('user_groups')
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
        Schema::dropIfExists('projects');
    }
}
