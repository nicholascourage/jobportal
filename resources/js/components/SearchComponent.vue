<template>
    <div>
       <input type="text" class="form-control" v-model="keywprd" placeholder="Search Jobs" v-on:keyup="Searchjobs()">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            Searchjobs(){
                
            }
        }
    }
</script>
