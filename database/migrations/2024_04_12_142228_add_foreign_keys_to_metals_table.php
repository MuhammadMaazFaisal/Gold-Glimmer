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
        Schema::table('metals', function (Blueprint $table) {
            $table->foreign(['vendor_id'], 'metals_ibfk_1')->references(['id'])->on('vendors');
            $table->foreign(['type'], 'metals_ibfk_2')->references(['id'])->on('metal_types')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('metals', function (Blueprint $table) {
            $table->dropForeign('metals_ibfk_1');
            $table->dropForeign('metals_ibfk_2');
        });
    }
};
