<div class="col-md-6 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-link" href="#">{{$reply->user->name}}</a>
            <sub>{{  'Since '.$reply->created_at->diffForHumans()}}</sub>
        </div>
        <div class="panel-body">
            {{$reply->body}}
        </div>
    </div>
</div>
