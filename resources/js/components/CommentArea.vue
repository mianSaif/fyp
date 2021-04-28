<template>
    <div>
        <modal name="comment" :draggable="true"  :height="auto" :maxHeight="300">
            <div class="detailBox">
                <div class="titleBox">
                    <label>Comment Box</label>
                    <button type="button" @click="closeModal" class="close" aria-hidden="true">&times;</button>
                </div>
                <div class="actionBox">
                    <ul class="commentList" v-chat-scroll>
                        <li v-for="(value,index) in chat.message" v-if="post_id == chat.post_id[index]">
                            <div class="commenterImage">
                                <img :src="`assets/img/chat/${chat.profile_image[index]}`" />
                            </div>
                            <div class="commentText">
                                <p class="">{{ value }}</p>
                                <img v-if="chat.image[index] != 'false'" :src="`chat/${chat.image[index]}`" alt="Image" class="chat_image received_image">
                                <span style="display: block" class="date sub-text">on March 5th, 2014</span>
                                <Picker v-if="emojiStatus" set="twitter" @select="setEmoji" />
                            </div>
                        </li>

                    </ul>
                    <form @submit.prevent="add_comment" class="form-inline">
                        <div class="form-group">
                            <input v-on:change="onImageChange" id="fileUpload" type="file" hidden>
                            <i @click="chooseFiles()" class="fa fa-paperclip"></i>
                            <i @click="showEmoji" class="fa fas fa-smile" style="padding-left: 10px"></i>
                            <input @click="emojiStatus = false" @keyup.enter="" v-model="message" class="form-control" type="text" placeholder="Your comments" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
import {EventBus} from "../app";
import {Picker} from 'emoji-mart-vue';
export default {
    name: "CommentArea",
    components : {
        Picker
    },
    data() {
        return {
            auth_user_id : null,
            auto : "auto",
            post_id : 0,
            typing : '',
            message : '',
            image : '',
            emojiStatus : false,
            chat : {
                message : [],
                image : [],
                user_id : [],
                profile_image : [],
                post_id : [],
            }
        }
    },
    mounted() {
        // set auth id
        this.auth_user_id = this.$userId;
        // Pusher response code
        Echo.private('commentApp')
            .listen('CommentApp', (e) => {
                console.log(e);
                // this.ResponseChatMate = e.chat_mate_id;
                this.chat.message.push(e.message);
                 this.chat.image.push(e.image);
                 this.chat.post_id.push(e.post_id);
                this.chat.profile_image.push(e.user.image);
                if(this.auth_user_id != e.user.id) {
                    if(this.post_id == e.post_id) {
                        this.updateCommentSeen(this.post_id,1);
                        EventBus.$emit('getNotifications',true);
                    }else {
                        EventBus.$emit('getNotifications',true);
                    }
                }
            });
        // Trigger Comment Box With EventBus
        EventBus.$on('active_comment', data=> {
            this.activeModal(data);
        });
    },
    methods : {
        add_comment() {
            let formData = new FormData();
            formData.append("message", this.message);
            formData.append("mention_id", 1);
            formData.append("post_id", this.post_id);
            formData.append("image", this.image);
            axios.post('/add_comment',formData)
                .then((result) => {
                    //console.log(result);
                    this.message = '';
                    this.image = '';
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        getComment(post_id) {
            axios.post('/get_comment',{
                post_id : post_id
            })
                .then((result) => {
                    console.log(result);
                    this.chat.message = [];
                    this.chat.profile_image = [];
                    for (let i = 0; i < result.data.length; i++) {
                        this.chat.message.push(result.data[i].message);
                        this.chat.profile_image.push(result.data[i].profile_image);
                        this.chat.post_id.push(result.data[i].post_id);
                        this.chat.image.push(result.data[i].image);
                    }
                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        activeModal(post_id) {
            this.post_id = post_id;
            this.getComment(post_id);
            this.$modal.show('comment');
        },
        closeModal() {
            this.post_id = 0;
            this.$modal.hide('comment');
        },
        chooseFiles: function() {
            document.getElementById("fileUpload").click()
        },
        onImageChange(e){
            console.log(e.target.files[0]);
            this.image = e.target.files[0];
        },
        setEmoji(e) {
            if(this.message == '') {
                this.message = e.native + this.message;
            }else {
                this.message = this.message + e.native;
            }
        },
        showEmoji() {
            this.emojiStatus =  !this.emojiStatus;
        },
        updateCommentSeen(post_id,status) {
            axios.post('/updateCommmentSeen',{post_id:post_id,status:status})
                .then((response) => {

                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
}

</script>

<style scoped>

.detailBox {
    width:84%;
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
    color:#444;
    margin:0;
    display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    /*width:80%;*/
    /*margin-left:5px;*/
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width: 40px;
    height: 40px;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.commentText {
    padding-left: 20px;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
i:hover {
    cursor: pointer;
}
input.form-control {
    width: 85%;
    margin-left: 10px;
}
.chat_image {
    width: 100px;
    height: 100px;
    padding: 3px;
    margin-top: 10px;
    background-color: #FA236A;
}
.received_image {
    background-color: #EFEFEF !important;
}
</style>
