<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumlMarchandiseEntree extends Model
{
    use HasFactory;
    protected $table = 'table_cumlmarchandiseentree';
    protected $fillable =
    [
        'dateoperation', 'cuml', 'nombre', 'idclient', 'compagnie','idmarchaentre'
    ];
}
