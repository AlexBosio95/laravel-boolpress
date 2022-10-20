<template>
    <div>
        <form @submit.prevent="getNewContact">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" v-model="email">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" v-model="message"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'ContactsPage',
    data () {
        return{
            name: '',
            email: '',
            message: '',
        }
    },
    methods: {
        getNewContact(){
            axios.post('/api/contacts', {
                'name': this.name,
                'email': this.email,
                'message': this.message
            }).then((response) => {
                console.log(response);
            });
        }

    }
}
</script>

<style>

</style>