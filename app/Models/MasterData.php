<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    use HasFactory;

    protected $table = 'masterdata';
    protected $fillable = ['no_part', 'part_name', 'katalis', 'channel', 'grade_color', 'qty_bar', 'stok'];
}
