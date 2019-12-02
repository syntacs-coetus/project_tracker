<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->string('system_company')->unique();
            $table->string('system_address')->nullable();
            $table->tinyInteger('system_administrators')->default(2);
            $table->tinyInteger('system_owneroverriders')->default(1);
            $table->string('system_mobile')->nullable();
            $table->string('system_phone')->nullable();
            $table->string('system_email')->nullable();
            $table->string('system_supportemail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_settings');
    }
}
