<template>
    <div>
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="one">
                            <h1 class="h1-sty">Post Object</h1>
                        </div>
                    </div>
                    <div class="offset-2 col-lg-8 posts-list">
                        <div class="comment-form">
                            <form enctype="multipart/form-data" class="form-contact comment_form" @submit.prevent="($session.get('post_id')) ? postObject('edit',$session.get('post_id')) : postObject('post',$session.get('post_id'))" id="commentForm">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="label-sty" for="country">Country</label>
                                            <select id="country" v-model="selected_country" class="form-control real-select">
                                                <option  v-for="country in country_options" :key="country.id"  :value="country.id">{{ country.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="label-sty" for="city">City</label>
                                            <select id="city" v-model="selected_city" class="form-control real-select">
                                                <option  v-for="city in city_options" :key="city.id"  :value="city.id">{{ city.city_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input v-model="title" class="form-control" name="title" id="title" type="text" placeholder="Write Title">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <textarea v-model="description" class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                        placeholder="Write Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input v-model="contact" class="form-control" name="contact" id="website" type="text" placeholder="Contact">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input v-on:change="onImageChange" class="form-control" name="name" id="name" type="file" placeholder="Upload Picture">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="label-sty" for="post_type">Post Type</label>
                                            <select id="post_type" v-model="selected_post_type" class="form-control real-select">
                                                <option  v-for="post in post_options" :key="post.value"  :value="post.value">{{ post.post }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        Picture is :
                                        <label class="radio-inline pic_type">
                                            <input v-model="picture_type" value="1" class="pic_radio" type="radio" name="pic" checked>Real
                                        </label>
                                        <label class="radio-inline pic_type">
                                            <input v-model="picture_type" value="0" class="pic_radio" type="radio" name="pic">Dummy
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <div class="switch-wrap d-flex">
                                            <p>Enable Comments</p>
                                            <div class="primary-checkbox comment_checkbox">
                                                <input v-model="enable_comment"  true-value="1" false-value="0" type="checkbox" id="enable_comment">
                                                <label for="enable_comment"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="switch-wrap d-flex">
                                            <p>Enable Private Messages</p>
                                            <div class="primary-checkbox comment_checkbox">
                                                <input v-model="enable_dm" true-value="1" false-value="0" type="checkbox" id="private_msg">
                                                <label for="private_msg"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button v-if="$session.get('post_id')" type="submit" class="button button-contactForm btn_1 boxed-btn">UPDATE</button>
                                    <button v-else type="submit" class="button button-contactForm btn_1 boxed-btn">UPLOAD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section v-show="chat">
            <div class="chat_container">
                <div class="msg-header">
                    <div class="msg-header-img">
                        <img class="user-img" src="assets/img/chat/men.jpeg" alt="">
                    </div>
                    <div class="active">
                        <h4>John Lewis</h4>
                        <h6>3 hours ago...</h6>
                    </div>
                    <div class="header-icons">
                        <span style="color: #fff">typing...</span>
                        <i class="fa fa-times close-msg"></i>
                    </div>
                </div>
                <div class="chat-page">
                    <div class="msg-inbox">
                        <div class="chats">
                            <div class="msg-page">
                                <!---- Received And Outgoing Message Start ---->
                                <div class="received-chats">
                                    <div class="received-chat-img">
                                        <img class="received-outgoing-img" src="assets/img/chat/men.jpeg" alt="">
                                    </div>
                                    <div class="received-msg">
                                        <div class="received-msg-inbox">
                                            <p>HI !! This is message from Lewis</p>
                                            <span class="time">11:01 PM | October 11</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="outgoing-chats">
                                    <div class="outgoing-chat-msg">
                                        <p>HI !! This is message from me</p>
                                        <span class="time">11:01 PM | October 11</span>
                                    </div>
                                    <div class="outgoing-chats-img">
                                        <img class="received-outgoing-img" src="assets/img/chat/men.jpeg" alt="">
                                    </div>
                                </div>
                                <!---- Received And Outgoing Message Start ---->
                                <!---- Received And Outgoing Message Start ---->
                                <div class="received-chats">
                                    <div class="received-chat-img">
                                        <img class="received-outgoing-img" src="assets/img/chat/men.jpeg" alt="">
                                    </div>
                                    <div class="received-msg">
                                        <div class="received-msg-inbox">
                                            <p>HI !! This is message from Lewis</p>
                                            <span class="time">11:01 PM | October 11</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="outgoing-chats">
                                    <div class="outgoing-chat-msg">
                                        <p>HI !! This is message from me</p>
                                        <span class="time">11:01 PM | October 11</span>
                                    </div>
                                    <div class="outgoing-chats-img">
                                        <img class="received-outgoing-img" src="assets/img/chat/men.jpeg" alt="">
                                    </div>
                                </div>
                                <!---- Received And Outgoing Message Start ---->
                            </div>
                        </div>
                    </div>
                    <div class="msg-bottom">
                        <div class="bottom-icons">
                            <i class="fa fa-plus-circle"></i>
<!--                            <i class="fa fa-camera"></i>-->
<!--                            <i class="fa fa-microphone"></i>-->
                            <i class="fa fas fa-smile"></i>
                        </div>
                        <div class="input-group write-message-div">
                            <textarea name="" id="text_area" cols="10" rows="0"></textarea>
                            <div class="input-group-append input-group-append-div">
                                <span class="input-group-text input-group-text-span"><i class="fa fa-paper-plane"></i></span>
                            </div>
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
    name: "PostObject",
    data(){
        return {
            chat : false,
            selected_country : '',
            selected_city : '',
            selected_post_type : '',
            country_options: [],
            city_options: [],
            post_options: [
                {value:0, post:'Lost Object'},
                {value:1, post:'Found Object'},
            ],
            title: '',
            description: '',
            contact: '',
            image: '',
            picture_type: '',
            enable_comment: '',
            enable_dm: '',
        }
    },
    created() {

        // Get Country City State From Database
       this.get_country();

    },
    mounted() {

        if (this.$route.params.post_id) {
             this.$session.set('post_id',this.$route.params.post_id);

        }
        if(this.$session.get('post_id')) {
            console.log(this.$session.get('post_id'));
            this.getPosts(this.$session.get('post_id'));
        }
    },
    methods : {
         get_country() {
             axios.get('/get_country')
                .then((response) => {
                    this.country_options = response.data.countries;
                    this.city_options = response.data.cities;
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        onImageChange(e){
            this.image = e.target.files[0];
        },
        postObject(type='post',post_id) {
            let formData = new FormData();
            formData.append("country", this.selected_country);
            formData.append("city", this.selected_city);
            formData.append("title", this.title);
            formData.append("description", this.description);
            formData.append("contact", this.contact);
            formData.append("image", this.image);
            formData.append("selected_post_type", this.selected_post_type);
            formData.append("picture_type", this.picture_type);
            formData.append("enable_comment", this.enable_comment);
            formData.append("enable_dm", this.enable_dm);
            formData.append("post_id", post_id);
            formData.append("type", type);
            axios.post('/post-object',formData)
                .then((response) => {
                    if (response.status === 200) {
                        let msg= '';
                        if (type == 'post') {
                            msg = 'Post has been uploaded';
                        }else {
                            msg = 'Post has been updated';
                        }
                        toast.fire({
                            icon: 'success',
                            title: msg,
                        });
                        if (type != 'post') {
                             this.$session.remove('post_id')
                        }
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
            if (type == 'post') {
                this.title=this.description=this.contact=this.image=this.selected_post_type=this.picture_type=this.enable_comment=this.enable_dm = '';
                event.target.reset();
            }
        },
        getPosts(post_id) {
            axios.post('/my_posts',{post_id:post_id})
                .then((result) => {
                    this.selected_city = result.data.city;
                    this.selected_country = result.data.country;
                    this.title = result.data.title;
                    this.description = result.data.description;
                    this.contact = result.data.contact;
                    this.selected_post_type = result.data.post_type;
                    this.picture_type = result.data.picture_type;
                    this.enable_comment = result.data.enable_comment;
                    this.enable_dm = result.data.enable_dm;
                })
                .catch( (error) => {
                    console.log(error);
                })
        }
    },
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
/*Chat stylng start*/

.chat_container{
    min-width: 500px !important;
    /*margin: auto;*/
    /*margin-top: 4%;*/
    font-family: sans-serif;
    letter-spacing: 0.5px;
    /*margin-bottom: 100px;*/
    background-color: #fff;
    z-index: 1000;
    position: fixed;
    bottom: 0;
    right: 0;
    margin-right: 100px;

}
.user-img{
    /*max-width: 100%;*/
    border-radius: 50%;
    width: 50px;
    height: 50px;
    background-size: cover;
}
.msg-header{
    border: 1px solid #ccc;
    width: 100%;
    height: 10%;
    border-bottom: none;
    display: inline-block;
    background-color: #FA236A;

}
.msg-header-img{
    border-radius: 50%;
    width: 40px;
    margin-left: 5%;
    margin-top: 12px;
    margin-right: 15px;
    margin-bottom: 8px;
    float: left;
}
.active{
    width: 120px;
    float: left;
    margin-top: 12px;
}
.active h4{
    font-size: 20px;
    margin-left: 10px;
    color: #fff;

}
.active h6{
    font-size: 10px;
    margin-left: 10px;
    color: #fff;

}
.header-icons{
    width: 120px;
    float: right;
    margin-top: 12px;
    margin-right: 10px;
}
.header-icons .fa{
    color: #fff;
    cursor: pointer;
    margin: 10px;

}
.chat-page{
    padding: 0 0 50px 0;
}
.msg-inbox{
    border: 1px solid #ccc;
    overflow: auto;
    padding-bottom: 30px;
    max-height: 375px;
}
.chats{
    padding: 30px 15px 0px 25px;
}
.msg-page{
    height: 516px;
    /*overflow-y: auto;*/
}
.received-chat-img{
    display: inline-block;
    width: 20px;
    float: left;
}
.received-msg{
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
}
.received-msg-inbox{
    width: 57%;
}
.received-msg-inbox p{
    background: #efefef none repeat scroll 0 0;
    border-radius: 10px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
}
.time{
    color: #777;
    display: block;font-size: 12px;
    margin: 8px 0 0;
}
.outgoing-chats{
    overflow: hidden;
    margin: 26px 20px;
    padding-right: 5px;
}
.outgoing-chat-msg p{
    background: #FA236A none repeat scroll 0 0;
    color: #fff;
    border-radius: 10px;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
}
.outgoing-chat-msg{
    float: left;
    width: 46%;
    margin-left: 45%;
}
.outgoing-chats-img{
    display: inline-block;
    width: 20px;
    float: right;
}
.received-outgoing-img {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-size: cover;
}
.msg-bottom{
    position: relative;
    height: 10%;
    background: #FA236A;
    float: left;
    width: 100%;
    padding-bottom: 14px;
}
.write-message-div{
    float: right;
    margin-top: 13px;
    margin-right: 20px;
    outline: none !important;
    border-radius: 20px;
    width: 61% !important;
    background: #fff;
}
.write-message-div form-control{
    border: none !important;
    border-radius: 20px !important;
}
.input-group-text-span{
    background: transparent !important;
    border: none !important;
}
.write-message-div .fa{
    color: #FA236A;
    float: right;
}
.bottom-icons{
    float: left;
    margin-top: 17px;
    width: 25% !important;
    margin-left: 22px;

}
.bottom-icons .fa{
    color: #fff;
    padding: 5px;
    cursor: pointer;
}
.form-control:focus{
    border-color: none !important;
    box-shadow: none !important;
    border-radius: 20px;
}
/*Edit chat scroll bar*/
.msg-inbox::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

.msg-inbox::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg-inbox::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #FA236A;
}
#text_area {
    width: 255px;
    border: none;
    resize: none;
    height: 45px;
    border-radius: 20px;
    /* padding: 17px; */
    padding-left: 10px;
}
.close-msg {
    padding-left: 20px;
    font-size: 18px;
}
/*Defining media queries for mobile screen*/
@media screen and (max-width: 540px) {
    .chat_container {
        max-width: 0px;
        margin-right: 0px;
    }
    .msg-header-img {
        margin-left: 145px;
    }
    .chat-page {
        margin-left: 132px;
    }
    .outgoing-chat-msg {
        float: left;
        width: 85%;
        margin-left: 0%;
}
    .received-msg-inbox {
        width: 85%;
        margin-left: 15px;
    }
    #text_area {
        width: 180px;
    }
    .msg-page {
        height: 380px;
    }
}
</style>
