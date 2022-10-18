<template>
    <div class="container">

        <div v-if="loadingPage" class="d-flex justify-content-center">
            <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-else>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="(currentPage == 1) ? 'disabled': '' "><a class="page-link" href="#" @click.prevent="getPagePost(currentPage - 1)">Previous</a></li>
                    <li class="page-item" :class="(currentPage == lastPage) ? 'disabled': '' "><a class="page-link" href="#" @click.prevent="getPagePost(currentPage + 1)">Next</a></li>
                </ul>
            </nav>

            <div class="row">
                <Card v-for="(post, index) in ArrayPosts" :key="index"
                :title = 'post.name'
                :cover = 'post.cover'
                :content = 'post.content'
                :category = 'post.category'
                />
            </div>
        </div>
        

    </div>

</template>

<script>

import Card from '../components/Card.vue'

export default {
    name: 'MainPost',
    components: {
        Card
    },
    data() {
        return{
            ArrayPosts: [],
            currentPage: 1,
            lastPage: null,
            loadingPage: true,
        }
    },
    methods: {
        
        getPagePost(page){
            this.loadingPage = true;

            axios.get('/api/posts', {

                params: {
                        page: page
                    }
            })
            .then((response) => {
                this.ArrayPosts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
                this.loadingPage = false
            });
        }
    },
    mounted(){
        this.getPagePost(1);
    }
}
</script>

<style>

</style>