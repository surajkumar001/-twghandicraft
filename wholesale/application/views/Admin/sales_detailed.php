  <?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}
a.btn.btn-default.buttons-pdf.buttons-html5 {
    display: none;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Sales Report</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="active">Sales Detailed</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row" style="padding: 12px 0px;">
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_detailed');?>" class="active btn btn-primary">Sales Detailed</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_summary');?>" class="btn btn-default">Sales Summary</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sku_sales_summary');?>" class="btn btn-default">SKU Sales Summary</a>
                    </div>
                </div>
                
                
                <div class="row">
                      
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Sales Detailed
                            </h4>
                        </div>
                         	 <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
        
                        <div class="panel-body">
                           
                            <div class="row" style="padding-left: 0px; padding-right: 50px; margin-left: -15px;">
                                
                                  <form action="<?php echo base_url('Admin/sales_detail_filter'); ?>" method="POST">
                    
                                <div class="col-md-2">
                                   
                                   <select class="form-control" name="rm_id" required style="font-size: 13px;">
                                   <option value="All">All RM </option>
                                   <?php foreach($rm_list as $rm){ ?>
                                   <option  value="<?=  $rm->id ?>" <?php if($rm_id == $rm->id ) { echo 'selected' ; } ?>><?php echo $rm->rm_name ; ?></option>
                                  <?php } ?>
                                  </select>
                      
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="order_status" >
                                        <option value="All"<?php if($order_status == 'All' ) { echo 'selected' ; } ?>>All Order</option>
                                        <option value="Not"<?php if($order_status == 'Not' ) { echo 'selected' ; } ?>>Not Approved</option>
                                        <option value="Pending"<?php if($order_status == 'Pending' ) { echo 'selected' ; } ?> >Pending</option>
                                        <option value="Readyshipped" <?php if($order_status == 'Readyshipped' ) { echo 'selected' ; } ?>>Ready to Shipped</option>
                                        <option value="shipped" <?php if($order_status == 'shipped' ) { echo 'selected' ; } ?>>Shipped</option>
                                        <option value="Delivered" <?php if($order_status == 'Delivered' ) { echo 'selected' ; } ?>>Deliverd</option>
                                        <option value="Cancelled" <?php if($order_status == 'Cancelled' ) { echo 'selected' ; } ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="All"<?php if($type == 'All' ) { echo 'selected' ; } ?>> All</option>
                                        <option value="Name"<?php if($type == 'Name' ) { echo 'selected' ; } ?>>Customer Name</option>
                                        <option value="Moblie"<?php if($type == 'Moblie' ) { echo 'selected' ; } ?>>Customer Moblie</option>
                                        <option value="order_id"<?php if($type == 'order_id' ) { echo 'selected' ; } ?>>Order ID</option>
                                        <option value="invoice_id"<?php if($type == 'invoice_id' ) { echo 'selected' ; } ?>>Invoice No.</option>
                                        <!--<option value="city">Customer City</option>-->
                                        <!-- <option value="state">Customer State</option>-->
                                        
                                    </select>
                                </div>
                                <div class=" col-md-2" id="search_name" >
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    <?php $user = $this->db->get('customerlogin')->result(); ?>
                                    <input  name="search" list="search" placeholder="Enter For Search"  type="text"  class="form-control" autocomplete="off">
                                      <datalist id="search" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option><?= $res->Owner ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-2" id="search_phone" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_phone" list="phone" placeholder="Enter For Search"  type="text"  class="form-control"  >
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
                                 
                                 <div class=" col-md-2" id="search_order" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                   <?php $order = $this->db->get('orders')->result(); ?>
                                    <input  name="search_order" list="order" placeholder="Enter For Search"  type="text"  class="form-control"  >
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
                                 <div class=" col-md-2" id="search_mode" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_mode" list="mode" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="mode" style="overflow-y: scroll; height: 200px;">
                                          
                                            <!--<option value="Online">Online</option>-->
                                            <!-- <option value="Bank Transfer">Bank Transfer</option>-->
                                            
                                            <?php foreach($order as $row)
                                              { 
                                                  if($row->invoice_id){
                                          ?>
                                            <option value="<?= $row->invoice_id ; ?>"><?= $row->invoice_id ; ?></option>
                
                                            <?php
                                             }
                                             }
                                                ?>
                
                                      </datalist>
                                 </div>
                                 
                                  <div class=" col-md-2" id="search_city" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_city" list="city" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="city" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->city ; ?>"><?= $res->city ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                  <div class=" col-md-2" id="search_state" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_state" list="state" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="state" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->state ; ?>"><?= $res->state ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                <!--<div class="col-md-2">-->
                                <!--     <input type="text"  class="form-control" name="search"  placeholder="Search" value="<?= $search ; ?>">-->
                                     
                                <!--</div>-->
                                <div class="col-md-2">
                                    <select class="form-control" name="cat_date" id="selectNEWBox">
                                        <option  value="All" <?php if($cat_date == 'All' ) { echo 'selected' ; } ?> >Duration</option>
                                        <option  value="Today"  <?php if($cat_date == 'Today' ) { echo 'selected' ; } ?> >Today</option>
                                        <option  value="Weekly" <?php if($cat_date == 'Weekly' ) { echo 'selected' ; } ?> >Weekly</option>
                                        <option  value="Monthly"  <?php if($cat_date == 'Monthly' ) { echo 'selected' ; } ?> >Monthly</option>
                                        <option value="custom" <?php if($cat_date == 'custom' ) { echo 'selected' ; } ?> >Custom date</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" id="apply_btn" value="Apply">
                                </div>
                                
                               
                            </div>
                            <div class="row" style="display:none; padding: 12px 0px; margin-left: -15px;" id="showdate">
                                <div class="col-md-3">
                                    <label>From Date</label>
                                    <input type="date" name="date1" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>To Date</label>
                                    <input type="date" name="date2" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-success" value="Search" style="margin-top: 18%;">
                                </div>
                            </div>
                             </form>
                          <div style="overflow-x:auto;">
                               <table class="table table-bordered " id="table1" style="width: 99%;overflow-y:auto;">
                                <thead>
                                    <tr class="filters">
                                    <th>RM</th>
                                    <th>Order Status</th>
                                    <th>Order date</th>
                                    <th>Order Id</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice No.</th>
                                    <th>Business Name</th>
                                    <th>GSTIN </th>
                                    <th>PAN</th>
                                    <th>ADHAAR</th>
                                    <th>Party Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Party mobile</th>
                                    <th>Item Name</th>
                                    <th>Billing Item Name</th>
                                    <th>SKU</th>
                                    <th>Dimanded Qty</th>
                                    <th>Dispatched Qty</th>
                                    <th>Disc. W.P.(before tax)</th>
                                    <th>Net Price (before tax)</th>
                                    <th>Amount ( before GST)</th>
                                    <th>HSN Code</th>
                                    <th>Sale Type</th>
                                    <th>IGST (Percent)</th>
                                    <th>CGST (Percent)</th>
                                    <th>SGST (Percent)</th>
                                    <th>IGST Amt.</th>
                                    <th>CGST Amt.</th>
                                    <th>SGST Amt.</th>
                                    <th>Amount</th>
                                      <!--<th>ORDER STATUS</th>-->
                                      <!--<th>No. of Carton</th>-->
                                      <th>BILTY No.</th>
                                      <th>Transporter Name</th>
                                      <th>Bilty Amount</th>
                                      <!--<th>Carton Packing</th>-->
                                      <!--<th>Transport Dropping</th>-->
                                      <!--<th>Order Processing Charges</th>-->
                                        
                                     </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                    
                                    foreach($result as $row){ 
                                        
                                         $order_id = $row->order_id ;
                                         
                                         $pincode = $row->pincode ;
                                         
                                         $pin_detail = $this->db->get_where('pincode', array('name'=>$pincode  ))->row() ;
                                         
                                         $state = $pin_detail->state ; 
                                // $order_detail  =   $this->db->get_where('order_detail' , array('order_rand_id' =>$order_id))->result(); 
                                
                                	$this->db->select();
	                            	$this->db->from('order_detail');
	                            	$this->db->where('order_rand_id',$order_id);
		                        	$this->db->order_by("series_product", "asc");
		                        	$query = $this->db->get();
	                    	$order_detail = $query->result();

                                
                                  foreach($order_detail as $order){ 
                                    
                                    ?>
                                    <tr>
                            <td><?= $row->Rm_id;  ?></td>
                             <td><?php $order_status = $row->order_status ; if($order_status == 'Not'){ $order_status ="Not Approved" ; } 
                                      echo $order_status ; 
                                      ?></td>
                            <td><?= $row->show_date ;  ?></td>
                            <td><?= $row->order_id ;  ?></td>
                             <td><?php  $invoice_date =  $row->invoice_date ;
                                    if($invoice_date){
                                    $newDate = date("d-M-Y", strtotime($invoice_date));  
                                    echo  $newDate;  
                                    }
                                     ?></td>
                            <td><?= $row->invoice_id ;  ?></td>
                           
                           <?php 
                                $user_id = $row->user_id ;
                                $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                $customeradd = $this->db->get_where('order_address' , array('order_id' => $row->order_id  ))->row() ; 
                               $pincode = $this->db->get_where('pincode' , array('name' => $row->pincode  ))->row() ; 
                              $customer_fulladdress = $this->db->get_where('order_address' , array('order_id' =>$order_id))->row(); 
                                
                                ?> 
                           
                            <td><?= $customer_fulladdress->customer_business ;  ?></td>
                            <td><?= $customer_fulladdress->customer_gst ;  ?></td>
                            <td><?= $customer_fulladdress->customer_pan ;  ?></td>
                            <td><?= $customer_fulladdress->customer_adhaar ;  ?></td>
                            <td><?= $row->cutomer_address ;  ?></td>
                                <td><?=  $pincode->area  ;  ?></td>
                            <td><?= $st = $pincode->state ;  ?></td>

                              <td><?= $user_detail->phone ;  ?></td>

                                
                               <?php 
                                $product_id = $order->product_id ;
                                $product_detail  =$this->db->get_where('product_detail' , array('sku_code' =>$product_id))->row(); 
                              
                                ?>
                                
                                <td><?= $product_detail->pro_name ?></td>
                                <td><?= $product_detail->pro_name ?></td> 
                                <td><?= $product_id ?></td>
                                <td><?= $order->customer_quantity ?></td>
                                <td><?= $qty = $order->quantity ?></td>
                                <?php 
                                $price = $order->price_after_discount ; 
                                
                                if(empty($price)){
                                    
                                   $price = $order->price ;  
                                  
                                }
                                ?>
                               
                                <td><?=  $price ; ?></td>
                                <td><?php  $disc = $order->discount_price ;   echo $net_price =  $price - $disc ;
                                 
                                ?></td>
                                 <td><?php 
                                echo $amt =  $net_price*$qty
                                    ?>
                                    </td>
                                  <td><?= $product_detail->hsn_code ?></td>
                                   <!--<td></td>-->
                                   
                                <?php  $gst = $product_detail->gst_per ;
                                if($st != 'UTTAR PRADESH'){?>
                                 <th>IGST/ItemWise</th>
                                    <td><?= $gst = $product_detail->gst_per ?>%</td>
                                    <td></td>
                                    <td></td>
                                   <?php }else{ ?>
                                    <th>LGST/ItemWise</th>
                                    <td></td>
                                    <td><?= $gst/2 ?>%</td>
                                    <td><?= $gst/2 ?>%</td>
                                    <?php } ?>
                                      <?php  $gst_amt = $amt*($gst)/100  ;
                                      if($st != 'UTTAR PRADESH'){?>
                                    <td><?= $gst_amt   ;?></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <?php }else{ ?>
                                     <td></td>
                                    <td><?= $gst_amt/2 ?></td>
                                    <td><?= $gst_amt/2 ?></td>
                                    <?php } ?>
                                    <td> <?= $amt+ $gst_amt;  ?></td>
                                      <!--<td><?php $order_status = $row->order_status ; if($order_status == 'Not'){ $order_status ="Not Approved" ; }  echo $order_status ;  ?></td>-->
                                         <!--<td><?= ($row->packing_charge)/350 ;  ?></td>-->
                                         <td><?= $row->Bilty_no ;  ?></td>
                                         <td><?= $row->parter_name ;  ?></td>
                                        <td><?= $row->bilty_amount ;  ?></td>
                                    <!--<td><?= $row->packing_charge ;  ?></td>-->
                                    <!--<td><?= $row->shipping_charge ;  ?></td>-->
                                    <!--<td><?= $row->order_processing ;  ?></td>-->

                              
                                    </tr>
                                    
                                 <?php } ?>
                                 
                                  <tr class="filters">
                                     <td><?= $row->Rm_id;  ?></td>
                                   <td><?php $order_status = $row->order_status ; if($order_status == 'Not'){ $order_status ="Not Approved" ; } 
                                      echo $order_status ; 
                                      ?></td>
                                    <td><?= $row->show_date ;  ?></td>
                                    <td><?= $row->order_id ;  ?></td>
                                     <td><?php  $invoice_date =  $row->invoice_date ;
                                    if($invoice_date){
                                    $newDate = date("d-M-Y", strtotime($invoice_date));  
                                    echo  $newDate;  
                                    }
                                     ?></td>
                                    <td><?= $row->invoice_id ;  ?></td>
                             <td><?= $customer_fulladdress->customer_business ;  ?></td>
                            <td><?= $customer_fulladdress->customer_gst ;  ?></td>
                            <td><?= $customer_fulladdress->customer_pan ;  ?></td>
                            <td><?= $customer_fulladdress->customer_adhaar ;  ?></td>
                            <td><?= $row->cutomer_address ;  ?></td>
                           
                            <td><?=  $pincode->area  ;  ?></td>
                            <td><?= $st = $pincode->state ;  ?></td>  
                                    <td><?= $user_detail->phone ;  ?></td>

                                    
                                    <td>Carton Packing</td>
                                    <td></td>
                                    <th></th>
                                    <th></th>
                                    <td><?php $paking =$row->packing_charge;   echo $carton = $paking/350 ;  ?></td>
                                    <td>350</td>
                                    <td>350</td>
                                     <td><?php echo $paking =$row->packing_charge;  ?></td>
                                    <th>52642</th>
                                    <!--<th>IGST/ItemWise</th>-->
                                     <!--<td>12</td>-->
                                     <!-- <td></td>-->
                                     <!-- <td></td>-->
                                     <?php   if($st != 'UTTAR PRADESH'){?>
                                       <th>IGST/ItemWise</th>
                                    <td>12%</td>
                                    <td></td>
                                    <td></td>
                                   <?php }else{ ?>
                                   <th>LGST/ItemWise</th>
                                    <td></td>
                                    <td>6%</td>
                                    <td>6%</td>
                                    <?php } ?> 
                                   
                                    
                                        <?php   if($st != 'UTTAR PRADESH'){?>
                                       <td><?php echo $paking*(12/100) ;?></td>
                                   <td></td>
                                    <td></td>
                                   <?php }else{ ?>
                                    
                                   <td></td>
                                   <td><?php echo $paking*(12/100)/2 ;?></td>
                                   <td><?php echo $paking*(12/100)/2 ;?></td>
                                    <?php } ?> 
                                    <td><?php echo $tot= $paking + $paking*(12/100) ;?></td>
                                      <!--<td><?=  $order_status ; ?></td>-->
                                       <!--<th>No. of Carton</th>-->
                                   <td><?= $row->Bilty_no ;  ?></td>
                                        <td><?= $row->parter_name ;  ?></td>
                                      <td><?= $row->bilty_amount ;  ?></td>
                                      <!--<th>Carton Packing</th>-->
                                      <!--<th>Transport Dropping</th>-->
                                      <!--<th>Order Processing Charges</th>-->
                                        
                                     </tr> 
                                 
                                    <tr class="filters">
                                     <td><?= $row->Rm_id;  ?></td>
                                    <td><?php $order_status = $row->order_status ; if($order_status == 'Not'){ $order_status ="Not Approved" ; } 
                                      echo $order_status ; 
                                      ?></td>
                                    <td><?= $row->show_date ;  ?></td>
                                    <td><?= $row->order_id ;  ?></td>
                                     <td><?php  $invoice_date =  $row->invoice_date ;
                                    if($invoice_date){
                                    $newDate = date("d-M-Y", strtotime($invoice_date));  
                                    echo  $newDate;  
                                    }
                                     ?></td>
                                    <td><?= $row->invoice_id ;  ?></td>
                              <td><?= $customer_fulladdress->customer_business ;  ?></td>
                            <td><?= $customer_fulladdress->customer_gst ;  ?></td>
                            <td><?= $customer_fulladdress->customer_pan ;  ?></td>
                            <td><?= $customer_fulladdress->customer_adhaar ;  ?></td>
                            <td><?= $row->cutomer_address ;  ?></td>
                           
                            <td><?=  $pincode->area  ;  ?></td>
                            <td><?= $st = $pincode->state ;  ?></td>
                                    <td><?= $user_detail->phone ;  ?></td>

                                    
                                    <td>Freight Charge</td>
                                    <td></td>
                                    <th></th>
                                    <th></th>
                                 <td>1</td>
                                  <td><?= $row->shipping_charge ;  ?></td>
                                      <td><?= $row->shipping_charge ;  ?></td>
                                     <td><?= $shipping = $row->shipping_charge ;  ?></td>
                                    <th>52642</th>
                                    <!--<th>IGST/ItemWise</th>-->
                                     <!--<td>18</td>-->
                                     <!-- <td></td>-->
                                     <!-- <td></td>-->
                                      <?php   if($st != 'UTTAR PRADESH'){?>
                                       <th>IGST/ItemWise</th>
                                    <td>18%</td>
                                    <td></td>
                                    <td></td>
                                   <?php }else{ ?>
                                   <th>LGST/ItemWise</th>
                                    <td></td>
                                    <td>9%</td>
                                    <td>9%</td>
                                    <?php } ?> 
                                    <?php   if($st != 'UTTAR PRADESH'){?>
                                         <td><?php echo  $shipping*(18/100) ;?></td>
                                   <td></td>
                                    <td></td>
                                 
                                   <?php }else{ ?>
                                    
                                   <td></td>
                                    <td><?php echo  $shipping*(18/100)/2 ;?></td>
                                  <td><?php echo  $shipping*(18/100)/2 ;?></td>
                                    <?php } ?> 
                                    
                                    <td><?php echo $ship_tot = $shipping + $shipping*(18/100) ;?></td>
                                      <!--<td><?=  $order_status ; ?></td>-->
                                      <!--<th>No. of Carton</th>-->
                                       <td><?= $row->Bilty_no ;  ?></td>
                                        <td><?= $row->parter_name ;  ?></td>
                                      <td><?= $row->bilty_amount ;  ?></td>
                                      <!--<th>Carton Packing</th>-->
                                      <!--<th>Transport Dropping</th>-->
                                      <!--<th>Order Processing Charges</th>-->
                                        
                                     </tr>
                              <?php $order_process = $row->order_processing ; 
                              if($order_process){
                              ?>
                                    <tr class="filters">
                                     <td><?= $row->Rm_id;  ?></td>
                                   <td><?php $order_status = $row->order_status ; if($order_status == 'Not'){ $order_status ="Not Approved" ; } 
                                      echo $order_status ; 
                                      ?></td>
                                    <td><?= $row->show_date ;  ?></td>
                                    <td><?= $row->order_id ;  ?></td>
                                     <td><?php  $invoice_date =  $row->invoice_date ;
                                    if($invoice_date){
                                    $newDate = date("d-M-Y", strtotime($invoice_date));  
                                    echo  $newDate;  
                                    }
                                     ?></td>
                                    <td><?= $row->invoice_id ;  ?></td>
                                     <td><?= $customer_fulladdress->customer_business ;  ?></td>
                            <td><?= $customer_fulladdress->customer_gst ;  ?></td>
                            <td><?= $customer_fulladdress->customer_pan ;  ?></td>
                            <td><?= $customer_fulladdress->customer_adhaar ;  ?></td>
                            <td><?= $row->cutomer_address ;  ?></td>
                           
                                    <td><?= $user_detail->city ;  ?></td>
                                    <td><?= $st = $user_detail->state ;  ?></td>
                                    <td><?= $user_detail->phone ;  ?></td>

                                    
                                    <td>Order Processing Charge</td>
                                    <td></td>
                                    <th></th>
                                    <th></th>
                                    <td>1</td>
                                   <td>500</td>
                                    <td>500</td>
                                     <td>500</td>
                                    <th>26525</th>
                                    <th>LGST/ItemWise</th>
                                    <!--<td>18%</td>-->
                                   <!-- <td></td>-->
                                   <!-- <td></td>-->
                                    <!--<td>90</td>-->
                                   <?php   if($st != 'UTTAR PRADESH'){?>
                                   <td>18%</td>
                                    <td></td>
                                    <td></td>
                                    <td>90</td>
                                    <td></td>
                                    <td></td>
                                 
                                   <?php }else{ ?>
                                    
                                  <td></td>
                                    <td>9%</td>
                                    <td>9%</td>
                                    <td></td>
                                    <td>45</td>
                                    <td>45</td>
                                    <?php } ?> 
                                    <td>590</td>
                                   
                                      <!--<td><?=  $order_status  ;  ?></td>-->
                                      <!--<th>No. of Carton</th>-->
                                       <td><?= $row->Bilty_no ;  ?></td>
                                        <td><?= $row->parter_name ;  ?></td>
                                      <td><?= $row->bilty_amount ;  ?></td>
                                      <!--<th>Carton Packing</th>-->
                                      <!--<th>Transport Dropping</th>-->
                                      <!--<th>Order Processing Charges</th>-->
                                        
                                     </tr>
                                     
                                     <?php } ?>
                                 
                             <?php    } ?>   
                                </tbody>
                            </table>
                            </div>
                            <!-- Modal for showing delete confirmation -->
                          
                        </div>
                    </div>
                </div>
                <!-- row-->
                
                
                
                </section>
        </aside>
   
