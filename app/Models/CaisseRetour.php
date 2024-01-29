<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaisseRetour extends Model
{
    use HasFactory;
    protected $table = 'caisseretour';
    protected $fillable =
    [
        'nbbox', 'chauffeur', 'matricule', 'idclient', 'iduser','cin','compagnie'
    ];
}
