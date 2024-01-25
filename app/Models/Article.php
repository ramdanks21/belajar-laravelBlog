<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Sluggable;
    // tidak bisa diubah
    protected $guarded = ['id'];

    // membuat relationship
    // * 1 Article hanya dimiliki oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // * 1 article hanya dimiliki oleh 1 Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // * 1 article bisa memiliki banyak tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
            ],
        ];
    }

}
