<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana_Produksi extends Model
{
    use HasFactory;
    protected $table = 'rencana_produksi';
    protected $fillable = ['tanggal','part_name','channel','qty_bar'];


}
