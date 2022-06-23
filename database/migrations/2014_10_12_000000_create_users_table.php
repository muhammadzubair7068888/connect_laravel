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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->text('avatar');
            $table->string('height')->nullable();
            $table->string('starting_weight')->nullable();
            $table->string('handedness')->nullable();
            $table->bigInteger('age')->nullable();
            $table->string('school')->nullable();
            $table->string('level')->nullable();
            $table->string('role')->nullable();
            $table->enum('status', [0, 1])->default(1);
            $table->enum('can_create',[0,1])->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['name' => 'admin','dob'=>'2000-10-10','email' => 'admin@themesbrand.com','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg','created_at' => now(),]);
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
