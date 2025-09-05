<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // thread and tag has many relationship
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'thread_has_tags');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function threadCommunty(){
        return $this->belongsTo(Community::class);
    }
}
