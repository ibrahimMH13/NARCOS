<template>
    <div class="alert alert-warning alert-dismissible msg-flash" role="alert" v-show="show">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Wo0oW !!</strong> {{ body }}.
    </div>

</template><style>
    .alertFlash{

        position: fixed;
        right: 14px;
        left:25px;
    }

</style>
<script>
    export default {
        props:['msg'],
         data(){
            return{

                body:'',
                show:false
            }
        },
        created(){

            if(this.msg){
                this.body=this.msg;
                this.show=true;
                setTimeout(this.show=false,3000);
            }
         },
        method(){


        }
     }
</script>

