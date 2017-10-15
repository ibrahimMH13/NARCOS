
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            You reply on
            <p class="level">
                 <span class="flax">
                             <a href="{{$activity->subject->path()}}">
                                 {{$activity->subject->title}}
                             </a>
                    </span>
                <span>
   {{$activity->subject->created_at->diffForHumans()}}
                   </span>
            </p>
            </a>

        </div>
    </div>
</div>
