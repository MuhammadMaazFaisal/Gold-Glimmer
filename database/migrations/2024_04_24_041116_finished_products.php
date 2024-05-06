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
        Schema::create('finished_products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('vendor_id'); // Changed to string
            $table->string('product_id'); // Changed to string
            $table->float('weight');
            $table->float('price');
            $table->string('category');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        
            // Define foreign key constraints separately
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('product_id')->references('id')->on('products');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finished_products');
    }
};
