<?php
include('header.php');
include('sidebar.php');
?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <div class="alert alert-success alert-dismissable margin5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success:</strong> You have successfully logged in.
            </div>
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row"> 
                    <a href="<?php  if( $_SESSION['session_namee'] == 'admin' ){  echo base_url('Admin/orders');}?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <?php
                                        $date = date('Y-m-d');
                                        
                                        $today = $this->db->get_where('orders', array('order_Date' => $date,'order_type' => 'orders',))->result() ;
                                        $pending = $this->db->get_where('orders', array('order_status' => 'Pending',))->result() ;
                                          
                                           $not_app = $this->db->get_where('orders', array('order_status' => 'not',))->result() ;
                                        $readyship = $this->db->get_where('orders', array('order_status' => 'ReadyShipped',))->result() ;
                                        $ship = $this->db->get_where('orders', array('order_status' => 'Shipped',))->result() ;
                                       $today_delivered = $this->db->get_where('orders', array('order_status' => 'Delivered','order_Date' => $date))->num_rows() ;
                                       
                                       $totalorder = $this->db->get_where('orders', array('order_type' => 'orders',))->num_rows() ;
                                      
                                        $product = $this->db->get('product_detail')->num_rows() ;
                                      
                                         $active_pro = $this->db->get_where('product_detail', array('status' => 1))->num_rows() ;
                                       $inactive_pro = $this->db->get_where('product_detail', array('status' => 0))->num_rows() ;
                                      
                                      
                                        $Productiontoday = $this->db->get_where('orders', array('order_Date' => $date,'order_type' => 'production',))->result() ;
                                        ?>
                                        <div class="square_box col-xs-12 text-right">
                                            <span> Today's Order</span>
                                            <div class="number" ><?php echo count($today);?></div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
              
                     <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/production_orders');}?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Today Production Order</span>
                                            <div class="number"><?php echo count($Productiontoday);?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                   
         
   <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orders');}?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body lightbluebg square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span> Not Approved Order</span>
                                            <div class="number"><?php echo count($not_app);?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                   
         

                      <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orderbystatus/Pending');} ?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                       <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 text-right">
                                            <span> Pending Order</span>
                                            <div class="number"><?php echo count($pending);?></div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
     
                    
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orderbystatus/ReadyShipped'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Pending Shippment</span>
                                            <div class="number"><?php echo count($readyship);?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orderbystatus/Shipped'); } ?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Shiped Order</span>
                                            <div class="number"><?php echo count($ship);?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orderbystatus/Delievered');} ?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Delivered Order</span>
                                            <div class="number"><?php echo $today_delivered;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orders'); } ?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Total Order</span>
                                            <div class="number"><?php echo $totalorder;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <?php
                     $Productiontotalorder = $this->db->get('production_orders')->num_rows() ;
                     
                      $out = $this->db->get_where('product_detail', array('availability' => 0))->num_rows() ;
                      	$q=$this->db->select('*')
        			    	->where('availability <= low_alert')
        			    	->where('availability !=', 0 )
        			    	->from('product_detail')
        			    	->get();
        			    	
	$low = $q->num_rows();
	
                            //   $this->db->where('amount = discount');                         
                    
                    ?>
                    
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/production_orders'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Total Production Order</span>
                                            <div class="number"><?php echo $Productiontotalorder;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                     <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/orderbystatus/Delievered'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        
                                        <?php 
                                        $delivered = $this->db->get_where('orders', array('order_status' => 'Delivered',))->num_rows() ;
                                   ?>
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Total Delivered Order</span>
                                            <div class="number"><?php echo $delivered ;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    <a href="<?php  if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/inventory'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Low Stock</span>
                                            <div class="number"><?php echo $low;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                   <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/inventory'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Out Stock</span>
                                            <div class="number"><?php echo $out;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                    <?php 
                      $customer = $this->db->get_where('customerlogin', array('valid' => 1))->num_rows() ;
                     ?>
                    <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/Customers'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Online Customer</span>
                                            <div class="number"><?php echo $customer;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                     <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/ListProduct'); }?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Total Product</span>
                                            <div class="number"><?php echo $product;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                       <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/ListProduct'); } ?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span> Inactive Products</span>
                                            <div class="number"><?php echo $inactive_pro;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div></a>
                   
                            <a href="<?php if( $_SESSION['session_namee'] == 'admin' ){ echo base_url('Admin/ListProduct'); } ?>">
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12 pull-left">
                                            <span>Active Products </span>
                                            <div class="number"><?php echo $active_pro ;?></div>
                                        </div>
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
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