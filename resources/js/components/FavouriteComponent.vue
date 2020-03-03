<template>
    <div>
        <button v-if="show" class="btn btn-primary" style="width: 100%">Save</button>
        <button v-else class="btn btn-dark" style="width: 100%">Unsave</button>
    
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        }
    }
</script>
