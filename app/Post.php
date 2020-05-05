<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image()
    {
        // one to one polymorphic relationship
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        // one to many polymorphic relationship
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        // many to many relationship
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
