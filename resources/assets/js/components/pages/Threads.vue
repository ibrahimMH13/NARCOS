<script>
    import Replies from '../Replies.vue';
    export default {
        props:['init_replies_count'],
        components:{ Replies },
        data(){
          return{

              replyCount:this.init_replies_count
          }
        }
    }
</script>