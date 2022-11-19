<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function isRecruit(){
        return $this->has(Recruit::class);
    }

    use HasFactory;
}
