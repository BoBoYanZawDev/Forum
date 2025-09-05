<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityUser extends Model
{
    protected $guarded = [];

    public function communityRole(){
        return $this->belongsTo(CommunityUser::class,'role_id');
    }
}
