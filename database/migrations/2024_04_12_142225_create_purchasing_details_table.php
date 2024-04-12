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
        Schema::create('purchasing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id')->index('p_id');
            $table->unsignedBigInteger('item_id')->index('item_id');
            $table->string('detail');
            $table->string('price_per');
            $table->integer('quantity')->nullable();
            $table->integer('remaining_quantity')->nullable();
            $table->float('weight')->nullable();
            $table->float('remaining_weight')->nullable();
            $table->float('rate');
            $table->float('total_amount');
            $table->float('remaining_total_amount');
            $table->string('barcode');
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
        Schema::dropIfExists('purchasing_details');
    }
};
