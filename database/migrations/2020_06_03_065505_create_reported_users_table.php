<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reported_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('reported_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reported_to')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('notes');
            $table->timestamps();

            // $table->foreign('reported_by')
            //     ->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('reported_to')
            //     ->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reported_users');
    }
}
