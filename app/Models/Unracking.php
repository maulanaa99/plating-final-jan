<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unracking extends Model
{
    use HasFactory;

    protected $table = 'plating';
    protected $fillable = ['tanggal','no_bar','no_part','waktu_in'];
}
