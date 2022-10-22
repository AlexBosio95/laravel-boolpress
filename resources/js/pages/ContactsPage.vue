<template>
    <div>
        <form @submit.prevent="getNewContact" v-if="!response">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" :class="errors.name?'is-invalid':''" id="name" v-model="name">
                <div v-for="(error, index) in errors.name" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" :class="errors.email?'is-invalid':''" id="email" v-model="email">
                <div v-for="(error, index) in errors.email" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" :class="errors.message?'is-invalid':''" id="message" rows="3" v-model="message"></textarea>
                <div v-for="(error, index) in errors.message" class="invalid-feedback" :key="index">
                    {{error}}
                </div>
            </div>

            <div>
                <button type="submit" :disabled="send" class="btn btn-primary">Submit</button>
            </div>


            <div class="spinner-grow mt-4" role="status" v-if="send">
                <span class="sr-only">Loading...</span>
            </div>

        </form>

        <!-- success mail send view  -->

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
            errors: {},
            success: false,
            send: false,

            response: false,
            messageResponse: 'Message sent correctly',
        }
    },
    methods: {
        getNewContact(){

            this.send = true;

            axios.post('/api/contacts', {

                'name': this.name,
                'email': this.email,
                'message': this.message

            }).then((response) => {
                this.success = (response.data.success);
                this.send = false;
                
                if (this.success) {
                    this.response = true;
                    this.email= '';
                    this.name = '';
                    this.message = '';
                    this.errors = {};

                } else {
                    this.errors = response.data.errors;
                }
            });
        },
        getForm(){
            this.response = false;
            this.email= '';
            this.name = '';
            this.message = '';
        }

    }
}
</script>

<style>

</style>