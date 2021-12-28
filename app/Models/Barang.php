<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'deskripsi_barang', 'harga_barang', 'gambar', 'id_kategori'];

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
