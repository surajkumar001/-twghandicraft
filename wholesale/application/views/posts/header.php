<?php 

  // pr($_SESSION);die;?>

    <body class="cnt-home" >
             <input type="hidden" id="url" value="<?php echo base_url(); ?>">
        <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1" >
            <!-- ============================================== TOP MENU : END ============================================== -->
            <div class="main-header" id="myHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                            <!-- ============================================================= LOGO ============================================================= -->
                            
                            <?php      $logo  = $this->db->get_where('cms', array('id' => 8 ,))->row() ;
?>
                            <div class="logo mg-minus-top">
                                <a href="<?php echo base_url(); ?>"> <img src="<?= $logo->terms ;?>" alt="logo" class="header-logo"> </a>
                            </div>
                            <!-- /.logo -->
                            <!-- ============================================================= LOGO : END ============================================================= -->
                        </div>
                        <!-- /.logo-holder -->

                        <div class="col-xs-12 col-sm-12 col-md-5 top-search-holder">
                            <!-- /.contact-row -->
          <!-- ======================= SEARCH AREA ============================================== -->
                                <div class="search-area">
                                <form method="get" action="<?php echo base_url(); ?>">
                                    <div class="control-group">
                                       <input list="browsers" name="search_text" class="search-field" id="search_text"  placeholder="What service do you need?" autocomplete="off" value="<?php echo $search ; ?>"  onkeyup="searchkey();" required>
                                       
                                     <button type="submit" name="submit" class="search-button" >
                                    </div>
                                     

                                </form>
                <div id="sea_list">
                                     
                </div>
                            </div>
<!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->
                        </div>
                        <!-- /.top-search-holder -->

<div class="col-xs-6 col-sm-6 col-md-2 animate-dropdown top-cart-row" style="margin-top: -15px;">
<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
<div class="xs-wish-list-item">
    <span class="xs-wish-list">
        <a data-toggle="modal" href="#myModal1" class="xs-single-wishList d-none d-md-none d-lg-block">
           
        <i class="fa fa-filter" style="color:#fff;"></i><br><span class="postion-icon1" style="color:#fff;display:none;">Filter</span>
        </a>
    </span>
    <?php if($this->session->userdata('session_id')){ ?>
    <span class="xs-wish-list">
        <a href="<?php echo base_url('wishlist'); ?>" class="xs-single-wishList d-none d-md-none d-lg-block">
           
            <i class="fa fa-heart" style="color:#fff;"></i><br><span class="postion-icon1" style="color:#fff;display:none;">Whislist</span>
        </a>
    </span>
    <?php } ?>
    <div class="xs-miniCart-dropdown" style="margin-right:0px;">
        <a href="<?= base_url('cart')?>" class="xs-single-wishList">
            <span class="xs-item-count highlight"  id="cart_count_span">
            
            <?php if(empty($this->session->userdata('session_id'))){
                
                echo  $count = count($_SESSION['cart']);
                
                }else{
                    
                        $id=$this->session->userdata('session_id');
                        $where='user_id';
                        $table='cart';
                        $cart=$this->Adminmodel->select_com_where($table,$where,$id);
                      
                       
             echo $count =  count($cart); 
             }?></span>
             <input type="hidden" id="cart_count_val"  value="<?php echo  $count ; ?>">  
             
            <i class="fa fa-shopping-cart" style="color:#fff;"></i><br><span class="postion-icon2" style="display:none;">Cart</span>
        </a>
    </div> 
    
  
    
</div>

<div class="xs-sidebar-group">
   <div class="xs-overlay bg-black"></div>
   <div class="xs-minicart-widget">
      <div class="widget-heading media">
         <h3 class="widget-title align-self-center d-flex">Shopping cart</h3>
         <div class="media-body">
            <a href="#" class="close-side-widget">
            X
            </a>
         </div>
      </div>
      <div class="widget woocommerce widget_shopping_cart">
         <div class="widget_shopping_cart_content">
		<?php
