<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //


    //RelationShip
    protected $guarded =[];
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function thread(){

        return $this->belongsTo(Thread::class);
    }
}
