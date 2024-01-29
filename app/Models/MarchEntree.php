<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarchEntree extends Model
{
    use HasFactory;
    protected $table ='marchentree';

    protected $fillable =
    [
        'totalentree', 'user_id', 'client_id', 'matricule', 'chauffeur','cin','compagnie'
    ];
}
