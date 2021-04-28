<template>
    <div>
        <!--================Edit Profile Start =================-->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="one">
                            <h1>Edit Profile</h1>
                        </div>
                    </div>
                    <div class="offset-2 col-lg-8 posts-list">
                        <div class="comment-form">
                            <form class="form-contact comment_form" @submit.prevent="update()" id="commentForm">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input v-model="data.name" class="form-control" name="name" type="text" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="data.contact" class="form-control" name="contact" type="text" placeholder="Contact">
                                        </div>
                                        <div class="form-group">

                                            <select v-model="data.selected_country" class="form-control">
                                                <option  v-for="city in countries_options" :key="city.id"  :value="city.id">{{ city.name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select v-model="data.selected_city" class="form-control">
                                                <option  v-for="city in cities_options" :key="city.id"  :value="city.id">{{ city.city_name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input v-on:change="updateImage" class="form-control" name="image" type="file" placeholder="Upload Profile Image">
                                        </div>
                                        <div class="form-group">
                                            <input v-model="data.password" class="form-control" name="password" type="text" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Edit Profile End =================-->
    </div>
</template>

<script>
export default {
    name: "edit_profile",
    data() {
        return {
            data : {
                name : '',
                contact : '',
                country : '',
                city : '',
                password : '',
                selected_city : '',
                selected_country : '',
                image : '',
            },
            cities_options : [],
            countries_options : [],
        }
    },
    created() {

        this.getProfile();
    },
    methods : {
        getProfile() {
             axios.get('/get_profile')
                .then( (res) => {
                    this.data.name = res.data.user.name;
                    this.data.email = res.data.user.email;
                    this.data.contact = res.data.user.contact;
                    this.data.selected_city = res.data.user.city_id;
                    this.data.selected_country = res.data.user.country_id;
                    this.cities_options = res.data.cities;
                    this.countries_options = res.data.countries;

                })
                .catch( (error) => {
                    console.log(error);
                })
        },
        update() {
            let formData = new FormData();
            formData.append("name", this.data.name);
            formData.append("contact", this.data.contact);
            formData.append("country", this.data.country);
            formData.append("city", this.data.city);
            formData.append("image", this.data.image);
            formData.append("password", this.data.password);
            formData.append("selected_city", this.data.selected_city);
            formData.append("selected_country", this.data.selected_country);
            axios.post('/update_profile',formData)
                .then((res) => {
                    toast.fire({
                        icon: 'success',
                        title: 'Detail has been updated',
                        className: "success",
                    });
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        updateImage(e) {
            this.data.image = e.target.files[0];
        }
    },
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
select{
    display: block !important;
}
</style>
