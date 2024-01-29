<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bons extends Model
{
    use HasFactory;
    protected $table = 'table_bons';

    protected $fillable =
    [
        'number',
    ];
}
