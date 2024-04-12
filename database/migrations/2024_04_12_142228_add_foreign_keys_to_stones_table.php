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
        Schema::table('stones', function (Blueprint $table) {
            $table->foreign(['product_id'], 'stones_ibfk_1')->references(['id'])->on('products')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['vendor_id'], 'stones_ibfk_2')->references(['id'])->on('vendors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['item_id'], 'stones_ibfk_3')->references(['id'])->on('inventory_items')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stones', function (Blueprint $table) {
            $table->dropForeign('stones_ibfk_1');
            $table->dropForeign('stones_ibfk_2');
            $table->dropForeign('stones_ibfk_3');
        });
    }
};
