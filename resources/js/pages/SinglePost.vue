<template>
    <div>
        <div v-if="post" class="py-5">
            <h3 class="card-title text-center">{{post.name}}</h3>
            <h5>{{(post.category) ? post.category.name : ''}}</h5>
            <div class="btn-group btn-group-sm mb-3" role="group" aria-label="Basic example">
                <button v-for="(tag, index) in post.tags" :key="index" type="button" class="btn btn-secondary">#{{tag.name}}</button>
            </div>
            <div class="card">
            <img :src="post.cover" :alt="post.name" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">{{post.content}}</p>
                </div>
            </div>
            <div class="mt-4">
                <router-link class="btn btn-primary" :to="{name: 'home'}">Back</router-link>
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
    </div>

</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return{
            post: null,
            message: '',
        }
    },
    methods: {
        getViewPost(){
            const slug = this.$route.params.slug;
            axios.get('/api/posts/' + slug)
                .then((response) => {
                    console.log(response);
                    this.post = response.data.results;
                    console.log(this.post);
                }).catch(function (error){
                    console.log(error);
                })
        },

        timerNoPost(){
            if (this.post == null) {
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