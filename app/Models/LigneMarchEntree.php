<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneMarchEntree extends Model
{
    use HasFactory;

    protected $table ='lignemarchentree';

    protected $fillable =
    [
        'produit', 'qteentree', 'marchentree_id'
    ];
}
