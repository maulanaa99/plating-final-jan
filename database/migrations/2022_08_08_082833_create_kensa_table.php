<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKensaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kensa', function (Blueprint $table) {
            $table->integer('kensa_id');
            $table->string('no_part');
            $table->string('part_name');
            $table->integer('no_bar');
            $table->integer('qty_bar');
            $table->string('cycle');
            $table->integer('nikel')->nullable();
            $table->integer('butsu')->nullable();
            $table->integer('hadare')->nullable();
            $table->integer('hage')->nullable();
            $table->integer('moyo')->nullable();
            $table->integer('fukure')->nullable();
            $table->integer('crack')->nullable();
            $table->integer('henkei')->nullable();
            $table->integer('hanazaki')->nullable();
            $table->integer('kizu')->nullable();
            $table->integer('kaburi')->nullable();
            $table->integer('other')->nullable();
            $table->integer('gores')->nullable();
            $table->integer('regas')->nullable();
            $table->integer('silver')->nullable();
            $table->integer('hike')->nullable();
            $table->integer('burry')->nullable();
            $table->integer('others')->nullable();
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
        Schema::dropIfExists('kensa');
    }
}
