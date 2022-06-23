<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('velocities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status',[0,1])->default(1);
            $table->string('user_type')->comment('superadmin = 1 , admin = 2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('velocities');
    }
};
