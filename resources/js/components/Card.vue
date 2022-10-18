<template>
    <div class="my-3">
        <div class="card">
            <img :src="cover" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{title}}</h5>
                <p class="card-text">{{content}}</p>
                <p class="card-text"><small class="text-muted">{{category ? category.name : '-'}}</small></p>
                <a href="#" class="btn btn-primary">Read more</a>
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

    }
}
</script>

<style>

</style>