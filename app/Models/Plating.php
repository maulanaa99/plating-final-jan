<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plating extends Model
{
    use HasFactory;

    protected $table = 'plating';
    protected $fillable = ['id_masterdata', 'no_part', 'part_name', 'katalis', 'channel', 'grade_color', 'qty_bar', 'cycle', 'tanggal_r',
                            'no_bar', 'waktu_in_r', 'tgl_lot_prod_mldg', 'tanggal_u', 'waktu_in_u', 'qty_aktual'];
}
