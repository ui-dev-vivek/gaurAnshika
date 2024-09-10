<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'asg_posts';
    protected $fillable = [
        'title',
        'slug',
        'sub_title',
        'body',
        'status',
        'published_at',
        'scheduled_for',
        'cover_photo_path',
        'photo_alt_text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'asg_category_asg_post');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'asg_post_asg_tag');
    }

    public function seoDetails()
    {
        return $this->hasOne(SeoDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
