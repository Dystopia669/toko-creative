<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcs', function (Blueprint $table) {
            $table->id('id_fc');
            $table->foreignId('id_user');
            $table->string('file');
            $table->integer('halaman_awal');
            $table->integer('halaman_akhir');
            $table->integer('jumlah_halaman')->nullable();
            $table->integer('total_harga');
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
        Schema::dropIfExists('fc');
    }
}
