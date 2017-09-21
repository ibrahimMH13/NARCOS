@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($threads as $treads)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $treads->title }}</div>

                        <div class="panel-body">
                            {{ $treads->body }}
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
