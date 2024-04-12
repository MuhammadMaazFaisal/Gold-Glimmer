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
        Schema::create('additional_steps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('product_id')->index('product_id');
            $table->string('vendor_id')->index('vendor_id');
            $table->string('type', 191)->nullable();
            $table->string('amount', 191)->nullable();
            $table->string('date');
            $table->string('status', 191)->default('Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_steps');
    }
};
