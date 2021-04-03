<?php
include 'headcss.php';
include 'header.php'; ?>
 <?php include 'navbar.php'; ?>

<!-- ============================================== Header : END ============================================== -->	

<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /.breadcrumb -->

<section class="home-bg-color">
    <div class="container-fluid">
        <div class="row" style="padding: 3% 0% 0% 0%;">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-name pd-set">
                            <img src="<?php echo base_url(); ?>assets/assets/images/d-2.png" class="img-size-2">
                            <span class="text-center" style="font-size: 18px;"><?php echo $_SESSION['session_name']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="section-border">
                        <ul class="user-link">
                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('orders'); ?>"><i class="fa fa-file-text fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Order</span></a></li>

                            <li class="border-bt-1 font-19"><i class="fa fa-user fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account Settings</span>
                                <ul class="pd-2">
                                    <li><a href="<?php echo base_url('profile'); ?>">Dealer Information</a></li>
                                    <li><a href="<?php echo base_url('manage_address'); ?>">Manage Address</a></li>
                                </ul>
                            </li>

                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('my_ledger'); ?>"><i class="fa fa-credit-card-alt fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account History</span></a></li>

                            <li class="border-bt-1 font-19 current-pg"><a href="<?php echo base_url('wishlist'); ?>"><i class="fa fa-heart fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Wishlist</span></a></li>

                            <li class="border-bt-1 font-19 active"><a href="<?php echo base_url('notification'); ?>"><i class="fa fa-bell fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Notification</span></a></li>

                            <li class="pd-2 font-19"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Logout</span></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="side-border">
                    <h2>My Wishlist:</h2>
                    <div class="box-body">
                        <hr>
						<?php foreach ($wishlist as  $value) {   
							$id=$value['product_id'];
							 $where='id';
							 $table='product_detail';
							 $data=$this->Model->select_common_where($table,$where,$id);    
							 $title=$data[0]['url'];                                     
						?>
                        <div class="row padd03">
                            <div class="col-md-2 col-sm-12 col-xs-12 text-center order-imgsize">
                                <img src="<?php echo base_url('assets/product/'.$data[0]['main_image1'])   ?>" class="img-responsive">
                            </div>
                            <div class="col-md-5 col-sm-10 col-xs-10">
                                <h5 style="font-size: 14px;text-align: justify;"><a href="<?php echo base_url(''.$title); ?>" target="_blank"><?php echo $data[0]['sku_code']; ?></a></h5>
                                <div>
                                    <span><i class="fa fa-inr"></i><span><?php echo $data[0]['selling_price']; ?></span></span>
                                    <del><i class="fa fa-inr"></i><span><?php echo $data[0]['price']; ?></span></del>
                                </div>
                            </div>
                             <div class="col-md-2 col-sm-2 col-xs-2" style="padding-top: 2%;">
								<a href="javascript:void(0)" class="" onclick="removewishlist('<?php echo $value['product_id']; ?>');"><i class="fa fa-trash fa-lg"></i></a>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
							    <a  onclick="cart2('<?= $data[0]['sku_code']; ?>');" class="btn btn-primary" style="width: 100%;"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                            </div>
                            
                           
                        </div>
                        <hr>
                        <?php if(empty($data[0]['promotion_price'])){ ?>
                            <input type="hidden" id="selling_price_<?php echo $data[0]['sku_code'] ?>" class="selling_price"  value="<?php echo $data[0]['selling_price'] ?>">
                            <?php } else { ?>
                            <input type="hidden" id="selling_price_<?php echo $data[0]['sku_code'] ?>" class="selling_price" value="<?php echo $data[0]['promotion_price'] ?>">
                            <?php } ?>
                            <input type="hidden" id="gst_<?php echo $data[0]['sku_code'] ?>" class="gst"   value="<?php echo $data[0]['gst_per'] ?>">
                            <input type="hidden" id="gstinc_<?php echo $data[0]['sku_code'] ?>" class="gstinc" value="<?php echo $data[0]['gst'] ?>">
                            <input type="hidden" id="pro_id_<?php echo $data[0]['sku_code'] ?>" class="pro_id" value="<?php echo $data[0]['sku_code'] ?>">
                            <input type="hidden" id="min_qty_<?php echo $data[0]['sku_code'] ?>" class="gst"   value="<?php echo $data[0]['min_order_quan'] ?>">
                            <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                        <?php } ?>							
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 
<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'footer.php'; ?>
