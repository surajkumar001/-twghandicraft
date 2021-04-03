<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
    .home-v3-banner-with-products-carousel .section-products-carousel .products .slick-arrow{
    padding-bottom: 1.938em;
    padding-top: 12%;
    
}


.new-img{
    
    height:50%;
    width:50%;
}
.img225{
    height: 225px !important;
    width: 100%;
}
.mids{
    height:50%;
    width:25%;
    float:left;
    margin-right:20px;
}
.mids2{
    height:50%;
    width:30%;
    float:left;
    margin-right:20px;
}
.mids3{
    height:50%;
    width:30%;
    float:left;
}
/*stye*/

{box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none;height:200px;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
/*stye*/

/*style for products*/
.product-grid{
    font-family: 'Poppins', sans-serif;
    text-align: center;
    overflow: hidden;
    border: 1px solid #d1d1d1
}
.product-grid .product-image{
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid #d1d1d1;
}
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-image .pic-1{
    backface-visibility: hidden;
    transition: all .3s ease 0s;
}
.product-image .pic-2{
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    opacity: 0;
    transform: scale(0.3);
    filter: blur(5px);
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.3s ease;
}
.product-grid .product-image:hover .pic-2{
    opacity: 3;
    transform: scale(1);
    filter: blur(0);
    background:red;
}
.product-grid .product-image .product-discount-label{
    color: #fff;
    background: #f03838;
    font-size: 12px;
    font-weight: 700;
    padding: 3px 7px 3px 15px;
    position: absolute;
    top: 10px;
    right: 0;
    z-index: 1;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 20% 100%);
    transition: all 0.3s ease;
}
.product-grid:hover .product-image .product-discount-label{ right: -100px; }
.product-grid .social{
    padding: 0;
    margin: 0;
    list-style: none;
    position: absolute;
    top: 10px;
    right: -100px;
    z-index: 1;
    transition: all 0.3s ease;
}
.product-grid:hover .social{ right: 10px; }
.product-grid .social li a{
    color: #fff;
    background-color: #d1d1d1;
    font-size: 18px;
    line-height: 35px;
    height: 35px;
    width: 35px;
    margin: 0 0 5px;
    display: block;
    position: relative;
    transition: all 0.3s ease 0s;
}
.product-grid .social li a:hover{ background-color: #70A226; }
.product-grid .product-content{
    text-align: left;
    padding: 12px 15px 18px;
    position: relative;
}
.product-content .rating{
    padding: 0;
    margin: 0 0 5px;
    list-style: none;
}
.product-grid .rating li{
    color: #FFB400;
    font-size: 12px;
}
.product-grid .title{
    font-size: 15px;
    font-weight: 500;
    text-transform: capitalize;
    margin: 0 0 10px;
}
.product-grid .title a{
    color: #333;
    transition: all 0.3s ease;
}
.product-grid .title a:hover{ color: #70A226; }
.product-grid .price{
    color: #70A226;
    font-size: 16px;
    font-weight: 600;
}
.product-grid .price span{
   color: #999;
   font-size: 15px;
   text-decoration: line-through;
   margin-right: 5px;
}
.product-grid .add-to-cart{
    color: #fff;
    background-color: #70A226;
    text-align: center;
    line-height: 35px;
    height: 35px;
    width: 35px;
    position: absolute;
    bottom: 9px;
    right: -100px;
    transition: all 0.3s ease;
}
.product-grid:hover .add-to-cart{ right: 10px; }
.product-grid .add-to-cart:hover{ background-color: #333; }
/*tooltip-style*/
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
/*tooltip-style*/

@media screen and (max-width:990px){
    .product-grid{ margin: 0 0 30px; }
}
/*style for product*/
@media only screen and (max-width: 480px) {
  .product_list_container {
    height: 220px;
}
}
@media (min-width: 1200px)
@media (max-width: 1699px){
.home-v3-banner-with-products-carousel .section-products-carousel.column-2 {
    flex: 0 0 100% !important;
    max-width: 100% !important;
}
}
</style>
<div class="xs-banner banner-fullwidth-version-2">
    <div class="">
       <div class="row">
       <div class="col-md-12">
        <style type="text/css">
           @keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}

div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
position: relative;
width: 500vw;
margin: 0;
left: 0;
text-align: left;
font-size: 10;
animation: 10s slidy infinite; 
}

.page {
display: flex; 
justify-content: center; 
}

.project {
display: flex; 
align-items: center; 
}
.hgt{
    height: 300px !important;
}
.moqs{
        float: right;
    margin-top: -10%;
}
@media (max-width: 468px){
    .hgt{
    height: 150px !important;
}
.moqs{
        float: right;
    margin-top: -14%;
}
}
.product_list_container .product_list_img {
    margin-top: 2%;
    }
        </style>
       
            
      

<!--PRODUCT-->

<div class="slideshow-container">

<div class="mySlides">
  <div class="numbertext">1 / 3</div>

     <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://technowhizz.co.in/wholesale/assets/product/wall1.jpeg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                       
                     
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://technowhizz.co.in/wholesale/assets/product/wall1.jpeg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
 <!-- <img src="http://technowhizz.co.in/wholesale/assets/product/711omP+yipL._AC_SL1500_.jpg" style="width:100%;height:50%;">-->

</div>

<div class="mySlides">
  <div class="numbertext">2 / 3</div>
    <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
  <div class="text">Caption Two</div>
</div>

<div class="mySlides">
  <div class="numbertext">3 / 3</div>
   <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
    </div>
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>




<!--products-->
<div class="slideshow-container">
<div class="container">
    <div class="row">
        <div class="mySlides">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
          <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <span class="product-discount-label">-33%</span>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Cotton T-Shirt</a></h3>
                    <div class="price"><span>$33.00</span> $22.00</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg">
                    </a>
                    <ul class="product-links">
                        <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href=""><i class="fas fa-eye"></i></a></li>
                        <li><a href=""><i class="fas fa-heart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price">$25.50</div>
                </div>
            </div>
        </div>
        </div>
        <!---slider2-->
      
        
    </div>
</div>
</div>
<!----product--->
<!-----javascript---->



<div class="mains" style="background:red;">
 <div class="popup" onclick="myFunction()">Click me to toggle the popup!
  <span class="popuptext" id="myPopup">A Simple Popup!</span>
</div>
</div>



  <?php 
include 'footer.php';
      ?>
    
    
      <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<!---->

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
