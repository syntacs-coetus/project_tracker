<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupAssignedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_assigned_users', function (Blueprint $table) {
            $table->bigIncrements('assoc_id');
            $table->Integer('user_id')->unsigned();
            $table->Integer('group_id')->unsigned();
            $table->boolean('groupleader_auth')->default(0);
            $table->boolean('editgroupauth_auth')->default(0);
            $table->boolean('sanctiongmessages_auth')->default(0);
            $table->boolean('sanctiongcomments_auth')->default(0);
            $table->boolean('assignmembers_auth')->default(0);
            $table->boolean('creategprojects_auth')->default(0);
            $table->boolean('editgprojects_auth')->default(0);
            $table->date('expiry_date')->nullable();
        });

        Schema::table('group_assigned_users', function (Blueprint $table){
            $table->foreign('user_id')
            ->references('user_id')
            ->on('user_accounts')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('group_id')
            ->references('group_id')
            ->on('user_groups')
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
        Schema::dropIfExists('group_assigned_users');
    }
}
