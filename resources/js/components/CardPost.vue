<template>
    <div class="my-3">
        <div class="card">
            <img :src="cover" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{title}}</h5>
                <p class="card-text">{{maxLength(content, 100)}}</p>
                <p class="card-text"><small class="text-muted">{{category ? category.name : '-'}}</small></p>
                <router-link :to="{name: 'single-post', params: {slug: slug}}" class="btn btn-primary">Read more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title : String,
        cover : String,
        content : String,
        category : Object,
        slug: String,

    },
    methods:{
        maxLength(string, maxNumber){
            if (string > maxNumber) {
                return string.slice(0, maxNumber) + '...';
            } else {
                return string
            }
        }
    }
}
</script>

<style>

</style>