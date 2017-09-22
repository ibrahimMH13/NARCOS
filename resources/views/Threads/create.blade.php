@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Thread</div>

                    <div class="panel-body">
                        <div class="col-md-7 col-md-offset-2">
                            {!! Form::open() !!}
                            <div class="form-group">
                                <label for="title">Title</label>
                                {!! Form::text('title',null, ['id'=>"title",'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="body">Post</label>
                                {!! Form::textarea('body',null, ["body"=>"body",'class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Publish',['class' => 'btn btn-default']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
