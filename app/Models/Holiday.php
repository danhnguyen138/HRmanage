<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $table='holiday';
    protected $fillable=[
        'id',
        'holiday_id',
        'user_id',
        'name',
        'position',
        'department',
        'day_start',
        'day_finish',
        'reason',
        'classify',
        'status'
    ];
}
