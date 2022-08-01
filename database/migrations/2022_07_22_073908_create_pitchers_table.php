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
        Schema::create('pitchers', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->bigInteger('pa_of_inning')->nullable();
            $table->bigInteger('pitch_of_pa')->nullable();
            // $table->string('pitcher')->nullable();
            $table->bigInteger('pitcher_id');
            $table->foreign('pitcher_id')->references('pitcher_id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('pitcher_throws')->nullable();
            $table->string('pitcher_team')->nullable();
            $table->string('batter')->nullable();
            $table->string('batter_id')->nullable();
            $table->string('batter_side')->nullable();
            $table->string('batter_team')->nullable();
            $table->string('pitcher_set')->nullable();
            $table->string('inning')->nullable();
            $table->string('top_bottom')->nullable();
            $table->bigInteger('outs')->nullable();
            $table->bigInteger('balls')->nullable();
            $table->bigInteger('strikes')->nullable();
            $table->string('tagged_pitch_type')->nullable();
            $table->string('auto_pitch')->nullable();
            $table->string('pitch_call')->nullable();
            $table->string('kor_bb')->nullable();
            $table->string('hit_type')->nullable();
            $table->string('play_result')->nullable();
            $table->bigInteger('outs_on_play')->nullable();
            $table->bigInteger('runs_scored')->nullable();
            $table->string('notes')->nullable();
            $table->string('rel_speed')->nullable();
            $table->string('vert_rel_angle')->nullable();
            $table->string('horz_rel_angle')->nullable();
            $table->string('spin_rate')->nullable();
            $table->string('spin_axis')->nullable();
            $table->string('tilt')->nullable();
            $table->string('rel_height')->nullable();
            $table->string('rel_side')->nullable();
            $table->string('extension')->nullable();
            $table->string('vert_break')->nullable();
            $table->string('induced_vert_break')->nullable();
            $table->string('horz_break')->nullable();
            $table->string('plate_loc_height')->nullable();
            $table->string('plate_loc_side')->nullable();
            $table->string('zone_speed')->nullable();
            $table->string('vert_appr_angle')->nullable();
            $table->string('horz_appr_angle')->nullable();
            $table->string('zone_time')->nullable();
            $table->string('exit_speed')->nullable();
            $table->string('angle')->nullable();
            $table->string('direction')->nullable();
            $table->string('hit_spin_rate')->nullable();
            $table->string('position_at_110_x')->nullable();
            $table->string('position_at_110_y')->nullable();
            $table->string('position_at_110_z')->nullable();
            $table->string('distance')->nullable();
            $table->string('last_tracked_distance')->nullable();
            $table->string('bearing')->nullable();
            $table->string('hang_time')->nullable();
            $table->string('pfxx')->nullable();
            $table->string('pfxz')->nullable();
            $table->string('x0')->nullable();
            $table->string('y0')->nullable();
            $table->string('z0')->nullable();
            $table->string('vx0')->nullable();
            $table->string('vy0')->nullable();
            $table->string('vz0')->nullable();
            $table->string('ax0')->nullable();
            $table->string('ay0')->nullable();
            $table->string('az0')->nullable();
            $table->string('home_team')->nullable();
            $table->string('away_team')->nullable();
            $table->string('stadium')->nullable();
            $table->string('level')->nullable();
            $table->string('league')->nullable();
            $table->string('game_id')->nullable();
            $table->string('pitch_uid')->nullable();
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
        Schema::dropIfExists('pitchers');
    }
};
