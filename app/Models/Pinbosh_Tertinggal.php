<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinbosh_Tertinggal extends Model
{
    use HasFactory;

    protected $table = 'pinbosh_tertinggal';
    protected $fillable = ['tanggal','waktu','id_masterdata','part_name','jumlah'];

}
