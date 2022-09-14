<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class racking_t extends Model
{
    use HasFactory;

    protected $table = 'plating';
    protected $fillable = ['no_part','part_name', 'katalis', 'channel', 'grade_color', 'qty_bar', 'cycle' ,'tanggal_r', 'no_bar', 'waktu_in', 'tgl_lot_prod_mldg'];
    protected $tanggal_r = ['tanggal_r'];
}
