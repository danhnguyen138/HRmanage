<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
  
    use HasFactory;
    protected $table='salary';
    protected $fillable=[
        'salary_id',
        'user_id',
        'mouth_salary',
        'work_day',
        'basic_salary',
        'allowance',
        'fee_payable',
        'money_received',
        'day_check',
        'note'
    ];
}
