<template>

    <div>
        <div v-if="loginIN">
            <div class="col-md-6 col-md-offset-1">

                     <textarea
                             class="form-control"
                             name="body"
                             rows="4"
                             v-model="body"
                             placeholder="Do You Have Reply !! Write Some Things About It,, ">

                    </textarea>
                <input type="submit" value="Reply" @click="addNewReply" class="btn btn-default">
            </div>
        </div>
       <div v-else>
           <p class="text-capitalize text-center alert alert-dismissible alert-warning">
               <span>Join Us ,Just <a href="">login</a> or <a href="#">Register</a></span>
           </p>
       </div>

    </div>

</template>
<script>
    export default {

    props:['endPoint'],
    data(){
        return{
         body:'',
        }
    },
    computed:{
        loginIN(){
          return window.App.singIn;

        },
     },
     methods:{
            addNewReply(){
                axios.post(this.endPoint,{body:this.body})
                    .then(({data})=>{
                        this.body ='';
                        this.$emit('created',data);
                    });
             }
     }
    }
</script>