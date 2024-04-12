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
        Schema::table('stock_details', function (Blueprint $table) {
            $table->foreign(['s_id'], 'stock_details_ibfk_1')->references(['id'])->on('stocks')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['item_id'], 'stock_details_ibfk_2')->references(['id'])->on('inventory_items')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_details', function (Blueprint $table) {
            $table->dropForeign('stock_details_ibfk_1');
            $table->dropForeign('stock_details_ibfk_2');
        });
    }
};
