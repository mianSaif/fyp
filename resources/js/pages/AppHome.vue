<template>
    <div>
        <main>
            <!-- slider Area Start-->
            <div class="slider-area ">
                <!-- Mobile Menu -->
                <div class="slider-active">
                    <div class="single-slider slider-height d-flex align-items-center" style="background-image: url('assets/img/hero/h1_hero.jpg')">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-9 col-md-10">
                                    <div class="hero__caption">
                                        <h1>Find Your Lost Object</h1>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Box -->
                            <div class="row">
                                <div class="col-xl-8">
                                    <!-- search Btn -->
                                    <div class="search-btn">
                                        <router-link to="found_object">Find Object</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider Area End-->
            <!-- Our Services Start -->
            <div class="our-services section-pad-t30">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <span>FEATURED TOURS Packages</span>
                                <h2>Our Main Features </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-contnet-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-tour"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="javascript:void(0)">Post Lost Object</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-cms"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Search Lost Object</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-report"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">News Feed</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-app"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Private Message</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-helmet"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Group Message</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-high-tech"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Share Location</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-real-estate"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Post Edit & Delete</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-content"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">Profile Edit</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- More Btn -->
                    <!-- Section Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="browse-btn2 text-center mt-50">
                                <router-link v-if="$store.state.isLoggedIn" to="register" class="border-btn2">Register Now</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
            <!-- Online CV Area Start -->
            <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="cv-caption text-center">
                                <p class="pera1">Easy and Accessible</p>
                                <p class="pera2"> Search your precious lost object in your selected area!</p>
                                <router-link v-if="$store.state.isLoggedIn" to="register" class="border-btn2 border-btn4">Sign Up Now</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Online CV Area End-->
            <!-- Featured_job_start -->
            <section class="featured-job-area feature-padding">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <span>Recent Post</span>
                                <h2>Lost Objects</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <!-- single-post-content -->
                            <div v-for="post in posts" :key="post.id" class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="job_details.html"><img width="80" :src="`/PostObjectImages/${post.image}`" alt=""></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="job_details.html"><h4>{{ post.title }}</h4></a>
                                        <ul>
                                            <li>{{ post.profile_name }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ post.country_name }}, {{ post.city_name }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link f-right">
                                    <router-link :to="{ name: 'lostObject', params: { post_id:post.post_id,single_post: true} }">View Detail</router-link>
                                    <span>7 hours ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Featured_job_end -->
            <!-- How  Apply Process Start-->
            <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
                <div class="container">
                    <!-- Section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle white-text text-center">
                                <span>Our process</span>
                                <h2> How it works</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Apply Process Caption -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-tour"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>1. Sign up / Login</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-curriculum-vitae"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>2. Post Lost Object</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="flaticon-search"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>3. Search Lost Object</h5>
                                    <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- How  Apply Process End-->

            <!-- Support Company Start-->
            <div class="support-company-area support-padding fix">
                <div class="container mb-5">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="right-caption">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle2">
                                    <span>What we are doing</span>
                                    <h2>100k People Found Their Lost Object</h2>
                                </div>
                                <div class="support-caption">
                                    <p class="pera-top">Mollit anim laborum duis au dolor in voluptate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillum.</p>
                                    <p>Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.</p>
                                    <a href="javascript:void(0)" @click="checkRedirect" class="btn post-btn">Post lost object</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="support-location-img">
                                <img src="assets/img/service/support-img.jpg" alt="">
                                <div class="support-img-cap text-center">
                                    <p>Since</p>
                                    <span>2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Support Company End-->
            <!-- Blog Area Start -->
<!--            <div class="home-blog-area blog-h-padding">-->
<!--                <div class="container">-->
<!--                    &lt;!&ndash; Section Tittle &ndash;&gt;-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12">-->
<!--                            <div class="section-tittle text-center">-->
<!--                                <span>Our latest blog</span>-->
<!--                                <h2>Our recent news</h2>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-xl-6 col-lg-6 col-md-6">-->
<!--                            <div class="home-blog-single mb-30">-->
<!--                                <div class="blog-img-cap">-->
<!--                                    <div class="blog-img">-->
<!--                                        <img src="assets/img/blog/home-blog1.jpg" alt="">-->
<!--                                        &lt;!&ndash; Blog date &ndash;&gt;-->
<!--                                        <div class="blog-date text-center">-->
<!--                                            <span>24</span>-->
<!--                                            <p>Now</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="blog-cap">-->
<!--                                        <p>|   Properties</p>-->
<!--                                        <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>-->
<!--                                        <a href="#" class="more-btn">Read more »</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-xl-6 col-lg-6 col-md-6">-->
<!--                            <div class="home-blog-single mb-30">-->
<!--                                <div class="blog-img-cap">-->
<!--                                    <div class="blog-img">-->
<!--                                        <img src="assets/img/blog/home-blog2.jpg" alt="">-->
<!--                                        &lt;!&ndash; Blog date &ndash;&gt;-->
<!--                                        <div class="blog-date text-center">-->
<!--                                            <span>24</span>-->
<!--                                            <p>Now</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="blog-cap">-->
<!--                                        <p>|   Properties</p>-->
<!--                                        <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>-->
<!--                                        <a href="#" class="more-btn">Read more »</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- Blog Area End -->

        </main>
    </div>
</template>

<script>
export default {
    name: "AppMain",
    data() {
        return {
            posts : [],
            meta : []
        }
    },
    mounted() {
        this.$emit("update",true);
        this.fetch_post();
    },
    methods : {
        fetch_post(page = 1) {
            axios.post('/fetch-post',{
                post_type : 0,
                home_posts : true,
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
        checkRedirect() {
            let isLoggedIn = this.$store.state.isLoggedIn;
            if(isLoggedIn) {
                window.location.href = "found_object";
            }else {
                this.$router.push('login')
            }
        }
    }
}
</script>

<style scoped>
.support-padding {
    padding-top: 150px;
}
</style>
