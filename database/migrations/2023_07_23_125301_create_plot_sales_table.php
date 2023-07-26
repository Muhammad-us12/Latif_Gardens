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
        Schema::create('plot_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('location_id');
            $table->integer('society_id');
            $table->integer('block_id');
            $table->integer('plot_id');
            $table->float('plot_cost_price',15);
            $table->float('plot_demand',15);
            $table->float('plot_sale_price',15);
            $table->float('at_booking_perc',15);
            $table->integer('complete_in_years');
            $table->float('sixth_month_inst',15);
            $table->float('at_booking_price',15);
            $table->integer('no_of_6_month_inst');
            $table->integer('no_of_monthly_inst');
            $table->float('monthly_inst_price',15);
            $table->integer('user_id');
            
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
        Schema::dropIfExists('plot_sales');
    }
};
