<template>
    <div>
        <comment-modal></comment-modal>
        <chat v-if="chatActive"></chat>
        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="assets/img/logo/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->
        <header>
            <!-- Header Start -->
            <div class="header-area header-transparrent">
                <div class="headder-top header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-2">
                                <!-- Logo -->
                                <div class="logo">
                                    <router-link to="/"><img src="assets/img/logo/logo.png" alt=""></router-link>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="menu-wrapper">
                                    <!-- Main-menu -->
                                    <div class="main-menu">
                                        <nav class="d-none d-lg-block">
                                            <ul id="navigation">
                                                <li>
                                                    <router-link to="/">Home</router-link>
                                                </li>
                                                <li class="z-style"><a href="javascript:void(0)">News Feed</a>
                                                    <ul class="submenu">
                                                        <li><router-link to="/lost_object">Lost Object</router-link></li>
                                                        <li><router-link to="/found_object">Found Object</router-link></li>
                                                    </ul>
                                                </li>
                                                    <li v-if="$store.state.isLoggedIn"  class="z-style"><a href="javascript:void(0)">Post Actions</a>
                                                        <ul class="submenu">
                                                            <li><router-link to="/post_object">Post Object</router-link></li>
                                                            <li><router-link to="/post_actions">Posted Objects</router-link></li>
                                                        </ul>
                                                    </li>
                                                    <li v-if="$store.state.isLoggedIn"  class="z-style">
                                                        <a href="javascript:void(0)">Notification<span class="badge badge-primary ml-1">{{ count_notifications }}</span></a>
                                                        <ul class="submenu submenu-ul" id="drop-width">
                                                            <li v-for="value in comments"class="submenu-li">
                                                                <a href="javascript:void(0)" @click.prevent="activeComment(value.post_id,value.post_type)">
                                                                    <div class="user-name">
                                                                        <p class="user-message">
                                                                            <strong>{{value.name}} </strong>commented on your post
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li v-if="$store.state.isLoggedIn"  class="z-style"><a href="#">Messages</a>
                                                        <ul class="submenu submenu-ul" id="drop-width">
                                                            <li v-for="value in inbox.data"class="submenu-li">
                                                                <a href="javascript:void(0)" @click.prevent="activeChat(value.id)">
                                                                    <div class="img-div"><img class="img-tag"
                                                                                              :src="`assets/img/chat/${value.image}`"
                                                                                              alt=""></div>
                                                                    <div class="user-name">
                                                                        <span class="name"> {{value.name}}</span>
                                                                        <p v-if="value.status == 1" class="user-message">
                                                                            {{ value.message }}
                                                                        </p>
                                                                        <p v-else class="user-message">
                                                                            <strong>{{ value.message }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <div v-else style="display: inline-block">
                                                    <li class="z-style">
                                                        <router-link to="/blogs">Blogs</router-link>
                                                    </li>
                                                    <li class="z-style">
                                                        <router-link to="/contact_us">Contact Us</router-link>
                                                    </li>
                                                    <li class="z-style">
                                                        <router-link to="/about_us">About Us</router-link>
                                                    </li>
                                                </div>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    <div v-if="$store.state.isLoggedIn" class="header-btn d-none f-right d-lg-block">
                                        <router-link to="/profile" class="btn head-btn1">{{ $userName }}</router-link>
                                        <a href="javascript:void(0)" @click="logout" class="btn head-btn2">Logout</a>
                                    </div>
                                    <div v-else class="header-btn d-none f-right d-lg-block">
                                        <router-link to="/register" class="btn head-btn1">Register</router-link>
                                        <router-link to="/login" class="btn head-btn2">Login</router-link>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>
    </div>
</template>

<script>
import chat from '../components/ChatArea';
import CommentModal from '../components/CommentArea';
import {mapMutations} from "vuex";
import {EventBus} from '../app';
export default {
    name: "Header.vue",
    data() {
       return {
           chatActive : true,
           inbox : [],
           count_notifications : 0,
           comments : 0,
       }
    },
    components: {
        chat,
        CommentModal
    },
    mounted() {
        this.getNotifications();
        EventBus.$on('getNotifications',data=> {
            this.getNotifications();
        }),
        axios.get('/get_inbox')
            .then((result) => {
                console.log(JSON.parse(JSON.stringify(result.data)));
                this.inbox = result;
            })
            .catch( (error) => {
                console.log(error);
            })
    },
    methods : {
        ...mapMutations(["updateChatStatus"]),
    activeChat(user_id) {
            this.updateChatStatus({active:true,id:user_id});
            this.$emit('fetch_messages',user_id)
        },
        logout() {
            axios.get('/logout')
                .then((result) => {
                   if(result.status === 200) {
                       // EventBus.$emit("loadHeader",1);
                        window.location.href = "/";
                   }
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        getNotifications() {
            axios.get('/getNotifications')
                .then((result) => {
                    console.log(result);
                    if(result.status === 200) {
                        this.count_notifications = result.data.count;
                        this.comments = result.data.comment;
                    }
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        updateCommentSeen(post_id,status) {
            axios.post('/updateCommmentSeen',{post_id:post_id,status:status})
                .then((response) => {

                })
                .catch((error) => {
                    console.log(error);
                })
        },
        activeComment(post_id,type) {
            if (type == 0) {
                EventBus.$emit('activeCommentInLost',post_id);
            }else {
                EventBus.$emit('activeCommentInFound',post_id);
            }
            this.updateCommentSeen(post_id,1);
            this.getNotifications();
        },

    }
}
</script>

<style scoped>
.z-style {
    z-index: 10000 !important;
}
</style>
