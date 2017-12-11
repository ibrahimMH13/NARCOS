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
            <reply-template :attributes="{{$reply}}">
                <div class="panel-body">
                    <div class="level">
                        <div class="flax" v-if="editing">
                          <textarea></textarea>
                        </div>
                        <div class="flax" v-else>
                            {{$reply->body}}
                        </div>

                        @if(auth()->check())
                            {!! Form::open(["url"=>"/replies/$reply->id/favorite"]) !!}
                            <button class="btn btn-default">
                                {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                                <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                            </button>
                            {!! Form::close() !!}
                        @else
                            <span class="btn btn-default">
                                {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                                <i class="glyphicon glyphicon-heart">  </i>
                            </span>

                        @endif
                    </div>

                </div>

            </reply-template>
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
                    {!! Form::open(["url"=>"/replies/$reply->id/favorite"]) !!}
                    <button class="btn btn-default">
                        {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                        <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                    </button>
                    {!! Form::close() !!}
                @else
                    <span class="btn btn-default">
                        {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                        <i class="glyphicon glyphicon-heart">  </i>
                    </span>

                @endif
                </div>
            </div>
            @can('update',$reply)
                <div class="panel-footer">

                    {!! Form::open(["method"=>"delete","url"=>"/replies/$reply->id"])!!}
                    <button class="btn btn-link"><i class="glyphicon glyphicon-remove" style="color: #dd1144;"></i></button>
                    <i class="btn btn-link glyphicon glyphicon-edit" style="color:#dd1144;" @click="editing = true"></i>
                    {!! Form::close() !!}
                </div>

            @endcan
        </div>
    </div>

</reply-template>

