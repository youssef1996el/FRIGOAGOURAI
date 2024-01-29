<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCaisseRetour extends Model
{
    use HasFactory;
    protected $table = 'boncaisseretour';

    protected $fillable =
    [
        'number',
    ];
}
