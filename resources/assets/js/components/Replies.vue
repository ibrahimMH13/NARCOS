<template>
       <div>
           <div v-for="(reply,index) in items">
               <reply :data="reply" @deleted="removeFromList(index)"></reply>
           </div>
       </div>
</template>
<script>
    import Reply from './Reply.vue';
    export default {
        props:['data'],
        components:{ Reply },

        data(){
        return{
            items:this.data,
            }
        },

        methods:{

            removeFromList(index){
                //remove from this id One Elemnt the meaning remove me frome this shit
                this.items.splice(index,1);
                this.$emit('removed');
            }
        }

    }
</script>