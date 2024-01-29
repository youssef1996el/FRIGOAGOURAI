<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpMarchandiseSortie extends Model
{
    use HasFactory;

    protected $table ='tmpmarchandisesortie';

    protected $fillable =
    [
        'nbbox', 'produit', 'idclient', 'iduser', 'chauffeur', 'matricule','cin'
    ];
}
