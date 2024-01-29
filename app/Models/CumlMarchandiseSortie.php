<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumlMarchandiseSortie extends Model
{
    use HasFactory;
    protected $table = 'table_cumlmarchandisesortie';
    protected $fillable =
    [
      'dateoperation', 'cuml', 'nombre', 'idclient', 'compagnie','idmarchasortie'
    ];
}