// 		$id=$_SESSION['session_id'];
$id = $this->session->userdata('session_id');
		$where='user_id';
	 if(	$_SESSION['order_type'] == 'orders'){
                             $table='cart';
                        }else{
                             $table='cart_production';
                        }
                    $data=$this->Adminmodel->select_com_where($table,$where,$id);

	foreach ($data as  $cart) {
			$cartusersum+=$cart['cart_price'];
		}
		foreach ($_SESSION['cart'] as  $value) {
			$cartsum+=$value['cart_price'];
		}
		?>
		<?php if(!empty($_SESSION['cart'] || $data)){ ?>
            <ul class="xs-miniCart-menu woocommerce">
				<?php if(empty($_SESSION['session_id'])){
				 foreach ($_SESSION['cart'] as  $value) {
					 $id=$value['product_id'];
						 $where='sku_code';
							$table='product';
						 $product=$this->Adminmodel->select_com_where($table,$where,$id);
						 if(empty($product)){
							$id=$value['product_id'];
							$where='sku_code';
							$table='product_detail';
							$product=$this->Adminmodel->select_com_where($table,$where,$id); 
						 }
				
			
						$cartsums+=$value['cart_price'];
				 ?>
               <li class="woocommerce-mini-cart-item mini_cart_item media mini_cart_item">
                  <a href="<?php echo base_url('p/'.$product[0]['url']); ?>" target="_blank" class="d-flex mini-product-thumb xs-cart-img">
					<img src="<?php echo $product[0]['main_image1']; ?>" alt="" width="70px;">
                  </a>
                  <div class="media-body">
                     
                     <p class="mini-cart-title">SKU : <?php echo $product[0]['parent_sku']; ?></p>
                     <span class="quantity">
                     <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol"><b>Price :</b> Rs&nbsp;</span><?php echo $value['cart_price']; ?>.00
                     </span>
                     <p class="woocommerce-Price-currencySymbol"><b>QTY : </span><?php echo $value['quantity']; ?></b>
                     </p>
                     <!--<span class="quantity">-->
                     <!--<span class="woocommerce-Price-amount amount">QTY-->
                     <!--<span class="woocommerce-Price-currencySymbol">Rs&nbsp;</span><?php echo $value['quantity']; ?>.00-->
                     <!--</span>-->
                     </span>
                     
					 <a href="#" onclick="delcart('<?php echo $value['product_id']; ?>');" class="btn-cancel pull-right remove remove_from_cart_button"><i class="fa fa-trash"></i></a>
                     
                  </div>
               </li>
				<?php } ?>
				
               <li class="mini-cart-btn">
                  <p class="woocommerce-mini-cart__total total">
                     <strong>Subtotal:</strong>
                     <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol">Rs&nbsp;</span><?php echo $cartsums; ?>.00
                     </span>
                  </p>
               </li>
               <li>
                  <p class="woocommerce-mini-cart__buttons buttons xs-btn-wraper">
                     <a href="<?php echo base_url('cart'); ?>" class="button btn btn-primary badge badge-pill wc-forward" style="width:49%;">View cart</a>
                    
                  </p>
               </li>
			   <?php } else {
					foreach ($data as  $cart) {
//pr($cart);
						$id=$cart['product_id'];
						$where='sku_code';
						$table='product';
						$product=$this->Adminmodel->select_com_where($table,$where,$id);
						
						if(empty($product)){
							$id=$cart['product_id'];
							$where='sku_code';
							$table='product_detail';
							$product=$this->Adminmodel->select_com_where($table,$where,$id); 
						}
					$cartusersums+=$cart['cart_price'];
				?>
				<li class="woocommerce-mini-cart-item mini_cart_item media mini_cart_item">
                  <a href="<?php echo base_url('p/'.$product[0]['url']); ?>" target="_blank" class="d-flex mini-product-thumb xs-cart-img">
					<img src="<?php echo $product[0]['main_image1']; ?>" alt="" >
                  </a>
                  <div class="media-body">
                     <h4 class="mini-cart-title">SKU : <?php echo substr($product[0]['parent_sku'],0,22); ?>...</h4>
                     <span class="quantity">
                     <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol"><b>Price :</b> Rs&nbsp;</span><?php echo $cart['cart_price']; ?>.00
                     </span>
                      <p class="woocommerce-Price-currencySymbol"><b>QTY : </span><?php echo $cart['quantity']; ?></b>
                     </p>
                     </span>
					 <a href="#" onclick="delusercart('<?php echo $cart['product_id']; ?>');" class="btn-cancel pull-right remove remove_from_cart_button"><i class="fa fa-trash"></i></a>
                     
                  </div>
               </li>
			   <?php } ?>
				
				
               <li class="mini-cart-btn">
                  <p class="woocommerce-mini-cart__total total">
                     <strong>Subtotal:</strong>
                     <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol">Rs&nbsp;</span><?php echo $cartusersums; ?>.00
                     </span>
                  </p>
               </li>
               <li>
                  <p class="woocommerce-mini-cart__buttons buttons xs-btn-wraper">
                     <a href="<?php echo base_url('cart'); ?>" class="button btn btn-primary badge badge-pill wc-forward" style="width:49%;">View cart</a>
                    
                  </p>
               </li>
			<?php } ?>			   
            </ul>
		<?php } else { ?>
            <div class="xs-empty-content">
               <p class="woocommerce-mini-cart__empty-message empty">No products in the cart.</p>
               <p class="empty-cart-icon">
                  <i class="icon icon-shopping-cart"></i>
               </p>
               <p class="xs-btn-wraper justify-content-center">
                  <a class="button wc-backward btn btn-primary" href="<?php echo base_url(); ?>" style="width: 100%;">Return To Shop</a>
               </p>
            </div>
		<?php } ?>
         </div>
      </div>
   </div>
