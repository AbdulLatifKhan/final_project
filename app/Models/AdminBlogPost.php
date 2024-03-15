<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBlogPost extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'featured_image',
        'admin_blog_category_id',
    ];
}
