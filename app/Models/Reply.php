<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //


    //RelationShip
    protected $guarded =['favorite'];
    protected $with=[];


    public function addFavorite(){
        $u=auth()->user()->id;
         if(!$this->favorite()->where('user_id',$u)->exists()){
            return  $this->favorite()->create([
                "user_id" =>$u,
                "favorite_id" =>$this->id,
                "favorite_type" =>get_class($this),
            ]);
        }{
            $this->favorite()->where('user_id',$u)->delete();
        }

    }

    public function isFavorite(){
        return $this->favorite()->where('user_id',auth()->user()->id)->exists();

    }
    // RelatioShip
    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function thread(){

        return $this->belongsTo(Thread::class);
    }

    public function favorite(){

        return $this->morphMany(Favorite::class,'favorite');
    }

}
