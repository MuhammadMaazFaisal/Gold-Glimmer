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
        Schema::create('stock_details', function (Blueprint $table) {
            $table->id();
            $table->string('s_id')->index('s_id');
            $table->unsignedBigInteger('item_id')->index('item_id');
            $table->string('detail');
            $table->string('price_per');
            $table->integer('quantity')->nullable();
            $table->float('weight')->nullable();
            $table->float('rate');
            $table->float('total_amount');
            $table->bigInteger('barcode');
            $table->softDeletes();
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
        Schema::dropIfExists('stock_details');
    }
};
