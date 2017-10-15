
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            You reply on
            <a href="{{$activity->subject->thread->path()}}">
                {{$activity->subject->thread->title}}
            </a>

            <p class="level">
                 <span class="flax">
                             <span>
                                 {{$activity->subject->body}}
                             </span>
                    </span>
                <span>
   {{$activity->subject->thread->created_at->diffForHumans()}}
                   </span>
            </p>
            </a>

        </div>
    </div>
</div>
