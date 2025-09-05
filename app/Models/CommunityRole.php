<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityRole extends Model
{
    protected $guarded = [];

    public function communityUser(){
        return $this->hasMany(CommunityUser::class,'role_id');
    }
}
