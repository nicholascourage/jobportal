<template>
    <div class="mb-4">
        <form @submit="formSubmit">
           <button v-if="show" class="btn btn-success" style="width: 100%" type="submit"><span class="font-weight-bold">Apply</span></button>
            <div v-else class="alert alert-success">
                Application sent successfully.
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        },
        methods:{
            formSubmit(e){

                e.preventDefault();
                axios.post('/applications/'+this.jobid,{

                }).then((response)=>{

                    this.show=false

                });
            }
        }
    }
</script>
