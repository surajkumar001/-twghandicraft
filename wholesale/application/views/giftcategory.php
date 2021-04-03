<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gift Category</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /.breadcrumb -->
<!-- ============================================== filter-start ============================================== -->
<div class="clearfix filters-container" style="margin-bottom: 1%;
    padding-bottom: 1%;">
    <div class="row marg01">
        <div class="col col-sm-4 col-md-4 no-padding">
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
                  <!-- /.fld --> 
            </div>
                <!-- /.lbl-cnt --> 
        </div>
        <div class="col col-sm-4 col-md-4 no-padding">
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
                  <!-- /.fld --> 
            </div>
                <!-- /.lbl-cnt --> 
        </div>
              <!-- /.col -->
        <div class="col col-sm-4 col-md-4 no-padding">
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
                  <!-- /.fld --> 
            </div>
                <!-- /.lbl-cnt --> 
        </div>
        <!-- /.col --> 
    </div>
    <!-- /.row --> 
</div>
<!-- ============================================== filter-end ============================================== -->

<?php 
/*foreach ($product as $value) {
        $id=$value['category_id'];
                 $where='id';
                 $table='category';
                $categorys[]=$this->Model->select_common_where($table,$where,$id); 
         
}
foreach ($categorys as $key ) {
  $cats[]=$key[0];
}
*/

if(!empty($categorys)){
foreach ($categorys as  $values) {

$view1=$values[0]['name'];
$view= str_replace(" ","_",$view1);

?>
<section class="section-hot-new-arrivals section-products-carousel-tabs mg-lf-15 fadeInUp">
        <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
            <div class="section-header">
                <h2 class="section-title"><?php echo $values[0]['name']; ?></h2>
                <div>
                <a href="<?php echo base_url('Artnhub/returngiftcat/'.$view.'/'.$pcat); ?>" class="btn btn-info pull-right" style="margin-top: -4%;">View All</a>
                </div>
            </div>
            <!-- .section-header -->
            <div class="tab-content">
                <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                        <div class="container-fluid">
                            <div class="woocommerce">
                               <div class="products">
                                	<?php 
                  $id=$values[0]['id'];
	 			 $where='category_id';
				 $table='product_detail';
				 $products=$this->Model->select_common_where($table,$where,$id);

                    foreach ($products as  $val) {

                if(!empty($val['returngift'])){
                     $giftid=explode(",", $val['returngift']);

                    if(in_array($pcat, $giftid))
                 
                  $id=$val['id'];
                 $where='id';
                 $table='product_detail';
                $dets[]=$this->Model->select_common_where($table,$where,$id); 
            }

           }
                   foreach ($dets as $pid) {
                    $fcat[]=$pid[0]['id'];
                }
                
           
            $array = array_unique($fcat);
            foreach ($array as $ar) {
                 $id=$ar;
                 $where=$values[0]['id'];
                $arrayval=$this->Model->catpro($where,$id);

            

           

                                	foreach ($arrayval as  $de) {  
                                       
                                	$title= $de['url'];                              		
                                	?>
                                    <div class="product">
                                       
                                            <a href="<?php echo base_url('p/'.$title); ?>" class="woocommerce-LoopProduct-link" target="_blank">
												<div class="product_list_container">
													<div class="product_list_img">
														<img src="<?php echo $de['main_image1']; ?>" width="224" height="197" class="wp-post-image" alt="">
													</div>
												</div>
                                                    <span class="price">
                                                        <ins>
                                                            <span class="amount"> </span>
                                                        </ins>
                                                        <?php if(empty($de['promotion_price'])){ ?>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $de['selling_price']; ?></span>
                                                            <?php } else{ ?>
                                                               <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $de['promotion_price']; ?></span>
                                                            <?php } ?>
                                                     </span>
                                                      
                                                    <h2 class="woocommerce-loop-product__title"><?php echo $de['pro_name']; ?></h2>
                                                    </a>
                                                        <div class="hover-area">
                                                           
                                                            	 <a class="button add_to_cart_button" href="<?php echo base_url('p/'.$title); ?>" rel="nofollow"  target="_blank">Quick View</a>
                                                    <?php if(empty($_SESSION['session_id'])){ ?>
                                              <a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>
                                                <?php } else{
                                                    $pid=$de['id'];
                                                   $userid=$_SESSION['session_id'];
                                                  $data=$this->Model->wishlist($userid,$pid); 
                                                  if(empty($data)){ ?>
                                              <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $det['id']; ?>');">Add to Wishlist</a>
                                                <?php } else { ?>
                                                     <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $de['id']; ?>');">Remove to Wishlist</a>
                                                <?php } } ?>
                                                        </div>
                                    </div>
                                          <?php }
                }
                ?>
                                                            
                                                            </div> 
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <!-- .tab-pane -->
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
</section>
<?php } } else { ?>
    
         
                                <div class="products">
                                    <?php 
                  $id=$url;
                 $where='category_id';
                 $table='product_detail';
                 $product=$this->Model->select_common_where($table,$where,$id);
                 
                
                                    foreach ($product as  $detail) {  
                                    $title= $detail['url'];                                     
                                    ?>
                                    <div class="product">
                                       
                                            <a href="<?php echo base_url('p/'.$title); ?>" class="woocommerce-LoopProduct-link" target="_blank">
												<div class="product_list_container">
													<div class="product_list_img">
														<img src="<?php echo $detail['main_image1']; ?>" width="224" height="197" class="wp-post-image" alt="">
													</div>
												</div>
												<span class="price">
                          <?php if(empty($detail['promotion_price'])){ ?>
													<ins>
														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail['selling_price']; ?></span>
													</ins>
                        <?php } else { ?>
                          <ins>
                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail['promotion_price']; ?></span>
                          </ins>
                        <?php } ?>
													<del>
														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail['price']; ?>.00</span>
													</del>
													<span class="amount"> </span>
												</span>
    
                                                        <!-- /.price -->
                                                    <h2 class="woocommerce-loop-product__title"><?php echo $detail['pro_name']; ?></h2>
                                                    </a>
                                                        <div class="hover-area">
                                                           
                                                                 <a class="button add_to_cart_button" href="<?php echo base_url('p/'.$title); ?>" rel="nofollow"  target="_blank">Quick View</a>
                                                    <?php if(empty($_SESSION['session_id'])){ ?>
                                              <a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>
                                                <?php } else{
                                                    $pid=$detail['id'];
                                                   $userid=$_SESSION['session_id'];
                                                  $data=$this->Model->wishlist($userid,$pid); 
                                                  if(empty($data)){ ?>
                                              <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $detail['id']; ?>');">Add to Wishlist</a>
                                                <?php } else { ?>
                                                     <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $detail['id']; ?>');">Remove to Wishlist</a>
                                                <?php } } ?>
                                                        </div>
                                    </div>
                                            <!-- /.product-outer --><?php } ?>
                                                                <!-- /.product-outer -->
                                                            </div>
                                              
<?php } ?>
        <!-- .section-products-carousel-tabs -->


        <!-- .section-products-carousel-tabs -->
      <!-- .home-v3-banner-with-products-carousel -->
      <?php 
include 'footer.php';
      ?>