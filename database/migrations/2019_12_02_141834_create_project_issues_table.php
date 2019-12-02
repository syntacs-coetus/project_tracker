<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_issues', function (Blueprint $table) {
            $table->Increments('issue_id');
            $table->string('issue_title');
            $table->text('issue_desc');
            $table->bigInteger('issue_project')->unsigned();;
            $table->Integer('issued_by')->unsigned();
            $table->boolean('issue_status')->default(1);
            $table->timestamp('issue_date')->useCurrent();
            $table->timestamp('issue_dateupdated')->nullable();
            $table->timestamp('issue_dateclosed')->nullable();
            $table->timestamp('issue_datereopened')->nullable();
        });

        Schema::table('project_issues', function (Blueprint $table){
            $table->foreign('issue_project')
            ->references('project_id')
            ->on('projects')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('issued_by')
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
        Schema::dropIfExists('project_issues');
    }
}
