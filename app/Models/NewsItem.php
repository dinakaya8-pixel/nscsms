<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'category',
        'image_path',
        'is_featured',
        'published_date',
    ];
}
