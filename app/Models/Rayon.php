<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $table = 'rayon';
    protected $fillable = ['nama_rayon','pemray'];

}