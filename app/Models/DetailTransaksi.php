<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = ['id_transaksi', 'id_barang'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }

}
