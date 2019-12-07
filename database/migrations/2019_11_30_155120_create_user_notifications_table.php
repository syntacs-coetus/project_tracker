<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_notifications', function (Blueprint $table) {
                $table->bigIncrements('notif_id');
                $table->text('notif_desc');
                $table->string('notif_link');
                $table->boolean('notif_read');
                $table->Integer('notif_owner')->unsigned();
                $table->timestamp('notif_datecreated')->useCurrent();
                $table->timestamp('notif_dateread')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            }
        );

        Schema::table(
            'user_notifications', function (Blueprint $table) {
                $table->foreign('notif_owner')
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
        Schema::dropIfExists('user_notifications');
    }
}
