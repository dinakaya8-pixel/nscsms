<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $fillable = [
        'badge_number',
        'title',
        'subtitle',
        'description',
        'theme',
        'icon',
        'sort_order',
    ];
}