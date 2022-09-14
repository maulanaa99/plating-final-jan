<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plating', function (Blueprint $table) {
            $table->id();
            $table->integer('no_part');
            $table->string('part_name');
            $table->string('katalis');
            $table->integer('channel');
            $table->string('grade_color');
            $table->integer('qty_bar');
            $table->string('cycle');
            $table->date('tanggal_r');
            $table->time('waktu_in_r');
            $table->date('tgl_lot_prod_mldg');
            $table->date('tanggal_u');
            $table->time('waktu_in_u');
            $table->integer('qty_aktual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plating');
    }
}
