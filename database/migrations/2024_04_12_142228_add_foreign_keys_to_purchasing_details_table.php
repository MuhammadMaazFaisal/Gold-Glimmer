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
        Schema::table('purchasing_details', function (Blueprint $table) {
            $table->foreign(['item_id'], 'purchasing_details_ibfk_1')->references(['id'])->on('inventory_items')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['p_id'], 'purchasing_details_ibfk_2')->references(['id'])->on('purchasings')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasing_details', function (Blueprint $table) {
            $table->dropForeign('purchasing_details_ibfk_1');
            $table->dropForeign('purchasing_details_ibfk_2');
        });
    }
};
