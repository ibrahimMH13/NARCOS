@extends('layouts.app')

@section('content')
    <div class="container" style="padding-bottom: 3%">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $thread->title }} <sub>{{$thread->created_at->diffForHumans()}}</sub></div>
                        <div class="panel-body">
                         {{$thread->body}}
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
                @forelse($thread->replies as $reply)
                    @include('Threads.reply')
            @empty
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center text-capitalize alert alert-link">
                        NO Reply Yet ,Be First !!
                    </p>
                </div>

            @endforelse
        </div>
        @if(auth()->check())
            <div class="row">
                <div class="col-md-7 col-md-offset-2">
                    {!! Form::open(["url"=>$thread->path()."/replies"]) !!}
                    <textarea class="form-control" name="body" rows="4"placeholder="Do You Have Reply !! Write Some Things About It,, ">

                    </textarea>
                    {!! Form::submit('Reply.!',["class"=>"btn btn-default"]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @else
            <p class="text-capitalize text-center alert alert-dismissible alert-warning">
            <span>Join Us ,Just <a href="">login</a> or <a href="#">Register</a></span>
            </p>
        @endif
    </div>
@endsection
