import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import AboutUsPage from './pages/AboutUsPage.vue';
import HomePage from './pages/HomePage.vue';
import ContactsPage from './pages/ContactsPage.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },

        {
            path: '/about-us',
            name: 'about-us',
            component: AboutUsPage
        },

        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsPage
        },
    ]
})

export default router;