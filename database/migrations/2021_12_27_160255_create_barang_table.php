<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->string('nama_barang');
            $table->string('deskripsi_barang');
            $table->integer('harga_barang');
            $table->string('gambar');
            $table->bigInteger('id_kategori')->unsigned();
            $table->timestamps();

            $table->foreign('id_kategori')
            ->references('id_kategori')
            ->on('kategori')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
