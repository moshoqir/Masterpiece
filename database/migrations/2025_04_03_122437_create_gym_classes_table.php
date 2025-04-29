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
        Schema::create('gym_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('day',['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
            $table->enum('time_slot',['10:00 - 11:00','2:00 - 3:00','5:30 - 6:30','7:00 - 8:00']);
            $table->enum('class_type',['HIIT','Step-Dumbell','Zumba','Hips&Abs','Body Pump','Mix Aerobics','Sticks','Core','Trampoline','RB','Circuit Training','Core&Balls','Body Shape','Step','Boxing']);
            $table->boolean('dark_bg')->default(false);
            $table->timestamps();

            //to not have duplicate time slot for the same day
            $table->unique(['day','time_slot']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_classes');
    }
};
