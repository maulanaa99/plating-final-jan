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
        'id_masterdata',
        'no_part',
        'part_name',
        'model',
        'bagian',
        'qty_troly',
        'total_kirim',
        'no_kartu',
        'next_process',
        'kirim_painting',
        'kirim_assy',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
