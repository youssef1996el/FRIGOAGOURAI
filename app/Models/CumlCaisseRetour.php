<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumlCaisseRetour extends Model
{
    use HasFactory;
    protected $table = 'table_cumlcaisseretours';

    protected $fillable =
    [
         'dateoperation', 'cuml', 'idclient','nombre','compagnie','idcaissevide'
    ];
}
