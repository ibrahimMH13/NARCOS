@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($threads as $thread)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>{{$thread->user->name}} <small>Published  A</small> </p>
                            <div class="level">
                                <h5 class="flax"><a class="btn btn-link" href="{{ $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </h5>
                                <strong>
                                    {{ $thread->replies_count.' '.str_plural('Reply',$thread->replies_count) }}
                                </strong>
                             </div>

                            <sub>{{$thread->created_at->diffForHumans()}}</sub>
                        </div>

                        <div class="panel-body">
                            {{ $thread->body }}
                        </div>
                    </div>
                </div>
             @empty
                <div class="col-md-8 col-md-offset-2">
                    <p class="alert alert-danger">No There Threads yet</p>
                </div>
             @endforelse
        </div>
    </div>
 @endsection
