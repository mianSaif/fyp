<template>
    <div class="container">
        <div class="text-center mb-20">
            <router-link class="butt mb-3" to="/">BACK TO WEBSITEBACK TO WEBSITE</router-link>
        </div>
        <div class="myCard">
            <div class="row">
                <div class="col-md-6">
                    <div class="myLeftCtn">
                        <form @submit.prevent="register" class="myForm text-center">
                            <header>Create new account</header>
                            <div class="form-group">
                                <i class="fas fa-user"></i>
                                <input class="myInput" v-model="user.name" type="text" placeholder="Full Name" id="username" required>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-envelope"></i>
                                <input class="myInput" v-model="user.email" placeholder="Email" type="text" id="email" required>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-lock"></i>
                                <input class="myInput" v-model="user.password" type="password" id="password" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input id="check_1" name="check_1" @click="terms_check" v-model="user.terms" checked="checked"  type="checkbox" required><small> I read and agree to Terms & Conditions</small></input>
                                    <div class="invalid-feedback">You must check the box.</div>
                                </label>
                            </div>

                            <input type="submit" class="butt" value="CREATE ACCOUNT">

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
export default {
    name: "register",
    props: ["test"],
    data() {
        return {
           file : '',
           user : {
               name : "",
               email : "",
               password : "",
               terms : false,
           }
        }
    },
    methods : {
        terms_check() {
            this.user.terms = !this.user.terms;

        },
        register(event) {
            let name = this.user.name;
            let email = this.user.email;
            let password = this.user.password;
            let terms = this.user.terms;
            if (name.trim() != '' && email.trim() != '' && password.trim() != '' && terms!= false) {
                axios.post('/user-register',this.user)
                .then(function(response){
                    if (response.status === 200) {
                        name = email = password = '';
                        event.target.reset();
                        toast.fire({
                            type: 'success',
                            title: 'You are successfully registered'
                        });
                    }
                })
                .catch(function(error){
                    console.log(error);
                })
            }else {
                toast.fire({
                    type: 'error',
                    title: 'All fields are required'
                });
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
    }
}
</script>

<style scoped>

/*@import "../login.css";*/

</style>
