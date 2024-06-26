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
            $table->id();
            $table->unsignedBigInteger('item_id')->index('item_id');
            $table->foreignId('stone_setter_step_id')->constrained();
            $table->float('weight');
            $table->float('price')->nullable();
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
