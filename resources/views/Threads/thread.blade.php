@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($threads as $thread)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>{{$thread->user->name}} <small>Published  A</small> </p>
                            <a class="btn btn-link" href="{{ $thread->path() }}">
                                {{ $thread->title }}
                            </a>
                            <small>{{$thread->created_at->diffForHumans()}}</small>
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
