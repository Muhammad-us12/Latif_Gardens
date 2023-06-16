<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->float('opening_bal',12);
            $table->float('balance',12);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture');
            $table->string('country');
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('display_on_web')->default(false);
            
            $table->integer('user_id');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('agents');
    }
}
