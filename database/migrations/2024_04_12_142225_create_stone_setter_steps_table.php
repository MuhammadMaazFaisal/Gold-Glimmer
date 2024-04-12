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
        Schema::create('stone_setter_steps', function (Blueprint $table) {
            $table->integer('Ssid', true);
            $table->string('product_id')->index('product_id');
            $table->timestamp('date')->nullable();
            $table->string('vendor_id')->nullable()->index('vendor_id');
            $table->text('image')->nullable();
            $table->string('detail', 200)->nullable();
            $table->float('retained_weight');
            $table->float('total_weight');
            $table->float('Issued_weight')->nullable();
            $table->float('z_total_weight')->nullable();
            $table->integer('z_total_quantity')->nullable();
            $table->float('s_total_weight')->nullable();
            $table->integer('s_total_quantity')->nullable();
            $table->float('grand_weight');
            $table->string('status', 191)->default('Active');
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
        Schema::dropIfExists('stone_setter_steps');
    }
};
