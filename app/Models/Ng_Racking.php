<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ng_Racking extends Model
{
    use HasFactory;
    protected $table = 'ng_racking';
    protected $fillable = ['tanggal','id_masterdata','part_name','jenis_ng','quantity'];
}
