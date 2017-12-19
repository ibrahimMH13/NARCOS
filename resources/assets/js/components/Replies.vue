<template>
       <div>
           <div v-for="(reply,index) in items" :key="reply.id">
               <reply :data="reply" @deleted="removeFromList(index)"></reply>
           </div>
           <new-reply :endPoint="endpint" @created="addIn"></new-reply>
       </div>
</template>
<script>
    import Reply from './Reply.vue';
    import NewReply from './NewReply.vue';
    export default {
        props:['data'],
        components:{ Reply , NewReply },

        data(){
        return{
            items:this.data,
            endpint:location.pathname + '/replies',
            }
        },

        methods:{

            removeFromList(index){
                //remove from this id One Elemnt the meaning remove me frome this shit
                this.items.splice(index,1);
                this.$emit('removed');
            },
            addIn(reply){
              this.items.push(reply);
                this.$emit('added');
            }

        }

    }
</script>