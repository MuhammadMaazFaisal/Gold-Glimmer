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
        Schema::create('metals', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('vendor_id')->index('vendor_id');
            $table->unsignedBigInteger('type')->index('type');
            $table->string('details')->nullable();
            $table->float('issued_weight');
            $table->float('purity');
            $table->float('pure_weight');
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
        Schema::dropIfExists('metals');
    }
};
