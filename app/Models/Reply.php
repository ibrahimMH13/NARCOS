<?php

namespace App\Models;

use App\Favoriteable;
use App\RecordActiviteable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    use Favoriteable , RecordActiviteable;
    protected $guarded =[];
    protected  $with =["user"];


    //RelationShip

    public function path(){

        return "/".$this->thread->path()."#reply-".$this->id;
    }
    // RelatioShip
    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function thread(){

        return $this->belongsTo(Thread::class);
    }


}
