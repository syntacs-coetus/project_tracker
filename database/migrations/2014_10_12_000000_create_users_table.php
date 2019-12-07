<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_accounts', function (Blueprint $table) {
                $table->Increments('user_id');
                $table->string('user_name')->unique();
                $table->string('user_email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('user_pass');
                $table->boolean('user_owner')->default(0);
                $table->boolean('user_administrator')->default(0);
                $table->boolean('user_admin_override')->default(0);
                $table->rememberToken();
                $table->timestamp('registered_date')->useCurrent();
                $table->timestamp('last_loggedin')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('user_accounts');
    }
}
