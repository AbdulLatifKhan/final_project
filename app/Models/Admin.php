<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'role',
        'otp'
    ];
    
    protected $attributes = [
        'otp'=>'0'
    ];
}
