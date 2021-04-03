<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
<style>
    .home-v3-banner-with-products-carousel .section-products-carousel .products .slick-dots {
    padding-bottom: 1.938em;
    padding-top: 12%;
    
}
.img225{
    height: 225px !important;
    width: 100%;
}
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






<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

.hello{ width:250px;height:150px;
    
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
        <div id="slider">
<figure>
                      
<img class="hgt" src="http://ameyaderm.com/art//assets/product/promo_31102019.jpg" alt="">
<img class="hgt" src="http://ameyaderm.com/art//assets/product/archies-product-1-1568266123.jpg" alt="">
<img class="hgt" src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" alt="">
<img class="hgt" src="http://ameyaderm.com/art//assets/product/archies-product-1-1568266123.jpg" alt="">
                    
<img class="hgt" src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" alt="">
</figure>
</div>

<div class="slider-image">
  <div><img src="http://ameyaderm.com/art//assets/product/promo_31102019.jpg" class="hello"></div>
  <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1568266123.jpg" class="hello"></div>
  <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>
    <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>
    <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>
    <!--<div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>
    <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>
    <div><img src="http://ameyaderm.com/art//assets/product/archies-product-1-1572418441.jpg" class="hello"></div>-->
</div>  
            
       </div>
    </div>
    </div>
</div>















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    


$(document).ready(function(){
  $('.slider-image').slick({
    setting-name: setting-value
  });
});
    
</script>








  <?php 
include 'footer.php';
      ?>