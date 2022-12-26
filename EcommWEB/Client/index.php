
<?php
session_start();

include "navbaruser.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flash Zap</title>
    <link rel="stylesheet" href="../Main/css/main.css" />
    
    <script
      src="https://kit.fontawesome.com/1b5d036e6f.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    
    <div class="landing-container">
      <div class="landing-product">
        <div class="watch-product" style="background-color: #141414">
          <div class="product-left">
            <img src="../Main/assets/landing-3.webp" alt="watch1" />
          </div>
          <div class="product-right">
            <div class="watch-title"><b>ALL NEW PRODUCTS AVAILABLE ON <span style="color:#89fc89">FLASHZAP</span></div></b>
            <div class="watch-description">
              <div class="watch-btn"><a href="../Client/viewproduser.php">View Products Now</a></div>
            </div>
          </div>
        </div>
      </div>

      <div class="landing-product">
        <div class="watch-product" style="background-color: #141414">
          <div class="product-right">
            <div class="watch-title"><b>JOIN OUR ELITE SELLER TEAM <span style="color:#89fc89">#ZAPIANS</span></div></b>
            <div class="watch-description">
              <h5 class="mb-4"></h5>
              <div class="watch-btn mt-5"><a href="../Seller/">Seller Page</a></div>
            </div>
          </div>
          <div class="product-left">
            <img src="../Main/assets/landing-5.webp" alt="watch1" />
          </div>
        </div>
      </div>

      <div class="landing-product">
        <div class="watch-product" style="background-color: #141414">
          <div class="product-left">
            <img src="../Main/assets/landing-7.webp" alt="watch1" />
          </div>
          <div class="product-right">
            <div class="watch-title"><b>THIS WEBSITE IS CREATED BY  <br><span style="color:#89fc89">Ojasvi Deepak</span></div></b>
            <div class="watch-description">
              <div class="watch-btn"><a href="../Seller/">Sign-UP/Login for Selling products </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer id="footer">
      <div class="footer-container">
        <div class="info-box">
          <div class="footer-title">
            <h2>About Us</h2>
          </div>
          <div class="footer-links">
            <a href="index.php">our company</a>
            <a href="viewproduser.php">our products</a>
            <a href="index.php">stories and news</a>
            <a href="PNF.php">our archive</a>
            <a href="PNF.php">Investor Relations</a>
            <a href="PNF.php">Customer Service</a>
          </div>
        </div>

        <div class="info-box">
          <div class="footer-title">
            <h2>Careers</h2>
          </div>
          <div class="footer-links">
            <a href="PNF.php">Culture and Values</a>
            <a href="PNF.php">Inclusion, Diversity, and Equity</a>
            <a href="PNF.php">College Achievement Plan</a>
            <a href="PNF.php">Alumni Community</a>
            <a href="PNF.php">U.S. Careers</a>
            <a href="PNF.php">International Careers</a>
          </div>
        </div>

        <div class="info-box">
          <div class="footer-title">
            <h2>Social Impact</h2>
          </div>
          <div class="footer-links">
            <a href="PNF.php">People</a>
            <a href="PNF.php">Planet</a>
            <a href="PNF.php">Environmental and Social Impact Reporting</a>
          </div>
        </div>

        <div class="info-box">
          <div class="footer-title">
            <h2>Business</h2>
          </div>
          <div class="footer-links">
            <a href="../Seller/" class="seller-login-link">Seller Page</a>
            <a href="../Seller/login.html" class="seller-login-link">Seller Login</a>
            <a href="../Seller/signup.html" class="seller-login-link">Seller Sign up</a>
        </div>
        </div>
      </div>
      <hr />

      <div class="social-links">
        <a href="PNF.php"><i class="fa-brands fa-spotify fa-2x"></i></a>
        <a href="PNF.php"><i class="fa-brands fa-facebook fa-2x"></i></a>
        <a href="PNF.php"><i class="fa-brands fa-pinterest fa-2x"></i></a>
        <a href="PNF.php"><i class="fa-brands fa-instagram fa-2x"></i></a>
        <a href="PNF.php"><i class="fa-brands fa-youtube fa-2x"></i></a>
        <a href="PNF.php"><i class="fa-brands fa-twitter fa-2x"></i></a>
      </div>

      <div class="privacy-policy">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="#">Do Not Share My Personal Information</a>
        <a href="#">CA Supply Chain Act</a>
        <a href="#">Cookie Prefrences</a>
      </div>

      <div class="copyright">
        <h3>© 2022 Flash Zap watch Company. All rights reserved.</h3>
      </div>
    </footer>
    </body>
</html>
