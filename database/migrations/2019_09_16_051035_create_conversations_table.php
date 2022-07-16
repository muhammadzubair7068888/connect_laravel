<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('from_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('to_id')->nullable();
            $table->string('to_type')->default('App\\\Models\\\Conversation')->comment('1 => Message, 2 => Group Message');
            $table->text('message');
            $table->tinyInteger('status')->default(0)->comment('0 for unread,1 for seen');
            $table->tinyInteger('message_type')->default(0)->comment('0- text message, 1- image, 2- pdf, 3- doc, 4- voice');
            $table->text('file_name')->nullable();
            $table->json('url_details')->nullable();
            $table->timestamps();
            // $table->foreign('from_id')
            //     ->references('id')->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreign('to_id')
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
        Schema::dropIfExists('conversations');
    }
}
