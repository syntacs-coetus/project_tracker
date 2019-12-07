<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'issue_label', function (Blueprint $table) {
                $table->bigIncrements('ilabel_id');
                $table->Integer('label_id')->unsigned();
                $table->Integer('issue_id')->unsigned();
                $table->boolean('label_istask')->default(0);
                // 0 -> just list, 1 -> Default list, 2 -> Doing List, 3 -> End List
                $table->tinyInteger('label_istasktype')->default(0);
            }
        );

        Schema::table(
            'issue_label', function (Blueprint $table) {
                $table->foreign('label_id')
                    ->references('label_id')
                    ->on('project_labels')
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
        Schema::dropIfExists('issue_label');
    }
}
