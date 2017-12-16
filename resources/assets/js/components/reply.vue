
<script>
    import Favorite from './Favorite.vue';
    export default {

        components:{ Favorite },
        props :['attrs'],
        data(){

            return {

                editing : false,
                body : this.attrs.body,
            }
        },
        methods:{

            update(){

                axios.patch('/replies/'+this.attrs.id,{
                    body :this.body
                });
                this.editing = false ;
                this.$emit('deleted',this.attrs.id);
                $(this.$el).fadeOut(500);
            }
        }
    }
</script>
