@component('profile.Activites.activite')
    @slot('heading')
        {{$profile->name}} favorite your reply
        <strong>

        </strong><br>
        <span class="flex">
            <a href="#">
            <small>{{'  '.$activity->created_at->diffForHumans()}}
</small>
            </a>
        </span>

    @endslot
    @slot('body')
        <a href="/{{$activity->subject->favorite->path() }}">
            {{$activity->subject->favorite->body}}
        </a>

    @endslot
@endcomponent
