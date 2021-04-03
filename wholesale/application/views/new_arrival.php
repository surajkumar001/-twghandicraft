<?php 
//pr($product);die;
if($uri=='returngiftcat'){
    foreach ($products as  $pre) {
     $product[]=$pre[0];
    } ?>
    <input type="hidden" id="returnid" value="<?php echo $value2; ?>">
    <input type="hidden" id="pcatreturn" value="<?php echo $pcat; ?>">
    <?php 
}
if($uri=='Occasion'){
    foreach ($producst as  $pres) {
     $product[]=$pres[0];
    }
}
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?> 

<style>
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
    from {-webkit-transform:rotate(0deg);}
    to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
    from {transform:rotate(0deg);}
    to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}

.fa-angle-down:before {
    content: "\f107";
    color: #000;
}

.open>.dropdown-menu {
    display: block;
    overflow-y: scroll;
    overflow-x: hidden;
    height: 300px;
}
</style>

<div id="cover-spin"></div>

<style>
.featured-product .products {
    margin-right: 0;
    padding-bottom: 15px;
    padding-right: 15px;
    padding-left: 15px;
}
.section-products-carousel-tabs .columns-8::after, .section-products-carousel-tabs .columns-8::before, .section-products-carousel-tabs .columns-7::after, .section-products-carousel-tabs .columns-7::before, .section-products-carousel-tabs .columns-5::after, .section-products-carousel-tabs .columns-5::before, .section-products-carousel-tabs .columns-6::after, .section-products-carousel-tabs .columns-6::before, .section-products-carousel .columns-8::after, .section-products-carousel .columns-8::before, .section-products-carousel .columns-7::after, .section-products-carousel .columns-7::before, .section-products-carousel .columns-5::after, .section-products-carousel .columns-5::before, .section-products-carousel .columns-6::after, .section-products-carousel .columns-6::before {
    background-color: transparent;
}
.product_cat_list{
  
}

.yamm .dropdown-menu li a {
    color: #3D3D3D;
    line-height: normal;
    text-transform: none;
    display: block;
    padding: 5px 5px;
}

.yamm .dropdown-menu li a:hover {
    color: #3D3D3D;
    line-height: normal;
    background-color:#e6e6e6 !important;
    text-transform: none;
    display: block;
    padding: 5px 5px;
}

.yamm .dropdown-menu .yamm-content {
    padding: 14px 14px !important;
}
</style>

