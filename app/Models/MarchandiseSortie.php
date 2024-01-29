<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarchandiseSortie extends Model
{
    use HasFactory;

    protected $table = 'marchandisesortie';

    protected $fillable =
    [
        'totalsortie','idclient', 'iduser','matricule', 'chauffeur','cin','compagnie'
    ];
}
