<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneMarchandiseSortie extends Model
{
    use HasFactory;
    protected $table = 'lignemarchandisesortie';

    protected $fillable =
    [
         'qte', 'produit' ,'idmarchandisesortie'
    ];
}
