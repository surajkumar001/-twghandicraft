  <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
<style>
    .lng{
        line-height: 0.6;
    }
</style>
<style>
    tr td a {
    display: inline !important;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Order </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                  
                    <li class="active">Order List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order List
                            </h4>
                        </div>
                        <br />
                        <form action="<?php echo base_url('Admin/filterbystatus'); ?>" method="POST">
                             <div class="row" style="padding: 10px 0px 0px 15px; margin-bottom: -10px;">
                                    
                                       <!--  <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div> -->
                                      <?php //   $rm_list = $this->db->get('rm')->result(); ?>
 		                                <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                                        <input type="hidden" name="ordertype" value="<?php echo $status; ?>">
                                          <div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
                                          <select class="form-control" name="rm_id" required style="font-size: 13px;">
                                           <option value="All">All RM </option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?=  $rm->id ?>" <?php if($rm_id ==$rm->id ){ echo 'selected' ;}?>><?php echo $rm->rm_name ; ?></option>
                                          <?php } ?>
                                          </select>
                                  </div> 
                                        
                                        <div class="col-md-1" style="margin-right:35px;">
                                          <a href="<?php echo base_url('Admin/orders'); ?>"><button type="button" class="btn btn-default  <?php if($status== "Not"){ echo "active"; } ?>">Not Approved</button></a>
                                        </div>
                                        
                                        <div class="col-md-1">
                                          <a href="<?php echo base_url('Admin/orderbystatus/Pending'); ?>"><button type="button" class="btn btn-default  <?php if($status== "Pending"){ echo "active"; } ?>">Pending</button></a>
                                        </div>
                                        <div class="col-md-2">
                                           <a href="<?php echo base_url('Admin/orderbystatus/ReadyShipped'); ?>"> <button type="button" class="btn btn-default  <?php if($status== "ReadyShipped"){ echo "active"; } ?>">Ready To Shipped</button></a>
                                        </div>
                                        <div class="col-md-1" style="margin-left: -29px;">
                                            <a href="<?php echo base_url('Admin/orderbystatus/Shipped'); ?>"> <button type="button" class="btn btn-default  <?php if($status== "Shipped"){ echo "active"; } ?>">Shipped</button></a>
                                        </div>
                                        <div class="col-md-1">
                                           <a href="<?php echo base_url('Admin/orderbystatus/Delievered'); ?>"> <button type="button" class="btn btn-default  <?php if($status=="Delivered"){ echo "active"; } ?>">Delivered</button></a>
                                        </div>
                                       
                                        <div class="col-md-1" style="margin-left:10px;">
                                           <a href="<?php echo base_url('Admin/CancelledorderList/cancelled'); ?>"> <button type="button" class="btn btn-default  <?php if($status== "Cancelled"){ echo "active"; } ?>">Cancelled</button></a>
                                        </div>
                                       
                                        <div class="col-md-1" style="margin-right:5px;">
                                          <a href="<?php echo base_url('Admin/Allorders'); ?>"><button type="button" class="btn btn-default <?php if($status == 'All') {echo "active"; }  ?>">All Order</button></a>
                                        </div>
                                     
                                      <div class="col-md-1" style="margin-left: 14px;">
                                        <select class="form-control" name="cats" id="cat" onchange="showdate();">
                                               <option value="order" <?php if($current_uri== "order"){ echo "selected"; } ?>>All </option>
                                                 <option value="month" <?php if($current_uri=="month"){ echo "selected"; } ?> >Monthly</option>
                                                  <option value="week" <?php if($current_uri=="week"){ echo "selected"; } ?>>Weekly</option>
                                        
                                          <option value="today" <?php if($current_uri=="today"){ echo "selected"; } ?>>Today</option>
                                         
                                          <option value="custom" <?php if($current_uri=="custom"){ echo "selected"; } ?>>Custom</option>
                                    
                                        </select> 

                                    </div>
                                     <div class="col-md-1">
                                        <input type="submit" id="hidebtn" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                      
                                       </div>
                                   </form>
                             <!--<div class="row">
                                    
                                        <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
                                     <form action="<?php echo base_url('Admin/orderbycategories'); ?>" method="POST">
                                        <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                      <div class="col-md-3">
                                        <select class="form-control" name="cats" id="cat" onchange="showdate();">
                                               <option value="order" <?php if($current_uri== "order"){ echo "selected"; } ?>>All Orders</option>
                                          <option value="today" <?php if($current_uri=="today"){ echo "selected"; } ?>>Today</option>
                                          <option value="week" <?php if($current_uri=="week"){ echo "selected"; } ?>>Weekly</option>
                                          <option value="month" <?php if($current_uri=="month"){ echo "selected"; } ?> >Monthly</option>
                                          <option value="custom" <?php if($current_uri=="custom"){ echo "selected"; } ?>>Custom</option>
                                    
                                        </select> 

                                    </div>

                                     
                                        <div class="col-md-2">
                                        <input type="submit" id="hidebtn" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                        </form>
                                    </div>-->
                                    <div class="row">
                                     <!--   <div class="col-md-2">-->
                                     <!--   <a href="<?php echo base_url('Admin/ordercsv/'.$current_uris); ?>"><button type="button" class="btn btn-default " >Export CSV</button></a>-->
                                     <!--</div>-->
                                     <div class="col-md-2" id="readyshipped" style="display: none;    margin-left: -50px;">
                                               <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>  
                                      <a href="javascript:void(0);" onclick="readyshipped();"><button type="submit" class="btn btn-success" >Ready to Shipped</button>
                                         </a> 
                                         <?php } ?>
                                      </div>
                                      <div class="col-md-1" id="cancelshipped" style="display: none;    margin-left: -30px;">
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>  
                                      <a href="javascript:void(0);" onclick="cancelshipped();"><button type="submit" class="btn btn-danger" >Order Cancel</button>
                                         </a>
                                         <?php } ?> 
                                      </div>
                                      <span id="labelgenerate" style="display:none; ">
                                     <div class="col-md-2" style="margin-left: -50px;">
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>  
                                       <a href="#myModal" data-toggle="modal" ><button type="submit" class="btn btn-success" >Click to Shipped</button>
                                         </a> 
                                         <?php } ?>
                                     </div>
                                     <div class="col-md-2" style="margin-left: -25px;">
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>  
                                       <a href="javascript:void(0);" onclick="generatrinv();"><button type="submit" class="btn btn-success" >Generate Invoice</button>
                                         </a> 
                                         <?php } ?>
                                     </div>
                                     <div class="col-md-2" style="margin-left: -15px;">
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>  
                                      <a href="javascript:void(0);" onclick="generatelabel();"><button type="submit" class="btn btn-success" >Generate Label</button>
                                         </a>
                                         <?php } ?>
                                     </div>
                                   </span>
                                     </div>
                             <!--  <div class="col-md-3">
                                     <a href="<?php echo base_url('Admin/ordercsv/'.$current_uris); ?>"><button type="button" class="btn btn-default " style="padding: 12px; margin-right: 25px;">Export CSV</button></a></div> -->
                                     <input type="hidden" id="urisegment" value="<?php echo $current_uris; ?>">
                                    <div class="row" style="padding: 12px 0px; margin-bottom: 10px;">
                                    <span id="datepick" style="display: none;">
                            <form action="<?php echo base_url('Admin/filter_orderdate') ?>" method="POST">
                                   
                                   
                                <input type="hidden" name="ordertype" value="<?php echo $status; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Search Order By Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date"  class="form-control" id="rangepicker4" name="date1" value="<?php pr($fromdate); ?>" />
                                        </div>
                                       
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"    data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" id="rangepicker5" class="form-control"  name="date2"  placeholder="Check-In Date" value="<?php pr($todate); ?>">
                                        </div>
                                    </div>
                                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                                    <div class="col-md-4" style="padding-top: 27px">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
                                    </div>
                                    </form></span>
                     
                            </div>
                        <div class="panel-body">
                             <form action="<?php echo base_url('Admin/order_filter'); ?>" method="POST">
                             <div class="row" style="padding: 12px 0px; margin-left: -15px; margin-top: -38px; margin-bottom: 10px;">
                                  <input type="Hidden" name="ordertype" value="<?php echo $status; ?>">
                                 <div class=" col-md-3">
                                    
                                     <select class="form-control" name="type" id="type" required>
                                          <option value="">---Search By---</option>
                                         <!--<option value="date">Order Date</option>-->
                                        <!--<option value="Rm">RM No.</option>-->
                                       
                                        <option value="Customer" <?php if($type=='Customer'){ echo 'Selected' ; }  ?>>Customer Name</option>
                                         <option value="Moblie" <?php if($type=='Moblie'){ echo 'Selected' ;}  ?> >Customer Moblie</option>
                                       <option value="order_id" <?php if($type=='order_id'){ echo 'Selected' ;  }?> >Order ID</option>
                                       
                                        <option value="Payment_Mode" <?php if($type=='Payment_Mode'){ echo 'Selected' ;  } ?>>Payment Mode</option>
                                          
                                        <!--<option value="Receved_Amount">Receved Amount</option>-->
                                     </select>
                                 </div>
                                 
                          <div class=" col-md-3" id="search_name" >
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    <?php $user = $this->db->get('customerlogin')->result(); ?>
                                    <input  name="search" list="cars" placeholder="Enter For Search"  type="text" value="<?= $search ?>"  class="form-control" autocomplete="off">
                                      <datalist id="cars" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option><?= $res->Owner ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_phone" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_phone" list="phone" placeholder="Enter For Search"  value="<?= $search ?>" type="text"  class="form-control"  >
                                      <datalist id="phone" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->phone ; ?>"><?= $res->phone ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                 <div class=" col-md-3" id="search_order" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                   <?php $order = $this->db->get('orders')->result(); ?>
                                    <input  name="search_order" list="order" placeholder="Enter For Search"  value="<?= $search ?>" type="text"  class="form-control"  >
                                      <datalist id="order" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($order as $row)
                                              {
                                          ?>
                                            <option value="<?= $row->order_id ; ?>"><?= $row->order_id ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_mode" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_mode" list="mode" placeholder="Enter For Search" value="<?= $search ?>" type="text"  class="form-control"  >
                                      <datalist id="mode" style="overflow-y: scroll; height: 200px;">
                                          
                                            <option value="Online">Online</option>
                                             <option value="Bank Transfer">Bank Transfer</option>
                
                                      </datalist>
                                 </div>
                                 <div class="col-md-3">
                                           
                                        <select class="form-control" name="date" id="selectbox">
                                            <option value="All"<?php if($cat_date=='All'){ echo 'Selected' ; }  ?> >Duration</option>
                                            <option value="today"<?php if($cat_date=='today'){ echo 'Selected' ; }  ?> >Today</option>
                                            <option value="week"<?php if($cat_date=='week'){ echo 'Selected' ; }  ?> >Weekly</option>
                                            <option value="Month"<?php if($cat_date=='Month'){ echo 'Selected' ; }  ?> >Monthly</option>
                                            <option value="custom"<?php if($cat_date=='custom'){ echo 'Selected' ; }  ?> >Custom Date</option>
                                    
                                        </select> 

                                    </div>
                                    
                                    <span id="datepick2" style="display: none;">
                                   
                                   
                                <input type="hidden" name="ordertype" value="<?php echo $status; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Search Order By Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date"  class="form-control" id="rangepicker4" name="date1" value="<?php pr($fromdate); ?>" />
                                        </div>
                                       
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"    data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" id="rangepicker5" class="form-control"  name="date2"  placeholder="Check-In Date" value="<?php pr($todate); ?>">
                                        </div>
                                    </div>
                                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                                    <div class="col-md-4" style="padding-top: 27px">
                                       
                                    </div>
                                    </span>
                                 <div class=" col-md-2">
                                    <input type="submit" class="btn btn-success" value="Search">
                                 </div>
                             </div>
                             </form>
                            <table class="table table-bordered "  <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> id="table1" <?php }else{  ?> id="table" <?php } ?>>
                                <thead>
                                  
                                    <tr class="filters">
                                       <!--<th><input type="checkbox" id="chkSelectAll" name="all" value="all">&nbsp;<span style="display: inline;">SelectAll</span></th>-->
                                        <th>Order Date</th>
                                        <th>RM No.</th>
                                        <th>Order ID</th>
                                        <th>Customer Detail</th>
                                        <th>Order Amount</th>   
                                        <th>Discount Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Receved Amount</th>
                                        <!--<th>Order Detail</th>-->
                                           <th>Action</th>
                    <?php if($status == 'All') {echo "<th>Status</th>"; }  ?>
                    <?php if($status == 'Cancelled' ) {echo "<th>Reason</th>"; }  ?>
                                     </tr>
                                </thead>
                                
                                <tbody>
                                 <?php foreach ($message2 as  $value) {
                                 // pr($value);
                                    ?>
                                    <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($rowid == $value['Rm_idd']   || $_SESSION['session_namee'] == 'admin' ){ ?>

                                    <tr >
                                         <!--<td><input type="checkbox" class="aa " name="aa[]"  onclick="fil();" value="<?=$value['order_id']?>"></td>-->
                                        <td><?=$value['show_date'];?></td>
                                       <td><?php 
                                        $user_id = $value['user_id'] ;
                                        
                                        $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                        
                                        echo $value['Rm_idd']; 
                                        ?></td>
                                        <td><?php  echo $order_id = $value['order_id'];  ?></td>
                                        <td>
                                            <p class="" >Name : <?= $value['customer_name']  ; ?></p>
                                            <p class="">Mobile : <?= $value['customer_mob']  ; ?></p>
                                          
                                            <p class="">PinCode :  <?= $value['pincode'] ; ?></p>
                                        </td>
                                        <td>  <?= $value['finalamount'] ; ?> </td>
                                        
                                        <td>  <?= $value['discountcharge'] ; ?> </td>
                                       <td>
                                            <?php if($value['offline_file']){
                                            
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
             
                                            <a href="<?php echo $value['offline_file'] ; ?>" download>Download File </a>
                                            <?php } ?>
                                            <?php }
                                             elseif($value['utr_number']){?>
                                             UTR No :
                                          <?php  echo $value['utr_number'] ;
                                            ?>
                                           
                                            <?php }else{?>
                                            Online Payment
                                            <?php } ?>
                                           <br>  <br> 
                                             <?php if($value['invoice_file']){
                                            
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                            <a href="#invoicedownload_<?=$order_id ?>" class="btn btn-success" data-toggle="modal">Invoice Download </a>
                                            <?php } ?>
                                            <?php } ?>
                                            
                                            <br>  <br> 
                                             <?php if($value['trasnport_document']){
                                            
                                            ?>
                                            
                                                                <?php if($_SESSION['session_namee'] != 'admin'){ 
                                        $rowid = $_SESSION['session_iid'] ;
                                        
                                        $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                                        
                                        
                                        
                                       }
                                    
                                   if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                            <a href="#transport_<?=$order_id ?>" class="btn btn-success" data-toggle="modal">Trasnport Slip Download </a>
                                            <?php } ?>
                                            <?php } ?>
                                            </td>
                                               <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="transport_<?=$order_id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $value['trasnport_document'] ; ?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $value['trasnport_document'] ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>                    
                                            
                                            
                                            
                                            
                                                     <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="invoicedownload_<?=$order_id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $value['invoice_file'] ; ?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $value['invoice_file'] ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                        
                                        <?php $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id , 'payment_no' =>2))->row() ;
                                        
                                        $pend_3_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id , 'payment_no' =>3))->row() ;
                                         $pend =  $pend_row->pend_amount ;
                                         
                                          $pend_3 =  $pend_3_row->pend_amount ;
                                         
                                         if(empty($pend)){
                                             
                                             $pend = 0 ; 
                                         } 
                                         if(empty($pend_3)){
                                             
                                             $pend_3 = 0 ; 
                                         }
                                        ?>
                                      
                                        <td>1st : <?= $adv = $value['advance_payment'] ; ?> <br>
                                        2nd : <?=$pend  ; ?><br>
                                        3rd : <?=$pend_3  ; ?><br>
                                        Total : <?php echo $total = $adv + $pend + $pend_3 ; ?>
                                         
                                        </td>                                               
                                       
                                     
                                        <td>
                        <?php
                        $order_status = $value['order_status'] ;
                        
                        
                        if($order_status == 'Pending'){ ?>
                            
                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
             
                            <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank" style="padding: 20%;">
                                Order Detail
                            </a>
                            <?php } ?>
                            <br><br>
                                                <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                          <a href="#shipped_<?php echo $value['order_id'] ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Ready To Shipped</button>
                          <?php } ?>
                            <!--<a href="#myModal_<?php echo $value['order_id'] ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Ready To Shipped</button>-->
                             </a> 
                              
                          
                            

                                
                               
                         <?php  }  elseif($order_status =='Readyshipped'){?>
                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                         
                           <a href="#myModal_<?php echo $value['order_id'] ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Shipped</button>
                         
                          <!--<a href="<?= base_url('Admin/shipped_done/'.$value['order_id']) ;?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Click to Shipped</button>-->
                          <!--       </a> -->
                                 
                                 
                     <!--<a href="#shipped_<?php echo $value['order_id'] ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Shipped</button>-->
                             </a>
                             <?php } ?>
                                 
                         <!--<a href="javascript:void(0);" onclick="generateinvoice('<?php echo $value['order_id'] ; ?>');"><button type="submit" class="btn btn-success" >Generate Invoice</button>-->
                         <!--                </a>          -->
                                 
                            
                                 <br>
                          
                            <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a>
                            <?php } ?>

                                  
                                 <?php }elseif($order_status =='Shipped'){ ?>
                                 <a href="<?= base_url('Admin/Delivered_done/'.$value['order_id']) ;?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Delivered </button>
                                 </a> 
                                 
                                  <br>
                           <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                            <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a>
                            <?php } ?>
                                 
                            
                          <?php } elseif($order_status =='Delivered'){ ?>
                          
                                  <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a>
                        <?php } ?>
                                 
                            
                          <?php }  elseif($order_status =='Not'){?>
                           <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                           <a href="<?php echo base_url('Admin/requestdetail/'.$value['order_id']);?>" target="_blank">

                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail

                                            </a>
                          <?php } ?>
                          <?php }?>
                                </td>
                                         <?php if($status == 'All') {?>
                                        
                                         <td><?= $value['order_status'] ; ?></td>
                                        
                                      <?php   }  ?>
                                      
                                      <?php if($status == 'Cancelled') {?>
                                        
                                        <td>
                                        
                                      <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Orderlist' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                  <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a>
                            <?php } ?>
                            <br>
                                       <br>
                                       Reason:
                                       <br>
                                <?= $value['cancle_reason'] ; ?>
                                       </td> 
                                        
                                      <?php   }  ?>
                                    </tr>
                                   <?php $i++; } } ?>
                                  
                                   
                                </tbody>
                            </table>
                        
                         <?php foreach ($message2 as  $value) { ?>    
                       <div class="modal fade" id="myModal_<?php echo $value['order_id'] ?>" role="dialog" style="display: none;">
                        <div class="modal-dialog modal-lg">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              <h4 class="modal-title">Tracking Order</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                            <div class="col-md-12" id="tt">
                                        
                                         <form  action="<?= base_url('Admin/clickshipped')?>" method="post" enctype="multipart/form-data">
                                             
                                                <input type="hidden" class="form-control" name="req_id"  value="<?php echo $value['order_id']; ?>">
                                                
                                                   <input type="hidden" class="form-control" name="user_id"  value="<?php echo $value['user_id']; ?>">
                                                   
                                                      <input type="hidden" class="form-control" name="finalamount"  value="<?php echo $value['finalamount']; ?>">
                                                      
                                                   <input type="hidden" class="form-control" name="mode"  value="<?php echo $value['delievry_type'] ; ?>">
                                                   
                                <?php   $mode =  $value['delievry_type'] ;
                                
                                if($mode == 'CourierByroad'  || $mode =='CourierByAir')  { ?>     
                              
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Courier Company Name :</label>
                                                <input type="text" class="form-control" name="parter_name">
                                            
                                             
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>Track ID </label>
                                                <input type="text" class="form-control" name="track_id">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label> Transporter Contact No: </label>
                                                <input type="text" class="form-control" name="parter_contact">
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <label> Upload Document : </label>
                                                <input type="File" class="form-control upload_file" id="upload_file" name="upload_file" accept=".pdf,.jpg">
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <label> Select Date : </label>
                                                <input type="Date" class="form-control" name="date">
                                            </div>
                                            
                                      </div>
                                      
                                       <div class="row">
                                          
                                     <button type="submit" class="btn btn-success  pull-right">Submit</button>
                                      </div>
                                      <?php } elseif($mode == 'Transport'){?>
                                      <div class="row">
                                          
                                           <div class="col-md-4">
                                                <label>Transport Delivery Point  :</label>
                                                <input type="text" required class="form-control" name="Delivery_Point">
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>Transporter Name  :</label>
                                                <input type="text" class="form-control" name="parter_name" required>
                                                <input type="hidden"  class="form-control" name="req_id"  value="<?php echo $value['order_id'] ?>">
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>Transport Bilty No</label>
                                                <input type="text" required class="form-control" name="track_id">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Bilty Amount</label>
                                                <input type="text" required class="form-control" name="bilty_amt">
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>  Transporter Contact No:</label>
                                                <input type="text" required class="form-control" name="parter_contact"  minlength="10" maxlength="10">
                                            </div>
                                            
                                            
                                             <div class="col-md-4">
                                                <label> Upload Document : </label>
                                                <input type="File" required class="form-control upload_file" name="upload_file" accept=".pdf,.jpg">
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <label> Select Date : </label>
                                                <input type="Date" required class="form-control" name="date">
                                            </div>
                                      </div>
                                       <div class="row">
                                          
                                     <button type="submit" class="btn btn-success  pull-right">Submit</button>
                                      </div>
                                      <?php }else{ ?>
                                       <div class="col-md-4">
                                                <label>Self pick up</label>
                                                
                                                    <a href="<?= base_url('Admin/Delivered_done/'.$value['order_id']) ;?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Delivered </button>
                                 </a> 
                             
                                            </div>
                                            
                                           <?php } ?> 
                                     
                                      </form>
                                    </div>
                                  </div>

        </div>
       
      </div>
      
    </div>
  </div>
  
   <div class="modal fade" id="shipped_<?php echo $value['order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                            Ready To Shipped Order
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                  <form  action="<?= base_url('Admin/shipped_done')?>" method="post" enctype="multipart/form-data">
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $value['order_id']; ?>">
                                                 <div class="col-md-6">
                                                <label> Enter Invoice Number : </label>
                                                <input type="text" class="form-control" required name="invoice_no">
                                            </div>
                                             <div class="col-md-6">
                                                <label> Invoice Upload : </label>
                                                <input type="File"  id="file1" required class="form-control file1" name="invoice_file" accept=".pdf,.jpg">
                                            </div>
                                             <div class="col-md-6">
                                                <label>Packed By : </label>
                                                <input type="text" class="form-control" required name="packed_by">
                                            </div>
                                             <div class="col-md-6">
                                                <label> Checked By : </label>
                                                <input type="text" class="form-control" required name="checked_by">
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <label> Select Date : </label>
                                                <input type="Date" class="form-control" required name="date">
                                            </div>
                                            
                                      </div>
                                    
                                      
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Ready to Shipped</button>
                                            
                                        </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            
                            
  <?php } ?>
                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this user? This operation is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="deleted_users.html" class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
        
