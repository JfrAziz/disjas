<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $table = "import";

    protected $dates = ['month'];

    protected $casts = [
        'month' => 'date:Y-m-d',
        'migas' => 'integer',
        'non_migas' => 'integer',
        'import' => 'integer',
        'total' => 'integer'
    ];

    protected $fillable = [
        'migas', 'non_migas', 'total', 'month'
    ];
}
