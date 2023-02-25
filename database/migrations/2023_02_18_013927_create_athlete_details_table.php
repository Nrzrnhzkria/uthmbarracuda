<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthleteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_details', function (Blueprint $table) {
            $table->id();
            $table->string('matric_no');
            $table->string('ic_no');
            $table->string('phone_no');
            $table->string('gender');
            $table->string('faculty');
            $table->string('weight');
            $table->string('height');
            $table->string('experience');
            $table->string('aspirations');
            $table->string('user_id');
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
        Schema::dropIfExists('athlete_details');
    }
}
