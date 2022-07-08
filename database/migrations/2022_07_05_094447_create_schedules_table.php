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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('events');
            // $table->foreignId('exercise_id')->constrained('exercises')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->string('title');
            // $table->date('start');
            // $table->string('backgroundColor');
            // $table->string('borderColor');
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
        Schema::dropIfExists('schedules');
    }
};
