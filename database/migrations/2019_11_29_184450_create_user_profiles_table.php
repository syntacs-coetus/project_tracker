<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user_profiles', function (Blueprint $table) {
                $table->Integer('profile_id')->unsigned();
                $table->string('user_firstname', 65);
                $table->string('user_middlename', 65);
                $table->string('user_lastname', 65);
                $table->date('user_birthdate');
                $table->string('user_birthplace', 128);
                $table->text('user_address');
            }
        );

        Schema::table(
            'user_profiles', function (Blueprint $table) {
                $table->foreign('profile_id')
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
        Schema::dropIfExists('user_profiles');
    }
}
