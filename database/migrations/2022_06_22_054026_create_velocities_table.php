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
            $table->foreignId('admin_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('key');
            $table->string('label')->nullable();
            $table->enum('status',[0,1])->default(1);
          
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
