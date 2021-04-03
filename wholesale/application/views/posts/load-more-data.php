<div id="postList">
    <?php if(!empty($posts)){ foreach($posts as $value[0]){
                                                   // pr($value);
                          $title=$value[0]['url'];
                          
                          if($value[0]['status'] == 1  && empty($value[0]['parent_sku'])){
                        ?>  
                      <div class="product slick-slide product_cat_list slick-active mrbtm">
                        <div class="yith-wcwl-add-to-wishlist">
                           <a href="wishlist" rel="nofollow" class="add_to_wishlist" tabindex="-1">
                           <i class="icon fa fa-heart"> Add to Wishlist</i>
                           </a>
                        </div>
                        <?php if($urll=='5'){ ?>
                        <a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1"></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1"></a>
                        <?php } ?>
                           <div class="product_list_container">
                            <div class="product_list_img">  
                             <img src="<?php echo base_url('assets/product/'.$value[0]['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">
                            </div>
                           </div>
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
                           <h2 class="woocommerce-loop-product__title" title="<?php echo $value[0]['pro_name']; ?>"><?php echo $value[0]['pro_name']; ?></h2>
                        </a>
                        <div class="hover-area">
                            
                            <!--=====details========-->
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
                                           
                                        <?php if($value[0]['availability'] >= $value[0]['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value[0]['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        
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
                       <?php } } ?>
                       
                       <?php echo $value[0]['id']; ?>
    <?php if($postNum > $postLimit){ ?>
        <div class="load-more" id='load_data' lastID="<?php echo $value[0]['id']; ?>" style="display: none;">
            <img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
        </div>
    <?php }else{ ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php } ?>    
<?php }else{ ?>    
    <div class="load-more" lastID="0">
            That's All!
    </div>    
<?php } ?>
</div>