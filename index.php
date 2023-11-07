<?php
    session_start();
    if ((isset($_SESSION['isLogin'])) && ($_SESSION['isLogin']==true))
    {
      $login = true;
    }
?>
<HTML>
<HEAD>
<TITLE>Home | Branded Shop</TITLE>
<link href="style/shop.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
.banner {
  background-image: url(tech-background.jpg);
  background-size: cover;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.banner-title {
  font-size: 48px;
  color: white;
  text-shadow: 1px 1px #333;
}

.banner-subtitle {
  font-size: 24px;
  color: white;
  text-shadow: 1px 1px #333;
  margin-bottom: 20px;
}

.banner-button {
  background-color: #007bff;
  color: white;
  padding: 12px 24px;
  border-radius: 50px;
  text-decoration: none;
  font-size: 18px;
  display: inline-block;
}
</style>
</HEAD>
<BODY>
<nav class="navbar navbar-expand-lg navbar-dark bg-grey">
  <a class="navbar-brand" href="#">Tech Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <?php  if ((isset($_SESSION['isLogin'])) && ($_SESSION['isLogin']==true)) {?>
        <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php } else { ?>
        <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
         <?php } ?>
    </ul>
  </div>
</nav>
    
<div class="banner">
  <div class="container">
    <h1 class="banner-title">Discover the Latest Technology</h1>
    <p class="banner-subtitle">Find the latest and greatest tech products at our shop</p>
    <a href="shop.php" class="banner-button">Explore Now</a>
  </div>
</div>


<section class="footers bg-light pt-5 pb-3">
        <div class="container pt-5">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 footers-one">
                    <div class="footers-logo">
                        <a class="navbar-brand" href="#">Tech Shop</a>
                    </div>
                    <div class="footers-info mt-3">
                        <p>Cras sociis natoque penatibus et magnis Lorem Ipsum tells about the compmany right now the
                            best.</p>
                    </div>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/"><i id="social-fb"
                                class="fa fa-facebook-square fa-2x social"></i></a>
                        <a href="https://twitter.com/"><i id="social-tw"
                                class="fa fa-twitter-square fa-2x social"></i></a>
                        <a href="https://plus.google.com/"><i id="social-gp"
                                class="fa fa-google-plus-square fa-2x social"></i></a>
                        <a href="mailto:bootsnipp@gmail.com"><i id="social-em"
                                class="fa fa-envelope-square fa-2x social"></i></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 footers-two">
                    <h5>Essentials </h5>
                    <ul class="list-unstyled">
                        <li><a href="maintenance.html">Search</a></li>
                        <li><a href="contact.html">Sell your Car</a></li>
                        <li><a href="about.html">Advertise with us</a></li>
                        <li><a href="about.html">Dealers Portal</a></li>
                        <li><a href="about.html">Post Requirements</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 footers-three">
                    <h5>Information </h5>
                    <ul class="list-unstyled">
                        <li><a href="maintenance.html">Register Now</a></li>
                        <li><a href="contact.html">Advice</a></li>
                        <li><a href="about.html">Videos</a></li>
                        <li><a href="about.html">Blog</a></li>
                        <li><a href="about.html">Services</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 footers-four">
                    <h5>Explore </h5>
                    <ul class="list-unstyled">
                        <li><a href="maintenance.html">News</a></li>
                        <li><a href="contact.html">Sitemap</a></li>
                        <li><a href="about.html">Testimonials</a></li>
                        <li><a href="about.html">Feedbacks</a></li>
                        <li><a href="about.html">User Agreement</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 footers-five">
                    <h5>Company </h5>
                    <ul class="list-unstyled">
                        <li><a href="maintenance.html">Career</a></li>
                        <li><a href="about.html">For Parters</a></li>
                        <li><a href="about.html">Terms</a></li>
                        <li><a href="about.html">Policy</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="disclaimer bg-light border">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 py-2">
                    <small>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Cum sociis natoque penatibus et magnis dis parturient montes.
                        Faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing. Tellus in metus
                        vulputate eu scelerisque felis. Proin fermentum leo vel orci porta non pulvinar. Mauris augue
                        neque gravida in fermentum et sollicitudin ac. Elementum nibh tellus molestie nunc non. Ac
                        tortor vitae purus faucibus ornare suspendisse sed. Viverra justo nec ultrices dui sapien eget
                        mi proin sed. Quam quisque id diam vel quam. Venenatis tellus in metus vulputate. Quis hendrerit
                        dolor magna eget est lorem ipsum. Risus ultricies tristique nulla aliquet enim tortor. Volutpat
                        commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Dignissim sodales
                        ut eu sem integer vitae. Quam vulputate dignissim suspendisse in est. Cras ornare arcu dui
                        vivamus arcu felis bibendum ut. Fringilla ut morbi tincidunt augue interdum velit euismod in.
                        Accumsan in nisl nisi scelerisque eu ultrices vitae.
                    </small>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright border">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 pt-3">
                    <p class="text-muted">©2023 kelompok 6.rplk</p>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>