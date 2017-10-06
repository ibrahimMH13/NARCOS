@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="level">
                 <h2 class="flax">
                {{$profile->name}}
                 </h2>
                    <p>
                        {{$profile->created_at->diffForHumans()}}
                    </p>
                </div>
            </div>
            @forelse($profile->thread as $thread)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     <a href="{{$thread->path()}}">
                         <p class="level">
                            <span class="flax">
                                  {{$thread->title}}
                            </span>
                             <span>
                                {{$thread->created_at->diffForHumans()}}
                            </span>
                         </p>
                     </a>

                    </div>
                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
                @empty
                <p> No there Activity Yet</p>
            @endforelse
        </div>
    </div>
@endsection
