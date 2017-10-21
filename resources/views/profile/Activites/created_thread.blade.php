@component('profile.Activites.activite')
    @slot('heading')
        {{$profile->name}} Posted New Thread:
        <strong> <a href="/{{$activity->subject->path()}}">{{$activity->subject->title}}</a></strong><br>
        <span class="flex">
           <a href="#">
            <small>{{'  '.$activity->created_at->diffForHumans()}}
</small>
            </a>
        </span>
    @endslot
    @slot('body')
        {{$activity->subject->body}}

    @endslot
@endcomponent