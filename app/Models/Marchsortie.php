<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marchsortie extends Model
{
    use HasFactory;
    protected $table ='marchsorites';
    protected $fillable =
    [
       'nbbox', 'user_id', 'client_id','reste','matricule','chauffeur','cin','cloturer','compagnie'
    ];
}
