<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoDetail extends Model
{
    use HasFactory;
    protected $table = 'asg_seo_details';
    protected $fillable = ['post_id', 'title', 'keywords', 'description'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
