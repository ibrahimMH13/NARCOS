<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //


    //RelationShip
    protected $guarded =[];
    public function addFavorite(){

        return  $this->favorite()->create([
            "user_id" =>auth()->user()->id,
            "favorite_id" =>$this->id,
            "favorite_type" =>get_class($this),
        ]);


    }
    // RelatioShip
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function thread(){

        return $this->belongsTo(Thread::class);
    }

    public function favorite(){

        return $this->hasMany(Favorite::class);
    }

}
