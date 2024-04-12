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
        Schema::table('returned_manufacturing_steps', function (Blueprint $table) {
            $table->foreign(['place_id'], 'returned_manufacturing_steps_ibfk_1')->references(['id'])->on('places')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('returned_manufacturing_steps', function (Blueprint $table) {
            $table->dropForeign('returned_manufacturing_steps_ibfk_1');
        });
    }
};
