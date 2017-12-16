<template>
    <button :class="classes" @click="toggle">
        <i class="glyphicon glyphicon-heart" :class="colores"></i>
        <i v-text="count"></i>
    </button>
</template>
<script>

    export default {
        props:['reply'],

        data(){
            return {
                isFavorited:this.reply.isFavorite,
                count:this.reply.favorite_count? this.reply.favorite_count:""

            }
        },
        computed:{
            classes(){
                return ['btn btn-default'];
            },
            colores(){
                return [this.isFavorited?"acitve":"inactive"];
            }
        },
        methods:{

            toggle(){

                if(this.isFavorited){
                    axios.delete('/replies/'+this.reply.id+'/favorite');
                    this.isFavorited = false;
                    this.count--;

                }else{
                    this.isFavorited = true;
                    axios.post('/replies/'+this.reply.id+'/favorite');
                    this.isFavorited = true;
                    this.count ++;
                }
            }
        }

    }

</script>
<style>
    .acitve{

        color: red;
    }
    .inactive{

        color: #9BA2AB;
    }
</style>