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
        Schema::table('polisher_steps', function (Blueprint $table) {
            $table->foreign(['vendor_id'], 'polisher_steps_ibfk_1')->references(['id'])->on('vendors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['product_id'], 'polisher_steps_ibfk_2')->references(['id'])->on('products')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['polishing_type'], 'polisher_steps_ibfk_3')->references(['id'])->on('polishing_types')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polisher_steps', function (Blueprint $table) {
            $table->dropForeign('polisher_steps_ibfk_1');
            $table->dropForeign('polisher_steps_ibfk_2');
            $table->dropForeign('polisher_steps_ibfk_3');
        });
    }
};
