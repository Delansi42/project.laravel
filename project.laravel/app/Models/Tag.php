<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
