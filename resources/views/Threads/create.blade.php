@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Thread</div>

                    <div class="panel-body">
                        @if(count($errors))
                         <ul>
                             @foreach($errors->all() as $er)
                                <li>{{$er}}</li>
                             @endforeach
                         </ul>
                         @endif

                        <div class="col-md-7 col-md-offset-2">
                            {!! Form::open() !!}
                            <div class="form-group">
                                <label for="title">Title</label>
                                {!! Form::text('title',old('title'), ['id'=>"title",'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                 <label for="channel">Category</label>
                                <select id="channel" name="channel_id" class="form-control">
                                    @forelse(\App\Models\Channel::get() as $item)
                                       <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty
                                    <option>No There category yet</option>
                                    @endforelse
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="body">Post</label>
                                {!! Form::textarea('body',old('body'), ["body"=>"body",'class' => 'form-control']) !!}
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
