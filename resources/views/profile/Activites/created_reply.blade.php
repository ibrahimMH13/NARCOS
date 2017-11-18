@component('profile.Activites.activite')
    @slot('heading')
        {{$profile->name}} replied On post
        <strong>
            <a href="/{{$activity->subject->thread->path()}}">{{$activity->subject->body}}</a>
        </strong><br>
        <span class="flex">
            <a href="#">
            <small>{{'  '.$activity->created_at->diffForHumans()}}
</small>
            </a>
        </span>

    @endslot
    @slot('body')

    @endslot
@endcomponent
