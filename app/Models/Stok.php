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
        'total_kirim',
        'no_kartu',
        'kirim_painting',
        'kirim_assy',
    ];

    public function getTotal(){
        return $this->kirim_painting + $this->kirim_assy + $this->kirim_ppic;
   }

}
