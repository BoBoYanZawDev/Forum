<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class ReactionType extends Model
{
    protected $guarded = [];

    public function reaction(){
        return $this->hasMany(Reaction::class,'type_id');
    }
}
