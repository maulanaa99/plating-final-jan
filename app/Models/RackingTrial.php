<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RackingTrial extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'plating_tr';
}
