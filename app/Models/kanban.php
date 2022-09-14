<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kanban extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $fillable = ['part_name', 'total_ok', 'total','qty_stock', 'qty_troly', 'no_kartu', 'std_qty', 'next_process'];
}
