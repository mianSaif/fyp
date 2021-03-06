import Vue from 'vue'
import VueRouter from 'vue-router'
import AppMain from './pages/AppHome.vue';
import LostObject from './pages/LostObject.vue';
import FoundObject from './pages/FoundObject.vue';
import PostObject from './pages/PostObject.vue';
import PostActions from './pages/PostActions.vue';
import Blogs from './pages/Blogs.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Profile from './pages/profile.vue';
import EditProfile from './pages/edit_profile.vue';
import AboutUs from './pages/AboutUs.vue';
import ContactUs from './pages/ContactUs.vue';
Vue.use(VueRouter)

const routes = [
    { path: '/', component: AppMain,  name: 'home'},
    { path: '/lost_object', component: LostObject, name: 'lostObject', props:true},
    { path: '/found_object', component: FoundObject, name: 'found_object' },
    { path: '/blogs', component: Blogs, name: 'blogs' },
    { path: '/post_object', component: PostObject, name: 'postObject', props:true },
    { path: '/post_actions', component: PostActions, name: 'postActions', props: true },
    { path: '/login', component: Login, name: 'login' },
    { path: '/register', component: Register, name: 'register'},
    { path: '/profile', component: Profile, name: 'profile'},
    { path: '/edit_profile', component: EditProfile, name: 'edit_profile'},
    { path: '/about_us', component: AboutUs, name: 'about_us'},
    { path: '/contact_us', component: ContactUs, name: 'contact_us'},
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: "history"
})


export default router