<!--Popup Model         -->


  <div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button> 
                <h4 class="modal-title">Custom date</h4>
            </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <label>From Date</label>
                        <input class="form-control" required type="date" name="">
                    </div>
                    <div class="col-md-1" style="margin-top: 32px;">To</div>
                    <div class="col-md-5">
                        <label>To Date</label>
                        <input class="form-control" required type="date" name="">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
      </div>
    </div>
  </div>
        

<?php
include 'footer.php';
?>



<!--Model-->
<script>
      $("#selectbox").change(function () {
    if ($(this).val() == "custom") {
        // $('#myModal3').modal('show');
         $("#datepick2").show();
      }
  });
</script>



<script>
      $("#type").change(function () {
    if ($(this).val() == "Customer") {
        // $('#myModal3').modal('show');
         $("#search_name").show();
          $("#search_phone").hide();
          $("#search_order").hide();
          $("#search_mode").hide();
          
      } else if ($(this).val() == "Moblie") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").show();
           $("#search_order").hide();
          $("#search_mode").hide();
          
      }else if ($(this).val() == "order_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").show();
           $("#search_mode").hide();
          
          
      }else if ($(this).val() == "Payment_Mode") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").show();
          
          
      }
          
      
  });
</script>



<script type="text/javascript">
   
  function filte(){

      var from = $("#rangepicker4").val();
      var todate = $("#rangepicker5").val();
      /*alert(from+"========="+todate);exit();*/
      var urls =  $("#url").val();
      $.ajax({
            type: "POST",
            url: urls+"Admin/orderbydate",
            data: {from:from,todate:todate},
            cache: false,
            success: function(result){
               
             $("#fil").html(result);              
                }
            });

    }
