<reply-template :attrs="{{$reply}}" inline-template>
    <div class="col-md-11 col-md-offset-1" id="reply-{{$reply->id}}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="level">
                <span class="flax">
            <a class="btn btn-link" href="#">{{$reply->user->name}}</a>
                </span>

                    <sub>
                        {{  'Since '.$reply->created_at->diffForHumans()}}
                    </sub>
                </div>

            </div>
        </div>
        <div class="panel-body">
            <div class="level">
                <div class="flax" v-if="editing">
                    <div class="form-group">
                        <textarea class="form-control" v-model="body"></textarea>
                        <button class="btn btn-xs btn-primary" @click="update">Update</button>
                        <button class="btn btn-xs btn-link" @click="editing =false">Cancel</button>
                    </div>
                </div>
                <div class="flax" v-text="body" v-else>
                </div>
                @if(auth()->check())
                <Favorite :reply="{{$reply}}"></Favorite>
                @else
                    <i>Hellow</i>
                @endif
            </div>
        </div>
            </div>
    </div>
</reply-template>