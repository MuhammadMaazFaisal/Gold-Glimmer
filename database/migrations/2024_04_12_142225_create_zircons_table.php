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
        Schema::create('zircons', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('item_id')->index('item_id');
            $table->string('vendor_id')->index('vendor_id');
            $table->string('product_id')->index('product_id');
            $table->float('weight');
            $table->float('price');
            $table->integer('quantity');
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
        Schema::dropIfExists('zircons');
    }
};
