<?php 

$meta_result =  $this->db->get_where('category', array('id' => $catidd))->row() ;

$cat_desc = $meta_result->des ; 
  $catid  = $uri ;  


include 'headcss.php';
include 'header.php';
?>

<style>
    .tab-content {
        width:100%;
    }
</style>


<?php include 'navbar.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
         <?php $parent  =  $this->db->get_where('parent_category' ,array('id' => $parent_id))->row(); 
                
                ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $parent->name ; ?></li>
               <li class="breadcrumb-item active" aria-current="page"> <?php echo $cat_name ; ?></li>
          </ol>
        </nav>
    </div>
</div>
<!-- ============================================== filter-start ============================================== -->

<!-- ============================================== filter-end ============================================== -->

<?php 
foreach ($categorys as  $value) {
$view1=$value['subcategory_name'];
$view= str_replace(" ","_",$view1);
?>
<section class="section-hot-new-arrivals section-products-carousel-tabs mg-lf-15 fadeInUp">
        <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
            <div class="section-header">
                <h2 class="section-title"><?php echo $value['subcategory_name']; ?></h2>
                <?php if($value['parent_id']!='5'){ ?>
                <div>
                <a href="<?php echo base_url('viewss/'.$view); ?>" class="btn btn-info pull-right" style="margin-top: -28px;padding: 6px 12px;">View All</a>
                </div>
            <?php } else { ?>
                 <div>
                <a href="<?php echo base_url('personlizedgift/'.$view); ?>" class="btn btn-info pull-right" style="margin-top: -28px;padding: 6px 12px;">View All</a>
                </div>
            <?php } ?>
            </div>
            <!-- .section-header -->
            <div class="tab-content">
                <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                        <div class="container-fluid">
                            <div class="woocommerce">
                                <div class="products">
                                	<?php 
                   $id=$value['id'];
                  
                             	$this->db->select('*');
	                	             $this->db->from('position_product');
	                	             $this->db->where('sub_cat',$id);
	                	             
            	                	$this->db->order_by("category_position","ASC");
            	                	 $this->db->limit(8) ; 
	                            	$query = $this->db->get();
	                    	
                    $product_data = $query->result();
                    
                    
                    // print_r($product_data);
                    
                  $product =array() ; 
                  $i = 0 ;
                  foreach($product_data as $pro){
                      $pro_sku = $pro->product_sku ;
                      
                      $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku ))->result_array() ;
                      
                      $i++ ;
                      
                  }
                                	foreach ($product as  $detail) {  
                                        
                                    $title= $detail[0]['url'];  
                                    
                                     if($detail[0]['status'] == 1){
                                    ?>
                                    <div class="product">
                                                 <?php if($value['parent_id']!='5'){ ?>
                                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" target="_blank">
                                            <?php } else { ?>
                                                 <a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" target="_blank">
                                            <?php } ?>
                                                <div class="product_list_container">
                                                    <div class="product_list_img">
                                                        <img src="<?php echo base_url('assets/product/'.$detail[0]['main_image1'])   ?> " width="224" height="197" class="wp-post-image" alt="">
                                                    </div>
                                                </div>
    
                                                    <span class="price">
                                                        <?php if(empty($detail[0]['promotion_price'])){ ?>
                                                        <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
                                                        <del>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $detail[0]['price']; ?>.00</span>
                                                        </del>
                                                        <span class="amount"> </span>
                                                    </span>
                                                        <!-- /.price -->
                                                    <h2 class="woocommerce-loop-product__title"><?php echo $detail[0]['pro_name']; ?></h2>
                                                    </a>
                                                    
                                                     <?php if(empty($detail[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $detail[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $detail[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $detail[0]['sku_code'] ?>" class="selling_price" value="<?php echo $detail[0]['promotion_price'] ?>">
                                        <?php } ?>
                                        
                                           <input type="hidden" id="gst_<?php echo $detail[0]['sku_code'] ?>" class="gst"   value="<?php echo $detail[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $detail[0]['sku_code'] ?>" class="gstinc" value="<?php echo $detail[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $detail[0]['sku_code'] ?>" class="pro_id" value="<?php echo $detail[0]['sku_code'] ?>">
                                            <input type="hidden" id="min_qty_<?php echo $detail[0]['sku_code'] ?>" class="gst"   value="<?php echo $detail[0]['min_order_quan'] ?>">
                                        <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                                      
                                                        <div class="hover-area">
                                                          
                                                            <?php if($detail[0]['availability'] >= $detail[0]['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $detail[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                                           
                                                             
                                                            <?php }else{?>
                                                                <?php if(empty($_SESSION['session_id'])){ ?>

                                                             <a onclick="production_cart3('<?= $detail[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                            
                                                           <?php } else{ ?>
                                                           <a  onclick="production_cart2('<?= $detail[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                                               
                                                            <?php } } ?>
                                                          
                                                          
                                                    <?php if(empty($_SESSION['session_id'])){ ?>
                                              <a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>
                                                <?php } else{
                                                    $pid=$detail[0]['id'];
                                                   $userid=$_SESSION['session_id'];
                                                  $data=$this->Model->wishlist($userid,$pid); 
                                                  if(empty($data)){ ?>
                                              <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $detail[0]['id']; ?>');">Add to Wishlist</a>
                                                <?php } else { ?>
                                                     <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $detail[0]['id']; ?>');">Remove to Wishlist</a>
                                                <?php } } ?>
                                                        </div>
                                    </div>
                                            <!-- /.product-outer --><?php } } ?>
                                                                <!-- /.product-outer -->
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
<?php } ?>
        <!-- .section-products-carousel-tabs -->


        <!-- .section-products-carousel-tabs -->
      <!-- .home-v3-banner-with-products-carousel -->
      
       <!-- /.col -->
        <div class="container" style="padding: 25px 0px;">
          <div class="col-md-12">
            <span class="more">
             <?= $cat_desc ?>
            </span>
          </div>
        </div>
        
      <?php 
include 'footer.php';
      ?>