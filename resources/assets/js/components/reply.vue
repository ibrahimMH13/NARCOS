
<script>

    export default {
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
            }
        }
    }
</script>
