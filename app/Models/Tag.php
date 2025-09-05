<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function thread()
    {
        return $this->belongsToMany(Thread::class, 'thread_has_tags');
    }
}
