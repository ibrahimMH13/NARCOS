<div class="col-md-6 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-link" href="#">{{$reply->user->name}}</a>
            {{'Since '.$reply->created_at->diffForHumans()}}
        </div>
        <div class="panel-body">
            {{$reply->body}}
        </div>
    </div>
</div>
