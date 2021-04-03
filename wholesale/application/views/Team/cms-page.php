<?php
include('header.php');
include('sidebar.php');
?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>CMS</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row"> 
                    <a href="<?php echo base_url('Admin/listpincode');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> List Pincode</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                       <a href="<?php echo base_url('Admin/home_cms');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Home CMS</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                    <!--<a href="<?php echo base_url('Admin/bulk_img');?>">-->
                    <!--<div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">-->
                    <!--    <div class="goldbg no-radius">-->
                    <!--        <div class="panel-body squarebox square_boxs pad-30">-->
                    <!--            <div class="col-xs-12 pull-left nopadmar">-->
                    <!--                <div class="row">-->
                    <!--                    <div class="square_box col-xs-12">-->
                    <!--                        <span class="f-18"> Bulk image Update</span>-->
                    <!--                    </div>-->
                    <!--                    <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>-->
                    <!--                </div>-->
                                    
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div></a>-->
                     <a href="<?php echo base_url('Admin/Listsidebanner');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Promotion Banner List</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                     <a href="<?php echo base_url('Admin/logo_image');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Logo Update</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
               
               
              <a href="<?php echo base_url('Admin/Listslider');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Slider Banner List</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/video');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Video</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('#');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Blogs</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('#');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Shipping Calculation</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/review');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Cart Discount</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/Promotioncategory');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Promotion</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/review');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Ocassions</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/Broucher');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Brochere Update</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                 </div>
                <div class="clearfix"></div>
               
                <div class="clearfix"></div>
               
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <?php
include('footer.php');

?>