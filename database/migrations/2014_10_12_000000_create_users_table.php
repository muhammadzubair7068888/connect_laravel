<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->text('avatar')->nullable();
            $table->string('height')->nullable();
            $table->string('starting_weight')->nullable();
            $table->string('handedness')->nullable();
            $table->bigInteger('age')->nullable();
            $table->string('school')->nullable();
            $table->string('level')->nullable();
            $table->string('role')->nullable();
            $table->string('created_by')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->enum('can_create',[0,1])->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
