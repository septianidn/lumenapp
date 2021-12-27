<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('id_transaksi')->unsigned();
            $table->foreign('id_barang')
                ->on('barang')
                ->references('id_barang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_transaksi')
                ->on('transaksi')
                ->references('id_transaksi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('detail_transaksi');
    }
}
