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
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign(['o_id'], 'order_details_ibfk_1')->references(['id'])->on('orders')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['p_id'], 'order_details_ibfk_2')->references(['id'])->on('products')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_ibfk_1');
            $table->dropForeign('order_details_ibfk_2');
        });
    }
};
