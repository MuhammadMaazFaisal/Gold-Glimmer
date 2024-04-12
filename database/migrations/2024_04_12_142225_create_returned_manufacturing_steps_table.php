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
        Schema::create('returned_manufacturing_steps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->float('polish_weight')->nullable();
            $table->float('wastage')->nullable();
            $table->float('unpure_weight')->nullable();
            $table->float('pure_weight')->nullable();
            $table->string('status', 191)->default('Active');
            $table->float('tValues');
            $table->integer('place_id')->index('place_id');
            $table->string('barcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returned_manufacturing_steps');
    }
};
