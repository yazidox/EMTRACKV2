<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailyhour extends Model
{
    use HasFactory;

    protected $table = 'dailyhour';

    protected $fillable = [
        'salarie_id', 'h_arrive', 'h_depart', 'today_date'
    ];
}
