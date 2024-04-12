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
        Schema::create('polisher_steps', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->string('product_id', 191)->nullable()->index('product_id');
            $table->string('vendor_id')->nullable()->index('vendor_id');
            $table->unsignedBigInteger('polishing_type')->index('polishing_type');
            $table->text('image')->nullable();
            $table->text('details')->nullable();
            $table->float('difference')->nullable();
            $table->float('rate');
            $table->float('Wastage')->nullable();
            $table->float('Payable')->nullable();
            $table->string('status', 191)->default('Active');
            $table->string('polisherbarcode');
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
        Schema::dropIfExists('polisher_steps');
    }
};
