<template>
    <div class="col-md-11 col-md-offset-1" :id="'reply-'+id">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="level">
                <span class="flax">
            <a class="btn btn-link" :href="'/home/profile/'+data.user.name" v-text="data.user.name"></a>
                </span>

                    <sub>
                         'Since '{{ data.created_at }}
                    </sub>
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
                    <!--

                    @if(auth()->check())
                    {{---
                    {!! Form::open(["url"=>"/replies/$reply->id/favorite"]) !!}
                    <button class="btn btn-default">
                        {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                        <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                    </button>
                    {!! Form::close() !!}

                    --}}
                    <Favorite :reply="{{$reply}}"></Favorite>
                    @else
                    <i class="glyphicon glyphicon-heart" :class="colores"></i>
                    @endif
                    --->
                </div>
            </div>
          <!--
            @can('update',$reply)
            -->
            <div class="panel-footer">
                 <button class="btn btn-link"><i class="glyphicon glyphicon-remove" @click="destory" style="color: #dd1144;"></i></button>
                <i class="btn btn-link glyphicon glyphicon-edit" style="color:#dd1144;" @click="editing = true"></i>
             </div>
            <!--
            @endcan
            --->
        </div>
    </div>
</template>
<script>
    import Favorite from './Favorite.vue';
    export default {

        components:{ Favorite },
        props :['data'],
        data(){

            return {

                editing : false,
                body : this.data.body,
                id : this.data.id,
            }
        },
        methods:{

            update(){

                axios.patch('/replies/'+this.data.id,{
                    body :this.body
                });
                this.editing = false ;
                $(this.$el).fadeOut(500);
            },
            destory(){

                axios.delete('/replies/'+this.data.id);
                this.$emit('deleted',this.data.id);

            }

        }
    }
</script>
