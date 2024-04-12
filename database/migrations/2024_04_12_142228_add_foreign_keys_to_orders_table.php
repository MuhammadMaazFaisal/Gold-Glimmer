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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['vendor_id'], 'orders_ibfk_1')->references(['id'])->on('vendors')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['customer_id'], 'orders_ibfk_2')->references(['id'])->on('customers')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_ibfk_1');
            $table->dropForeign('orders_ibfk_2');
        });
    }
};
