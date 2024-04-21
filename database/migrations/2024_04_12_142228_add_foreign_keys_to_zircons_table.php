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
        Schema::table('zircons', function (Blueprint $table) {
            $table->foreign(['product_id'], 'zircons_ibfk_1')->references(['id'])->on('products');
            $table->foreign(['vendor_id'], 'zircons_ibfk_2')->references(['id'])->on('vendors');
            $table->foreign(['item_id'], 'zircons_ibfk_3')->references(['id'])->on('inventory_items')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zircons', function (Blueprint $table) {
            $table->dropForeign('zircons_ibfk_1');
            $table->dropForeign('zircons_ibfk_2');
            $table->dropForeign('zircons_ibfk_3');
        });
    }
};
