<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'otp'
    ];
    
    protected $attributes = [
        'otp'=>'0'
    ];

}
