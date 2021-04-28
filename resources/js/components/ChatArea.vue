<template>
    <section v-if="chatActive">
        <div class="chat_container">
            <div class="msg-header">
                <div class="msg-header-img">
                    <img class="user-img" :src="`assets/img/chat/${frnd_image}`" alt="">
                </div>
                <div class="active">
                    <h4>{{ frnd_name }}</h4>
                    <h6>3 hours ago...</h6>
                </div>
                <div class="header-icons">
                    <span style="color: #fff">{{ typing }}</span>
                    <i @click="closeChat()" class="fa fa-times close-msg"></i>
                </div>
            </div>
            <div class="chat-page" >
                <div class="msg-inbox"  v-chat-scroll>
                    <div class="chats">
                        <div class="msg-page">
                            <!---- Received And Outgoing Message Start ---->
                                <div v-for="(value,index) in chat.message" v-if="chat.user_id[index] == auth_user_id" class="outgoing-chats">
                                    <div class="outgoing-chat-msg">
                                        <p>{{ value }}</p>
                                        <img v-if="chat.image[index] != 'false'" :src="`chat/${chat.image[index]}`" alt="Image" class="chat_image">
                                        <span class="time">11:01 PM | October 11</span>
                                    </div>
                                    <div class="outgoing-chats-img">
                                        <img class="received-outgoing-img" :src="`assets/img/chat/${chat.profile_image[index]}`" alt="">
                                    </div>
                                </div>
                                <div v-else class="received-chats">
                                       <div class="received-chat-img">
                                           <img class="received-outgoing-img" :src="`assets/img/chat/${chat.profile_image[index]}`" alt="">
                                       </div>
                                       <div class="received-msg">
                                           <div class="received-msg-inbox">
                                               <p>{{ value }}</p>
                                               <img v-if="chat.image[index] != 'false'" :src="`chat/${chat.image[index]}`" alt="Image" class="chat_image received_image">
                                               <span class="time">11:01 PM | October 11</span>
                                           </div>
                                       </div>
                                   </div>
                                   <Picker v-if="emojiStatus" set="twitter" @select="setEmoji" />
                            <!---- Received And Outgoing Message End ---->
                        </div>
                    </div>
                </div>
                <div class="msg-bottom">
                    <div class="bottom-icons">
                        <input v-on:change="onImageChange" id="fileUpload" type="file" hidden>
                        <i @click="chooseFiles()" class="fa fa-paperclip"></i>
                        <!--                            <i class="fa fa-camera"></i>-->
                        <!--                            <i class="fa fa-microphone"></i>-->
                        <i @click="showEmoji" class="fa fas fa-smile"></i>
                    </div>
                    <div class="input-group write-message-div">
                        <textarea @click="emojiStatus = false" @keyup.enter="send()" v-model="message" name="" id="text_area" cols="10" rows="0"></textarea>
                        <div class="input-group-append input-group-append-div">
                            <span class="input-group-text input-group-text-span"><i class="fa fa-paper-plane"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapMutations} from "vuex";
import {Picker} from 'emoji-mart-vue';
import {EventBus} from '../app';
export default {
    name: "ChatArea",
    components : {
        Picker
    },
    data() {
        return {
            auth_user_id : null,
            ResponseChatMate : 0,
            typing : '',
            message : '',
            image : '',
            emojiStatus : false,
            frnd_image : '',
            frnd_name : '',
            activeUsersId : [],
            chat : {
                message : [],
                image : [],
                user_id : [],
                profile_image : [],
            }
        }
    },
    methods : {
        ...mapMutations(["updateChatStatus"]),
        send() {
            let formData = new FormData();
            formData.append("message", this.message);
            formData.append("chatMateId", this.chatMateId);
            formData.append("image", this.image);
            if(this.message.length != 0) {
                axios.post('/send',formData)
                    .then((response) => {
                        // console.log(response);
                        this.message = '';
                        this.image = '';
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        },
        closeChat() {

            this.updateChatStatus({active:false,id:0});
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
        fetch_messages(id) {
            axios.post('/fetch_messages',{user_id:id})
                .then((response) => {

                     this.frnd_image = response.data.chatMateData.image;
                     this.frnd_name = response.data.chatMateData.name;
                    for (let i = 0; i < response.data.messageData.length; i++) {
                        this.chat.message.push(response.data.messageData[i].message);
                        this.chat.image.push(response.data.messageData[i].chat_image);
                        this.chat.user_id.push(response.data.messageData[i].user_id);
                        this.chat.profile_image.push(response.data.messageData[i].profile_image);
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        updateChatSeen(msg_id,status) {
            axios.post('/updateChatSeen',{message_id:msg_id,status:status})
                .then((response) => {

                })
                .catch((error) => {
                    console.log(error);
                })
        }
    },
    watch : {
        message() {
            Echo.private('chatApp')
                .whisper('typing', {
                    name: this.message
                })
        }
    },
    computed : {
        chatActive() {
            return this.$store.state.chatActive;
        },
        chatMateId() {
            return this.$store.state.chatMate;
        },
        responseChatMateId() {
             return this.ResponseChatMate;
        },
    },
    mounted() {
        // ActiveChat Check with pusher
        EventBus.$on('fetch_messages', data=> {
            this.fetch_messages(data);
        });
        this.auth_user_id = this.$userId;
        Echo.private('chatApp')
            .listen('ChatApp', (e) => {
                  //console.log(e);
                     this.ResponseChatMate = e.chat_mate_id;
                     this.chat.message.push(e.message);
                     this.chat.image.push(e.image);
                     this.chat.user_id.push(e.user.id);
                     this.chat.profile_image.push(e.user.image);
                     if(this.auth_user_id  != e.user.id) {
                         if (e.user.id  == this.chatMateId) {
                             console.log('Seen');
                             this.updateChatSeen(e.message_id,1);
                         }else {
                             console.log('Not Seen');
                             this.updateChatSeen(e.message_id,0);
                         }
                     }
            })
            .listenForWhisper('typing', (e) => {
                if (e.name != '') {
                    this.typing = 'Typing...';
                }else {
                    this.typing = '';
                }
        });
        Echo.join('chatApp')
            .here((users)=>{
                  console.log(users);
            })
            .joining((user)=>{
                 console.log(user);
            })
            .leaving((user)=>{
                 console.log(user);
            });
    },
    created() {
        this.$parent.$on('fetch_messages', this.fetch_messages);
    }
}
</script>

<style scoped>

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
    text-align: right;
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
    min-height: 312px;
    max-height: 315px;
}
.chats{
    padding: 30px 15px 0px 25px;
}
.msg-page{
    max-height: 516px;
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
