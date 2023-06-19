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
        Schema::create('curren_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->dateTimeTz('follow_up_time', $precision = 0);
            $table->string('status')->default('false');
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
        Schema::dropIfExists('curren_follow_ups');
    }
};
