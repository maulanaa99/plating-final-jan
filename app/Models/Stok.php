<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'masterdata';
    protected $fillable = [
        'total_ok',
        'total_ng',
        'stok',
        'no_kartu',
        'kirim_painting',
        'kirim_assy',
    ];

}
