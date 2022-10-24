<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
    	'id_barang',
    	'jenis_transaksi',
    	'jumlah_barang'
    ];

    public function getNamaBarang(){
    	return $this->hasOne(Barang::class, 'id', 'id_barang');
    }
}
