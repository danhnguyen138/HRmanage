<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;
    protected $table='recruits';
    protected $fillable=[
        'title',
        'description'
    ];
   
}
