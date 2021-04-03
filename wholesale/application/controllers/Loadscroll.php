<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loadscroll extends CI_Controller {
    
    	function __construct() {

    parent::__construct();
        $this->load->model('Adminmodel');
        $this->load->model('Model');
    }




 function index()
 {
  $this->load->view('load_view');
 }


			function position_category($id,$limit, $start){


			//========Positioning ======================

                    $this->db->distinct();
                 	$this->db->select('product_sku');
    	            $this->db->from('position_product');
    	            $this->db->where('category',$id);
                	$this->db->order_by("category_position","ASC");
                	 $this->db->limit($limit, $start);
 
                	$query = $this->db->get();
                
                    $product_data = $query->result();
		    	 $product =array() ; 

                  $i = 0 ;

                  foreach($product_data as $pro){
                     $pro_sku = $pro->product_sku ;

                  $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku , 'status'=> 1 ))->result_array() ;


                      $i++ ;


                  }


                 return $product ;

			//=================================



			    



			}

 function kirim()
 {
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
//   $data = $this->load_model->kirim_data($this->input->post('limit'), $this->input->post('start'));
      $data  = $this->position_category($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
			
 
   foreach($data as $value)
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
     ?>

											<?php
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
//   pr($value);
											  $title=$value[0]['url'];
												?>	
											<div class="product slick-slide product_cat_list slick-active mrbtm">
												<div class="yith-wcwl-add-to-wishlist">
												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
												   <i class="icon fa fa-heart"> Add to Wishlist</i>
												   </a>
												</div>

                        <?php if($urll=='5'){ ?>
											<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">

                        <?php } else { ?>

                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">

                    <?php } ?>

												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>

                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
												   <!-- /.price -->
                                            
                                              <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                            
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                           <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                              			   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
												<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                                                            <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>
												   <?php if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>

												</div>
											 </div>
											 <?php }  ?>
										  
							 <!-- .woocommerce -->
					   <?php echo '</div>'; 
   }
  
  
 } 
//  ==================================

 function kirim_newarrival()
 {
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
//   $data = $this->load_model->kirim_data($this->input->post('limit'), $this->input->post('start'));
      $data  = $this->position_category($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
			
 
   foreach($data as $value)
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
     ?>

											<?php
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku']) && $value[0]['new_arrivel'] == 1){
//   pr($value);
											  $title=$value[0]['url'];
												?>	
											<div class="product slick-slide product_cat_list slick-active mrbtm">
												<div class="yith-wcwl-add-to-wishlist">
												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
												   <i class="icon fa fa-heart"> Add to Wishlist</i>
												   </a>
												</div>

                        <?php if($urll=='5'){ ?>
											<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">

                        <?php } else { ?>

                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">

                    <?php } ?>

												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>

                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
												   <!-- /.price -->
                                            
                                              <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                            
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                           <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                              			   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
												<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                                                            <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>
												   <?php if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>

												</div>
											 </div>
											 <?php }  ?>
										  
							 <!-- .woocommerce -->
					   <?php echo '</div>'; 
   }
  
  
 } 
//  ==================================

			function position_subcategory($id,$limit, $start){


			//========Positioning ======================



                 	$this->db->select('*');
    	            $this->db->from('position_product');
    	            $this->db->where('sub_cat',$id);
                	$this->db->order_by("category_position","ASC");
                	 	 $this->db->limit($limit, $start);
 
                	$query = $this->db->get();
                    $product_data = $query->result();

		    	 $product =array() ; 



                  $i = 0 ;



                  foreach($product_data as $pro){

                      $pro_sku = $pro->product_sku ;
               $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku ,'status'=> 1))->result_array() ;


                      $i++ ;


                  }


                 return $product ;



			//=================================

		}
		
   function categoryfilter_newarri(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);
	 $color=implode(",",$_POST['colour']);


	$data=$this->load_model->filtercat($min,$max,$id,$_POST['size'],$_POST['material'],$_POST['resc'],$color);


// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                if( strpos($value[0]['category_id'], $_POST['catid']) !== false  && $value[0]['status'] == 1  && empty($value[0]['parent_sku']) && $value[0]['new_arrivel'] == 1 ){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1"></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php 
											 
											 }
											 
											 ?>


					   <?php echo '</div>'; 
   }
  
  
 }
		
		

 function subcategory(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
//   $data = $this->load_model->kirim_data($this->input->post('limit'), $this->input->post('start'));
    //   $data  = $this->position_category($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
			  $data  = $this->position_subcategory($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 

 
   foreach($data as $value)
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php }  ?>


					   <?php echo '</div>'; 
   }
  
  
 }
 
 function subcategory_newarr(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
//   $data = $this->load_model->kirim_data($this->input->post('limit'), $this->input->post('start'));
    //   $data  = $this->position_category($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
			  $data  = $this->position_subcategory($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 

 
   foreach($data as $value)
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku']) && $value[0]['new_arrivel'] == 1){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php }  ?>


					   <?php echo '</div>'; 
   }
  
  
 }
 
   function categoryfilter(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);
	 $color=implode(",",$_POST['colour']);


	$data=$this->load_model->filtercat($min,$max,$id,$_POST['size'],$_POST['material'],$_POST['resc'],$_POST['color']);


// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                if( strpos($value[0]['category_id'], $_POST['catid']) !== false  && $value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1"></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php 
											 
											 }
											 
											 ?>


					   <?php echo '</div>'; 
   }
  
  
 }
// =================================
  function flagcategory(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);


	$data=$this->load_model->flagcategory($min,$max,$id,$_POST['size'],$_POST['material'],$resc,$this->input->post('limit') ,  $this->input->post('start'));


// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                //   if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php 
											 
											 //}
											 
											 ?>


					   <?php echo '</div>'; 
   }
  
  
 }
// ==============================
  function searchresult(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);


// 	$data=$this->load_model->flagcategory($min,$max,$id,$size,$material,$resc,$this->input->post('limit') ,  $this->input->post('start'));

	$data=$this->load_model->search($id,$min,$max,$size,$material,$resc);

// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                //   if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php 
											 
											 //}
											 
											 ?>


					   <?php echo '</div>'; 
   }
  
  
 }

// =========================


function filtersubcategory(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
//   $data = $this->load_model->kirim_data($this->input->post('limit'), $this->input->post('start'));
    //   $data  = $this->position_category($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
			 // $data  = $this->position_subcategory($catid , $this->input->post('limit') ,  $this->input->post('start')) ; 
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);
	 $color=implode(",",$_POST['color']);


	$data=$this->load_model->filtermodelsub($min,$max,$id,$_POST['size'],$_POST['material'],$_POST['resc'],$_POST['color']);


// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php }  ?>


					   <?php echo '</div>'; 
   }
  
  
 }

function filtersubcategory_newarr(){
  $output = '';
  $this->load->model('load_model');
  
  $catid = $this->input->post('catid') ; 
  
  
// ============================

	$uri=$_POST['uri'];
    $id =$_POST['catid'];
    
    // ====================================
    	$first=$_POST['data'][0];
    	$end= end($_POST['data']);
    	$m=explode("-", $first);
        $min=$m[0];
    	$mx=explode("-", $end);
        $max=$mx[1];
    
    // ==================================
    
    	$material=implode(",",$_POST['material']);
    	$size=implode(",",$_POST['size']);	
		 $resc=implode(",",$_POST['resc']);
	 $color=implode(",",$_POST['color']);


	$data=$this->load_model->filtermodelsub($min,$max,$id,$_POST['size'],$_POST['material'],$resc,$color);


// ===========================================================================
 
   foreach($data as $value[0])
   {
       
         echo '<div class="products-carousel carousel-without-attributes">'; 
         
                                                  if($value[0]['status'] == 1  && empty($value[0]['parent_sku']) && $value[0]['new_arrivel'] == 1){
												  $title=$value[0]['url'];
												?>	
					<div class="product slick-slide product_cat_list slick-active mrbtm">
						<div class="yith-wcwl-add-to-wishlist">
							   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">
								   <i class="icon fa fa-heart"> Add to Wishlist</i> </a>
												</div>
                                    <?php if($urll=='5'){ ?>
            												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
                                    <?php } ?>
						   <div class="product_list_container">
								 <div class="product_list_img">	
														 <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
													  </div>
												   </div></a>
												   <span class="price">
													  <?php if(empty($value[0]['promotion_price'])){ ?>
                                                        <ins>
                                                        <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['selling_price']; ?></span>
                                                        </ins>
                                                    <?php } else{ ?>
                                                            <ins>
                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['promotion_price']; ?></span>
                                                        </ins>
                                                        <?php   } ?>
												   <del>
					<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value[0]['price']; ?></span>
												   </del>
														<span class="amount"> </span>
												   </span>
								     <?php if(empty($value[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $value[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value[0]['sku_code'] ?>" class="selling_price" value="<?php echo $value[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value[0]['sku_code'] ?>" class="gstinc" value="<?php echo $value[0]['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value[0]['sku_code'] ?>" class="pro_id" value="<?php echo $value[0]['sku_code'] ?>">
                                          <input type="hidden" id="min_qty_<?php echo $value[0]['sku_code'] ?>" class="gst"   value="<?php echo $value[0]['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
												</a>
						<div class="hover-area">
                           <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                        <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } 
                                        if(empty($_SESSION['session_id'])){ ?>
														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>

														<?php } else{

														$pid=$value[0]['id'];
														$userid=$_SESSION['session_id'];
														$data=$this->Model->wishlist($userid,$pid); 
														if(empty($data)){ ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value[0]['id']; ?>');">Add to Wishlist</a>
														<?php } else { ?>
														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value[0]['id']; ?>');">Remove to Wishlist</a>
													<?php } } ?>
												</div>
											 </div>

											 <?php }  ?>


					   <?php echo '</div>'; 
   }
  
  
 }

}
