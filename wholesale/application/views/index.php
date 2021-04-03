<?php 
include 'header_homecss.php';
include 'header.php';
include 'navbar.php'; 
?>
<style>
	.home-v3-banner-with-products-carousel .section-products-carousel .products .slick-dots {
	    padding-bottom: 1.938em;
	    padding-top: 12%;
	}
	.img225 {
	    height: 225px !important;
	    width: 100%;
      margin-bottom: 10px;
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
	.product_list_container .product_list_img {
	    margin-top: 2%;
	}

	@media (max-width: 468px){
	    .hgt{
	    	height: 150px !important;
	}
		.moqs{
		    float: right;
		    margin-top: -16%;
		}
	}
	@media only screen and (max-width: 480px) {
		.product_list_container {
			height: 220px;
		}
	}
	@media (min-width: 1200px) and (max-width: 1699px){
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
				<div id="myCarousel" class="carousel carousel-fade" data-ride="carousel">
				  	<!-- Wrapper for slides -->
				    <div class="carousel-inner">
				       	<?php               	
				       		$this->db->select('*');
					        //  $this->db->where('status', 1);
					        $this->db->from('slider');
				            $this->db->order_by("position","ASC");
					        $qu = $this->db->get();
					    	$slider = $qu->result();
				        	$s =1 ;  
				        	foreach ($slider as $row){ 
				        ?>
				      
				      	<div class="item <?php if($s==1 ){ echo 'active' ; } ?>">
				     		<img src="<?php echo $row->images ?>" style="width:100%; height: 300px;">
				      	</div>
				      	<?php $s++ ; } ?>
						<!--<div class="item">-->
				      	<!--  <img src="<?php echo base_url(''); ?>assets/images/banner/Banner1.jpg" style="width:100%;">-->
				      	<!--</div>-->
				    </div>
					
					<!-- Left and right controls -->
				    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#myCarousel" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right"></span>
				      <span class="sr-only">Next</span>
				    </a>
				</div>
       		</div>
    	</div>
    </div>
</div>

<!-- ========================================= SECTION – HERO : END ========================================= -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->

<div class="home-v3-banner-with-products-carousel row section featured-product wow fadeInUp">
   <!-- <div class="banner column-1">
          <a href="<?php echo base_url('views/youmaylike'); ?>">
            <div style="background-size: cover; background-position: center center; background-image: url( <?php echo base_url(); ?>assets/assets/images/banners/home-banner.jpg);" class="banner-bg bnrbgsize">
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
    
    
    <!--=========== CATEGORY ===============-->
    
    <div class="container"> </div>
    <?php               	
    	$this->db->select('*');
	    $this->db->where('home_status', 1);
	    $this->db->from('category');
        $this->db->order_by("Position","ASC");
	    $query = $this->db->get();
	    $deals_list = $query->result();
        $c =1 ;  
        foreach ($deals_list as $deals){ 
     		$cat_id  = ",".$deals->id.",";
    ?>
    <section class="section-products-carousel column-2">
        <div class="section-header" style="display: inline;">
            <h4 class="section-title" style="font-weight: 600;">
            	<?php echo $names = $deals->name ; 
                   	$titles=str_replace(" ","_", $names);
                ?> 
                <span style="float:right;">
              		<a href="<?php echo base_url(''.$titles.'/cat'); ?>" class="btn btn-info pull-right" style="margin-top: -8px;padding: 6px 12px;font-size: 14px;font-weight: 600;">View All</a>
              	</span>
          	</h4>
        </div>
        <div class="products-carousel carousel-without-attributes" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:true,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:false,&quot;autoplay&quot;: true,&quot;autoplayspeed&quot;: 300,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
            
            <div class="container-fluid">
              	<div class="woocommerce columns-7">
                 	<div class="products">
                        <?php 
                        
                         
                        	$this->db->select('*'); 
                            $this->db->like('category_id', $cat_id); 
                	        $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                            $this->db->order_by("home_deals_position","ASC");
                            $this->db->limit(8);
                	        $query = $this->db->get();
							     $productt = $query->result_array();
							     
							    
        					foreach ($productt as $first) {
        					    
        					    
                                  
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$skuu , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
                                  $hold = $result[0]->quantity ; 
                                      
                                       
                                 if($hold){
                                      $holdlow = $result[0]->quantity  ;
                                 }else{
                                     
                                     
                                     $holdlow = 0 ;
                                 }
                    
                    
                    if(($first['availability'] - $holdlow )>= $first['min_order_quan']){ 
         
        					    
        					    
                            	$title=$first['url'];
                        ?>
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                            <?php 
                            	$expire = date('Y-m-d', strtotime("-30 days"));  
                                $skuu = $first['sku_code'] ;
                            	//=====order_by ====
                            	$q=$this->db->select('*')
                                        	->where('sku_code' , $skuu)
                            			 //   ->where('new_arrivel' , 1)
                            			 //     ->where('status', 1)
                            			    ->where('date >' ,$expire )
                            			    ->from('product_detail')
                            			    ->order_by('Position','asc')
                            			    ->get();
                            				
                                $check = $q->row(); 
                            ?>
                            <div class="col-md-6" style="padding-left: 21px !important;">
				           	<?php 
				           		if($check){
                           		 if(($first['availability'] - $holdlow )>= $first['min_order_quan']){ ?>
         		<div class="tag new"><span>new</span></div>
                            <?php }
                            else { ?>
                            
                            <div class="tag" style="color:red; ">
                            	<span>Out of Stock</span></div>
                           		<?php } 
                           		        }else {
                           		        
                           		        if(($first['availability'] - $holdlow )>= $first['min_order_quan']){ 
                                                           ?>
                           		<div class="tag "></div>
                             	<?php } else{?>
                             	<div class="tag" style="color:red; "><span>Out of Stock</span></div>
	                          	<?php } }?>
	                            </div>
	                            <div class="col-md-6" style="padding-left: 21px !important;">
	                             	<div class="tag hot moqs">MOQ<span>&nbsp;<?= $first['min_order_quan'];?></span></div>
	                            </div>
                            	<a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link">
	                                <div class="product_list_container">                                    
	                                    <div class="product_list_img">                                  
	                                        <img src="<?php echo base_url('assets/product/'.$first['main_image1'])   ?>" class="wp-post-image img-responsive" alt="">
	                                    </div>
	                                </div>
                               
	                                <span class="price">
	                                    <?php if(empty($first['promotion_price'])){ ?>
	                                    <ins>
	                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; echo $first['selling_price']; ?></span>
	                                    </ins>
	                                	<?php } else{ ?>
	                                    <ins>
	                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; ?></span>
	                                    </ins>
	                                	<?php } ?> 
	                                    <del>
	                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['price']; ?>.00</span>
	                                    </del>
	                                    <span class="amount"> </span>
	                                </span>
                                	<!-- /.price -->
                                	<h2 class="woocommerce-loop-product__title" title="<?php echo $first['pro_name']; ?>"><?php echo $first['pro_name']; ?>
                                	</h2>
                                  <a class="btn-primary btn-block btn-mobile" href="">ADD TO CART</a>
                            	</a>
                                <div class="hover-area">
                                <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                <!------------hidden ---------------->
                            	<input type="hidden" id="discount_code" value="<?php echo $first['discount_code'] ?>">
                                    <?php if(empty($first['promotion_price'])){ ?>
                                <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price"  value="<?php echo $first['selling_price'] ?>">
                                    <?php } else { ?>
                                <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price" value="<?php echo $first['promotion_price'] ?>">
                                    <?php } ?>
                                <input type="hidden" id="gst_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['gst_per'] ?>">
                                <input type="hidden" id="gstinc_<?php echo $first['sku_code'] ?>" class="gstinc" value="<?php echo $first['gst'] ?>">
                                <input type="hidden" id="pro_id_<?php echo $first['sku_code'] ?>" class="pro_id" value="<?php echo $first['sku_code'] ?>">
                                <input type="hidden" id="min_qty_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['min_order_quan'] ?>">
                                <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                              	<!--end hidden-->
                              	<?php if($first['availability'] >= $first['min_order_quan']){ ?>
                            		<a  onclick="cart2('<?= $first['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                    <?php }else{?>
                                    <?php if(empty($_SESSION['session_id'])){ ?>
                                    <a onclick="production_cart3('<?= $first['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
        							<?php } else{ ?>
                                    <a  onclick="production_cart2('<?= $first['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
                                    <?php } } ?>
									<?php if(empty($_SESSION['session_id'])){ ?>
                                  	<!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  	<?php } else{
                                       	$pid=$first['id'];
                                       	$userid=$_SESSION['session_id'];
                                      	$data=$this->Model->wishlist($userid,$pid); 
                                      	if(empty($data)){ ?>
                                  			<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $first['id']; ?>');">Add to Wishlist</a>
                                    	<?php } else { ?>
                                         	<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $first['id']; ?>');">Remove to Wishlist</a>
                                    	<?php } } ?>

                                    </div>
                                </div>
                              	<?php  } }?>   
                                       
                                       
                                        </div>
                  
                                    </div>
                                    
                                    <!-- .woocommerce -->
                                </div>
           
                                <!-- .container-fluid -->
                            </div>
                            
                            <!--===========================-->
                            
                                      <!-- .products-carousel -->
             
                        </section>
                         <?php $c++ ; } ?> 
                         
                         
    <!--=========== END CATEGORY ===============-->
 <div class="container">
      
    </div>
    <?php               	$this->db->select('*');
	                	    $this->db->where('status', 1);
	                	    $this->db->from('home_page_deals');
            	        	$this->db->order_by("Position","ASC");
	                    	$query = $this->db->get();
	                    	
        $deals_list = $query->result();
        
        $i =1 ;  
        foreach ($deals_list as $deals){ 
        $deals_code = $deals->flag_code ;
        ?>
    <section class="section-products-carousel column-2">
          <div class="section-header" style="display: inline;">
                <h4 class="section-title" style="font-weight: 600;"><?php echo $deals_name = $deals->Name ; ?> <span style="float:right;">
                <a href="<?php echo base_url('views/'.$deals_code); ?>" class="btn btn-info pull-right" style="margin-top: -8px;padding: 6px 12px;font-size: 14px;font-weight: 600;">View All</a>
                </span></h4>
          </div>
        
        <div class="products-carousel carousel-without-attributes" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:true,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:false,&quot;autoplay&quot;: true,&quot;autoplayspeed&quot;: 300,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
            
            <div class="container-fluid">
               
              <div class="woocommerce columns-7">
                 
                    <div class="products">
                        
                        <?php foreach ($product_list as $first) {
                            
                           
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$skuu , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
                                  $hold = $result[0]->quantity ; 
                                      
                                       
                                 if($hold){
                                      $holdlow = $result[0]->quantity  ;
                                 }else{
                                     
                                     
                                     $holdlow = 0 ;
                                 }
                    
                    
                    if(($first['availability'] - $holdlow )>= $first['min_order_quan']){ 
                        if($deals_code == $first['flag']){
                            
                          $title=$first['url'];
                         
                        ?>
                            
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                            <?php 
                            
                            	 $expire    =    date('Y-m-d', strtotime("-30 days"));  
                                $skuu = $first['sku_code'] ;
                            //=====order_by ====
                            				$q=$this->db->select('*')
                            			        ->where('sku_code' , $skuu)
                            			    	->where('date >' ,$expire )
                            			    	->from('product_detail')
                            			    	->order_by('Position','asc')
                            			    	->get();
                            				
                                            $check = $q->row(); ?>
                            <div class="col-md-6" style="padding-left: 21px !important;">
				           <?php if($check){
                           if(($first['availability'] - $holdlow )>= $first['min_order_quan']){  ?>
                          
                             <div class="tag new"><span>new</span>
                             </div>
                             <?php }else{?>
                             
                              
                             <div class="row" style="color:red; "><span>Out of Stock</span>
                           
                         
                              <?php } }else {  if(($first['availability'] - $holdlow )>= $first['min_order_quan']){  ?>
                           
                            <div class="tag "></div>
                             
                             <?php } else{?>
                             
                              
                             <div class="row" style="color:red; "><span>Out of Stock</span>
                           
                            
                              
                          <?php    
                              
                              } }?>
                              </div>
                              <div class="col-md-6" style="padding-left: 21px !important;">
                             <div class="tag hot moqs">MOQ<span>&nbsp;<?= $first['min_order_quan'];?></span></div>
                             </div>
                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="<?php echo base_url('assets/product/'.$first['main_image1'])   ?>" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                    <?php if(empty($first['promotion_price'])){ ?>
                                    <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; echo $first['selling_price']; ?></span>
                                    </ins>
                                <?php } else{ ?>
                                    <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; ?></span>
                                    </ins>
                                <?php } ?> 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['price']; ?>.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="<?php echo $first['pro_name']; ?>"><?php echo $first['pro_name']; ?></h2>
                                <a class="btn-primary btn-block btn-mobile" href="">ADD TO CART</a>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="<?php echo $first['discount_code'] ?>">
                                          <?php if(empty($first['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price"  value="<?php echo $first['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price" value="<?php echo $first['promotion_price'] ?>">
                                        <?php } ?>
                                        
                                           <input type="hidden" id="gst_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $first['sku_code'] ?>" class="gstinc" value="<?php echo $first['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $first['sku_code'] ?>" class="pro_id" value="<?php echo $first['sku_code'] ?>">
                                           
                                           <input type="hidden" id="min_qty_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                                           
                                           
                            <!--end hidden-->
                              <?php  if(($first['availability'] - $holdlow )>= $first['min_order_quan']){  ?>
                            
                                            <a  onclick="cart2('<?= $first['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            <?php }else{?>
                                                <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                        
                                        
                                         <a onclick="production_cart3('<?= $first['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
        
                                   
                                    <?php } else{ ?>
                                    
                                               <a  onclick="production_cart2('<?= $first['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
                                               
                                            <?php } } ?>

                                        <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    <?php } else{
                                        $pid=$first['id'];
                                       $userid=$_SESSION['session_id'];
                                      $data=$this->Model->wishlist($userid,$pid); 
                                      if(empty($data)){ ?>
                                  <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $first['id']; ?>');">Add to Wishlist</a>
                                    <?php } else { ?>
                                         <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $first['id']; ?>');">Remove to Wishlist</a>
                                    <?php } } ?>

                                    </div>
                                </div>
                              
                                
                                       <?php } } }?>   
                                       
                                       
                         <?php foreach ($product_list as $first) {
                            
                                $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$skuu , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
                                  $hold = $result[0]->quantity ; 
                                      
                                       
                                 if($hold){
                                      $holdlow = $result[0]->quantity  ;
                                 }else{
                                     
                                     
                                     $holdlow = 0 ;
                                 }
                    
                    
                    if(($first['availability'] - $holdlow )>= $first['min_order_quan']){ 
                        if($deals_code == $first['flag']){
                            
                          $title=$first['url'];
                         
                        ?>
                            
                        <div class="product">
                            <div class="yith-wcwl-add-to-wishlist">
                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                    <i class="icon fa fa-heart"> Add to Wishlist</i>
                                </a>
                            </div>
                            <?php 
                            
                            	 $expire    =    date('Y-m-d', strtotime("-30 days"));  
                                $skuu = $first['sku_code'] ;
                            //=====order_by ====
                            				$q=$this->db->select('*')
                            			        ->where('sku_code' , $skuu)
                            			    	->where('date >' ,$expire )
                            			    	->from('product_detail')
                            			    	->order_by('Position','asc')
                            			    	->get();
                            				
                                            $check = $q->row();
				                if($check){
                            if(($first['availability'] - $holdlow )>= $first['min_order_quan']){   ?>
                            <div class="col-md-6" style="padding-left: 21px !important;">
                             <div class="tag new"><span>new</span></div>
                             </div>
                             <?php }else{?>
                             
                              
                             <div class="row" style="color:red; "><span>Out of Stock</span></div>
                           
                         
                              <?php } }else {  if(($first['availability'] - $holdlow )>= $first['min_order_quan']){  ?>
                           
                      <div class="tag "></div>
                             
                             <?php } else{?>
                             
                              
                             <div class="row" style="color:red; "><span>Out of Stock</span></div>
                           
                            
                              
                          <?php    
                              
                              } }?>
                              <div class="col-md-6" style="padding-left: 21px !important;">
                             <div class="tag hot moqs">MOQ<span>&nbsp;<?= $first['min_order_quan'];?></span></div>
                             </div>
                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link">
                                <div class="product_list_container">                                    
                                    <div class="product_list_img">                                  
                                        <img src="<?php echo base_url('assets/product/'.$first['main_image1'])   ?>" class="wp-post-image img-responsive" alt="">
                                    </div>
                                </div>
                               
                                <span class="price">
                                    <?php if(empty($first['promotion_price'])){ ?>
                                    <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; echo $first['selling_price']; ?></span>
                                    </ins>
                                <?php } else{ ?>
                                    <ins>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; ?></span>
                                    </ins>
                                <?php } ?> 
                                    <del>
                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['price']; ?>.00</span>
                                    </del>
                                    <span class="amount"> </span>
                                </span>
                                
                     
                                    
                                    <!-- /.price -->
                                <h2 class="woocommerce-loop-product__title" title="<?php echo $first['pro_name']; ?>"><?php echo $first['pro_name']; ?></h2>
                                <a class="btn-primary btn-block btn-mobile" href="">ADD TO CART</a>
                            </a>
                                                <div class="hover-area">
                                                    <!--<a href="#" class="button add_to_cart_button"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>-->
                                                           <!------------hidden ---------------->
                            
                             <input type="hidden" id="discount_code" value="<?php echo $first['discount_code'] ?>">
                                          <?php if(empty($first['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price"  value="<?php echo $first['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $first['sku_code'] ?>" class="selling_price" value="<?php echo $first['promotion_price'] ?>">
                                        <?php } ?>
                                        
                                           <input type="hidden" id="gst_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $first['sku_code'] ?>" class="gstinc" value="<?php echo $first['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $first['sku_code'] ?>" class="pro_id" value="<?php echo $first['sku_code'] ?>">
                                           
                                               <input type="hidden" id="min_qty_<?php echo $first['sku_code'] ?>" class="gst"   value="<?php echo $first['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                                           
                                           
                            <!--end hidden-->
                              <?php if($first['availability'] >= $first['min_order_quan']){ ?>
                            
                                            <a  onclick="cart2('<?= $first['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                            <?php }else{?>
                                                <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                        
                                        
                                         <a onclick="production_cart3('<?= $first['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
        
                                   
                                    <?php } else{ ?>
                                    
                                               <a  onclick="production_cart2('<?= $first['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">ADD TO CART</a><br>
                                               
                                            <?php } } ?>

                                        <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                        
                                        
                                  <!--<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>-->
                                  
                                    <?php } else{
                                        $pid=$first['id'];
                                       $userid=$_SESSION['session_id'];
                                      $data=$this->Model->wishlist($userid,$pid); 
                                      if(empty($data)){ ?>
                                  <a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $first['id']; ?>');">Add to Wishlist</a>
                                    <?php } else { ?>
                                         <a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $first['id']; ?>');">Remove to Wishlist</a>
                                    <?php } } ?>

                                    </div>
                                </div>
                              
                                
                                       <?php } } }?>   
                                       
                                       
                                       
                                        </div>
                  
                                    </div>
                                    
                                    <!-- .woocommerce -->
                                </div>
           
                                <!-- .container-fluid -->
                            </div>
                            
                            <!--===========================-->
                            
                           <?php    
         $mod = $i % 3  ;
       
       if( $mod== 0 ){
                        ?>
<div class="clearfix filters-container">
    <div class="row">
        
        <?php          
        $k = $i-2  ;
         while($k <= $i ){
             
       
             
                        $this->db->select('*');
	                	  $this->db->where("position",$k);
	                	    $this->db->from('sidebanner');
            	       // 	$this->db->order_by("position",$k);
	                    	$qu = $this->db->get();
	                    	
        $row = $qu->row();
        
       if($row){
           
           ?>
      
        <div class="col-md-4">
           <a href="<?= $row->link ?>" target="_blank">  <img src="<?php echo $row->images   ?>" class="img225" alt="<?= $row->name ?>" title="<?= $row->name ?>" ></a>
        </div>
        
        <?php
       } else{ ?>
        <div class="col-md-4">
            </div>
            <?php }
       
        $k++ ; } ?>
        <!--<div class="col-md-4">-->
        <!--    <img src="http://technowhizz.co.in/wholesale/assets/product/612AKTuVphL._AC_SL1190_.jpg" class="img225">-->
        <!--</div>-->
        <!--<div class="col-md-4">-->
        <!--    <img src="http://technowhizz.co.in/wholesale/assets/product/wall1.jpeg" class="img225">-->
        <!--</div>-->
    </div>
  
</div>
  
              <?php } ?>              <!-- .products-carousel -->
            
                        </section>
                         <?php $i++ ; } ?> 
                        <!-- .section-products-carousel -->
                        
                        
                    </div>
                    <!-- .home-v3-banner-with-products-carousel -->
                    
    <div class="container">
      <div class="col-md-12">
       
        <p><?=$home_cms->home_des ; ?></p>
      </div>
    </div>
        
                </div>
            </div>
        </div>
        <!-- .home-v3-banner-with-products-carousel -->


<?php include 'footer.php'; ?>
      
      
<script>
            
//             $(".products-carousel").owlCarousel({
//     items: 1,
//     autoplay: true,
//     navigation: true,
//     navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
// });
//       </script>

