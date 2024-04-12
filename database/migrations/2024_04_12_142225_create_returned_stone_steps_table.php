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
        Schema::create('returned_stone_steps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('product_id')->index('product_id');
            $table->string('vendor_id')->index('vendor_id');
            $table->float('received_weight');
            $table->float('stone_weight');
            $table->integer('stone_quantity');
            $table->float('total_weight');
            $table->integer('rate');
            $table->float('shruded_quantity');
            $table->float('wastage');
            $table->float('grand_weight');
            $table->float('payable');
            $table->timestamp('date')->useCurrentOnUpdate()->useCurrent();
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
        Schema::dropIfExists('returned_stone_steps');
    }
};
