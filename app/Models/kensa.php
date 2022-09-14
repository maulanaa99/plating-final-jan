<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kensa extends Model
{
    use HasFactory;

    protected $table = 'kensa';
    protected $primaryKey = 'kensa_id';
    protected $fillable = [
        'tanggal_k', 'id_masterdata', 'no_part', 'part_name', 'no_bar', 'qty_bar', 'cycle', 'nikel', 'butsu', 'hadare', 'hage', 'moyo', 'fukure', 'crack',
        'henkei', 'hanazaki', 'kizu', 'kaburi', 'other', 'gores', 'regas', 'silver', 'hike', 'burry', 'others', 'total_ok', 'total_ng', 'p_total_ok', 'p_total_ng'
    ];
}
