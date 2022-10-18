<template>
    <div>
        <Header />
        <MainPost />
    </div>
</template>

<script>

    import Header from '../components/Header.vue';
    import MainPost from '../components/MainPost.vue';

        export default {
            name: 'App',
            components: {
                Header, MainPost
            }
        }
</script>

<style>

</style>