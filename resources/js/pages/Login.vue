<template>
        <div class="container">
            <div class="text-center mb-20">
                <router-link class="butt mb-3" to="/">BACK TO WEBSITE</router-link>
            </div>
            <div class="myCard">
                <div class="row">
                    <div class="col-md-6">
                        <div class="myLeftCtn">
                            <form class="myForm text-center" @submit.prevent="login">
                                <header>Login into account</header>

                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <input class="myInput" placeholder="Email" type="text" v-model="data.email" id="email" required>
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input class="myInput" type="password" v-model="data.password" id="password" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input id="check_1" name="check_1"  type="checkbox" required><small> I read and agree to Terms & Conditions</small></input>
                                        <div class="invalid-feedback">You must check the box.</div>
                                    </label>
                                </div>
                                <input type="submit" class="butt" value="LOGIN ACCOUNT">

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="myRightCtn">
                            <div class="box"><header>Hello World!</header>

                                <p class="register-msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam.</p>
                                <input type="button" class="butt_out" value="Learn More"/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import {mapMutations} from "vuex";
export default {
    name: "Login",
    data() {
        return {
            data : {
                email : '',
                password : '',
            }
        }
    },
    mounted() {
        this.$emit("update",false);
        this.dynamic_css;
    },
    beforeDestroy() {
        this.file.href = '';
    },
    computed :{
        dynamic_css() {
            this.file = document.createElement('link');
            this.file.rel = 'stylesheet';
            this.file.href = 'assets/css/login.css';
            document.head.appendChild(this.file);
        }
    },
    methods : {
        ...mapMutations(["updateData"]),
        login(event) {
            let email = this.data.email;
            let password = this.data.password;
            if (email != '' && password != '') {
                axios.post('/user-login',this.data)
                    .then((response) =>{
                        console.log(response);
                        if (response.status === 200) {
                            if(response.data.status) {
                                email = password = '';
                                event.target.reset();
                                this.userStatus();
                                toast.fire({
                                    icon : 'success',
                                    title: 'You are successfully Login'
                                });
                                 window.location.href = "/";
                            }else {
                                toast.fire({
                                    icon : 'error',
                                    title: 'Incorrect Credentials'
                                });
                            }
                        }
                    })
                    .catch((error) =>{
                        console.log(error);
                    })
            }else {
                toast.fire({
                    icon : 'error',
                    title: 'All fields are required'
                });
            }
        },
        userStatus(param) {
            this.updateData({status:param});
        }
    }

}
</script>
<style scoped>

</style>

