<template>
    <div>
        <!-- profile body start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-12 mb-5">
                        <div class="one">
                            <h1>Profile Detail</h1>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <img class="profileImage" :src="`assets/img/chat/${image}`" :alt="name">
                    </div>
                    <div class="offset-2 col-xl-8 col-lg-8">
                        <div class="post-details3  mb-50">
                            <ul>
                                <li>Name : <span>{{ name }}</span></li>
                                <li>Email : <span>{{ email }}</span></li>
                                <li>Contact : <span>{{ contact }}</span></li>
                                <li>Country : <span>{{ country }}</span></li>
                                <li>City :  <span>{{ city }}</span></li>
                            </ul>
                            <div class="apply-btn2 text-center">
                                <router-link to="/edit_profile" class="btn">Edit Profile</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile body end -->
    </div>
</template>

<script>
export default {
    name: "profile",
    data() {
        return {
            name : '',
            email : '',
            contact : '',
            country : '',
            city : '',
            image : '',
        }
    },
    mounted() {
        this.getProfile();
    },
    methods : {
        getProfile() {
                axios.get('/get_profile')
                    .then((res) => {
                        console.log(res);
                        this.name = res.data.user.name;
                        this.email = res.data.user.email;
                        this.contact = res.data.user.contact;
                        this.image = res.data.user.image;
                        this.city = res.data.city_name;
                        this.country = res.data.country_name;
                    })
                    .catch((error) => {
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
.profileImage {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 2px solid #fa236a;
    box-shadow: 1px 1px 2px #fa236a;
}
</style>
