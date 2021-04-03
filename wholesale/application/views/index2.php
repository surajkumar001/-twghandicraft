<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>

<style>

		
.slider {
  width: 100%;
  height: 200px;
  position: relative;
  margin: auto;
  overflow-x: scroll;
  overflow-y: hidden;
  margin-top: 100px;
}

.slider::-webkit-scrollbar {
  display: none;
}

.slider .slide {
  display: flex;
  position: absolute;
  left: 0;
  transition: 0.3s left ease-in-out;
}

.slider .item {
  margin-right: 10px;
      height: 200px;
    
}

.slider .item:last-child {
  margin-right: 0;
}

.ctrl {
  text-align: center;
  margin-top: 5px;
}

.ctrl-btn {
  padding: 20px 20px;
  min-width: 50px;
  background: #fff;
  border: none;
  font-weight: 600;
  text-align: center;
  cursor: pointer;
  outline: none;

  position: absolute;
  top: 50%;
  margin-top: -27.5px;
}

.ctrl-btn.pro-prev {
  left: 0;
}

.ctrl-btn.pro-next {
  right: 0;
}






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
  
  
  <div class="home-v3-banner-with-products-carousel row section featured-product wow fadeInUp">
   <!-- <div class="banner column-1">
          <a href="http://technowhizz.co.in/wholesale/views/youmaylike">
            <div style="background-size: cover; background-position: center center; background-image: url( http://technowhizz.co.in/wholesale/assets/assets/images/banners/home-banner.jpg);" class="banner-bg bnrbgsize">
                    <div class="caption">
                        <div class="banner-info">
                            <h3 class="title">You may Like</h3>
                        </div>
                        <span class="banner-action button">View All</span>
                    </div>
            </div>
        </a>
    </div>-->
    <!-- .banner -->
 <div class="container">
      
    </div>
        <section class="section-products-carousel column-2">
          <div class="section-header" style="display: inline;">
                <h4 class="section-title" style="font-weight: 600;">Animal Painting <span style="float:right;">
                <a href="http://technowhizz.co.in/wholesale/views/Animal_Painting" class="btn btn-info pull-right" style="margin-top: -8px;padding: 6px 12px;font-size: 14px;font-weight: 600;">View All</a>
                </span></h4>
          </div>
        
        <div class="products-carousel carousel-without-attributes" id="slider" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
            
            <div class="container-fluid">
               
              <div class="woocommerce columns-7">
                 
                    <div class="products" id="slider">
                        
                                                    
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                             <div class="tag new"><span>new</span></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;1</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/The_New_Look_Display_Unit_MDF_(Medium_Density_Fiber)_Wall_ShelfB07HB373423" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/wall1.jpeg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>449</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>599.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="The New Look Display Unit MDF (Medium Density Fiber) Wall Shelf">The New Look Display Unit MDF (Medium Density Fiber) Wall Shelf</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_B07HB373423" class="selling_price"  value="449">
                                                                                
                                           <input type="hidden" id="gst_B07HB373423" class="gst"   value="12">
                                           <input type="hidden" id="gstinc_B07HB373423" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B07HB373423" class="pro_id" value="B07HB373423">
                                           
                                               <input type="hidden" id="min_qty_B07HB373423" class="gst"   value="1">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B07HB373423');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;8</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/Painting_Mantra_White_Flower_Table_Photo_Frame_4X6B01L7FF85812" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>675</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>486.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="Painting Mantra White Flower Table Photo Frame 4X6">Painting Mantra White Flower Table Photo Frame 4X6</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_B01L7FF85812" class="selling_price"  value="675">
                                                                                
                                           <input type="hidden" id="gst_B01L7FF85812" class="gst"   value="28">
                                           <input type="hidden" id="gstinc_B01L7FF85812" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B01L7FF85812" class="pro_id" value="B01L7FF85812">
                                           
                                               <input type="hidden" id="min_qty_B01L7FF85812" class="gst"   value="8">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B01L7FF85812');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;10</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/Icona_Bay_8.5x11_Document_Frame_(12_Pack_Black)_Black_Certificate_Frame_8.5_x_11_Composite_Wood_Diploma_Frame_for_Walls_or_Tables_Set_of_12_Lakeland_CollectionASR240078258" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/711omP+yipL._AC_SL1500_.jpg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>8652</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>9999.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="Icona Bay 8.5x11 Document Frame (12 Pack Black) Black Certificate Frame 8.5 x 11 Composite Wood Diploma Frame for Walls or Tables Set of 12 Lakeland Collection">Icona Bay 8.5x11 Document Frame (12 Pack Black) Black Certificate Frame 8.5 x 11 Composite Wood Diploma Frame for Walls or Tables Set of 12 Lakeland Collection</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_ASR240078258" class="selling_price"  value="8652">
                                                                                
                                           <input type="hidden" id="gst_ASR240078258" class="gst"   value="5">
                                           <input type="hidden" id="gstinc_ASR240078258" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_ASR240078258" class="pro_id" value="ASR240078258">
                                           
                                               <input type="hidden" id="min_qty_ASR240078258" class="gst"   value="10">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('ASR240078258');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;10</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/Soler_powerB07R8Q4008233" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/solar-water-heater-for-domestic-purpose-250x250.jpg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>22</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>22.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="Soler power">Soler power</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_B07R8Q4008233" class="selling_price"  value="22">
                                                                                
                                           <input type="hidden" id="gst_B07R8Q4008233" class="gst"   value="18">
                                           <input type="hidden" id="gstinc_B07R8Q4008233" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B07R8Q4008233" class="pro_id" value="B07R8Q4008233">
                                           
                                               <input type="hidden" id="min_qty_B07R8Q4008233" class="gst"   value="10">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B07R8Q4008233');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;5</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/Solor_Water_Blue_B0122TRBN08" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/solar-water-heater-for-domestic-purpose-250x250.jpg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>1000</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>2000.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="Solor Water Blue ">Solor Water Blue </h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="">
                                                                                    <input type="hidden" id="selling_price_B0122TRBN08" class="selling_price"  value="1000">
                                                                                
                                           <input type="hidden" id="gst_B0122TRBN08" class="gst"   value="12">
                                           <input type="hidden" id="gstinc_B0122TRBN08" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B0122TRBN08" class="pro_id" value="B0122TRBN08">
                                           
                                               <input type="hidden" id="min_qty_B0122TRBN08" class="gst"   value="5">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B0122TRBN08');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;3</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/Marble_Look_Lord_Kamdhenu_Cow_n_Calf_Idol_God_Cow_&_Calf_Handicraft_Statue_Spiritual_Puja_Vastu_22_cmB07HB374FF" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://ameyaderm.com/wholesale/assets/product/41Nirq2MViL._AC_SX425_.jpg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>1000</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>1499.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="Marble Look Lord Kamdhenu Cow n Calf Idol God Cow & Calf Handicraft Statue Spiritual Puja Vastu 22 cm">Marble Look Lord Kamdhenu Cow n Calf Idol God Cow & Calf Handicraft Statue Spiritual Puja Vastu 22 cm</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_B07HB374FF" class="selling_price"  value="1000">
                                                                                
                                           <input type="hidden" id="gst_B07HB374FF" class="gst"   value="18">
                                           <input type="hidden" id="gstinc_B07HB374FF" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B07HB374FF" class="pro_id" value="B07HB374FF">
                                           
                                               <input type="hidden" id="min_qty_B07HB374FF" class="gst"   value="3">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B07HB374FF');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                                                   
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                      <div class="tag "></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;5</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/addidas_shoes15X0035R000PTHT" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/add1.jpeg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>2449</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>3999.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="addidas shoes">addidas shoes</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_15X0035R000PTHT" class="selling_price"  value="2449">
                                                                                
                                           <input type="hidden" id="gst_15X0035R000PTHT" class="gst"   value="18">
                                           <input type="hidden" id="gstinc_15X0035R000PTHT" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_15X0035R000PTHT" class="pro_id" value="15X0035R000PTHT">
                                           
                                               <input type="hidden" id="min_qty_15X0035R000PTHT" class="gst"   value="5">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('15X0035R000PTHT');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div>
                              
                                
                                          
                                       
                                       
                            
                                       
                                       
                                       
                                        </div>
                                        <button class="ctrl-btn" style="z-index:9999;" id="slick-slide00">Prev</button>
                                        <button class="ctrl-btn" style="z-index:9999;" id="slick-slide01">Next</button>
                  
                                    </div>
                                    
                                    <!-- .woocommerce -->
                                </div>
           
                                <!-- .container-fluid -->
                            </div>
                            
                                         <!-- .products-carousel -->
                        </section>
  
 <div class="slider" id="slider">
  <div class="slide" id="slide">
     
       <div class="products-carousel carousel-without-attributes" id="slider" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
            
            <div class="container-fluid">
               
              <div class="woocommerce columns-7">
       
      <div class="products">
                        
            <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                                                       
                             <div class="tag new"><span>new</span></div>
                             
                                                          <div class="tag hot moqs">MOQ<span>&nbsp;1</span></div>
                            <a href="http://technowhizz.co.in/wholesale/p/The_New_Look_Display_Unit_MDF_(Medium_Density_Fiber)_Wall_ShelfB07HB373423" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="http://technowhizz.co.in/wholesale/assets/product/wall1.jpeg" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                                                        <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>449</span>
                                    </ins>
                                 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span>599.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="The New Look Display Unit MDF (Medium Density Fiber) Wall Shelf">The New Look Display Unit MDF (Medium Density Fiber) Wall Shelf</h2>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="0">
                                                                                    <input type="hidden" id="selling_price_B07HB373423" class="selling_price"  value="449">
                                                                                
                                           <input type="hidden" id="gst_B07HB373423" class="gst"   value="12">
                                           <input type="hidden" id="gstinc_B07HB373423" class="gstinc" value="2">
                                           <input type="hidden" id="pro_id_B07HB373423" class="pro_id" value="B07HB373423">
                                           
                                               <input type="hidden" id="min_qty_B07HB373423" class="gst"   value="1">
                                           <input type="hidden" id="url" class="url" value="http://technowhizz.co.in/wholesale/">
                                           
                                           
                            <!--end hidden-->
                                                          
                                            <a  onclick="cart2('B07HB373423');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            
                                                                                
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    
                                    </div>
                                </div> </div>
                                </div>
                                </div>
                                </div>
                    
      
      
      
      
      
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
    <img class="item" src="http://technowhizz.co.in/wholesale/assets/product/51VtNJUeGNL.jpg">
  </div>
  <button class="ctrl-btn pro-prev">Prev</button>
  <button class="ctrl-btn pro-next">Next</button>
