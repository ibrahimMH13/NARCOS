@extends('layouts.app')

@section('content')
    <thread-view :init_replies_count="{{$thread->replies_count }}" inline-template>
             <div class="container" style="padding-bottom: 3%">
        <div class="row">
             <div class="col-md-3">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <p style="margin:2%">
                            <strong>Info :</strong>
                        <strong> Publish By
                            <a href="/home/profile/{{$thread->user->name}}">
                                {{$thread->user->name}}
                            </a>
                        </strong>
                        </p>
                     </div>
                    <div class="panel-body">
                    this post has <i v-text="replyCount"></i> {{str_plural("comment",$thread->replies_count) }}
                    </div>

                 </div>
            </div>
            <div class="col-md-7 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <span class="flax">
                                {{ $thread->title }}
                                </span>
                                <sub>
                                    {{$thread->created_at->diffForHumans()}}</sub>
                            </div>
                            </div>
                        <div class="panel-body">
                         {{$thread->body}}
                        </div>
                        @can('update',$thread)
                            <div class="panel-footer">
                                {!! Form::open(["method"=>"delete","url"=>$thread->path()])!!}
                                <button class="btn btn-link"><i class="glyphicon glyphicon-remove" style="color: #dd1144;"></i></button>
                                {!! Form::close() !!}
                            </div>
                        @endcan
                    </div>


                    <replies :data="{{$thread->replies}}" @removed="replyCount--"></replies>

            @if(auth()->check())
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
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

            {{--$replies->links()--}}
        </div>

    </div>
    </thread-view>
@endsection
