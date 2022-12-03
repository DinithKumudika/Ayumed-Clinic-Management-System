<?php //require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT ?>/css/home.css">
     <title>Ayumed</title>
</head>
<body>
<nav id="nav">
    <div class="logo">Ayumed</div>
    <div>
        <ul class="nav-links">
            <li><a href="#home" class="nav-link">Home</a></li>
            <li><a href="#services" class="nav-link">Services</a></li>
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#location" class="nav-link">Location</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
    </div>
    <div class="menu-btn">
        <div class="line-1"></div>
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
</nav>
<div class="main-container">
    <div class="section banner" id="home">
        <div class="banner-text-1" id="text-1">Healing Hands</div>
        <div class="banner-text-2" id="text-2">Caring Hearts</div>
        <div class="btn-group">
            <div class="banner-button" id="banner-btn">
                <a href="<?php echo URL_ROOT ?>/user/register_patient">
                    <button id="banner-btn-register">Register Now</button>
                </a>
            </div>
            <div class="banner-button" id="banner-btn">
                <a href="<?php echo URL_ROOT ?>/user/login_patient">
                    <button id="banner-btn-login">Login</button>
                </a>
            </div>
        </div>
    </div>
    <div class="section services" id="services">
        <div class="section-title">Our Services</div>
        <div class="h-line"></div>
        <div class="wrapper">
            <div class="service service-1">
                <div>
                    <img src="<?php echo URL_ROOT ?>/images/service-1.jpg" alt="" class="service-img">
                </div>
                <div class="service-detail">
                    <div class="service-name">Channel Doctor</div>
                    <div class="service-desc">make an appointment with the doctor in a lightning speed</div>
                </div>
            </div>
            <div class="service service-2">
                <div>
                    <img src="<?php echo URL_ROOT ?>/images/service-2.jpg" alt="" class="service-img">
                </div>
                <div class="service-detail">
                    <div class="service-name">SMS Alerts</div>
                    <div class="service-desc">Get alerts via SMS about your appointments, clinic dates and many more</div>
                </div>
            </div>
            <div class="service service-3">
                <img src="<?php echo URL_ROOT ?>/images/service-3.jpg" alt="" class="service-img">
                <div class="service-detail">
                    <div class="service-name">Electronic Report Management</div>
                    <div class="service-desc">Manage your health records electronically using our clinic management system</div>
                </div>
            </div>
            <div class="service service-4">
                <img src="<?php echo URL_ROOT ?>/images/service-4.jpg" alt="" class="service-img">
                <div class="service-detail">
                    <div class="service-name"></div>
                    <div class="service-desc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="section about" id="about">
        <div class="section-title">About</div>
        <div class="h-line"></div>
        <div class="wrapper">
            <div class="doc-img-frame">
                <div class="img-outline"></div>
                <div class="doctor-image">
                    <img src="<?php echo URL_ROOT ?>/images/doctor.jpg" alt="" class="img-doctor">
                </div>
            </div>
            <div class="doctor-details">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus urna a enim ultricies lacinia. Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dapibus urna a enim ultricies lacinia. Nulla facilisi.</p>
            </div>
        </div>
    </div>
    <div class="section location" id="location">
        <div class="section-title">Location</div>
        <div class="h-line"></div>
        <div class="wrapper">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.655869073303!2d79.888675!3d6.911167!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d59cfd3fff76041!2sNational%20Ayurvedic%20Teaching%20Hospital%20-%20Borella!5e0!3m2!1sen!2slk!4v1669479085386!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="address">
                <div>
                    <h3>Address</h3>
                    <h5>No.325,</h5>
                    <h5>Dr.N.M.Perera Mawatha,</h5>
                    <h5>Colombo 08</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="section contact" id="contact">
        <div class="section-title">Contact Us</div>
        <div class="h-line"></div>
        <div class="wrapper">
            <form action="" method="post" id="contact-form">
                <div class="form-group">
                    <input type="text" class="form-input" name="name" placeholder="name" id="name-input">
                    <div class="err-msg"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" placeholder="email" id="email-input">
                    <div class="err-msg"></div>
                </div>
                <div class="form-group">
                    <textarea name="message" id="msg-input" cols="30" rows="10" class="form-input" placeholder="message"></textarea>
                    <div class="err-msg"></div>
                </div>
                <div>
                    <input type="submit" value="Submit" class="sumbit-btn" id="sumbit-btn">
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>About us</h4>
                <div>
                    <p>
                        HelaChai coffee shop offers a unique coffee house environment unlike any other in Sri Lanka.
                        We are not only a place to drop in and get your morning cup of coffee (although you are more than welcome to do that), we are a place where you can sit down and enjoy that tailor-made cup of coffee.
                        We offer a delicious variety of coffee made by our professionally trained baristas. We have everything from classic coffee to our house made specialty beverages and we offer everything from classic coffee to our house made specialty beverages.
                    </p>
                </div>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li>
                        <i class="fa-solid fa-phone"></i><a href="#">+94 72 222 34 56</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i><a href="#">+94 11 282 32 65</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i><a href="#">helachaicoffee@gmail.com</a>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Subscribe</h4>
                <ul>
                    <li>Subscribe to our Newsletter</li>
                    <li><input type="email" name="sub" id="sub"></li>
                    <li><button class="sub-btn">Subscribe</button></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p>
    </div>
</footer>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
    <script src="<?php echo URL_ROOT; ?>/js/home.js"></script>
</body>