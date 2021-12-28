<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = ['status'];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