</div>

                         
                            <!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                        </div>
                        <!-- /.top-cart-row -->
                        <div class="col-md-2 col-xs-6 col-sm-6">
                           <ul class="xs-top-bar-info right-content">
                        <?php if( empty($_SESSION['session_name'])){ ?>
                            <li><a style="line-height: 20px;font-size: 16px;letter-spacing: .1px;color: #fff;"  href="<?php echo base_url('login'); ?>">Login & Signup</a></li>
              <?php } else{ ?>   
              <li>
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" data-toggle="dropdown" style="color: #fff"><?php echo substr($_SESSION['session_name'],0,10); ?>
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" style="left: -45px; height: auto !important;">
                  <li class="wd100"><a href="<?php echo base_url('profile'); ?>" class="prof">My Profile</a></li>
                  <li class="wd100"><a href="<?= base_url('production_cart') ; ?>" class="prof">Production Cart</a></li> 
                  <li class="wd100"><a href="<?php echo base_url('orders'); ?>" class="prof">My Order</a></li> 
                  <li class="wd100"><a href="<?php echo base_url('wishlist'); ?>" class="prof">Wishlist</a></li>
                  <li class="wd100"><a href="<?php echo base_url('logout'); ?>" class="prof">Logout</a></li>     
                </div>
              </li>
              
                        <!--    <li><a style="    margin-right: 17px;" href="<?php echo base_url('orders'); ?>"><i class="icon icon-shopping-cart"></i>My Orders</a></li>-->
             <?php } ?>
                    </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /.main-header -->
 <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm" style="border-radius: 20px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Filter</h4>
        </div>
        <form action="<?php echo base_url('barfilter'); ?>" method="get">
        <div class="modal-body">


         <div class="row">
 
             <div class="col-md-6 padtp2">
                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                    	<select class="form-control" name="occ">
                                    <option value="">---Select Occasion---</option>
                                    <option value="OCB">Birthday</option>
                                    <option value="OCMA">Anniversary</option>
                                    <option value="OCW">Wedding</option>
                                    <option value="OCHI">Home Inaugration</option>
                                    <option value="OCBI">Business Inaugration</option>
                                    <option value="OCLR">Love &amp; Romance</option>
                                    <option value="OCNY">New Year</option>
                                    <option value="OCLO">Lohri</option>
                                    <option value="OCGP">Guru Poornima</option>
                                </select>
                      </div>
             </div>
             <div class="col-md-6 padtp2">
                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      
                             <select class="form-control" name="pricefilter">
                                    <option value="lowtohigh">---Select Price Filter---</option>
                                    <option value="0-299">Gifts Below Rs. 299/-</option>
                                    <option value="0-599">Gifts Below Rs. 599/-</option>
                                    <option value="0-999">Gifts Below Rs. 999/-</option>
                                    <option value="0-1999">Gifts Below Rs. 1999/-</option>
                                    <option value="0-4999">Gifts Below Rs. 4999/-</option>
                                    <option value="hightolow">Price High to Low</option>
                                    <option value="lowtohigh">Price Low to High</option>
                            </select>                               
                    </div>
             </div>
             <div class="col-md-12 padtp2 text-center">
                <input type="submit"  class="btn btn-primary example-p-1" value="Apply" style="width: 20%;padding: 10px;">
             </div>
         </div>
        </div>
       </form>
      </div>
    </div>
  </div>
            <script type="text/javascript">
                
  
function searchkey(){
    var urls =$("#url").val();

    var search = $("#search_text").val();
    
    var num = search.length;

    if(search == '' ||  num < 2 ){
        
        $("#sea_list").hide() ;
        exit ;
    }
    else{
        
            $("#sea_list").show() ;

    $.ajax({
        type: "POST",
        url: urls +"Artnhub/search",
        data: {data:search},
        cache: false,
        success: function(result){
            //alert(result);
            $("#sea_list").html(result);

            }
            });
            
    }
}

            </script>
            <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
<!--            <script>-->

<!--$(window).scroll(function(){-->
<!--  var sticky = $('.main-header .header-nav.animate-dropdown'),-->
<!--      scroll = $(window).scrollTop();-->

<!--  if (scroll >= 100) sticky.addClass('fixed');-->
<!--  else sticky.removeClass('fixed');-->
<!--});-->
<!--</script>-->