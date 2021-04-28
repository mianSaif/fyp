<template>
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="one">
                        <h1>Lost Object Posts</h1>
                    </div>
                </div>
                <div class="offset-2 col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <div v-for="post in posts" class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="#"><img width="100" :src="`/PostObjectImages/${post.image}`" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>{{ post.title }}</h4>
                                        </a>
                                        <p class="description">{{ post.description }}.</p>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ post.name }}, {{ post.city_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <router-link :to="{ name: 'lostObject', params: { post_id:post.post_id,single_post: true} }"><i class="fa fa-eye"></i></router-link>
                                    <router-link :to="{ name: 'postObject', params: { post_id:post.post_id} }"><i class="fa fa-pencil-alt"></i></router-link>
                                    <a href="javascript:void(0)" @click.prevent="delete_post(post.post_id)"><i class="fa fa-trash"></i></a>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {EventBus} from "../app";

export default {
    name: "PostActions",
    data() {
        return {
            posts : [],
        }
    },
    mounted() {
        this.my_posts(0);
    },
    methods : {
        my_posts(type) {
            axios.post('/my_posts',{post_type:type})
                .then((result) => {
                    console.log(result);
                    this.posts = result.data;
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        delete_post(post_id) {
            axios.post('/delete_post',{post_id:post_id})
                .then((result) => {
                    console.log(result);
                    if (result.status === 200) {
                        this.my_posts(0);
                    }
                })
                .catch( (error) => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>
h1 {
    position: relative;
    padding: 0;
    margin: 0;
    font-family: "Raleway", sans-serif;
    font-weight: 300;
    font-size: 40px;
    color: #010B1D;
    -webkit-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.one h1 {
    text-align: center;
    text-transform: uppercase;
    padding-bottom: 5px;
}
.one h1:before {
    width: 28px;
    height: 5px;
    display: block;
    content: "";
    position: absolute;
    bottom: 3px;
    left: 50%;
    margin-left: -14px;
    background-color: #FB246A;
}
.one h1:after {
    width: 100px;
    height: 1px;
    display: block;
    content: "";
    position: relative;
    margin-top: 25px;
    left: 50%;
    margin-left: -50px;
    background-color: #FB246A;
}
.description {
    width: 450px;
}
</style>
