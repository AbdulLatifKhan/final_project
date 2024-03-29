<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'email',
        'password',
        'role',
        'otp'
    ];
    
    protected $attributes = [
        'otp'=>'0'
    ];
}
