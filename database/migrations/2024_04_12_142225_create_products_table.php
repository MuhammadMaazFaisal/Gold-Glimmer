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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('vendor_id')->index('vendor_id');
            $table->date('date');
            $table->string('image');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('product_type')->index('product_type');
            $table->integer('quantity');
            $table->string('dimension');
            $table->float('purity');
            $table->string('purity_text');
            $table->float('unpolished_weight');
            $table->float('rate');
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
        Schema::dropIfExists('products');
    }
};
