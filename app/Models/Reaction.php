<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    /** @use HasFactory<\Database\Factories\ReactionFactory> */
    use HasFactory;

    protected $guarded = [];

    public function reactionType(){
        return $this->belongsTo(ReactionType::class,'type_id');
    }
}
