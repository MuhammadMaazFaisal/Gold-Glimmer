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
        Schema::table('stone_setter_steps', function (Blueprint $table) {
            $table->foreign(['vendor_id'], 'stone_setter_steps_ibfk_1')->references(['id'])->on('vendors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['product_id'], 'stone_setter_steps_ibfk_2')->references(['id'])->on('products')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stone_setter_steps', function (Blueprint $table) {
            $table->dropForeign('stone_setter_steps_ibfk_1');
            $table->dropForeign('stone_setter_steps_ibfk_2');
        });
    }
};
