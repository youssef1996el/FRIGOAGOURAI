<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagine extends Model
{
    use HasFactory;
    protected $table='compagnies';
    protected $fillable =
    [
        'name', 'active',
    ];
}
