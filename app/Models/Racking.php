<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racking extends Model
{
    use HasFactory;

    protected $table = 'plating';
    protected $fillable = ['tanggal', 'no_bar', 'part_name', 'waktu_in', 'tgl_lot_prod_mldg'];
}
