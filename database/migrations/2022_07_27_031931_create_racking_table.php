<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racking', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->integer('no_bar');
            $table->string('part_name');
            $table->date('waktu_in');
            $table->dateTime('tgl_lot_prod_mldg');
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
        Schema::dropIfExists('racking');
    }
}
