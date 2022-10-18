<template>
    <div v-if="success">
        <h5 class="card-title text-center">{{PostArray.name}}</h5>
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{PostArray.content}}</p>
            </div>
        </div>
    </div>
    <div v-else class="d-flex justify-content-center">
        <div v-if="(message == '')" class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div v-else>
            <h1 class="text-center">{{message}}</h1>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return{
            PostArray: [],
            success: true,
            message: '',
        }
    },
    methods: {
        getViewPost(){
            this.success = false
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
                .then((response) => {
                    if (response.data.success) {
                        this.PostArray = response.data.results;
                        this.success = true;
                    } else {
                        this.success = false;
                    }
                })
        },
        timerNoPost(){
            if (this.success == false) {
                setTimeout(() =>{
                    this.message = 'Post Not Found'
                }, 2000)
            }
        }
    },
    mounted() {
        this.getViewPost();
        this.timerNoPost();
    }
}
</script>

<style>

</style>