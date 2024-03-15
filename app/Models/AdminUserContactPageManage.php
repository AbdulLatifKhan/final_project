<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserContactPageManage extends Model
{
    protected $fillable = [
        'title',
        'bannerImg',
        'address',
        'phoneNumber',
        'email',
    ];
}
