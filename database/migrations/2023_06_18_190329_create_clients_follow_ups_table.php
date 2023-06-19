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
        Schema::create('clients_follow_ups', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->dateTimeTz('next_follow_up_time', $precision = 0)->nullable();
            $table->integer('sub_category_id');
            $table->text('follow_up_message');
            $table->text('follow_up_by');
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
        Schema::dropIfExists('clients_follow_ups');
    }
};
