<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCaisseVide extends Model
{
    use HasFactory;
    protected $table = 'boncaissevides';

    protected $fillable =
    [
        'number',
        'idcaissevide',
        'idcompanie'
    ];
}
