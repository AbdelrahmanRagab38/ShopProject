<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
         <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam cell  Automation</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="images/download.jpeg" >
    </head>

    <body>
        <?php include 'navegation.php';?>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image  -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide" >
                        <div class="da-img" align="right">
                        <img src="images/hello.png" alt="image01" width="400">
                        </div>
                        <h2>Welcome To Exam cell automtion seystem!</h2>
                        <h4>Now You Can get your Grades Easy With Us.</h4>
                  <a href="register.php" class="da-link button">Register Now!</a>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>Easy Shopping</h2>
                        <h4>Perfect Prices</h4>
                        <a href="products.php" class="da-link button">Shop Now</a>
                        <div class="da-img">
                            <img src="images/shipcar.png" width="320" alt="image02">
                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>Fast and Free shipping</h2>
                        <h4>For Special Customers </h4>
                        <a href="#about" class="da-link button">More About Us</a>
                        <div class="da-img">
                            <img src="images/ship.png" width="320" alt="image03">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>Our Slogan</h1>
                    <!-- Section's title goes here -->
                    <p>When People Dress Well, They Play Well.</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/q.png" alt="service 1">
                            </div>
                            <h3>Who We Are?</h3>
                            <p>We Create Modern And Comfirtable Designs That Allow Our Customers To Play Well.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/like.jpg" alt="service 2" />
                            </div>
                            <h3>Our Customers!</h3>
                            <p>We Care About You, To Contact Us Easy, To Have Your Order With a Perfect Quality.</p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/star2.png" alt="service 3">
                            </div>
                            <h3>What's New!</h3>
                            <p>When You Reach Specific Total, You Will Be a Golden Customer With More Offers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service section end -->

        <!-- About us section start -->
        <div class="section secondary-section" id="about" align="center">
            <div class="triangle"></div>
            <div class="container" >
                <div class="title">
                    <h1>Who We Are?</h1>
                    <p>We Are Level Two Students At Faculty Of Computers And Information Helwan University.</p>
                </div>
                <div class="row-fluid team" >
                    <div class="span3" id="first-person">
                        <div class="thumbnail">
                            <img src="images/Abdelrahman.jpg" alt="team 1">
                            <h3>Abdelrahman Ragab</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/abdo.mohamed.3745">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-twitter-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-linkedin-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mask">
                                <h2>Team Leader</h2>
                                <p>Level 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="span3" id="second-person">
                        <div class="thumbnail">
                            <img src="images/Abdelrahman.jpg" alt="team 2">
                            <h3>Abdelrahman Ragab</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/AsmaaNasserS">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-twitter-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-linkedin-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mask">
                                <h2>Team Member</h2>
                                <p>Level 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="span3" id="third-person">
                        <div class="thumbnail">
                            <img src="images/Abdelrahman.jpg" alt="team 3">
                            <h3>Abdelrahman Ragab</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/abdelfat7.mo7med">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-twitter-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-linkedin-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mask">
                                <h2>Team Member</h2>
                                <p>Level 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="span3" id="fourth-person">
                        <div class="thumbnail">
                             <img src="images/Abdelrahman.jpg" alt="team 4">
                            <h3>Abdelrahman Ragab</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/abdo.mohamed.3745">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-twitter-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-linkedin-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mask">
                                <h2>Team Member</h2>
                                <p>Level 2</p>
                            </div>
                </div>
                    </div>
                </div>
                <p></p>
                <div class="row-fluid team" >
                         <div class="span3" id="fifth-person">
                        <div class="thumbnail">
                            <img src="images/Abdelrahman.jpg" alt="team 5">
                            <h3>Abdelrahman Ragab</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/abdo.mohamed.3745">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-twitter-circled"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon-linkedin-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mask">
                                <h2>Team Member</h2>
                                <p>Level 2</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <!-- Client section start -->
        <div id="clients">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Some Feedback</h1>
                        <p>We Care About Customers Feedback To Keep Improving Ourselves!</p>
                    </div>
                    <div class="row">
                        <div class="span4">
                            <div class="testimonial">
                                <p>"I was So Pleased To Be A Golden Customer, I Have Alot Of Discounts And Offers, It's Really A Good Thing."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/man.png" class="centered" alt="client 1">
                                    <strong>Ahmed
                                        <small>Customer</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <p>"I'm Pleassed To Buy From You, Your Sevice And Products Are Wonderful,It Has Been Long time To Find A Good Store Thank You!. "</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/women.png" class="centered" alt="client 2">
                                    <strong>Soha
                                        <small>Customer</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="testimonial">
                                <p>"Your Products Looks Like Orginals! With Perfect Price, I will Always Get My Sports thing From Here."</p>
                                <div class="whopic">
                                    <div class="arrow"></div>
                                    <img src="images/male.png" class="centered" alt="client 3">
                                    <strong>Mohamed
                                        <small>Customer</small>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-text">
                        "Perfection is Achieved Not When There Is Nothing More to Add, But When There Is Nothing Left to Take Away"
                    </p>
                </div>
            </div>
        </div>

        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Newsletter</h3>
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>Keep in touch with our new products</p>
                    </div>
                    <div class="span7">
                        <form class="inline-form">
                            <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required />
                            <button id="subscribe" class="button button-sp">Subscribe</button>
                        </form>
                        <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Feedback</h1>
                        <p>We Glad To Hear Your Opnion</p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <h3>Say Hello</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Well done!</strong>Your message has been sent.
                                </div>
                                <div id="errorSend" class="alert alert-error invisible">There was an error.</div>
                                <form id="contact-form" action="sendmail.php">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" id="name" name="name" placeholder="* Your name..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="email" name="email" id="email" placeholder="* Your email..." />
                                            <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="comment" id="comment" placeholder="* Comments..."></textarea>
                                            <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                        </div>
                                    </div>
                                    <div class="control-group" >
                                        <div class="controls">
                                            <button id="send-mail" class="message-btn">Send Feedback</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="span9 center contact-info">
                        <p>To Reach Our Team Please Send Here!</p>
                        <p class="info-mail">abdoragab38@gmail.com</p>
                        <div class="title">
                            <h3>We Are Social!</h3>
                        </div>
                    </div>
                    <div class="row-fluid centered">
                        <ul class="social">
                            <li>
                                <a href="">
                                    <span class="icon-facebook-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-twitter-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-linkedin-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-pinterest-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-dribbble-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-gplus-circled"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact section edn -->
       <?php include 'footer.php'; ?>
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
