<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job board HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .chat_container{
            max-width: 500px !important;
            margin: auto;
            margin-top: 4%;
            font-family: sans-serif;
            letter-spacing: 0.5px;
            margin-bottom: 100px;

        }
        .user-img{
            max-width: 100%;
            border-radius: 50%;
        }
        .msg-header{
            border: 1px solid #ccc;
            width: 100%;
            height: 10%;
            border-bottom: none;
            display: inline-block;
            background-color: #007bff;

        }
        .msg-header-img{
            border-radius: 50%;
            width: 40px;
            margin-left: 5%;
            margin-top: 12px;
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
            overflow: hidden;
            padding-bottom: 30px;
        }
        .chats{
            padding: 30px 15px 0px 25px;
        }
        .msg-page{
            height: 516px;
            overflow-y: auto;
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
        }
        .outgoing-chat-msg p{
            background: #007bff none repeat scroll 0 0;
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
        .msg-bottom{
            position: relative;
            height: 10%;
            background: #007bff;
            float: left;
            width: 100%;
            padding-bottom: 14px;
        }
        .input-group{
            float: right;
            margin-top: 13px;
            margin-right: 20px;
            outline: none !important;
            border-radius: 20px;
            width: 61% !important;
            background: #fff;
        }
        .form-control{
            border: none !important;
            border-radius: 20px !important;
        }
        .input-group-text{
            background: transparent !important;
            border: none !important;
        }
        .input-group .fa{
            color: #007bff;
            float: right;
        }
        .bottom-icons{
            float: left;
            margin-top: 17px;
            width: 30% !important;
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
    </style>
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start-->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="job_listing.html">Find a Jobs </a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="job_details.html">job Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="#" class="btn head-btn1">Register</a>
                                <a href="#" class="btn head-btn2">Login</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<!--================Blog Area =================-->
<section>
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
                <i class="fa fa-phone"></i>
                <i class="fas fa-video text-white"></i>
                <i class="fa fa-info-circle"></i>
            </div>
        </div>
        <div class="chat-page">
            <div class="msg-inbox">
                <div class="chats">
                    <div class="msg-page">
                        <!---- Received And Outgoing Message Start ---->
                        <div class="received-chats">
                            <div class="received-chat-img">
                                <img width="12" src="assets/img/chat/men.jpeg" alt="">
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
                                <img width="12" src="assets/img/chat/men.jpeg" alt="">
                            </div>
                        </div>
                        <!---- Received And Outgoing Message Start ---->
                        <!---- Received And Outgoing Message Start ---->
                        <div class="received-chats">
                            <div class="received-chat-img">
                                <img width="12" src="assets/img/chat/men.jpeg" alt="">
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
                                <img width="12" src="assets/img/chat/men.jpeg" alt="">
                            </div>
                        </div>
                        <!---- Received And Outgoing Message Start ---->
                    </div>
                </div>
            </div>
            <div class="msg-bottom">
                <div class="bottom-icons">
                    <i class="fa fa-plus-circle"></i>
                    <i class="fa fa-camera"></i>
                    <i class="fa fa-microphone"></i>
                    <i class="fa fas fa-smile"></i>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="write message...">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>About Us</h4>
                                <div class="footer-pera">
                                    <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so behold.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>
                                    <p>Address :Your address goes
                                        here, your demo address.</p>
                                </li>
                                <li><a href="#">Phone : +8880 44338899</a></li>
                                <li><a href="#">Email : info@colorlib.com</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Important Link</h4>
                            <ul>
                                <li><a href="#"> View Project</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Testimonial</a></li>
                                <li><a href="#">Proparties</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter</h4>
                            <div class="footer-pera footer-pera2">
                                <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                            </div>
                            <!-- Form -->
                            <div class="footer-form" >
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                          method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                               class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = ' Email Address '">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img src="assets/img/icon/form.png" alt=""></button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>5000+</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>451</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>568</span>
                        <p>Talented Hunter</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-10 col-lg-10 ">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/price_rangs.js"></script>
<!-- Date Picker -->
<script src="./assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="./assets/js/jquery.scrollUp.min.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>
