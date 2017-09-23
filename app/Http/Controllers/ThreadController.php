<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;
use App\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
    }

    public function index(Channel $channel)
    {
        //
        if($channel->exists)
            $threads = $channel->thread();
         else
            $threads = Thread::latest();
        if($username = request("by")){
           $user =User::where('name',$username)->firstOrFail();
           $threads->where('user_id',$user->id);
        }
        $threads = $threads->get();
        return view('Threads.thread',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[
            "title" =>"required",
             "body" =>"required"
        ]);
       $thread = Thread::create([
           "user_id" =>auth()->user()->id,
           "title" => $request->title,
           "body" => $request->body,
           "channel_id" => $request->channel_id
       ]);
      return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channel_id,Thread $thread)
    {
        //

        return view('Threads.show',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
