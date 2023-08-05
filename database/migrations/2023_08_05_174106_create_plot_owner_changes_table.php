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
        Schema::create('plot_owner_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('plot_id');
            $table->integer('prev_owner_id');
            $table->integer('new_owner_id');
            $table->integer('plot_balance_id');
            $table->float('plot_sale_price');
            $table->float('plot_balance');
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
        Schema::dropIfExists('plot_owner_changes');
    }
};
