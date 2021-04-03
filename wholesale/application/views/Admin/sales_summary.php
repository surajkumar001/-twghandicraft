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
                    
                    <li class="active">Sales Summary</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_detailed');?>" class="btn btn-default">Sales Detailed</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_summary');?>" class="active btn btn-primary">Sales Summary</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sku_sales_summary');?>" class="btn btn-default">SKU Sales Summary</a>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Sales Summary
                            </h4>
                        </div>
                        
                        <div class="panel-body">
                   <form action="<?php echo base_url('Admin/sales_summary_filter'); ?>" method="POST">
                   	 <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
            
                                <div class="col-md-2">
                                   
                                   <select class="form-control" name="rm_id" required style="font-size: 13px;">
                                   <option value="All">All RM </option>
                                   <?php foreach($rm_list as $rm){ ?>
                                   <option  value="<?=  $rm->id ?>" <?php if($rm_id == $rm->id ) { echo 'selected' ; } ?> ><?php echo $rm->rm_name ; ?></option>
                                  <?php } ?>
                                  </select>
                      
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="order_status" >
                                        <option value="All"<?php if($order_status == 'All') { echo 'selected' ; } ?>>All Order</option>
                                        <option value="Not"<?php if($order_status == 'Not') { echo 'selected' ; } ?>>Not Approved</option>
                                        <option value="Pending"<?php if($order_status == 'Pending' ) { echo 'selected' ; } ?> >Pending</option>
                                        <option value="Readyshipped"<?php if($order_status == 'Readyshipped' ) { echo 'selected' ; } ?> >Ready to Shipped</option>
                                        <option value="shipped" <?php if($order_status == 'shipped' ) { echo 'selected' ; } ?>>Shipped</option>
                                        <option value="Delivered"<?php if($order_status == 'Delivered' ) { echo 'selected' ; } ?> >Deliverd</option>
                                        <option value="Cancelled"<?php if($order_status == 'Cancelled' ) { echo 'selected' ; } ?> >Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="type" id="type" required>
                                        <option value="All" <?php if($type == 'All') { echo 'selected' ; } ?>>All</option>
                                        <option value="Name" <?php if($type == 'Name') { echo 'selected' ; } ?>>Customer Name</option>
                                        <option value="Moblie" <?php if($type == 'Moblie') { echo 'selected' ; } ?>>Customer Moblie</option>
                                        <option value="order_id" <?php if($type == 'order_id') { echo 'selected' ; } ?>>Order ID</option>
                                        <option value="invoice_id" <?php if($type == 'invoice_id') { echo 'selected' ; } ?>>Invoice No.</option>
                                        <!--<option value="city">Customer City</option>-->
                                        <!-- <option value="state">Customer State</option>-->
                                        
                                    </select>
                                </div>
                                <div class=" col-md-2" id="search_name" >
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    <?php $user = $this->db->get('customerlogin')->result(); ?>
                                    <input  name="search" list="cars" placeholder="Enter For Search"  type="text"  value="<?= $search ;?>"  class="form-control" autocomplete="off">
                                      <datalist id="cars" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option <?php if($search == $res->Owne) { echo 'selected' ; } ?>><?= $res->Owner ?></option>
                
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
                                  
                                    <input  name="search_invoice" list="mode" placeholder="Enter For Search"  type="text"  class="form-control"  >
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
                                        <option  value="All" <?php if($cat_date == 'All') { echo 'selected' ; } ?>>Duration</option>
                                        <option  value="Today"  <?php if($cat_date == 'Today') { echo 'selected' ; } ?>>Today</option>
                                        <option  value="Weekly" <?php if($cat_date == 'Weekly') { echo 'selected' ; } ?>>Weekly</option>
                                        <option  value="Monthly"  <?php if($cat_date == 'Monthly') { echo 'selected' ; } ?>>Monthly</option>
                                        <option value="custom" <?php if($cat_date == 'custom') { echo 'selected' ; } ?>>Custom date</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" id="apply_btn" value="Apply">
                                </div>
                                
                               
                            </div>
                            <div class="row" style="<?php if($cat_date == 'custom') { echo 'd ' ; }else{  echo 'display:none;' ; } ?> padding: 12px 0px; margin-left: -15px;" id="showdate">
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
                             <br>
                            <div class="row" style="overflow-x:auto;">
                           <table class="table table-bordered " id="table1" style="width: 99%;overflow-y:auto;">
                                <thead>
                                    <tr class="filters">
                                    <th>RM</th>
                                    <th>Order Status</th>
                                    <th>Order date</th>
                                    <th>order id</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice No.</th>
                                    <th>Business Name</th>
                                    <th>GSTIN </th>
                                    <th>PAN</th>
                                    <th>Aadhar</th>
                                    <th>Party Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Party mobile</th>
                                    <th>Dimanded Qty</th>
                                    <th>Dispatched Qty</th>
                                    <th>W.P.(before tax)</th>
                                    <th>Disc. W.P.(before tax)</th>
                                   
                                  <th>Net Price (before tax)</th>
                                  <th>Carton Packing</th>
                                  <th>freight charge</th>
                                  <th>order processing</th>
                                  
                                  
                                  <th>Discount</th>
                                   <th>Net Amount(Before Tax)</th>
                                  
                                  <!--<th>HSN Code</th>-->
                                  <!--<th>Sale Type</th>-->
                                  <!--<th>IGST (Percent)</th>-->
                                  <!--<th>CGST (Percent)</th>-->
                                  <!--<th>SGST (Percent)</th>-->
                                  <th>5% IGST Amt.</th>
                                  <th>5% CGST Amt.</th>
                                  <th>5% SGST Amt.</th>
                                   
                                    <th>12% IGST Amt.</th>
                                    <th>12% CGST Amt.</th>
                                    <th>12% SGST Amt.</th>
                                    
                                    <th>18% IGST Amt.</th>
                                 
                                   <th>18% CGST Amt.</th>
                                  
                                  
                                 
                                  <th>18% SGST Amt.</th>
                                  
                                  <th> Amount</th>
                                  <th>Advance Date</th>
                                  <th>Advance payment mode</th>
                                  <th>Advance bank account no</th>
                                  <th>Advance amount</th>
                                  <th>2nd Payment date</th>
                                  <th>2nd payment mode</th>
                                  <th>2nd bank account no</th>
                                  <th>2nd amount</th>
                                  <th>Balance Payment date</th>
                                  <th>Balance payment mode</th>
                                  <th>Balance bank account no</th>
                                  <th>Balance amount</th>
                                    <th>No of Carton</th> 
                                    <th>Dispatch date</th> 
                                    <th>BILTY No.</th> 
                                    <th>Transporter Name</th> 
                                    <th>transporter No.</th> 
                                    <th>delivery date</th> 
                                    <th>Bilty Amount</th> 
                                    <th>pack by</th> 
                                    <th>check by</th> 
                                    <th style="padding:10px 200px;">custmer feedback</th> 
                                    
                                
                                     </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                    
                                    foreach($result as $row){ 
                                        
                                         $order_id = $row->order_id ;
                                $order_detail  =$this->db->get_where('order_detail' , array('order_rand_id' =>$order_id))->result(); 
                                
                                  foreach($order_detail as $order){ 
                                      
                                  $customer_quantity +=  $order->customer_quantity ;
                                  $quantity+=  $order->quantity ;
                                  $price+=  $order->price ;
                                  $totprice+=  $order->price*$order->quantity ;
                                  $totdisprice+=  $order->price_after_discount*$order->quantity ;
                                  $dis =  $order->price_after_discount ;
                                 $last_disprice+=  (  $order->price_after_discount -$order->discount_price)*$order->quantity  ;
                                  if(empty($dis)){
                                      
                                       $dis_price+=  $order->price ; 
                                  }else{
                                       $dis_price+= $order->price_after_discount  ; 
                                  } 
                                  
                                   $productgst+=  $order->productgst ;
                                  
                                 
                                $gst = $order->gst  ;
                                
                                        //   if($gst == '12'){
                                              
                                        //       $totalgst_12+=$order->productgst;
                                              
                                        //   }elseif($gst=='18'){
                                              
                                              
                                        //       $totalgst_18+=$order->productgst ;
                                        //   }elseif($gst=='5'){
                                              
                                              
                                        //       $totalgst_5+=$order->productgst ;
                                               
                                        //   }elseif($gst=='28'){
                                              
                                              
                                        //       $totalgst_18+=$order->productgst;
                                        //   }
                                          
                                             
                                  }   
                                    ?>
                                    <tr> 
                            <td><?= $row->Rm_id;  ?></td>
                            <td><?php $order_status =  $row->order_status ; if($order_status == 'Readyshipped'){ echo 'Ready to shipped' ;}elseif($order_status == 'Not'){ echo 'Not Approved' ;}else{ echo $order_status ; } ?></td>
                            <td><?= $row->show_date ;  ?></td>
                            <td><?= $row->order_id ;  ?></td>
                         
                           <td>
                           <?php  $invoice_date =  $row->invoice_date ;
                                    if($invoice_date){
                                    $newDate = date("d-M-Y", strtotime($invoice_date));  
                                    echo  $newDate;  
                                    }
                                     ?>
                           </td>
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
                            <td><?= $st = $pincode->state ;  ?>

                              <td><?= $user_detail->phone ;  ?></td>

                                
                               <?php 
                                $product_id = $order->product_id ;
                                $product_detail  =$this->db->get_where('product_detail' , array('sku_code' =>$product_id))->row(); 
                              
                                ?>
                                
                                <td><?php echo $customer_quantity ;  $customer_quantity = 0 ; ?></td>
                                
                                 <td><?php echo $quantity ;  $quantity = 0 ; ?></td>
                                 <td><?php echo $totprice ;  $totprice = 0 ; ?></td>
                                 <td><?php echo $totdisprice ;  ?></td>
                                <td><?php echo   $last_disprice ; ?></td>
                                
                                 <!--<td><?=  $row->subtotal ?></td>-->
                                
                               <td><?=  $row->packing_charge ?></td>
                               <td><?=  $row->shipping_charge ?></td>
                               <td><?=  $row->order_processing ?></td>
                                
                                 <td><?= $row->discountcharge ?></td>
                               <td><?php echo $net =  $last_disprice + $row->shipping_charge + $row->packing_charge+$row->order_processing  ;  $totdisprice = 0 ;$last_disprice = 0 ; ?></td>
                               
                              
                                    <!--<td><?= $gst = $product_detail->gst_per ?></td>-->
                                    <!--<td><?= $gst/2 ?></td>-->
                                    
                                    <!--<td><?= $gst/2 ?></td>-->
                                    
                                   <?php  
                                if($st != 'UTTAR PRADESH'){?>
                                    <td><?php echo $gst_5 =$row->gst_5  ;?></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td><?php echo $gst_12 = $row->gst_12;   ?></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td><?php echo $row->gst_18  ; ?></td>
                                    <td></td>
                                    <td></td>
                                    
                                    
                                   <?php }else{ ?>
                                    <td></td>
                                    <td><?php echo $row->gst_5/2;  ?></td>
                                    <td><?php echo $row->gst_5/2 ; ?></td>
                                    
                                   <td></td>
                                    <td><?php echo $row->gst_12/2;  ?></td>
                                    <td><?php echo $row->gst_12/2 ; ?></td>
                                                  
                                   <td></td>
                                    <td><?php echo $row->gst_18 /2;  ?></td>
                                    <td><?php echo $row->gst_18 /2 ; ?></td>
                                    
                                   
                                    <?php } ?>
                                    
                                    <td><?= $row->finalamount ;  ?></td>
                                <td>
            <?php  $date =  $row->order_Date ;
                                    if($date){
                                    $newDate = date("d-M-Y", strtotime($date));  
                                    echo  $newDate ;  
                                    }
                                     ?></td>
                                <td><?php if($row->online_transaction_id) {
                                   echo  "Online" ; 
                                
                                }else{
                                echo  "Bank Transfer" ;
                                }?></td> 
                                <td><?= $row->BankAccountNo ?></td>
                                
                                
                                  <td><?= $row->advance_payment ?></td>
                                  
                                  <?php
                                      $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id  ,'payment_no' => 2))->row() ;
                                    
                                    ?>
                                      <td><?= $pend_row->pend_offline_transferdate ;  ?></td>
                                      <td><?= $pend_row->pend_payment_type ;  ?></td>
                                      
                                       <td><?= $pend_row->BankAccountNo ;  ?></td>
                                    <td><?= $pend_row->pend_amount ?></td>
                                 <?php
                                           $pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();
                                    ?> 
                                 <td>
                                    <?php  $date =  $pend_3_row->pend_offline_transferdate;
                                    if($date){
                                    $newDate = date("d-M-Y", strtotime($date));  
                                    echo  $newDate;  
                                    }
                                     ?>
                                 </td>
                                      <td><?= $pend_3_row->pend_payment_type ;  ?></td>
                                      
                                       <td></td>
                                    <td><?= $pend_3_row->pend_amount ?></td>
                                    
                                    <!--<td><?= $row->order_Date ?></td>-->   
                                     
                                      <td><?= ($row->packing_charge)/350 ;  ?></td>
                                        <td>
                                        <?php  $shipment_date =  $row->shipment_date ;
                                    if($shipment_date){
                                    $Date = date("d-M-Y", strtotime($shipment_date));  
                                    echo  $Date;  
                                    }
                                     ?>
                                        </td>
                                       
                                        <td><?= $row->Bilty_no ;  ?></td>
                                         <td><?= $row->parter_name ;  ?></td> 
                                        <td><?= $row->parter_contact ;  ?></td>
                                        <td><?= $row->delivery_date	 ;  ?></td>
                                       <td><?= $row->bilty_amount ;  ?></td>
                                         
                                       <td><?= $row->packed_by ;  ?></td>
                                        <td><?= $row->checked_by ;  ?></td>
                                         <td><?= $row->feedback ;  ?></td>


                              
                                    </tr>
                                    
                                 <?php  } ?>   
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
    
</script>