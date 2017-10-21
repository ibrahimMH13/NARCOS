<?php

namespace App\Models;

use App\Favoriteable;
use App\RecordActiviteable;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
     use RecordActiviteable;
     protected $guarded =[];
    protected $with=['user'];

    //bootable
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::addGlobalScope('replyCount',function ($buider){

            $buider->withCount('replies');
        });

        static::deleting(function($thread){

            $thread->replies()->delete();
        });
     }

    ///
    public function path(){

        return "/threads/{$this->channel->slug}/".$this->id;
    }

    public function getRouteKey()
    {
        return 'title'; // TODO: Change the autogenerated stub
    }

    public function addReply($newReply){

       return $this->replies()->create($newReply);
    }

    public function scopeFilter($query,$filters){
        return $filters->apply($query);
    }

    //this function repliced with the global scope
    public function getCountReply(){
       return $this->replies()->count();
    }
            //RelationShip
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function replies(){

        return $this->hasMany(Reply::class,'thread_id')->withCount('favorite');
    }

    public function channel(){

        return $this->belongsTo(Channel::class);
    }

}
