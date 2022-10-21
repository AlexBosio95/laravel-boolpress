<template>
    <div>
        <form @submit.prevent="getNewContact" v-if="!response">
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

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


            <div class="spinner-grow mt-4" role="status" v-if="progress">
                <span class="sr-only">Loading...</span>
            </div>

        </form>
        <div v-else class="d-flex justify-content-center flex-wrap">
            <h5 class="text-center mt-4 w-100">{{messageResponse}}</h5>
            <button class="btn btn-primary mt-4" @click="getForm">New message</button>
        </div>
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
            progress: false,
            response: false,
            messageResponse: 'Message sent correctly'
        }
    },
    methods: {
        getNewContact(){
            this.progress = true
            axios.post('/api/contacts', {
                'name': this.name,
                'email': this.email,
                'message': this.message
            }).then((response) => {
                console.log(response.data.success);
                this.response = true
            });
        },
        getForm(){
            this.response = false;
            this.progress = false;
            this.email= '';
            this.name = '';
            this.message = '';
        }

    }
}
</script>

<style>

</style>