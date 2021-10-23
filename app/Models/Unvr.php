<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unvr extends Model
{
    use HasFactory;

    protected $table = "unvr";

    protected $dates = ['tanggal'];

    protected $casts = [
        'tanggal' => 'date:Y-m-d',
        'unvr' => 'decimal:2',
        'rasio' => 'decimal:2',
        'reg_unvr' => 'decimal:2',
        'reg_rasio' => 'decimal:2',
        'spesimen' => 'integer',
    ];

    protected $fillable = [
        'rasio', 'tanggal', 'unvr', 'spesimen', 'reg_unvr', 'reg_rasio'
    ];

}
