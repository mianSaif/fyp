<template>
    <div>
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="one">
                            <h1 class="h1-sty">Contact Us</h1>
                        </div>
                    </div>
                    <div class="offset-2 col-lg-8 posts-list">
                        <div class="comment-form">
                            <form enctype="multipart/form-data" class="form-contact comment_form" @submit.prevent="contact_us" id="commentForm">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required v-model="email" class="form-control" name="email" id="email" type="email" placeholder="Write Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input required v-model="title" class="form-control" name="title" id="title" type="text" placeholder="Write Title">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <textarea required v-model="description" class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                  placeholder="Write Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog Area end =================-->
    </div>
</template>

<script>

export default {
    name: "ContactUs",
    data() {
        return {
            email : '',
            title : '',
            description : '',
        }
    },
    methods: {
        contact_us() {
            axios.post('/contact_us',{
                email : this.email,
                title : this.title,
                description : this.description,
            })
                .then((response) => {
                    console.log(response.data.status);
                   if (response.data.status) {
                       toast.fire({
                           icon: 'success',
                           title: 'Thanks to contact us',
                       });
                       this.email = this.title = this.description = '';
                   }
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
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
