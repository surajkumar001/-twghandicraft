<?php
include('header.php');
include('sidebar.php');
?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Users</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row"> 
              
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Ledger' ))->row();
                
               }
            
           if( $_SESSION['session_namee'] == 'admin' ){ ?>
                    <a href="<?php echo base_url('Admin/Previleges');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18">Team Member</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
               <?php } ?> 
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'excel' ))->row();
                
               }
            
           if($user_rm->view == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                     <a href="<?php echo base_url('Admin/excelsheet');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> Approve Bulk Upload Excel</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                     <?php }  
                     if( $_SESSION['session_namee'] == 'admin' ){ ?>
                       <a href="<?php echo base_url('Admin/contactus');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <div class="redbg no-radius">
                           <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18"> List Contacted US </span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                    
                    <?php }    
                    
                    if($_SESSION['session_namee'] == 'admin' ){ ?>
                     <a href="<?php echo base_url('Admin/mailbyadmin');?>">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInDownBig">
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs pad-30">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-12">
                                            <span class="f-18">Mail List</span>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div></a>
                     <?php }  ?>
                        
                 </div>
               
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