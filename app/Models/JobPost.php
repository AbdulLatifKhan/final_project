<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'title',
        'description',
        'benefit',
        'location',
        'deadline',
        'employer_email',
        'job_category_id',
        'job_skills_id'
    ];
}
