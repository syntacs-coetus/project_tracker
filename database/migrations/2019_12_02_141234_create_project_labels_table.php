<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_labels', function (Blueprint $table) {
            $table->Increments('label_id');
            $table->string('label_title');
            $table->string('label_color')->default("#FFFFFF");
            $table->bigInteger('project_id')->unsigned();
        });

        Schema::table('project_labels', function (Blueprint $table){
            $table->foreign('project_id')
            ->references('project_id')
            ->on('projects')
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
        Schema::dropIfExists('project_labels');
    }
}