</div>

  
  
       </div>
    </div>
    </div>
</div>



<script type="text/javascript">
	
	"use strict";

productScroll();

function productScroll() {
  let slider = document.getElementById("slider");
  let next = document.getElementsByClassName("pro-next");
  let prev = document.getElementsByClassName("pro-prev");
  let slide = document.getElementById("slide");
  let item = document.getElementById("slide");

  for (let i = 0; i < next.length; i++) {
    //refer elements by class name

    let position = 0; //slider postion

    prev[i].addEventListener("click", function() {
      //click previos button
      if (position > 0) {
        //avoid slide left beyond the first item
        position -= 1;
        translateX(position); //translate items
      }
    });

    next[i].addEventListener("click", function() {
      if (position >= 0 && position < hiddenItems()) {
        //avoid slide right beyond the last item
        position += 1;
        translateX(position); //translate items
      }
    });
  }

  function hiddenItems() {
    //get hidden items
    let items = getCount(item, false);
    let visibleItems = slider.offsetWidth / 210;
    return items - Math.ceil(visibleItems);
  }
}

function translateX(position) {
  //translate items
  slide.style.left = position * -210 + "px";
}

function getCount(parent, getChildrensChildren) {
  //count no of items
  let relevantChildren = 0;
  let children = parent.childNodes.length;
  for (let i = 0; i < children; i++) {
    if (parent.childNodes[i].nodeType != 3) {
      if (getChildrensChildren)
        relevantChildren += getCount(parent.childNodes[i], true);
      relevantChildren++;
    }
  }
  return relevantChildren;
}

</script>


  <?php 
include 'footer.php';
      ?>

      