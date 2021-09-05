<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','city', 'airline', 'flight_id', 'arrival', 'user_id'
    ];
}
