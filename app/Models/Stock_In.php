<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_In extends Model
{
    use HasFactory;
    
    protected $table = 'stokin';
    protected $fillable = [
        'no_stok_in',
        'id_datapart',
        'jml_part_masuk',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
