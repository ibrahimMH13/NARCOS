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
            @forelse($threads as $thread)
           
                @empty
                <p> No there Activity Yet</p>
            @endforelse
            {{$threads->links()}}
        </div>
    </div>
@endsection
