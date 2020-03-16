<template>
    <div class="mb-4">
        <button v-if="show" @click.prevent="unsave()" class="btn btn-outline-primary shadow-none" style="width: 100%"><i class="las la-heart mr-2 la-lg text-success"></i> <span class="font-weight-bold">Shortlisted</span></button>
        <button v-else @click.prevent="save()" class="btn btn-outline-primary shadow-none" style="width: 100%"><i class="las la-heart mr-2 la-lg"></i><span class="font-weight-bold">Shortlist</span></button>
    
    </div>
</template>

<script>
    export default {
        props:['jobid', 'favourited'],
        data(){
            return{
                'show':true
            }
        },
        mounted(){

            this.show = this.jobFavourited ? true:false

        },
        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
        methods:{

            save(){

                axios.post('/save/'+this.jobid).then(response=>this.show=true).catch(error=>alert('error'))

            },
            unsave(){

                axios.post('/unsave/'+this.jobid).then(response=>this.show=false).catch(error=>alert('error'))


            }

        }
    }
</script>
