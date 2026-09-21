<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'body',
        'image',
        'author',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->orderByDesc('published_at');
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
