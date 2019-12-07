<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_groups', function (Blueprint $table) {
                $table->Increments('group_id');
                $table->string('group_name', 65);
                $table->string('group_shortname', 11);
                $table->timestamp('date_groupcreated')->useCurrent();
                $table->timestamp('date_groupupdated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('user_groups');
    }
}