</script>
<script type="text/javascript">
     function addshipment(id){
        
         var urls=$("#url").val();
     
        var staus = $("#"+id+"_addship").val();
       alert(id);exit();
    

        $.ajax({
            type: "POST",
            url: urls+"Admin/add",
            data: {id:id,status:staus},
            cache: false,
            success: function(result){
            alert('Status updated');
       
             //window.location.reload();    
       
                }
            });
    }

function showdate(){
//alert("sdf");
    var id=$("#cat").val();

if(id=="custom"){
   $("#datepick").show();
   $("#hidebtn").hide();

}else{
   $("#datepick").hide();
   $("#hidebtn").show();

}
}
function othertype(){
   var car = $("#car").val();
 if(car=='other'){
      $("#shipname").show();
  $("#shipid").show();
 

}else{
  $("#shipname").hide();
  $("#shipid").hide();


}

}
function selectcourier(){
  var urls = $("#url").val();
  var car = $("#car").val();
  var shipname = $("#shipname").val();
  var shipid = $("#shipid").val();
  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });
  if(myCheckboxes==''){
    $("#tt").hide();
    $("#tts").hide();
  }else{
     $("#tt").show();
     $("#tts").show();
  }

 $.ajax({

    type: "POST",

    url: urls +"Admin/Addcheck",

    data: {data:myCheckboxes,car:car,shipname:shipname,shipid:shipid},

    cache: false,

    success: function(result){
     location.reload();
     



      }

      });
}

  $(".file1").on("change", function() {
      
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $(".file1").val(null);
        }

    }); $(".upload_file").on("change", function() {
      
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $(".upload_file").val(null);
        }

    });

   function fil(){

  var urls = $("#url").val();
  var myCheckboxes = new Array();

  var  uri=$("#urisegment").val();
//alert(uri);


$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });
alert(myCheckboxes);
if(uri==0){

   if(myCheckboxes==''){

    $("#readyshipped").hide();
    $("#cancelshipped").hide();
    



  }else{
     $("#readyshipped").show();
     $("#cancelshipped").show();
  

  }
}else if(uri==1){
 // alert(uri);
  if(myCheckboxes==''){

    $("#labelgenerate").hide();
    



  }else{

     $("#labelgenerate").show();
  

  }
  
}
else if(uri==4){
  if(myCheckboxes==''){
    $("#tt").hide();
    $("#tts").hide();
    $("#shipid").hide();

  }else{
     $("#tt").show();
     $("#tts").show();
    $("#shipid").hide();

  }
  
}else if(uri==5){
 //alert(uri);
 
  if(myCheckboxes==''){

    $("#labelgenerate").hide();
    



  }else{

     $("#labelgenerate").show();
  

  }
  
}

