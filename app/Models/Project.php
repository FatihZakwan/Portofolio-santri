<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',      // Main Category
        'sub_category',  // Sub Category
        'authors',
        'description',
        'thumbnail',
        'gallery',
    ];

    protected $casts = [
        'authors' => 'array',
        'gallery' => 'array',
    ];
}