<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unracking_t extends Model
{
    use HasFactory;

    protected $table = 'plating';
    protected $fillable = ['tanggal_u','waktu_in_u','qty_aktual'];
}
