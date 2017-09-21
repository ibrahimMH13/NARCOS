@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $thread->title }}</div>
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
        <div class="row">
            <form action="" >

            </form>
        </div>
    </div>
@endsection
