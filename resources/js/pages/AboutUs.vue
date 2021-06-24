<template>
    <div>
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section-padding " style="margin-bottom: 135px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="one">
                            <h1 class="h1-sty">About Us</h1>
                        </div>
                    </div>
                    <div class="offset-2 col-lg-8">
                        <p>We are a group of highly skilled developers. We create a variety of web applications. Our main goal is to help people and introduce technology. We enjoy working for the satisfaction of others. We are working on a number of projects, one of which will be the introduction of an object finder platform. The main goal of this app is to save people's time and valuable objects.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog Area end =================-->
    </div>
</template>

<script>

export default {
    name: "AboutUs",
}
</script>

<style scoped>
.h1-sty {
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
</style>
