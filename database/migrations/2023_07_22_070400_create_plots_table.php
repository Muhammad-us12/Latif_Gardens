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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_no')->unique();
            $table->integer('location_id');
            $table->integer('society_id');
            $table->integer('block_id');
            $table->integer('marala_type');
            $table->string('state_type');
            $table->float('plot_cost_price',15);
            $table->float('plot_sale_price',15);
            $table->string('status')->default('Not Sale');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('plots');
    }
};