/* $.ajax({

    type: "POST",

    url: urls +"Admin/Addcheck",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
    //location.reload();
     



      }

      });*/

}

$('#chkSelectAll').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
fil();
});

 function readyshipped(){
  var urls = $("#url").val();

  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });

  //alert(myCheckboxes);exit();

 $.ajax({

    type: "POST",

    url: urls +"Admin/readyshipped",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
     location.reload();
     



      }

      });
}
function cancelshipped(){
  var urls = $("#url").val();

  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });

  //alert(myCheckboxes);exit();

 $.ajax({

    type: "POST",

    url: urls +"Admin/cancelshipped",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
     location.reload();
     



      }

      });
}
 function clickshipped(){
  var urls = $("#url").val();

  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });

  //alert(myCheckboxes);exit();

 $.ajax({

    type: "POST",

    url: urls +"Admin/clickshipped",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
     location.reload();
     



      }

      });
}
function generatrinv(){
  var urls = $("#url").val();

  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });

  //alert(myCheckboxes);exit();

 $.ajax({

    type: "POST",

    url: urls +"Admin/invoicegenerate",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
       window.open(urls+"invoice/"+result);
      //alert(result);
   //  location.reload();
     



      }

      });
}




function generateinvoice(id){
  var urls = $("#url").val();


  var myCheckboxes =  id ;    //new Array();


alert(id) ; 
  //alert(myCheckboxes);exit();

 $.ajax({

    type: "POST",

    url: urls +"Admin/invoicegenerate",

    data: {req_id:myCheckboxes},

    cache: false,

    success: function(result){
        
    alert(result);    
        
       window.open(urls+"invoice/"+result);
      //alert(result);
   //  location.reload();
     



      }

      });
}



function generatelabel(){
  var urls = $("#url").val();

  var myCheckboxes = new Array();

 



$("input[name='aa[]']:checked").each( function () {

    myCheckboxes.push($(this).val());

       

   });

  //alert(myCheckboxes);exit();
      window.open(urls+"Admin/generatelabel?id="+myCheckboxes);
/* $.ajax({

    type: "POST",

    url: urls +"Admin/generatelabel",

    data: {data:myCheckboxes},

    cache: false,

    success: function(result){
      
      if(result!='done'){
      window.open(urls+"Admin/generatelabel");
     }
     else{
      alert("Label not Generate");
     }



      }

      });*/
}
</script>

