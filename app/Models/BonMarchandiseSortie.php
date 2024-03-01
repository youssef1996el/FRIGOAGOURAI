<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonMarchandiseSortie extends Model
{
    use HasFactory;
    protected $table = 'bonmarchandisesortie';

    protected $fillable =
    [
        'number',
        'idmarchandisesortie',
        'idcompanie'
    ];
}
