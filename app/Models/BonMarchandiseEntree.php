<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonMarchandiseEntree extends Model
{
    use HasFactory;
    protected $table = 'bonmarchandiseentree';

    protected $fillable =
    [
        'number',
    ];
}
