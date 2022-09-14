<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKensa extends Model
{
    use HasFactory;

    protected $table = 'masterdata';
    protected $fillable = [
        'qty_trolly', 
        'bagian', 
        'next_process', 
        'model',
    ];
}
