<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintKertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_kertas', function (Blueprint $table) {
            $table->id('id_print');
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
        Schema::dropIfExists('print_kertas');
    }
}
