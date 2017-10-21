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

                @forelse($activites as $date=>$activity)
                    <h3>{{$date}}</h3>
                <div class="clearfix"></div>
                    @foreach($activity as $record)
                        @if(view()->exists("profile.Activites.{$record->type}"))
                            @include("profile.Activites.{$record->type}",['activity'=>$record])
                        @else
                            <p>NO Found THe page {{$record->type}}</p>
                        @endif

                    @endforeach
                @empty
                    <p> No there Activity Yet</p>
                @endforelse

            </div>
         </div>
    </div>
@endsection
