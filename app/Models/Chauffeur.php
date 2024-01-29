<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $table ='chauffeurs';

    protected $fillable =
    [
       'name', 'cin', 'matricule', 'idclient','iduser','phone'
    ];
}
