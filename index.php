<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- primary meta tags -->
  <title>CHOCOLATE REPUBLIC - Simply the Best</title>
  <meta name="title" content="CHOCOLATE REPUBLIC - Simply the Best">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

  <!-- custom css link -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- preload images -->
  <link rel="preload" as="image" href="./assets/images/hero-slider-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-slider-3.jpg">

</head>

<body id="top">
<?php include 'database/db.php'?>
  <!-- #PRELOADER -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">CHOCOLATE REPUBLIC</p>
  </div>





  <!-- #TOP BAR -->

  <div class="topbar">
    <div class="container">

      <address class="topbar-item">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">
          Biñan City, Laguna
        </span>
      </address>

      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">Daily : 8:00 am to 10:00 pm</span>
      </div>

      <div class="topbar-item link">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">+88 456 7890</span>
      </div>

      <div class="separator"></div>

      <a href="#" class="topbar-item link">
        <div class="icon">
          <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">chocolaterepublic@email.com</span>
      </a>

    </div>
  </div>





  <!-- #HEADER -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.svg" width="210" height="50" alt="">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" width="160" height="50" alt="">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#menu" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Our Products</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">About Us</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Contact Us</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Visit Us</p>

          <address class="body-4">
            Pangalan ng St, Pangalan ng City
          </address>

          <p class="body-4 navbar-text">Open: 8:00 am - 10:00 pm</p>

          <a href="#" class="body-4 sidebar-link">chocolaterepublic@email.com</a>

          <div class="separator"></div>

          <p class="contact-label">Order Reservation Request</p>

          <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
            +88-123-123456
          </a>
        </div>

      </nav>


      <a href="#" class="btn btn-secondary" id="">
        <span class="text text-1">Log In Now</span>

        <span class="text text-2" aria-hidden="true">Log In Now</span>
      </a>

      <button class="nav-open-btn" aria-label="" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>


    </div>
  </header>


  <!-- User -->
  <section>


    <div class="wrappers">

      <span class="icon-close">
        <i>
          <ion-icon name="close"></ion-icon>
        </i>
      </span>

      <div class="logreg-box">

        <!-- USER LOGIN -->
        <div class="form-box login">
          <div class="logreg-title">
            <h2>Login</h2>
            <p>Please Login to Continue</p> <br>
          </div>

          <form action="user_login.php" method="POST">
            <div class="input-box">
              <span class="icons"><ion-icon name="person"></ion-icon></span>
              <input type="text" name="username" id="username" required>
              <label>Username</label>
            </div>

            <div class="input-box">
              <span class="icons"><ion-icon name="lock-closed"></ion-icon></span>
              <input type="password" name="password" id="password" required>
              <label>Password</label>
            </div>

            <div class="remember-forgot">
              <label>
                <input type="checkbox">
                Remember me
              </label>
              <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" name="submit" class="btnLogin">Login</button>

            <div class="logreg-link">
              <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
          </form>
        </div>

        <!-- USER REGISTRATION -->
        <div class="form-box register">
          <div class="logreg-title">
            <h2>REGISTRATION</h2>
            <p>Please provide the following details</p> <br>
          </div>

          <form action="user_registration.php" method="post" id="reg_form">
            <div class="input-box">
              <span class="icons"><ion-icon name="person"></ion-icon></span>
              <input name="name" id="name" type="text" required>
              <label>Name</label>
            </div>

            <div class="input-box">
              <span class="icons"><ion-icon name="person"></ion-icon></span>
              <input name="contactno" id="contactno" type="text" required>
              <label>Contact No.</label>
            </div>

            <div class="input-box">
              <span class="icons"><ion-icon name="person"></ion-icon></span>
              <input name="username" id="username" type="text" required>
              <label>Username</label>
            </div>

            <div class="input-box">
              <span class="icons"><ion-icon name="lock-closed"></ion-icon></span>
              <input name="password" id="password" type="password" minlength="8" required>
              <label>Password</label>
            </div>
            <div class="input-box">
              <span class="icons"><ion-icon name="lock-closed"></ion-icon></span>
              <input name="confirmpass" id="confirmpass" type="password" minlength="8" required>
              <label>Re-type Password</label>
            </div>
            <button type="submit" name="submit" id="submit" class="btnLogin">Register</button>
            <div class="logreg-link">
              <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  

  <main>
    <article>

      <!-- #HERO -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-1.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Local & Imported</p>

            <h1 class="display-1 hero-title slider-reveal">
              For the love of <br>
              delicious chocolates
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Come with family & friends and enjoy the company. With chocolates. Of course.
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">View Our Products</span>

              <span class="text text-2" aria-hidden="true">View Our Products</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-2.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">delightful experience</p>

            <h1 class="display-1 hero-title slider-reveal">
              Sweetness that is <br>
              unique
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Come with family & feel the joy of our best tasting chocolates.
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">View Our Products</span>

              <span class="text text-2" aria-hidden="true">View Our Products</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="./assets/images/hero-slider-3.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">amazing & delicious</p>

            <h1 class="display-1 hero-title slider-reveal">
              Where every bar <br>
              tells a story
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Where every bar is a tale of flavor and artistry, crafted to captivate your senses and leave a lasting memory."
            </p>

            <a href="#" class="btn btn-primary slider-reveal">
              <span class="text text-1">View Our Products</span>

              <span class="text text-2" aria-hidden="true">View Our Products</span>
            </a>

          </li>

        </ul>

        <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="slide to next" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        <a href="#" class="hero-btn has-after">
          <img src="./assets/images/hero-icon.png" width="40" height="40" alt="booking icon">

          <span class="label-2 text-center span">Place Order Now</span>
        </a>

      </section>





      <!-- #SERVICE -->

      <section class="section service bg-black-10 text-center" aria-label="service">
        <div class="container">

          <p class="section-subtitle label-2">Taste Fit For A King</p>

          <h2 class="headline-1 section-title">We Provide Premium Chocolates</h2>

          <p class="section-text">
            At Chocolate Republic, we provide divine chocolates using the finest ingredients. From velvety truffles to
            rich dark delights, our premium selection guarantees an exceptional experience. Indulge in pure bliss and
            make sweet memories with us.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/choco.jpg" width="285" height="336" loading="lazy" alt="Breakfast"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Chocolates</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Our Product</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/imported.jpg" width="285" height="336" loading="lazy" alt="Originals"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Imported Products</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Our Product</a>

                </div>

              </div>
            </li>

            <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="./assets/images/others.avif" width="285" height="336" loading="lazy" alt="Other"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">Others</a>
                  </h3>

                  <a href="#" class="btn-text hover-underline label-2">View Our Product</a>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="shape"
            class="shape shape-1 move-anim">
          <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">

        </div>
      </section>





      <!-- #ABOUT -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Our Story</p>

            <h2 class="headline-1 section-title">Chocolate Republic serving the best since February 2022</h2>

            <p class="section-text">
              Embark on a delightful journey through time with Chocolate Republic, a bastion of chocolate excellence
              since its inception in February 2022. Our story began with a vision to create an oasis for chocolate
              enthusiasts, offering the very best in quality and taste. From humble beginnings, we poured our hearts
              into crafting the finest chocolates, infusing each creation with passion and dedication.
            </p>
            <p class="section-text">
              As the years passed, Chocolate Republic flourished, earning the adoration of countless patrons who
              relished our handcrafted confections. Our unwavering commitment to perfection led us to explore new
              flavors and techniques, pushing the boundaries of chocolate artistry.
            </p>
            <p class="section-text">
              Today, Chocolate Republic stands as a testament to the enduring love for this decadent delight. Our legacy
              of excellence endures, as we continue to mesmerize taste buds with our exquisite range of treats. Join us
              as we continue to redefine the art of chocolate-making, ensuring that every bite is a moment of pure
              bliss. Thank you for being a part of our sweet history.
            </p>

            <div class="contact-label">Order Through Call</div>

            <a href="#" class="body-1 contact-number hover-underline">+80 (400) 123 4567</a>

            <a href="#" class="btn btn-primary">
              <span class="text text-1">Read More</span>

              <span class="text text-2" aria-hidden="true">Read More</span>
            </a>

          </div>

          <figure class="about-banner">

            <img src="./assets/images/store-1.jpg" width="570" height="570" loading="lazy" alt="store" class="w-100"
              data-parallax-item data-parallax-speed="1">

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="./assets/images/store-2.jpg" width="285" height="285" loading="lazy" alt="" class="w-100">
            </div>
            <!-- 
            <div class="abs-img abs-img-2 has-before">
              <img src="./assets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div> -->

          </figure>

          <!-- <img src="./assets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape"> -->

        </div>
      </section>


      <!-- #MENU -->

      <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">

          <p class="section-subtitle text-center label-2">Special Selection</p>

          <h2 class="headline-1 section-title text-center">Our Products</h2>

          <ul class="grid-list">

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/kitkat.png" width="100" height="100" loading="lazy" alt="KitKat"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">KitKat</a>
                    </h3>

                    <span class="badge label-1">Best Seller</span>

                    <span class="span title-2">PHP25.50</span>
                  </div>

                  <p class="card-text label-1">
                    KitKat sustainable source cocoa 10x size
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/mars classic.png" width="100" height="100" loading="lazy" alt="Mars"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Mars Classic 47g</a>
                    </h3>

                    <span class="badge label-1">Special</span>

                    <span class="span title-2">PHP69.00</span>
                  </div>

                  <p class="card-text label-1">
                    Mars Classic Chocolate Bar 47g
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/toblerone.png" width="100" height="100" loading="lazy" alt="Toblerone"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Toblerone Milk 400g</a>
                    </h3>

                    <span class="span title-2">PHP69.00</span>
                  </div>

                  <p class="card-text label-1">
                    Toblerone Milk 400g Chocolate
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/sneakers.png" width="100" height="100" loading="lazy" alt="Snickers"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Snickers bar 51g</a>
                    </h3>

                    <span class="badge label-1">Favorite</span>

                    <span class="span title-2">PHP39.00</span>
                  </div>

                  <p class="card-text label-1">
                    Snickers bar 51g
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/hersheys dark.png" width="100" height="100" loading="lazy" alt="Hershey's"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Hershey's Dark Chocolate 40g</a>
                    </h3>

                    <span class="span title-2">PHP49.50</span>
                  </div>

                  <p class="card-text label-1">
                    Hershey's Dark Chocolate 40g
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="menu-card hover:card">

                <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                  <img src="./assets/images/twix minis.png" width="100" height="100" loading="lazy" alt="Icecream"
                    class="img-cover">
                </figure>

                <div>

                  <div class="title-wrapper">
                    <h3 class="title-3">
                      <a href="#" class="card-title">Twix Minis</a>
                    </h3>

                    <span class="badge label-1">Favorites</span>

                    <span class="span title-2">PHP69.69</span>
                  </div>

                  <p class="card-text label-1">
                    twix minis
                  </p>

                </div>

              </div>
            </li>

          </ul>

          <p class="menu-text text-center">
            We are open daily from <span class="span">8:00 am</span> to <span class="span">10:00 pm</span>
          </p>

          <a href="#" class="btn btn-primary">
            <span class="text text-1">View All Products</span>

            <span class="text text-2" aria-hidden="true">View All Products</span>
          </a>

          <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
      </section>





      <!-- #SEPARATOR/SPACING -->

      <section class="section testi text-center has-bg-image"
        style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
        <div class="container">

        </div>
      </section>





      <!-- #CONTACT US -->

      <section class="reservation">
        <div class="container">

          <div class="form reservation-form bg-black-10">



            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

              <h2 class="headline-1 text-center">Contact Us</h2>

              <p class="contact-label">Place Order via</p>

              <p class="body-1 contact-number">+63-123-123456</p>

              <div class="separator"></div>

              <p class="contact-label">Location</p>

              <address class="body-4">
                Pangalan ng St, Pangalan ng City
              </address>

              <p class="contact-label">Open Hours</p>

              <p class="body-4">
                Monday to Sunday <br>
                8:00 am to 10:00 pm
              </p>

            </div>

          </div>

        </div>
      </section>

    </article>
  </main>






  </footer>





  <!-- #BACK TO TOP -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- custom js link -->
  <script src="./assets/js/script.js"></script>

  <!-- ionicon link -->

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>