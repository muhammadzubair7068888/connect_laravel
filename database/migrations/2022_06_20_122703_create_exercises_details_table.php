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
        Schema::create('exercises_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('sets');
            $table->string('reps');
            $table->string('notes');
            $table->bigInteger('strength')->nullable();
            $table->foreignId('exercise_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('exercises_details');
    }
};
