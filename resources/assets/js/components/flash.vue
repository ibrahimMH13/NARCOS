<template>
    <div>
        <strong>
            Success
        </strong>

        <p>
            {{ body }}
        </p>
    </div>
</template>

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
            }
        }
     }
</script>
<style>
    .alertFlash{

        position: fixed;
        right: 14px;
        left:25px;
    }

</style>