<style>
.products .product img {
    display: block;
    margin: 0 auto 6px;
    height: 140px;
}
/* The container */
.cont {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.cont input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.cont:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.cont input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.cont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.cont .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.slick-initialized .slick-slide {
    display: block;
   /* height: 360px !important;*/
}
</style>
<style>
    @media screen and (max-width: 480px) {
  .wdth100 {
    width:100% !important;
  }
}
</style>
<style>
    @media (min-width: 1140px){
.products .product:focus .hover-area, .products .product:hover .hover-area {
    opacity: 1;
    border-color: #ebebeb;
    -webkit-transform: translate(0, 0px);
    -ms-transform: translate(0, 0px);
    -o-transform: translate(0, 0px);
    transform: translate(0, 0px);
    top: 76%;
    z-index: 20;
}
}
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Arrival </li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
  <div class='container-fluid'>
    <div class="row">
        <div class="col-md-12">
        <!-- ============================================== filter-start ============================================== -->
<div class="clearfix filters-container" style="margin-bottom: 1%;
    padding-bottom: 1%;">
   <!--  <div class="row marg01">
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Select Occasion</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Birthday <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Birthday</a></li>
                                <li role="presentation"><a href="#">Anniversary</a></li>
                                <li role="presentation"><a href="#">Wedding</a></li>
                                <li role="presentation"><a href="#">Home Inaugration</a></li>
                                <li role="presentation"><a href="#">Business Inaugration</a></li>
                                <li role="presentation"><a href="#">Love & Romance</a></li>
                                <li role="presentation"><a href="#">Retirement</a></li>
                                <li role="presentation"><a href="#">New Year</a></li>
                                <li role="presentation"><a href="#">Lohri</a></li>
                                <li role="presentation"><a href="#">Guru Poornima</a></li>
                            </ul>                                 
                    </div>
                </div>
                  
            </div>
              
        </div>
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Gift Recipients</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Kidz <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Kidz</a></li>
                                <li role="presentation"><a href="#">Boys</a></li>
                                <li role="presentation"><a href="#">Girls</a></li>
                                <li role="presentation"><a href="#">Couple</a></li>
                                <li role="presentation"><a href="#">Men</a></li>
                                <li role="presentation"><a href="#">Women</a></li>
                            </ul>
                    </div>
                </div>
               
            </div>
              
        </div>
             
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Price Filter</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Gifts Below Rs. 99/- <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Gifts Below Rs. 99/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 199/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 399/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 499/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 999/-</a></li>
                                <li role="presentation"><a href="#">Price High to Low</a></li>
                                <li role="presentation"><a href="#">Price Low to High</a></li>
                            </ul>                                 
                    </div>
                </div>
                
            </div>
             
        </div>
     
  <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt text-center"> 
        <a class="btn btn-color-1 btn-lg" style="padding: 4px 15px;font-size: 14px;">Apply</a>
                  
            </div>  
        </div>
      
    </div> -->
    <!-- /.row --> 
</div>
</div>
<!-- ============================================== filter-end ============================================== -->
    </div>
    <div class='row'>
    
      <!-- /.sidebar -->
      <div class='col-md-12'> 
        <!-- ========================================== SECTION – HERO ========================================= -->       
      
    <?php if($url=='searchpage'){ ?>
      <input type="hidden" id="uriii" value="<?php echo $url; ?>">
      <input type="hidden" id="search" value="<?php echo $search; ?>">
      <div class="clearfix filters-container" style="margin-bottom: 1%;padding-bottom: 1%;">
        <div class="">
          <h1 class="size24" style="display: block;margin: 0;width: 100%;"><span class="red bb-red" style="color: #2874f0"> <?php echo $search; ?></span> 
          <div style="float: right;font-size: 14px;line-height: 39px;">Total Product: <?php echo count($product); ?></div></h1>         
        </div>
      </div>
    <?php } ?>  
        <div class="search-result-container ">
          
      
        <div class="row featured-product fadeInUp animated section wow" style="padding:15px 0% 4% 0%;">
            <div class="col-md-2" style="border-right: 2px solid #2874f0;">
                
                
                 
              
            <h5 style="font-size: 16px;" data-toggle="collapse" data-target="#demo">Category<span style="float: right;"><i class="fa fa-caret-down"></i></span></h5>
            <div id="demo" class="collapse in">
                <nav class="nav navbar-nav navbar-nav01" id="">
                    <ul class="nav-menu">
                        <?php
                                $this->db->select('*');
            	                $this->db->from('parent_category');
                        	    $this->db->order_by("Position","ASC");
            	                $query = $this->db->get();
            	                    	
            	                $parent= $query->result_array(); 
                                foreach ($parent as $value) 
                                    {   
                                        $name=$value['name'];
                                        $title=str_replace(" ","_", $name);
                                    ?>
                                    
                        <li class="yamm mega-menu lipadd">
                            <a class="filter-menu" href="<?php echo base_url() ; ?>/pcatnew/Statue_&amp;_Showpiece" data-hover="dropdown" class="dropdown-toggle"><?php echo $value['name']; ?></a>
                            <a data-toggle="dropdown" class="down-arrow"><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu container mgl-80">
                                    <li>
                                        <div class="yamm-content ">
                                            <div class="row">
                                                  <?php
                                                                    $id=$value['id'];
                                                                    // $where='parent_id';
                                                                    // $table='category';
                                                                    // $category=$this->Model->select_common_nav($table,$where,$id); 
                                                                    
                                                                    
                                                                    $this->db->select('*');
                                                                    $this->db->where('parent_id' , $id);
                                        	                	    $this->db->from('category');
                                                    	        	$this->db->order_by("Position","ASC");
                                        	                    	$query = $this->db->get();
                                        	                    	
                                        	                    	
                                        	                    	$category= $query->result_array(); 

                                                                    foreach ($category as  $cat) {
                                                                        $names=$cat['name'];
                                                $titles=str_replace(" ","_", $names);
                                                          $id=$cat['id'];
                                                                                $where='cat_id';
                                                                                $table='sub_category';
                                                                                $sub_category=$this->Model->select_common_where($table,$where,$id);
                                                                             // pr($sub_category);
                                                                    ?>
                                                                      <?php if(!empty($sub_category)){ ?>  <div class="col-xs-12 col-sm-12 col-md-12 col-menu">
                                                               
                                                             <a href="<?php echo base_url('newsubcat/'.$titles); ?>"><?php echo $cat['name']; ?></a>
                                                                </div>
                                                                    <?php } else{ ?>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-menu">
                                                    <a class="filter-menu" href="<?php echo base_url('newcat/'.$titles); ?>"><?php echo $cat['name']; ?></a>
                                                    <!-- <ul class="links">
                                                     </ul> -->
                                                </div>
                                                     <?php } } ?>      
                                             
                                                <!-- /.col -->

                                            </div>
                                        </div>

                                    </li>
                                </ul>

                            </li>                                 
                            <?php } ?>           
                                                          
                        
                        
                            </ul>
                    </nav>
            </div>
            
         
        
        <?php if(empty($uri)){ $uri ='all' ; } ?> 
        <input type="hidden" id="catid" value="<?php echo $uri; ?>">
         <input type="hidden" id="flag" value="<?php echo $flag; ?>">





            </div>
          
          <section class="col-md-10 column-2"  id="filtereplace"  style="width: 100%;">
                       
             <div class="products-carousel carousel-without-attributes">
               <div class="woocommerce columns-7">                 
                  <div class="products  slick-initialized slick-slider slick-dotted" role="toolbar" style="padding-bottom: 70px;">
                     <!-- /.product-outer -->
                     <div aria-live="polite" class="slick-list draggable">
                      <div class="slick-track" style="">
                        <?php  
                        foreach ($product_detail as $value) {
                            
                            
                            if($value['new_arrivel'] ==1 ){
                                                   // pr($value);
                          $title=$value['url'];
                        ?>  
                      <div class="product slick-slide product_cat_list slick-active mrbtm wdth100">
                        <div class="yith-wcwl-add-to-wishlist">
                           <a href="wishlist" rel="nofollow" class="add_to_wishlist" tabindex="-1">
                           <i class="icon fa fa-heart"> Add to Wishlist</i>
                           </a>
                        </div>
                        <?php if($urll=='5'){ ?>
                        <a href="<?php echo base_url('Artnhub/gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                        <?php } else { ?>
                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                        <?php } ?>
                           <div class="product_list_container">
                            <div class="product_list_img">  
                             <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
                            </div>
                           </div>
                           <span class="price">
                            <?php if(empty($value['promotion_price'])){ ?>
                                                        <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
                           <del>
                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>
                           </del>
                            <span class="amount"> </span>
                           </span>
                           <!-- /.price -->
                           <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>
                        </a>
                         <?php if(empty($value['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price"  value="<?php echo $value['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price" value="<?php echo $value['promotion_price'] ?>">
                                        <?php } ?>
                                        
                           <input type="hidden" id="gst_<?php echo $value['sku_code'] ?>" class="gst"   value="<?php echo $value['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value['sku_code'] ?>" class="gstinc" value="<?php echo $value['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value['sku_code'] ?>" class="pro_id" value="<?php echo $value['sku_code'] ?>">
                                        <input type="hidden" id="min_qty_<?php echo $value['sku_code'] ?>" class="gst"   value="<?php echo $value['min_order_quan'] ?>">
                                   
                                       
                                        
                                       
                        <div class="hover-area">
                                                       <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">             
                                        <?php if($value['availability'] >= $value['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>
                           <?php if(empty($_SESSION['session_id'])){ ?>
                            <a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>
                            <?php } else{
                            $pid=$value['id'];
                            $userid=$_SESSION['session_id'];
                            $data=$this->Model->wishlist($userid,$pid); 
                            if(empty($data)){ ?>
                            <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>
                            <?php } else { ?>
                            <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>
                          <?php } } ?>
                        </div>
                       </div>
                       <?php  }
                                } ?>

                      </div>
                     </div>
                  </div>
                
               </div>
               <!-- .woocommerce -->
             </div>
             <!-- .products-carousel -->
          </section>  
        </div>
      </div>
      <!-- /.col --> 
    </div>
    </div>
    <!-- /.row --> 


<!-- ============================================== slider ============================================== -->
 <!--    <section class="section-hot-new-arrivals section-products-carousel-tabs">
                                    <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
                                        <div class="section-header">
                                            <h2 class="section-title">You may like</h2>
                                        </div>
                                      
                                        <div class="tab-content">
                                            <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <div class="product">
                                                                    <div class="yith-wcwl-add-to-wishlist">
                                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                    </div>
                                                                    <a href="detail.html" class="woocommerce-LoopProduct-link">
                                                                        <img src="assets/images/deals/d15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                                        
                                                                        <h2 class="woocommerce-loop-product__title">hourse painting</h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                                  
                                                               
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                
                                                </div>
                                             
                                            </div>
                                           
                                        </div>
                                     
                                    </div>
                                    
</section> -->
</div>
  <!-- /.container --> 

</div>
<!-- /.body-content --> 
<!-- ============================================================= FOOTER ============================================================= -->
      <?php 
include 'footer.php';
      ?>
<script>
$(document).ready(function(){
  $("#demo").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo1").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo1").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>

<script>
$(document).ready(function(){
  $("#demo2").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo2").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo3").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo3").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo4").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo4").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo5").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo5").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});

function pricefilter() {

 var urls = $("#url").val();
 var catid = $("#catid").val();
 var returnid = $("#returnid").val();
 var pcatreturn = $("#pcatreturn").val();
 var uriii = $("#uriii").val();
 var search = $("#search").val();

 $("#cover-spin").show(); 
  var myCheckboxes = new Array();

$("input[name='filterprice']:checked").each( function () {

    myCheckboxes.push($(this).val());
     
   });
  var occasion = new Array();

$("input[name='occasion[]']:checked").each( function () {

    occasion.push($(this).val());
     
   });
  var size = new Array();

$("input[name='size']:checked").each( function () {

    size.push($(this).val());
     
   });

  var material = new Array();

$("input[name='mat[]']:checked").each( function () {

    material.push($(this).val());
     
   });
 var resc = new Array();

$("input[name='resc[]']:checked").each( function () {

    resc.push($(this).val());
     
   });


 $.ajax({

    type: "POST",

    url: urls +"Artnhub/filter",

    data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search},

    cache: false,

    success: function(result){
        
          alert(result);

       $("#cover-spin").fadeOut(200); 
      $("#filtereplace").html(result);
    //  alert(result);
    // location.reload();
     



      }

      });
}
</script>

<script>
    
    
    
    function pricefilterNew() {

 var urls = $("#url").val();
 var catid = $("#catid").val();
 var returnid = $("#returnid").val();
 var pcatreturn = $("#pcatreturn").val();
 var uriii = $("#uriii").val();
 var search = $("#search").val();
 
//  alert(catid) ;
//  alert(returnid) ;
//  alert(pcatreturn) ;
//  alert(uriii) ;
 

 $("#cover-spin").show(); 
  var myCheckboxes = new Array();

$("input[name='filterprice']:checked").each( function () {

    myCheckboxes.push($(this).val());
     
   });
  var occasion = new Array();

$("input[name='occasion[]']:checked").each( function () {

    occasion.push($(this).val());
     
   });
  var size = new Array();

$("input[name='size']:checked").each( function () {

    size.push($(this).val());
     
   });

  var material = new Array();

$("input[name='mat[]']:checked").each( function () {

    material.push($(this).val());
      
   });
 var resc = new Array();

$("input[name='resc[]']:checked").each( function () {

    resc.push($(this).val());
     
   });


 $.ajax({

    type: "POST",

    url: urls +"Artnhub/filternewarrival",

    data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search},

    cache: false,

    success: function(result){
        
        //   alert(result);

       $("#cover-spin").fadeOut(200); 
      $("#filtereplace").html(result);
    //  alert(result);
    // location.reload();
     



      }

      });
}

</script>

