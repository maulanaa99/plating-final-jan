<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $fillable = [
        'tgl_kanban',
        'waktu_kanban',
        'id_masterdata',
        'no_part',
        'part_name',
        'model',
        'bagian',
        'no_kartu',
        'next_process',
        'kirim_painting',
        'kirim_assy',
        'kirim_ppic',
        'std_qty',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getTotal()
    {
        return $this->kirim_painting + $this->kirim_assy + $this->kirim_ppic ;
    }

    public function pengirimans()
    {
        return $this->hasMany(Pengiriman::class,'id_masterdata','id');
    }
}
