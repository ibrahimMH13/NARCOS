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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profiles</div>

                    <div class="panel-body">


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
