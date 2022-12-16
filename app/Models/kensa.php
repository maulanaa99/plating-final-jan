<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kensa extends Model
{
    use HasFactory;

    protected $table = 'kensa';
    protected $fillable = [
        'id_plating', 'tanggal_k', 'waktu_k', 'id_masterdata', 'no_part', 'part_name', 'no_bar', 'qty_bar', 'cycle', 'nikel', 'butsu', 'hadare', 'hage', 'moyo', 'fukure', 'crack',
        'henkei', 'hanazaki', 'kizu', 'kaburi', 'shiromoya', 'shimi', 'pitto', 'misto' , 'other', 'gores', 'regas', 'silver', 'hike', 'burry', 'others', 'total_ok', 'total_ng', 'p_total_ok',
        'p_total_ng', 'created_by', 'updated_by', 'created_at', 'updated_at', 'keterangan'
    ];
}
