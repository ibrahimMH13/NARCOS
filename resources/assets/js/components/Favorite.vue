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
                count:this.reply.favorite_count? this.reply.favorite_count:"",

            }
        },
        computed:{
            classes(){
                return ['btn btn-default'];
            },
            colores(){
                return [this.isFavorited?"acitve":"inactive"];
            },
            endpoint(){
                return '/replies/'+this.reply.id+'/favorite';
            },
        },
        methods:{
            remove() {
                axios.delete(this.endpoint);
                this.isFavorited = false;
                this.count--;
            },
            add(){
                this.isFavorited = true;
                axios.post(this.endpoint);
                this.isFavorited = true;
                this.count ++;
            },
            toggle(){
             this.isFavorited?this.remove():this.add();
            },

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