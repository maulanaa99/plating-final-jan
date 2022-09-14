<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPart extends Model
{
    use HasFactory;

    protected $table = 'datapart';
    protected $fillable = [
        'no_part',
        'nama_part',
        'stok',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
