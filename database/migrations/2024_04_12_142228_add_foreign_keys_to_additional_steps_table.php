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
        Schema::table('additional_steps', function (Blueprint $table) {
            $table->foreign(['product_id'], 'additional_steps_ibfk_1')->references(['id'])->on('products')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['vendor_id'], 'additional_steps_ibfk_2')->references(['id'])->on('vendors')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('additional_steps', function (Blueprint $table) {
            $table->dropForeign('additional_steps_ibfk_1');
            $table->dropForeign('additional_steps_ibfk_2');
        });
    }
};
