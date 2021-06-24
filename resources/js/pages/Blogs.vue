<template>
    <div>
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div v-if="search_post" class="col-md-12 mb-4">
                        <h3><strong>Results for "{{ title }}"</strong></h3>
                    </div>
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article v-for="post in posts" :key="post.id" class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" :src="`/images/${post.image}`" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ convert_date(post.created_at,'d') }}</h3>
                                        <p>{{ convert_date(post.created_at,'m') }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="#">
                                        <h2>{{ post.title }}</h2>
                                    </a>
                                    <p>{{ post.description }}</p>
                                </div>
                            </article>

                            <nav news class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item " :class="{'disabled':meta.current_page===1}">
                                        <a href="#" @click.prevent="search_post ? search(meta.current_page-1):fetch_post(meta.current_page-1)" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item" :class="{'active':meta.current_page===p}" v-for="p in meta.last_page">
                                        <a href="#" @click.prevent="search_post ? search(p):fetch_post(p)" class="page-link">{{ p }}</a>
                                    </li>
                                    <li class="page-item" :class="{'disabled':meta.current_page===meta.last_page}">
                                        <a href="#" @click.prevent="search_post ? search(meta.current_page+1):fetch_post(meta.current_page+1)"  class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Recent Post</h3>
                                <div v-for="recent_post in recent_posts" :key="recent_post.id" class="media post_item">
                                    <img class="recent_img" :src="`/images/${recent_post.image}`" alt="post">
                                    <div class="media-body">
                                        <a href="javascript:void(0)" @click="showSinglePost(recent_post.id)">
                                            <h3 v-if="recent_post.title.length>=15">{{ recent_post.title.substring(0,22)+"..." }}</h3>
                                            <h3 v-else>{{ recent_post.title}}</h3>
                                        </a>
                                        <p>{{ recent_post.created_at | date_format }}</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Nees Feed Area End =================-->
    </div>
</template>

<script>
import moment from 'moment';
import {mapMutations} from "vuex";
import {EventBus} from '../app';

export default {
    name: "LostObject",
    data() {
        return {
            selected_country: '',
            selected_city: '',
            title: '',
            country_options: [
                {id:1,name: 'Pakistan'}
            ],
            city_options: [
                {id:1,city_name: 'Lahore'}
            ],
            posts: [],
            meta : {},
            recent_posts:[],
            search_post : false,
        }
    },
    filters: {
        date_format: function (value) {
            return moment(String(value)).format('MMMM DD , YYYY');
        }
    },
    created() {
        this.fetch_post();
        this.get_recent_post();
    },
    mounted(){
        if(this.$route.params.single_post) {
            this.fetch_post(1,true,this.$route.params.post_id);
        }

        //active Comment click from notifications
        EventBus.$on('activeCommentInLost',data => {
            this.activeModal(data);
        });
    },
    methods: {
        ...mapMutations(["updateChatStatus"]),
        fetch_post(page = 1,single_post = false,post_id = 0) {

             axios.post('/fetch-blog',{
                 post_type : 0,
                 single_post : single_post,
                 post_id : post_id,
             },{
                params : {
                    page:page
                }
            })
                .then((result) => {

                    this.posts = result.data.data;
                    this.meta = result.data.meta;
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        get_recent_post(){
            axios.post('/recent-blog',{
                post_type : 0
            })
                .then((result) => {
                    this.recent_posts = result.data;
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        convert_date(date,type) {
            if (type === 'd') {
                var date = new Date(date);
                return date.getDate();
            }else {
                var date = new Date(date);  // 2009-11-10
                return  date.toLocaleString('default', { month: 'short' });
            }
        },
        search(page = 1) {
            axios.post('/search-obj',{
                title : this.title,
                country : this.selected_country,
                city : this.selected_city,
                post_type : 0
            },{
                params : {
                    page:page
                }
            })
                .then((response) => {
                    if (response.status === 200) {
                        this.posts = response.data.data;
                        this.meta = response.data.meta;
                        this.search_post = true;
                       console.log(response);
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        reset() {
            this.title = this.selected_country = this.selected_city = '';
            this.fetch_post(1);
            this.search_post = false;
        },
        activeChat(user_id) {
              this.updateChatStatus({active:true,id:user_id});
              EventBus.$emit('fetch_messages',user_id);
        },
        showSinglePost(post_id) {
            this.fetch_post(1,true,post_id);
        },
        activeModal(post_id) {
            EventBus.$emit('active_comment',post_id);
        },
        showAlert() {
            swal.fire('OOPS!', 'You need to login first', 'error')
        }
    }
}
</script>
<style>
.search-filter {
    border: 1px solid #eee;
    margin-top: 75px;
    padding: 50px 30px 50px 0px;
}

.title {
    height: 38px;
}

.search-btn {
    margin-top: 30px;
}
.recent_img {
    width: 100px;
    height: 55px;
    background-size: cover;
}
.reset {
    margin-top: 27px;
}

</style>
