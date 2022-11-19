<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    protected $table='user_information';
    protected $fillable = [
        'id',
        'name',
        'email',
        'birth_date',
        'gender',
        'address',
        'state',
        
        'pin_code',
        'phone_number',
        'department',
        'position',
        'salary_id'
  
    ];
   
}
