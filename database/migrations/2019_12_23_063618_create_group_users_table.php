<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('role')->default(1);
            $table->foreignId('added_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('removed_by')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->foreign('user_id')
            //     ->references('id')->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->foreign('removed_by')
            //     ->references('id')->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');

            // $table->foreign('added_by')
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
        Schema::dropIfExists('group_users');
    }
}