<?php
include 'footer.php';
?>


<script>
      $("#type").change(function () {
    if ($(this).val() == "Customer") {
        // $('#myModal3').modal('show');
         $("#search_name").show();
          $("#search_phone").hide();
          $("#search_order").hide();
          $("#search_mode").hide();
              $("#search_city").hide();
           $("#search_state").hide();
         
      } else if ($(this).val() == "Moblie") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").show();
           $("#search_order").hide();
          $("#search_mode").hide();
              $("#search_city").hide();
           $("#search_state").hide();
         
      }else if ($(this).val() == "order_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").show();
           $("#search_mode").hide();
              $("#search_city").hide();
           $("#search_state").hide();
         
          
      }else if ($(this).val() == "invoice_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").show();
           
             $("#search_city").hide();
           $("#search_state").hide();
         
          
          
      }else if ($(this).val() == "city") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           $("#search_city").show();
             $("#search_state").hide();
          
      }else if ($(this).val() == "state") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           $("#search_city").hide();
           $("#search_state").show();
          
          
      }
          
      
  });
</script>



 <script>
    $("#selectNEWBox").change(function (){
        var value = this.value;
        if(value=='custom'){
            $('#showdate').show();  
            
            $('#apply_btn').hide();
        }
        else {
            $('#showdate').hide();
            
             $('#apply_btn').show();
            
        }
    });
    
    $(document).ready(function() {
    $('#table1').DataTable( {
        "scrollX": true
    } );
} );
</script>