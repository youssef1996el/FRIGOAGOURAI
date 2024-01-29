<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumlCaisseVide extends Model
{
    use HasFactory;
    protected $table = 'table_cumlcaissevides';

    protected $fillable =
    [
         'dateoperation', 'cuml', 'idclient','nombre','compagnie','idcaissevide'
    ];
}
