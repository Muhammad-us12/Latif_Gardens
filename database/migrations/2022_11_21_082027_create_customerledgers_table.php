<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerledgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerledgers', function (Blueprint $table) {
            $table->id();
            $table->float('payment',15)->nullable();
            $table->float('received',15)->nullable();
            $table->float('balance',15);
            $table->float('plot_balance',15);
            $table->integer('payment_id')->nullable();
            $table->integer('recevied_id')->nullable();
            $table->integer('plot_id')->nullable();
            $table->integer('plot_balance_id')->nullable();
            $table->integer('customer_id');
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
        Schema::dropIfExists('customerledgers');
    }
}
