<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpMarchEntree extends Model
{
    use HasFactory;
    protected $table = 'tmpmarchentree';
    protected $fillable =
    [
        'nbbox', 'produit', 'idclient','user_id','matricule','chauffeur','cin'
    ];
}
