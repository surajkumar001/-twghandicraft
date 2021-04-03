<?php
include('header.php');
include('sidebar.php');
?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Sales</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Sales</a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row"> 
                    <a href="<?php echo base_url('Admin/Customers');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Customers</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
              
                     <a href="<?php echo base_url('Admin/payment');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Payment</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/sales_detailed');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Sales Report</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/ledger');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Ledger</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php echo base_url('Admin/review');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Feedback</span>
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