<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('admin_id')->nullable();
            $table->integer('menu_id');
            $table->enum('status',['pending','complete'])->default('pending');
            $table->enum('priority',['high','medium','low'])->default('low');
            $table->string('attachment')->nullable();
            $table->string('note')->nullable();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
