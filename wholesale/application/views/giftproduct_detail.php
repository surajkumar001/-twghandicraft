<?php 

include 'headcss.php';
include 'header.php';
?>

 <?php include 'navbar.php'; ?>
 <style>
.bootstrap-select .media-object {
    display: inline-block;
    width: 50px;
    margin-right: 5px;
}
.form-control.dropup{display:none;}
.theme_modal .modal-content{border-radius: 0;}
.theme_modal .modal-dialog {background: #ffffff;width: 90%;}
/* Style the buttons */
.btnss {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  font-size: 18px;
}

/* Style the active class, and buttons on mouse-over */
.actives, .btnss:hover {
  background-color: #666;
  color: white;
}

.checkedstar {
  color: orange;
}

</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
   <script src="<?php echo base_url();?>assets/js/jquery-confirm.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/cloud-zoom.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script> -->

<script src="<?php echo base_url();?>assets/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/echo.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/jquery.easing-1.3.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/assets/js/bootstrap-slider.min.js"></script> -->
<script src="<?php echo base_url();?>assets/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/lightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/wow.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js02/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js02/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jtv-mobile-menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/cloud-zoom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/editor.css"/>

<!-- 

<script src="<?php echo base_url(); ?>assets/assets/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.rateit.min.js"></script> -->

<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gift Product Details</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /.breadcrumb -->
<!-- /.breadcrumb -->
<div class="body-content">
  <div class='container-fluid'>
    <div class='row single-product'>
      <div class='col-md-12'>
            <div class="detail-block">
        <div class="row  wow fadeInUp">
                
               <div class="col-xs-12 col-sm-12 col-md-5 gallery-holder">
        <div class="large-image">
          <a href="<?php echo $message[0]['main_image1']; ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
            <img class="zoom-img" src="<?php echo $message[0]['main_image1']; ?>" style="width: 100%;max-height:100%;" id="imgrep" alt="products">
          </a>
        </div>
                              <div class="slider-items-products col-md-12">
                                  <div id="thumbnail-slider" class="product-flexslider hidden-buttons product-thumbnail">
                                      <div class="slider-items slider-width-col3">
                                     
                    <div class="thumbnail-items" ><a href='<?php echo $message[0]['main_image1']; ?>' class="cloud-zoom-gallery">
                                              <img src="<?php echo $message[0]['main_image1']; ?>" alt="Thumbnail 2" /></a>
                                        </div>
                                            <div class="thumbnail-items" ><a href='<?php echo $message[0]['main_image2']; ?>' class="cloud-zoom-gallery">
                                              <img src="<?php echo $message[0]['main_image2']; ?>" alt="Thumbnail 2" /></a>
                                        </div>
                                            <div class="thumbnail-items" ><a href='<?php echo $message[0]['main_image3']; ?>' class="cloud-zoom-gallery">
                                              <img src="<?php echo $message[0]['main_image3']; ?>" alt="Thumbnail 2" /></a>
                                        </div>
                                            <div class="thumbnail-items" ><a href='<?php echo $message[0]['main_image4']; ?>' class="cloud-zoom-gallery">
                                              <img src="<?php echo $message[0]['main_image4']; ?>" alt="Thumbnail 2" /></a>
                                        </div>
                                            <div class="thumbnail-items"><a href='<?php echo $message[0]['main_image5']; ?>' class="cloud-zoom-gallery">
                                              <img src="<?php echo $message[0]['main_image5']; ?>" alt="Thumbnail 2" /></a>
                                        </div>
                                           
                            
                                      </div>
                                  </div>
                              </div>
                              <input type="hidden" id="imgid" value="<?php echo $message[0]['main_image1']; ?>">
             </div><!-- /.gallery-holder -->              
          <div class='col-sm-12 col-md-7 product-info-block'>
            <div class="product-info">
              <h4 ><?php echo $message[0]['pro_name']; ?></h1>
              <div class="rating-reviews m-t-20">
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <?php 
                    $g=$message[0]['product_rating'];
                    for ($x = 1; $x <= $g; $x++)
                                                { ?>
                    <span class="fa fa-star checkedstar"></span>
                  <?php } ?>
				  <div class="reviews">
                      (<?php echo $message[0]['product_review'] ?> reviews)
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4 text-right">
                    <div class="pull-right">
                    <span><strong style="color:#777777;">Share :</strong></span>
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/assets/images/icon-email.png" alt=""></a>
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/assets/images/icon-facebook.png" alt=""></a>
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/assets/images/icon-twitter.png" alt=""></a>
                                        <a href="#"><img src="<?php echo base_url(); ?>assets/assets/images/icon-pinterest.png" alt=""></a>
                                      </div>
                  </div>
                </div>  
              </div><!-- /.rating-reviews -->
              <div class="price-container info-container">
                <div class="row">
                  <div class="col-sm-5">
                    <div class="price-box">
                      <?php if(empty($message[0]['promotion_price'])){ ?>
                      <span class="price"><i class="fa fa-inr" aria-hidden="true"></i><span id="pricequan"><?php echo $selling_price=$message[0]['selling_price']; ?></span>.00 </span>
                      <span class="price-strike"><i class="fa fa-inr" aria-hidden="true"></i><span id="fprice"><?php echo $price=$message[0]['price']; ?></span>.00</span>
                      <span style="margin-left: 2%; color: #ff7878;"><span id="percent"><?php echo round(100- ($selling_price/$price)*100) ?></span>% Off</span>
                      <?php } else { ?>
                         <span class="price"><i class="fa fa-inr" aria-hidden="true"></i><span id="pricequan"><?php echo $selling_price=$message[0]['promotion_price']; ?></span>.00 </span>
                      <span class="price-strike"><i class="fa fa-inr" aria-hidden="true"></i><span id="fprice"><?php echo $price=$message[0]['price']; ?></span>.00</span>
                      <span style="margin-left: 2%; color: #ff7878;"><span id="percent"><?php echo round(100- ($selling_price/$price)*100) ?></span>% Off</span>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="col-sm-7">
                    <?php if($message[0]['availability']>0){ ?>
                    <div class="favorite-button m-t-10">
                                            <a href="#" onclick="cartgift();" class="btn btn-color-1 btn-lg"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            <a href="#"  onclick="buynow();" class="btn btn-color-2 btn-lg"><i class="fa fa-shopping-bag inner-right-vs"></i> Buy Now</a>

                      <!-- <a class="btn btn-primary " data-toggle="tooltip" data-placement="top" title="Wishlist" href="#" style="margin-left: 5%;">
                          <i class="fa fa-heart"></i>
                      </a> -->
                    </div>
                  <?php } else { ?>
                    <div class="favorite-button m-t-10">
                                            <a href="javascript:void(0)"  class="btn btn-color-1 btn-lg"><i class="fa fa-dolly-flatbed-empty"></i> Out of Stock</a>
                                           
                     
                    </div>
                  <?php } ?>
                  </div>

                </div><!-- /.row -->
              </div><!-- /.price-container -->

              <div class="quantity-container info-container">
                                <div class="row">
                                    
                                    <div class="col-sm-2">
                                        <span class="label"><strong>Qty :</strong></span>
                                    </div>
                                    
                                    <div class="col-sm-10">
                                        <div class="cart-quantity">
                                            <div class="quant-input">
                                               
                                                <input type="number" id="quantity" onchange="pricechange();" class="form-control" value="<?php echo $message[0]['min_order_quan']; ?>" min="<?php echo $message[0]['min_order_quan']; ?>" max="<?php echo $message[0]['availability']; ?>" onkeydown="return false" >
                                          </div>
                                          <input type="hidden" id="discount_code" value="<?php echo $message[0]['discount_code'] ?>">
                                             <?php if(empty($message[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price" value="<?php echo $message[0]['selling_price'] ?>">
                                          <?php } else { ?>
                                                <input type="hidden" id="selling_price" value="<?php echo $message[0]['promotion_price'] ?>">
                                          <?php } ?>
                                           <input type="hidden" id="gst" value="<?php echo $message[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc" value="<?php echo $message[0]['gst'] ?>">
                                        </div>
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->
                            <input type="hidden" id="pro_id" value="<?php echo $message[0]['sku_code']; ?>">
                           <?php if(!empty($message[0]['discount_code'])){ ?>
                        <div class="quantity-container info-container">
                            <div class="row" style="margin-bottom: 2%;     padding-right: 4%;">
                                    <div class="col-md-12">
                                         <div class="stock-box">
                                        <span class="label"><strong>Discount Offers : </strong></span>
                                        <div class="row" style="margin-bottom: 1%;">
                                            <?php $str=$message[0]['discount_code'];
                                                        $discount=explode(",",$str); 
                                                       // pr($discount);
                                                        foreach ($discount as  $value) {
                                                            $id = $value;  
                                                              $where='disc_code';
                                                            $discountslab =$this->Model->discountslab($id);
                                                           // pr($discountslab);
                                                          ?>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="package-border text-center">
                                                    <span><strong><?php echo $discountslab[0]['disc_slab']; ?></strong></span><br/><span><i class="fa fa-inr" aria-hidden="true"></i><?php echo $discountslab[0]['disc_per']; ?></span>
                                                </div>    
                                            </div>  
                                            <?php } ?>                                 
                        
                                        </div>
                                    </div>
                                </div>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->
                          <?php } ?>
              <div class="stock-container info-container" style="margin-bottom: 1%;">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="stock-box">
                      <span class="label"><strong>Delivery :</strong></span>
                    </div>  
                  </div>
                  <div class="col-sm-9">
                    <div class="stock-box">
                    <form class="form-style-4">
                      <label for="field1" style="display: inline;">
                        <?php if(empty($_SESSION['pincode'])){ ?>
                      <input type="text" name="field1" id="pincodecheck" value="201014" class="form-control" style="max-width: 150px; display: inline-block; vertical-align: top;"/>
                    <?php } else { ?>
                        <input type="text" name="field1" id="pincodecheck" value="<?php echo $_SESSION['pincodeno']; ?>" class="form-control" style="max-width: 150px; display: inline-block; vertical-align: top;"/>
                    <?php } ?>
                      </label>
                      <span><button type="button" class="btn btn-color-1 btn-lg" onclick="pincode();" style="padding: 7px 12px;top: 0;font-size: 14px; vertical-align: top;border-radius: 5px !important;">Check</button></span>   
					  <div class="login success" ></div><div class="login_result error" style="display: none;"  >Not Available.</div>
                    </form>
                    </div>  
                  </div>
                </div><!-- /.row -->  
              </div><!-- /.stock-container -->
                            <div class="stock-container info-container m-t-10" style="margin-bottom: 3%;">
                             <!--  <div class="row">
                                <div class="col-md-2">
                                  <span class="label">Color<strong>Blue</strong></span>
                                </div>
                              </div> -->
                              <div>
                              <form action="<?php echo base_url('Artnhub/addgiftimage'); ?>" method="post" enctype="multipart/form-data">
							  <div class="row">
                                <div class="col-sm-2">
                                    <div class="stock-box">
                                        <span class="label"><strong>Select Theme :</strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="stock-box">                                       
										<div class="form-group">
											<a class="btn btn-color-1 btn-sm" data-toggle="modal" data-target="#theme_select">Select Occasion</a>
										</div>                                       
                                    </div>
                                </div>
				<!-- Selet Theme Modal Start-->
					<div class="modal fade theme_modal" id="theme_select" role="dialog">
						<div class="modal-dialog lg">										
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Personalize Your Gift</h4>
										
								</div>
								<div class="modal-body">
								<div class="clearfix">
									<div class="col-md-3">
										<label>Select Occasion:</label>
                    <?php    $occ=$message[0]['occasion'];
                    $occid=explode(",", $occ); ?>
										<select class="form-control" onchange="occasion();" id="occid">
                      
											<option value="">Select Occasion</option>
											<?php 
                      foreach ($occid as $key) {
                      $id=$key;
                      $where='id';
                       $table='occasion';
                       $occasion=$this->Model->select_common_where($table,$where,$id);
                  
									foreach ($occasion as $val) {
									  ?>
											<option value="<?php echo $val['id'] ?>"><?php echo $val['name']; ?></option>
											<?php } }?>
										</select>			
                    <input type="hidden" id="catid" value="<?php echo $message[0]['cat_id']; ?>">             
                    <input type="hidden" id="urlpr" value="<?php echo $message[0]['url']; ?>">							
									</div>
								<!-- 	<div class="col-md-3">
									<label>Select Theme:</label>
										<select title="Select Theme" class="selectpicker form-control">
										  <option>Select...</option>
										  <option data-thumbnail="http://lorempixel.com/75/50/abstract/">Chrome</option>
										  <option data-thumbnail="http://lorempixel.com/75/50/abstract/">Firefox</option>
										  <option data-thumbnail="http://lorempixel.com/75/50/abstract/">IE</option>
										  <option data-thumbnail="http://lorempixel.com/75/50/abstract/">Opera</option>
										  <option data-thumbnail="http://lorempixel.com/75/50/abstract/">Safari</option>
										</select>									

									</div> -->
								</div>
								  <div class="featured-product" style="0;">
									<section class="section-products-carousel column-2" style="width: 100%;">
									   <div class="products-carousel carousel-without-attributes">
											<div class="woocommerce columns-7"> 
												
												<div class="products main_category slick-initialized slick-slider slick-dotted" role="toolbar">
												   <!-- /.product-outer -->
												   <div aria-live="polite" class="slick-list draggable">
													  <div class="slick-track" style="">
													  	<span id="occasionrep">
														   <?php 
														   foreach ($categorys as $value) { ?>     
																<div class="product slick-slide product_cat_list slick-active">
																	<a href="<?php echo base_url('Artnhub/gift/'.$value['url']); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">
																		<div class="product_list_container">
																			<div class="product_list_img">    
																				<img src="<?php //echo $value['main_image1']; ?>http://explacia.in/art/Products/6174x0tsAPL._SL1000_.jpg" class="wp-post-image" alt="">
																			</div>
																		</div>
																	   <!-- /.price -->
																		<h2 class="woocommerce-loop-product__title" title="test2 Indoor Fountain Showpiece Vastu"><?php echo $value['pro_name']; ?></h2>
																	</a>
																 </div>
																
													   <?php } ?>
													   </span>
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
							</div>
						  
						</div>
					</div>
				<!-- Selet Theme Modal End-->
                            </div>
                              <div class="row">
                                <div class="col-sm-2">
                                    <div class="stock-box">
                                        <span class="label"><strong>Upload Picture :</strong></span>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="stock-box">
                                       
                                            <div class="form-group">
                                                <input type="file" id="file" class="form-control-file">
                                            </div>
                                       
                                    </div>
                                </div>
                                <div class="upload01">
                                    <span>Image Upload min size 5mb only file .jpeg and .png.</span>
                                </div>
                            </div>
                            <input type="hidden" id="cartimg" value="<?php echo $_SESSION['cartimg']; ?>">
                           <!-- /.row -->   
                           <div class="row">
                                <div class="col-sm-2">
                                    <div class="stock-box">
                                        <span class="label">
                                            <strong>Upload Your Text:</strong>
                                        </span>
                                    </div>
                                </div>
                                   <div class="col-sm-9">
                                    <div class="stock-box">
                                        
                                            <div class="form-group">
                                                <textarea id="txtEditor" name="detail" ><?php echo $_SESSION['notepad']; ?></textarea>
                                                
                                            </div>
                                        
                                    </div>
									<button type="button" class="btn btn-primary pull-right m-t-10" onclick="texteditor();">Submit</button>
								</div>
								
                            </div> 
                            
                          </form>
                        </div>
                            </div><!-- /.stock-container -->
                     <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stock-box row">
                                            <ul class="ds-list">
                                             
                                                <?php if(!empty($message[0]['bullet1'])){ ?> 
                                              <li><span class="ds-letter"> </span><?php echo $message[0]['bullet1']; ?></li><?php } ?>
                                                <?php if(!empty($message[0]['bullet2'])){ ?>
                                                <li><span class="ds-letter"> </span><?php echo $message[0]['bullet2']; ?></li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet3'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet3']; ?>.</li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet4'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet4']; ?>.</li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet5'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet5']; ?></li>
                                              <?php } ?>
                                            </ul>
                                     <!--        <div class="review-button">
                                            <a href="add-review.html" class="btn btn-color-2 btn-lg"> Submit Review</a></div> -->
                                        </div>  
                                    </div>
                                </div><!-- /.row -->    
                            </div><!-- /.stock-container -->

              <div class="stock-container info-container m-t-10">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="row">
                    <div class="stock-box col-sm-4">
                      <span class="label"><strong>Highlights :</strong></span>
                    </div>  
                    <div class="stock-box col-sm-8">
                      <span class="value">
                        <ul>
                            <?php if(!empty($message[0]['highlights1'])){ ?>
                          <li></span><?php echo $message[0]['highlights1']; ?></li>
                             <?php } ?>
                          <?php if(!empty($message[0]['highlights2'])){ ?>
                          <li></span><?php echo $message[0]['highlights2']; ?></li>
                           <?php } ?>
                          <?php if(!empty($message[0]['highlights3'])){ ?>
                          <li></span><?php echo $message[0]['highlights3']; ?></li>
                           <?php } ?>
                        </ul>
                      </span>
                    </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row">
                    <div class="stock-box col-sm-3">
                      <span class="label"><strong>Services :</strong></span>
                    </div>  
                    <div class="stock-box col-sm-9">
                      <span class="value">
                        <ul>
                          <li><i class="fa fa-check fa-fw fa-color" aria-hidden="true"></i> Replaceable if manufacturing defect</li>
                          <li><i class="fa fa-repeat fa-fw fa-color" aria-hidden="true"></i> 10 Days Replacement Policy</li>
                          <li><i class="fa fa-inr fa-fw fa-color" aria-hidden="true"></i> Cash on Delivery available</li>
                        </ul>
                      </span>
                    </div>
                    </div>
                  </div>
                </div><!-- /.row -->  
              </div><!-- /.stock-container -->
              <div class="stock-container info-container m-t-10">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="stock-box">
                      <span class="label"><strong>Description :</strong></span>
                    </div>  
                  </div>
                  <div class="col-sm-9">
                    <div class="stock-box">
                      <span class="value"><?php echo $message[0]['description']; ?>.</span>
                    </div>  
                  </div>
                </div><!-- /.row -->  
              </div><!-- /.stock-container -->
            
            </div><!-- /.product-info -->
          </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->
                <div class="row">
        <div class="col-sm-12 col-md-6">
            <h4>Product information</h4>
                <table class="table table-striped table-hover">
                 
                    <tr>
                        <th class="bg01">Sku Code</th>
                        <td><?php echo $message[0]['sku_code']; ?></td>
                    </tr>
                 
                  <?php if(!empty($message[0]['size'])){ ?>
                    <tr>
                        <th class="bg01">Size</th>
                        <td><?php echo $message[0]['size']; ?></td>
                    </tr>
                  <?php }    if(!empty($message[0]['weight'])){ ?> 
                    <tr>
                        <th class="bg01">Weight</th>
                        <td><?php echo $message[0]['weight']; ?> </td>
                    </tr>
                  <?php }  if(!empty($message[0]['color'])){ ?>
                    <tr>
                        <th class="bg01">Colour</th>
                        <td><?php echo $message[0]['color']; ?></td>
                    </tr>
                    <?php }  if(!empty($message[0]['material'])){ ?> 
                    <tr>
                        <th class="bg01">Material</th>
                        <td><?php echo $message[0]['material']; ?></td>
                    </tr>
                  <?php   } ?>
                </table>
        </div>

    
                        
    </div><!-- /.row -->
                </div>
<!-- ============================================== ptoduct-section tabs ============================================== -->
<div class="product-tabs inner-bottom-xs  wow fadeInUp mg-lf-15" style="padding: 18px;">
  <section class="section-hot-new-arrivals section-products-carousel-tabs">
        <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
            <div class="section-header">
                <h2 class="section-title">You may Like</h2>
            </div>
            <!-- .section-header -->
                <div class="tab-content">
                    <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce">
                                    <div class="products">
                                        <?php 


                              $id=$message[0]['id'];
        
        $where='id';
      $table='product_detail';
      $messages=$this->Model->select_common_where($table,$where,$id);
      if(empty($messages)){
          $id=$message[0]['id'];
        
        $where='id';
      $table='product';
      $messages=$this->Model->select_common_where($table,$where,$id);
      }
   
      foreach ($messages as  $value) {
  setcookie("cookie[".$value['id']."]", $value['id']);


}

  foreach ($_COOKIE['cookie'] as $name) {
  
                                   
                                        $id=$name;
                                      $where='id';
                                      $table='product_detail';
                                     $youmaylike=$this->Model->select_common_where($table,$where,$id);
                                    
                                       
                                   
                                 foreach ($youmaylike as $first) {
                            $title=$first['url'];
                         
                        ?>
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="<?php echo base_url('/p/'.$title); ?>" class="woocommerce-LoopProduct-link">
                      <div class="product_list_container">                  
                        <div class="product_list_img">  
                        <img src="<?php echo $first['main_image1']; ?>" width="224" height="197" class="wp-post-image img-responsive" alt="">
                        </div>
                      </div>
                      <span class="price">
                         <?php if(empty($message[0]['promotion_price'])){ ?>
                        <ins>
                          <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['selling_price']; ?></span>
                        </ins>
                        <?php } else { ?>
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
                                                    <h2 class="woocommerce-loop-product__title"><?php echo $first['pro_name']; ?></h2>
                                            </a>
                                            <div class="hover-area">
                                                    <a class="button add_to_cart_button" href="<?php echo base_url('Artnhub/product/'.$title); ?>" rel="nofollow">Quick View</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to Wishlist</a>
                                                </div>
                                        </div>
                                      <?php } } ?>
                                        <!-- /.product-outer -->
                                        <div id="textsession" style="display: none;"><?php
                                         $mg=$message[0]['sku_code'];
                                         echo  $_SESSION['gift'][$mg]['notepad']; ?></div>
                          
                                         
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
</div><!-- /.product-tabs -->
      
      </div>
      <div class="clearfix"></div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.body-content -->
                                <!-- .section-products-carousel-tabs -->

<!-- ============================================================= FOOTER ============================================================= -->
    <?php 
include 'footer2.php';
//include 'footer.php';
      ?>
	 <link rel="stylesheet" href="https://thdoan.github.io/bootstrap-select/css/bootstrap-select.css">
<script src="https://thdoan.github.io/bootstrap-select/js/bootstrap-select.js"></script>
<script>

$('a.cloud-zoom-gallery').click(function(){
$('img.zoom-img').attr('src',$(this).attr('href'));
return false;
});
function texteduitor(){
  var editor=$('.Editor-editor').html();
  alert(editor);
}
function texteditor() {
var urls= $("#url").val();

   
    data = new FormData();
    data.append('file', $('#file')[0].files[0]);
    data.append('text', $('.Editor-editor').html());
    data.append('id', $('#pro_id').val());
 
   
    $.ajax({
      url: urls+"Artnhub/addgiftimage",
      type: "POST",
      data: data,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false,   // tell jQuery not to set contentType
       success: function(result){


   location.reload(); 


    }
    });
}
$(window).load(function(){ 
var textsession= $("#textsession").html(); 

 $('.Editor-editor').html(textsession);
  });

function occasion(){
	var urls= $("#url").val();
  var occid= $("#occid").val();
  var catid= $("#catid").val();
	var pro_id= $("#urlpr").val();

	  $.ajax({
      url: urls+"Artnhub/occasionselect",
      type: "POST",
      data: {id:occid,proid:pro_id,catid:catid},
      
       cache: false,  // tell jQuery not to set contentType
       success: function(result){
       	$("#occasionrep").html(result);

  // location.reload(); 


    }
    });
}
</script>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/cloud-zoom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flexslider.js"></script>-->
<script>
 function pricechange(){
  var urls= $("#url").val();
  var quantity= $("#quantity").val();
  var proid= $("#pro_id").val();
    $.ajax({
      url: urls+"Artnhub/pricefilter",
      type: "POST",
      data: {pro_id:proid,quantity:quantity},
      
       cache: false,  // tell jQuery not to set contentType
       success: function(result){
         var obj = JSON.parse(result);
           
               $("#pricequan").html(obj.price);
               $("#percent").html(obj.percent);
               $("#fprice").html(obj.fprice);
      //  alert(result);
        //$("#occasionrep").html(result);

  // location.reload(); 


    }
    });
}
</script>
