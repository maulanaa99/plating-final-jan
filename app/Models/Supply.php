<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $table = 'supplies';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'jumlah', 'harga_beli', 'id_pemasok', 'pemasok',
    ];
}
