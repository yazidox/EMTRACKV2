<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'poste', 'salaire_h','adresse','phone','nb_hour','restaurant_id','abs_hour','declarer'
    ];
}
