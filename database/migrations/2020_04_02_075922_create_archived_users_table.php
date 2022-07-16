<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archived_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owner_id');
            $table->string('owner_type');
            $table->foreignId('archived_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            // $table->foreign('archived_by')
            //     ->references('id')->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archived_users');
    }
}
