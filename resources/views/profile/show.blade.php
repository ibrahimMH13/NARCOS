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


            @forelse($activites as $activity)
          @include("profile.Activites.$activity->type")
                @empty
                <p> No there Activity Yet</p>
            @endforelse
         </div>



    </div>
@endsection
