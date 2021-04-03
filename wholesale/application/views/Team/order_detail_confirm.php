 <?php
 //pr($messag);die;
include('header.php');
// include('sidebar.php');
?>
<aside>
            <!-- Content Header (Page header) -->
           
            <!-- Main content -->
            <section class="content" id="content2" >
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order Details
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                                    <div class="row">
                                <div class="col-md-3">
                                    <p><b>Order No :</b><?php print_r($result[0]['order_rand_id'])?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Order Date :</b> <?=  $result[0]['order_Date'];?> </p>
                                </div>
                                 <?php $oid =$result[0]['order_rand_id'];
                                  
                                  $customeradd = $this->db->get_where('order_address' , array('order_id' => $oid  ))->row() ; 
                                  ?>
                                 <div class="col-md-3">
                                    <p><b>Business Name :</b>  <?=  $customeradd->customer_business  ;?> </p>
                                </div>
                                 <div class="col-md-3">
                                    <p><b>Owner Name :</b>  <?=  $result[0]['customer_name'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Email :</b> <?=  $result[0]['email'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Mobile No :</b> <?=  $result[0]['phone'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Landline No :</b> <?=  $result[0]['landline'];?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Address :</b> <?=  $result[0]['Address'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>PinCode :</b>  <?= $pin =  $result[0]['pincode'];?></p>
                                <?php  $pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ; ?>
                                 </div>
                                 <?php  $pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ; ?>
                               <div class="col-md-3">
                                    <p><b>City :</b>  <?=  $pincode->area  ;?></p>
                                </div>
                                 <div class="col-md-3">
                                    <p><b>State :</b>  <?=  $pincode->state ;?></p>
                                </div>
                                 <div class="col-md-3">
                                    <p><b>Delivery Mode :</b>  <?=  $result[0]['delievry_type'];?></p>
                                </div>
                                 <div class="col-md-3">
                                    <p><b>GST No:</b> <?= $customeradd->customer_gst ;?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>PAN No. :</b>  <?=  $customeradd->customer_pan ;?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Aadhar No:</b> <?= $customeradd->customer_adhaar ;?></p>
                                </div>
                                
                                <?php if($result[0]['transport_Delivery_Point'] ){ ?>
                                <div class="col-md-3">
                                    <p><b>Transport Delivery Point :</b> <?=  $result[0]['transport_Delivery_Point'];?></p>
                                </div>
                               
                                <?php } ?>
                                <?php if($result[0]['parter_contact']){ ?>
                                <div class="col-md-3">
                                    <p><b> Contact Number(Transport):</b> <?=  $result[0]['parter_contact'];?></p>
                                </div>
                               
                                <?php } ?>
                                
                                <div class="col-md-3">
                                    <p><b>Transporter Parter Name :</b>  <?=  $result[0]['parter_name'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Bilty No. :</b>  <?=  $result[0]['Bilty_no'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Bilty Date :</b>  <?=  $result[0]['shipment_date'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Bilty Amount :</b>  <?=  $result[0]['bilty_amount'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Invoice No. :</b>  <?=  $result[0]['invoice_id'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Pack By :</b>  <?=  $result[0]['packed_by'];?></p>
                                </div>
                                
                                <div class="col-md-3">
                                    <p><b>Check By :</b>  <?=  $result[0]['checked_by'];?></p>
                                </div>
                               
                            </div>
                            <table class="table table-striped table-bordered">
                                       <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Product SKU</th>
                                        <th>Demanded Qty</th>
                                        <th>Dispatched Qty</th>
                                        <th>Disc. W.P.(before tax)</th>
                                        <th>Net Price</th>
                                        <th>Amount</th>
                                        <th>GST %</th>
                                        <th>GST Amount</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                                  
                        <?php  $order_id = $result[0]['order_rand_id'] ;
                                
                                    $i = 1 ;
                                    
                                  
                                     foreach ($result as  $value) {
                                   
                                         ?>
                                     <tr>
                                         <td><?= $i++ ; ?></td>
                                         <?php   $product_id = $value['product_id'] ;
                                         $product_detail  =  $this->db->get_where('product_detail', array('sku_code' => $product_id ,))->row() ;
                                         
                                         if(empty($product_detail)){
                                             
                                               $product_detail  =  $this->db->get_where('product', array('sku_code' => $product_id ,))->row() ;
                                         }
                                         
                                     
                                         $img = $product_detail->main_image1;
                                         
                                         ?>
                                         <td><img src="<?= $img ?>" class="img50" width="70px" height="70px" ></td>
                                         <td><?= $value['product_id']; ?></td>
                                         
                                       
                                          <td><?php echo $value['customer_quantity']; ?> </td>
                                         
                                        <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->selling_price; ?>"> 
                                        
                                         <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $value['gst']; ?>"> 
                                         
                                         <input type="hidden" id="user_id_<?php echo $value['product_id']; ?>" value="<?php echo $value['user_id']; ?>"> 
                                         
                                           <input type="hidden" id="box_volume_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->box_volume_weight ; ?>"> 
                                           
                                       
                                         <td> <?php echo $value['quantity']; ?></td>
                                        
                                           
                                         <td><?= $value['price_after_discount']; ?></td>
                                         
                                         <td><?php echo  $real_price =   $value['price_after_discount'] -  $value['discount_price']; ?></td>
                                         <!--<td>175</td>-->
                                        
                                          <td><?php echo  $sub_price = $real_price*$value['quantity'] ; ?></td>
                                          <?php  $total_before+= $sub_price ; ?>
                                          
                                          
                                         <td> <?php echo $value['gst']; ?>%</td>
                                         <td><?= $gst_val = round($sub_price*$value['gst']/100 ,2); ?></td>
                                         
                                           <?php  
                                           $volume= $product_detail->box_volume_weight *$value['quantity'];
                                           
                                          $finalvolume+=$volume;
                                         
                                          
                                          if($value['gst'] == '12'){
                                              
                                              $totalgst_12+=$gst_val;
                                              
                                          }elseif($value['gst']=='18'){
                                              
                                              
                                               $totalgst_18+=$gst_val ;
                                          }elseif($value['gst']=='5'){
                                              
                                              
                                               $totalgst_5+=$gst_val ;
                                          }elseif($value['gst']=='28'){
                                              
                                              
                                               $totalgst_28+=$gst_val;
                                          }
                                          
                                              
                                          $total_price+= $value['cart_price']  ;
         
                                          
                                        //   echo $total_price;
                                         
                                         ?>
                                        
                                         
                                         
                                         <!--<td><p class="btn btn-primary" onclick="onButtonClick()" style="width: 100%;">Add</p>-->
                                                <!--<td><p class="btn btn-primary" onclick="add('<?=$value['id'];?>');" style="width: 100%;">Update</p>-->
                                   <input class="hide"  type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"/>
                                       


                                      </tr>
                                      
                                      <?php } ?>
                                   
                      <?php $a = 1 ;
                                     $percent_amount = array();
                                      $discount = array() ;
                                          
                                   foreach($result as $amount){
                                       
                                       //==================== % ratio =====                                
                                          
                                $percent_amount[$a] =round(($amount['cart_price'] / $total_price)*100,2); 
                                        
                                    $a++ ;       
                                   } 
                                       
                                          ?>
                                          
                                      
                         </tbody>
                            </table>
                            <table class="table table-striped table-bordered" id="mytable">
                                <thead>
                                   
                                </thead>
                                 <tbody>
                                     
                                      <!-- <tr>-->
                                      <!--   <td></td>-->
                                      <!--   <td><b>Total (After tax)</b></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td><b><?php echo $total_amt =round($total_price +  $paking*(112/100) +$shipping*(118/100),2);; ?></b></td>-->
                                      <!--   <td></td>-->
                                      <!--   <td></td>-->
                                      <!--</tr>-->
                                      
                                        <tr>
                                         <td></td>
                                         <td><b>Sub Total (Cart Value)</b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td style="background-color:yellow;"><span id="g_total"><?php echo $cart_value  = round($total_price ,2) ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      
                                      
                                       <tr>
                                         <td></td>
                                         <td>Carton Packing</td>
                                         <td></td>
                                         <td style="text-align : right; "> No. of Carton :</td>
                                         <td> <?php $paking = $result[0]['packing_charge'];   echo $carton = $paking/350   ?>  </td>
                                         <td></td>
                                         <td></td>
                                         <td><?php echo $paking = $result[0]['packing_charge']; ?></td>
                                         <td>12%</td>
                                         <td><?= $paking_gst = round($paking*(12/100),2); ?></td>
                                      </tr>
                                      
                                       <tr>
                                         <td></td>
                                         <?php $delievry = $result[0]['delievry_type']  ;
                                         
                                         if($delievry == 'Transport'){
                                         
                                         ?>
                                         <td>Freight Charge</td>
                                         
                                         <?php }else{ ?>
                                          <td>Shipping Charge </td>
                                          
                                          <?php } ?>
                                         
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>  <?= $shipping = $result[0]['shipping_charge'] ?></td>
                                         <td>18%</td>
                                         <td><?= $shipping_gst = round($shipping*(18/100),2); ?></td>
                                      </tr>
                                      
                                      
                                     
                                       <tr>
                                         <td></td>
                                         <td>  Order Processing </td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td>  <?php  if($cart_value < 12000){  echo $order_processing = 500 ; }else{ echo $order_processing= 0 ; }  ?></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      
                                     
                                      
                                       <tr>
                                         <td></td>
                                         <td><b>Total Amount(Before Tax)</b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td style="background-color:yellow;"><span id="g_total"><?php echo $sub_amount = round($total_price + $order_processing +$paking + $shipping ,2) ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                       <tr>
                                         <td></td>
                                         <td>Discount</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><span id="total_discount"> <?php echo $admin_discount =  $result[0]['discountcharge'] ;?></span></td>
                                         <td></td>
                                         <td>
                                             
                                      </tr>
                                      
                                       
                                       <tr>
                                         <td></td>
                                         <td>Net Amount</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td style="background-color:yellow;"><span id="net_total"><?= $net_amount =  $sub_amount  - $admin_discount; ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                   <?php if(!empty($totalgst_5)){ ?>  
                                       <tr>
                                         <td></td>
                                         <td>GST @5%</td>
                                         <td></td>
                                         
                                         <?php $state =   $result[0]['state']; 
                                         
                                         if($state != 'UTTAR PRADESH'){
                                         
                                         ?>
                                         <td style="background-color:yellow;">IGST :<?php echo $totalgst_5 ; ?> </td>
                                         <td></td>
                                         
                                         <?php }else{ ?>
                                         
                                          <td style="background-color:yellow;">CGST :<?php echo round($totalgst_5/2,2) ; ?> </td>
                                         <td style="background-color:yellow;">SGST :<?php echo round($totalgst_5/2 ,2); ?> </td>
                                         <?php } ?>
                                         <td></td>
                                         <td></td>
                                        <td><span> <?= $gst_5 = $totalgst_5  ; ?> </span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      <?php } ?>
                                       <tr>
                                         <td></td>
                                         <td>GST @12%</td>
                                         <td></td>
                                        
                                         <?php $state =   $result[0]['state']; 
                                          $gst_12 = $totalgst_12 + $paking_gst ;
                                         
                                         if($state != 'UTTAR PRADESH'){
                                             
                                            
                                         ?>
                                         <td  style="background-color:yellow;">IGST :<?php echo $gst_12 ; ?> </td>
                                         <td></td>
                                         
                                         <?php }else{ ?>
                                         
                                          <td style="background-color:yellow;">CGST :<?php echo round($gst_12/2,2) ; ?> </td>
                                         <td style="background-color:yellow;">SGST :<?php echo round($gst_12/2 ,2); ?> </td>
                                         <?php } ?>
                                         <td></td>
                                         <td></td>
                                        <td><span id="total_gst"> <?= $gst_12 = $totalgst_12 + $paking_gst ; ?> </span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                        <tr>
                                         <td></td>
                                         <td>GST @18%</td>
                                         <td></td>
                                        
                                         <?php $state =   $result[0]['state']; 
                                           $gst_18 =  $totalgst_18 + $shipping_gst ;
                                         
                                         if($state != 'UTTAR PRADESH'){
                                         
                                       
                                         ?>
                                         <td style="background-color:yellow;" >IGST :<?php echo $gst_18 ; ?> </td>
                                         <td></td>
                                         
                                         <?php }else{ ?>
                                         
                                          <td style="background-color:yellow;" >CGST :<?php echo round($gst_18/2,2) ; ?> </td>
                                         <td style="background-color:yellow;" >SGST :<?php echo round($gst_18/2 ,2); ?> </td>
                                         <?php } ?>
                                         <td></td>
                                         <td></td>
                                        <td>   <?= $gst_18 =  $totalgst_18 + $shipping_gst ;?></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                        
                                      <?php if(!empty($totalgst_28)){ ?>   
                                        <tr>
                                         <td></td>
                                         <td>GST @28%</td>
                                         <td></td>
                                         
                                         <?php $state =   $result[0]['state']; 
                                         
                                         if($state != 'UTTAR PRADESH'){
                                         
                                         ?>
                                         <td style="background-color:yellow;" >IGST :<?php echo $totalgst_28 ; ?> </td>
                                         <td></td>
                                         
                                         <?php }else{ ?>
                                         
                                          <td style="background-color:yellow;" >CGST :<?php echo round($totalgst_28/2,2) ; ?> </td>
                                         <td style="background-color:yellow;" >SGST :<?php echo round($totalgst_28/2 ,2); ?> </td>
                                         <?php } ?>
                                         
                                         <td></td>
                                         <td></td>
                                        <td>   <?= $gst_28 =  $totalgst_28  ;?></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                    
                                    <?php } ?>
                                       <tr>
                                         <td></td>
                                         <td>Total Invoice  Value</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td  id="total_invoice" style="background-color:yellow;"><?= $invoice = $net_amount +  $gst_5 + $gst_12 +  $gst_18+ $gst_28 ;?></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                    <tr>
                                         <td></td>
                                         <td>Advance</td>
                                         <td></td>
                                         <td>Payment Mode :  <?php echo   $payment_mode= $result[0]['payment_mode']; ?></td>
                                      
                                         <td><?php if($payment_mode == 'Online' ) {
                                         echo $result[0]['online_transaction_id']; 
                                        }else{
                                        
                                       if($result[0]['utr_number']){
                                           
                                           echo $result[0]['utr_number'] ; 
                                       }
                                    }
                                        ?>
                                         </td>
                                            <td></td>
                                            <?php if($result[0]['confirm_payment'] =='done'){ ?>
                                         <td style="color:green"> Verified</td>
                                         <?php }else{ ?>
                                            <td style="color:red"> Not Verified</td>
                                           <?php } ?>
                                         
                                        <td><span id="advance"><?= $advance = $order->advance_payment  ;?> </span></td>
                                        
                                            <?php  if($result[0]['offline_file']){?>
                                             <td></td>
                                             <td>
                                            <a href="#myModal" data-toggle="modal" style="margin-right: 8px;"><button style="margin-right: 0px;" class="btn btn-primary">View</button>  </a>
                                            
                                             <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $value['offline_file'] ; ?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  <div class="row">
                                   <a href="<?php echo $value['offline_file'] ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 310px;"> Download File </a>
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                  </div>
                                   
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                            
                                            
                                            </td>
                                        <!--<td>  -->
                                        <!--<a href="<?php echo $value['offline_file'] ; ?>" width="100%" download>Download</a>-->
                                        <!--</td>-->
                                           
                                    <?php } else{ ?>
                                             
                                        <td> </td>
                                         <td> 
                                         </td>
                                         <?php }?>
                                      </tr>
                                      
                                         <tr>
                                         <td></td>
                                         <td>Used Credit</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                        <td></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      
                                      
                                       <tr>
                                         <td></td>
                                         <td>Balance 2nd Payment Received</td>
                                         <td></td>
                                         <td>Payment Mode :  <?php 
                                         
                                           $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2 ))->row();
                                     
                                         echo   $payment_mode= $pend_row->pend_payment_type; ?></td>
                                      
                                         <td><?php if($payment_mode == 'Online' ) {
                                         echo $result[0]['online_transaction_id']; 
                                        }else{
                                        
                                       if($pend_row->pend_utr_number){
                                           
                                           echo $pend_row->pend_utr_number ; 
                                       }
                                    }
                                        ?>
                                         </td>
                                            <td></td>
                                            <?php if($pend_row->confirm_payment == 'done' ){ ?>
                                         <td style="color:green"> Verified</td>
                                         <?php }else{ ?>
                                            <td style="color:red"> Not Verified</td>
                                           <?php } ?>
                                         
                                        <td><span id="advance"><?= $pend_amount = $pend_row->pend_amount  ;?> </span></td>
                                        
                                            <?php  if($pend_row->pend_offline_file){?>
                                            <td></td>
                                            <td> 
                                            <a href="#myModal2" data-toggle="modal" style="margin-right: 0px;"><button style="margin-right: 0px;" class="btn btn-primary">View</button>  </a>
                                            </td>
                                            
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_row->pend_offline_file ; ?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  
                                  <div class="row">
                                     <a href="<?php echo $pend_row->pend_offline_file ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 24px;"> Download File </a>
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> 
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                        <!--<td>  -->
                                        <!--<a href="<?php echo $pend_row->pend_offline_file ; ?>" width="100%" download>Download</a>-->
                                        <!--</td>-->
                                           
                                    <?php } else{ ?>
                                             
                                        <td> </td>
                                         <td> 
                                         </td>
                                         <?php }?>
                                      </tr>
                                      
                                      <tr>
                                         <td></td>
                                         <td>Balance 3rd Payment Received</td>
                                         <td></td>
                                         <td>Payment Mode :  <?php 
                                         
                                           $pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();
                                     
                                         echo   $payment_mode= $pend_3_row->pend_payment_type; ?></td>
                                      
                                         <td><?php if($payment_mode == 'Online' ) {
                                         echo $result[0]['online_transaction_id']; 
                                        }else{
                                        
                                       if($pend_3_row->pend_utr_number){
                                           
                                           echo $pend_3_row->pend_utr_number ; 
                                       }
                                    }
                                        ?>
                                         </td>
                                            <td></td>
                                            <?php if($pend_3_row->confirm_payment == 'done' ){ ?>
                                         <td style="color:green"> Verified</td>
                                         <?php }else{ ?>
                                            <td style="color:red"> Not Verified</td>
                                           <?php } ?>
                                         
                                        <td><span id="advance"><?= $pend_3_amount = $pend_3_row->pend_amount  ;?> </span></td>
                                        
                                            <?php  if($pend_3_row->pend_offline_file){?>
                                            <td></td>
                                            <td> 
                                            <a href="#myModal2" data-toggle="modal" style="margin-right: 0px;"><button style="margin-right: 0px;" class="btn btn-primary">View</button>  </a>
                                            </td>
                                            
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_3_row->pend_offline_file ; ?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  
                                  <div class="row">
                                     <a href="<?php echo $pend_3_row->pend_offline_file ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 24px;"> Download File </a>
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div> 
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                        <!--<td>  -->
                                        <!--<a href="<?php echo $pend_3_row->pend_offline_file ; ?>" width="100%" download>Download</a>-->
                                        <!--</td>-->
                                           
                                    <?php } else{ ?>
                                             
                                        <td> </td>
                                         <td> 
                                         </td>
                                         <?php }?>
                                      </tr>
                                      
                                      
                                      
                                       <tr>
                                         <td></td>
                                         <td>Balance Amount</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><span id="final_amt"><?php  $final = $invoice - $advance -$pend_amount -$pend_3_amount ;
                                                            
                                                                echo round($final ,2 );
                                         
                                         ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td><b>User Feedback</b></td>
                                          <td colspan="8"><?= $result[0]['feedback']; ?></td>
                                      </tr> 
                                      <?php if( $result[0]['cancle_reason'] ){?>
                                         <tr>
                                          <td></td>
                                          <td><b>Cancle reason</b></td>
                                          <td colspan="8"><?= $result[0]['cancle_reason']; ?></td>
                                      </tr> 
                                       <?php } ?>
                                 </tbody>
                            </table>
                            <div class="row">
                                <?php if( $result[0]['invoice_id']){?>
                                <a href="#shipped" class="btn btn-primary pull-right" data-toggle="modal" style="margin-bottom: -60px; margin-top: 95px; margin-left:5px; margin-right:5px;">Modify Shipped Details</a>
                               
                               
                                          <div class="modal fade" id="shipped" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                            Modify Shipped Details
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                  <form  action="<?= base_url('Admin/modifyshipped_done')?>" method="post" enctype="multipart/form-data">
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?=  $result[0]['order_rand_id'];?>">
                                                 <div class="col-md-6">
                                                <label> Enter Invoice Number : </label>
                                                <input type="text" class="form-control" required name="invoice_no" value="<?=  $result[0]['invoice_id'];?>">
                                            </div>
                                             <div class="col-md-3">
                                                <label> Invoice Upload : </label>
                                                <input type="File"  id="file1"  class="form-control file1" name="invoice_file"  accept=".pdf,.jpg">
                                            </div>
                                             <div class="col-md-3">
                                               <img src="<?=  $result[0]['invoice_file'];?>" width='80px' height="50px" >
                                            </div>
                                             <div class="col-md-6">
                                                <label>Packed By : </label>
                                                <input type="text" class="form-control" required name="packed_by" value="<?=  $result[0]['packed_by'];?>">
                                            </div>
                                             <div class="col-md-6">
                                                <label> Checked By : </label>
                                                <input type="text" class="form-control" required name="checked_by" value="<?=  $result[0]['checked_by'];?>">
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <label> Select Date : </label>
                                                <input type="Date" class="form-control" required name="date" value="<?=  $result[0]['invoice_date'];?>">
                                            </div>
                                            
                                      </div>
                                    
                                      
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Modify</button>
                                            
                                        </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            
                               
                               
                                <?php }if( $result[0]['parter_name']){ ?><a href="#transport" class="btn btn-primary pull-right" data-toggle="modal" style="margin-bottom: -60px; margin-top: 95px; margin-left:5px; margin-right:5px;">Modify Transport Details </a>
                         
                        
                                    <!--model Transport-->
                                    
                    <div class="modal fade" id="transport" role="dialog" style="display: none;">
                        <div class="modal-dialog modal-lg">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              <h4 class="modal-title">Modify Transport Details</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                   <div class="col-md-12" id="tt">
                                        
                                         <form  action="<?= base_url('Admin/modifyclickshipped')?>" method="post" enctype="multipart/form-data">
                                             
                                                <input type="hidden" class="form-control" name="req_id"  value="<?=  $result[0]['order_rand_id'];?>">
                                                
                                                   <input type="hidden" class="form-control" name="user_id"  value="<?php echo $value['user_id']; ?>">
                                                   
                                                      <input type="hidden" class="form-control" name="finalamount"  value="<?php echo $value['finalamount']; ?>">
                                                      
                                                   <input type="hidden" class="form-control" name="mode"  value="<?php echo $value['delievry_type'] ; ?>">
                              
                                      
                                     
                                      <div class="row">
                                          
                                           <div class="col-md-4">
                                                <label>Transport Delivery Point  :</label>
                                                <input type="text" required class="form-control" name="Delivery_Point" value="<?=  $result[0]['transport_Delivery_Point'];?>">
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>Transporter Name  :</label>
                                                <input type="text" class="form-control" name="parter_name" value="<?=  $result[0]['parter_name'];?>" required>
                                                <input type="hidden"  class="form-control" name="req_id"  value="<?=  $result[0]['order_rand_id'];?>">
                                                
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label>Transport Bilty No</label>
                                                <input type="text" required class="form-control" name="track_id" value="<?=  $result[0]['Bilty_no'];?>">
                                            </div>
                                            
                                            <div class="col-md-6" style="margin-top: 15px;">
                                                <label> Transporter Contact No. : </label>
                                                <input type="text" required class="form-control" name="parter_contact" value="<?=  $result[0]['parter_contact'];?>"  minlength="10" maxlength="10">
                                            </div>
                                            
                                            
                                            
                                             <div class="col-md-6" style="margin-top: 15px;">
                                                <label> Select Date : </label>
                                                <input type="Date" required class="form-control" name="date" value="<?=  $result[0]['shipment_date'];?>">
                                            </div>
                                            
                                             <div class="col-md-5" style="margin-top: 15px;">
                                                <label> Document : </label>
                                                <input type="File"  class="form-control upload_file" name="upload_file" accept=".pdf,.jpg">
                                            </div>
                                            <br>
                                             <div class="col-md-2">
                                               <img src="<?=  $result[0]['trasnport_document'];?>" width='80px' height="50px" style="margin-top: 30px;">
                                            </div>
                                      </div>
                                       
                                      <div class="row">
                                          
                                     <button type="submit" class="btn btn-success  pull-right">Modify</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                 </div>
                                 </div>
                                 </div>
                                 </div>
                                 
                            
                            
                             
                         
                           <?php } ?>
                            </div>
                            
                            
                            
                 
                            
                
                            
                            
                            <!--<div id="editor" style="margin-top: 400px;"></div>-->
                            <div class="row">
                               <input type="button" class="btn btn-danger" value="Download PDF" onclick="printDiv('content2')" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
<?php
include 'footer.php';
?>

<script type="text/javascript">
    if( $('.clienttable').length > 0 ) {
        $('.clienttable').DataTable( {           
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
                {
                    extend: 'csvHtml5',
                    exportOptions: { stripHtml: false }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: { stripHtml: false },
                    title: 'List',
                }
            ],  
        });
    }
    
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <script type="text/javascript">

    function protype(id){

        var urls=$("#url1").val();
        var p_name=$("#p_name").val();
        var p_code=$("#p_code").val();
        var quan=$("#quan").val();
        var p_amount=$("#p_amount").val();
          var price=$("#price").val();
        var order_no=$("#order_no").val();
        var order_id=$("#order_id").val();

        var username=$("#username").val();
         var email=$("#email").val();
         var sum=$("#sum").val();
          var userid=$("#userid").val();

        var type = $("#"+id+"_protype").val();

        $.ajax({

         type: "POST",

            url: urls+"Admin/updateorderstatus",

            data: {orderid:id,status:type,p_name:p_name,p_code:p_code,quan:quan,p_amount:p_amount,price:price,order_no:order_no,order_id:order_id,username:username,email:email,sum:sum,userid:userid},

            cache: false,

            success: function(result){
                //alert(result);exit();

             

              

                }

            });



    }
    function downloadzip(id){
        var urls=$("#url1").val();
        var note=$("#notepad_"+id).html();
        var img=$("#noteimage_"+id).val();  
           $.ajax({

         type: "POST",

            url: urls+"Admin/zipp",

            data: {id:id,note:note,img:img},

            cache: false,

            success: function(result){
                location.reload();
             //   alert(result);exit();

             

              

                }

            });

    }

</script>


<!--Save as PDF JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


<!--print PDF Page-->
<script>
    function printDiv(content2) {
     var printContents = document.getElementById(content2).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


<!--Save as PDF JS-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>-->


<!--<script>-->
<!--    $('#downloadPDF').click(function () {-->
<!--    domtoimage.toPng(document.getElementById('content2'))-->
<!--        .then(function (blob) {-->
<!--            var pdf = new jsPDF('1', 'pt', [$('#content2').width(), $('#content2').height()]);-->

<!--            pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());-->
<!--            pdf.save("Order_Details.pdf");-->

<!--            that.options.api.optionsChanged();-->
<!--        });-->
<!--});-->
    
<!--</script>-->







