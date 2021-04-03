 <?php

 //pr($messag);die;

include('header.php');

include('sidebar.php');

?>

<style>

    #DataTables_Table_1_length {

    margin-bottom: -50px;

    margin-top: 10px;

}

</style>



<aside class="right-side">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Customer</h1>

                <ol class="breadcrumb">

                   <li>

                        <a href="<?php echo base_url('Admin/Dashboard');?>">

                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="#">Order</a>

                    </li>

                    <li class="active">Order Details</li>

                </ol>

            </section>

            <!-- Main content -->

            <section class="content paddingleft_right15">

                <div class="row" id="content2">

                    <div class="panel panel-primary ">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order Details

                            </h4>

                        </div>

                        <br />

                        <div class="panel-body">

                            <div class="row" style="padding: 0px;">

                                <div class="col-md-3">

                                    <p><b>Order No :</b><?php echo($result[0]['order_rand_id'])?> </p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>Order Date :</b> <?=  $result[0]['show_date'];?> </p>

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

                            </div>

                            <div class="row" style="padding: 0px;">

                                <div class="col-md-3">

                                    <p><b>Email ID :</b> <?=  $result[0]['email'];?> </p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>Mobile No :</b> <?=  $result[0]['customer_mob'];?> </p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>Landline No :</b> <?=  $result[0]['landline'];?></p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>Address :</b> <?=  $result[0]['cutomer_address'];?> </p>

                                </div>

                            </div>

                            <div class="row" style="padding: 0px;">

                                 <div class="col-md-3">

                                    <p><b>PinCode :</b>  <?= $pin =  $result[0]['pincode'];?></p>

                                </div>

                                 <?php  $pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ; ?>

                                <div class="col-md-3">

                                    <p><b>City :</b>  <?=  $pincode->area  ;?></p>

                                </div>

                                 <div class="col-md-3">

                                    <p><b>State :</b>  <?= $state =  $pincode->state ;?></p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>Delivery Mode :</b>  <?=  $result[0]['delievry_type'];?></p>

                                </div>

                            </div>

                            <div class="row" style="padding: 0px;">

                                

                                <div class="col-md-3">

                                    <p><b>GST No:</b> <?= $customeradd->customer_gst ;?></p>

                                </div>

                                <div class="col-md-3">

                                    <p><b>PAN No. :</b>  <?=  $customeradd->customer_pan ;?></p>

                                </div>

                                

                                <div class="col-md-3">

                                    <p><b>Aadhar No:</b> <?= $customeradd->customer_adhaar ;?></p>

                                </div>

                        

                                

                                 <div class="col-md-3">

                                    <p><b>Business Type & Ownership Type :</b>  <?=  $result[0]['btype'];?> & <?=  $result[0]['ownertype'];?> </p>

                                </div>

                            </div>

                            

                                <!--<a href="<?= base_url('Admin/export_xls'); ?>" style="border:solid 2px #ddd;padding:5px;background-color:#eee;text-decoration:none;color:red;">Export In Excel</a>-->
              <form action="<?php echo base_url('Excel/export_xls'); ?>" method="post">
                                        <input type="hidden" id ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                          <input type="hidden" id ="ord_id" value="<?= $result[0]['order_id'] ?>">
                                      
                                          <input type="hidden" name="finalvolume" id="finalvolume" value="<?php echo $finalvolume; ?>"> 
                                          
                                             <input type="hidden" name="before_sub_total" id="finalprice" value="<?php  echo $befor_dis_sub_total ; ?>">  
                                          
                                          <input type="hidden" name="finalprice" id="finalprice" value="<?php  echo $_SESSION['totalprice'] ; ?>">  
                                          
                                         <input type="hidden" name="shipping" id="shipping" value="<?php echo $shipping ; ?>">  
                                         
                                            <input type="hidden" name="total_discount"  value="<?php echo $total_discount; ?>">  
                                                  
                                          <input type="hidden" name="sub_total" id="totalprice" value="<?php echo $sub_total; ?>"> 
                                          <input type="hidden" name="delievry_type" id="delievry_type" value="<?=  $orders->delievry_type ;?>"> 
                                          
                                               <input type="hidden" name ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                      
                                     <button type="submit" class="btn btn-success"  width="100%" style="margin-left:40px;">Export In Excel</button>
                                    </form>
             

                            <div style="overflow-x:auto;">

                              <table class="table table-responsive table-striped table-bordered clienttable1">

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

                                         <td><img src="<?php echo base_url('assets/product/'.$img)   ?>" class="img50" width="70px" height="70px" ></td>

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

                            <!--</tbody>-->

                            

                            <!--<tbody>-->

                                        <tr>

                                            <td><span style="display:none">1000</span> </td>

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

                                             <td><span style="display:none">1001</span> </td>

                                             <td>Carton Packing</td>

                                             <td></td>

                                             <td style="text-align : right; "> No. of Carton :</td>

                                             <td><span style="display:none"><?php $paking = $result[0]['packing_charge'];   echo $carton = $paking/350 ; ?></span> <input type="number" style="width: 100%;" class="form-control" name="Carton" id="Carton_no" min='1' value="<?php $paking = $result[0]['packing_charge'];   echo $carton = $paking/350 ; ?>" >  </td>

                                             <td><button type="submit" class="form-control btn btn-primary"  onclick="carton_change()">Update Carton</button></td> </td>

                                             <td></td>

                                             <td><?php echo $paking = $result[0]['packing_charge']; ?></td>

                                             <td>12%</td>

                                             <td><?= $paking_gst = round($paking*(12/100),2); ?></td>

                                        </tr>

                                        <tr>

                                             <?php $delievry = $result[0]['delievry_type']  ;

                                             

                                             if($delievry == 'Transport'){

                                             

                                             ?>

                                             <td><span style="display:none">1002</span> </td>

                                             <td>Freight Charge </td>

                                             <td></td>

                                             <?php }else{ ?>

                                              <td><span style="display:none">1002</span> </td>

                                              <td>Freight Charge </td>

                                              <td></td>

                                              <?php } ?>

                                             <td></td>

                                             <td><input type="text" style="width: 100%;" class="form-control" name="Freight" id="Freightid"  placeholder = "Freight Charge"> </td>

                                             <td></td>

                                             <td></td>

                                             <td><?= $shipping ?></td>

                                             <td>18%</td>

                                             <td><?= $shipping_gst = round($shipping*(18/100),2); ?></td>

                                        </tr>

                                        <tr>

                                         <td><span style="display:none">1003</span> </td>

                                         <td>  Order Processing </td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                        <?php  if($sub_total < 12000){   $order_processing = 500 ;  $orderprocess_gst = 90 ; 
                                    
                                    echo " <td>500</td><td>18%</td>
                                    <td>90</td>" ;
                                    
                                    }else{  $order_processing= 0 ; $orderprocess_gst = 0 ; 
                                    
                                       echo " <td>0</td><td></td>
                                    <td></td>" ;
                                    
                                    }  ?>
                                        

                                      </tr>

                                      <tr>

                                         <td><span style="display:none">1004</span> </td>

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
<?php

   	$user_id =  $result[0]['user_id']   ; 
		
		    $user_detail   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
 		$discount_per = $user_detail->discount_per ; 
	
?>
                                         <td><span style="display:none">1005</span> </td>

                                         <td>Discount</td>

                                         <td> Discount % -></td>

                                         <td><input type="text" style="width: 100%;" class="form-control" name="discount"  id="discount_percent" onkeyup="dis_percent()" placeholder="Discount in %"></td>

                                         <td>Discount Amount -></td>

                                         <td><input type="text" style="width: 100%;" class="form-control" name="discountprice" id="flat_discount" onkeyup="flat_dis()"  placeholder="Flat Discount"></td>

                                         <td></td>

                                         <td><span id="total_discount"> <?php echo $admin_discount =  $result[0]['discountcharge'] ;?></span></td>

                                         

                                         <td>

                                             <input type="hidden" id="req_id" value="<?php print_r($result[0]['order_rand_id'])?> ">

                                             <button type="submit" class="form-control btn btn-primary"  onclick="dis_apply()">Apply</button></td>
                                        <td></td>
                                      </tr>

                                      <tr>

                                         <td><span style="display:none">1006</span> </td>

                                         <td>Net Amount ( Before Tax ) </td>

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

                                         <td><span style="display:none">1007</span> </td>

                                         <td>GST @5%</td>

                                         <td></td>

                                         <?php  

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

                                         <td><span style="display:none">1008</span> </td>

                                         <td>GST @12%</td>

                                         <td></td>

                                         <?php 

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

                                         <td><span style="display:none">1009</span> </td>

                                         <td>GST @18%</td>

                                         <td></td>

                                         <?php  

                                           $gst_18 =  $totalgst_18 + $shipping_gst + $orderprocess_gst ;

                                         

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

                                         <td><?= $gst_18 =  $totalgst_18 + $shipping_gst + + $orderprocess_gst;?></td>

                                         <td></td>

                                         <td></td>

                                      </tr>

                                      <?php if(!empty($totalgst_28)){ ?>   

                                        <tr>

                                         <td><span style="display:none">1010</span> </td>

                                         <td>GST @28%</td>

                                         <td></td>

                                         <?php  

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

                                         <td><?= $gst_28 =  $totalgst_28  ;?></td>

                                         <td></td>

                                         <td></td>

                                      </tr>

                                    <?php } ?>

                                    

                                    <tr>

                                         <td><span style="display:none">1011</span> </td>

                                         <td>Total Invoice  Value</td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td id="total_invoice" style="background-color:yellow;"><?= $invoice = $net_amount +  $gst_5 + $gst_12 +  $gst_18+ $gst_28 ;?></td>

                                         <td></td>

                                         <td></td>

                                         

                                         <?php

                                         $request_id =  $result[0]['order_rand_id'] ;

                                         $orderss = array(

                                         'finalamount' => $invoice ,

                                            //   'gst_5' => $gst_5 ,

                                            //   'gst_12' => $gst_12 ,

                                            //   'gst_18' => $gst_18 + $gst_28,

                                              

                                  

                                                  );

                                                  if($gst_5){

                                                $orderss['gst_5'] =   $gst_5;        

                                                  }

                                              if($gst_12){

                                                  $orderss['gst_12'] =   $gst_12;       

                                                  }

                                                if($gst_18){

                                                  $orderss['gst_18'] =   $gst_18 + $gst_28; 

                                                  

                                                  }

                                            //=========update discount======

                                           $this->db->where('order_id', $request_id);

                                           $this->db->update('orders', $orderss);

                                          ?>

                                      </tr>

                                      <tr>

                                         <td><span style="display:none">1012</span></td>

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

                                          <?php if($result[0]['confirm_payment'] =='done'){ ?>

                                          <td style="color:green"> Verified</td>

                                          <td></td>

                                          <?php }else{ ?>

                                          <td style="color:red"> Not Verified</td>

                                          <td></td>

                                          <?php } ?>

                                          <td><span id="advance"><?= $advance = $order->advance_payment  ;?> </span></td>

                                          <?php  if($result[0]['offline_file']){?>

                                          <td></td>

                                          <td>

                                          <a href="#myModal" data-toggle="modal" style="margin-right: 0px;"><button style="margin-right: 0px;" class="btn btn-primary">View</button>  </a>

                                            

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

                                         <td><span style="display:none">1013</span> </td>

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

                                         <td><span style="display:none">1014</span> </td>

                                         <td>Balance 2nd Payment Received</td>

                                         <td></td>

                                         <td>Payment Mode :  <?php 

                                         

                                           $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2 ))->row();

                                     

                                         echo   $payment_mode= $pend_row->pend_payment_type; ?></td>

                                      

                                         <td><?php if($payment_mode == 'Online' ) {

                                         echo $pend_row->pend_transition_id; 

                                        }else{

                                        

                                       if($pend_row->pend_utr_number){

                                           

                                           echo $pend_row->pend_utr_number ; 

                                       }

                                    }

                                        ?>

                                         </td>

                                            <?php if($pend_row->confirm_payment == 'done' ){ ?>

                                          <td style="color:green"> Verified</td>

                                           <td></td>

                                         <?php }else{ ?>

                                            <td style="color:red"> Not Verified</td>

                                           <td></td>

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

                                         <td></td>

                                         <?php }?>

                                      </tr>

                                      

                                      <tr>

                                         <td><span style="display:none">1015</span> </td>

                                         <td>Balance 3rd Payment Received</td>

                                         <td></td>

                                         <td>Payment Mode :  <?php 

                                         

                                           $pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();

                                     

                                         echo   $payment_mode= $pend_3_row->pend_payment_type; ?></td>

                                      

                                         <td><?php if($payment_mode == 'Online' ) {

                                         echo $pend_3_row->pend_transition_id; 

                                         } else{

                                           if($pend_3_row->pend_utr_number){

                                           echo $pend_3_row->pend_utr_number ; 

                                          }

                                         }

                                        ?>

                                         </td>

                                          <?php if($pend_3_row->confirm_payment == 'done' ){ ?>

                                         <td style="color:green"> Verified</td>

                                         <?php }else{ ?>

                                            <td style="color:red"> Not Verified</td>

                                           <?php } ?>

                                           <td></td>

                                           <td><span id="advance"><?= $pend_3_amount = $pend_3_row->pend_amount  ;?> </span></td>

                                        

                                            <?php  if($pend_3_row->pend_offline_file){?>

                                            <td></td>

                                            <td></td>

                            

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

                                       <td><span style="display:none">1016</span> </td>

                                         <td>Balance Amount</td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td></td>

                                         <td><span id="final_amt">

                                                <?php  $final = $invoice - $advance -$pend_amount -$pend_3_amount ;

                                                    echo round($final ,2 );
                                                        $due_amount = $invoice - $advance -$pend_amount -$pend_3_amount ;
                                                ?>   <input type="hidden" id="due_amt" value="<?php  echo $final ; ?>">  
</span>

                                         </td>

                                         <td></td>

                                         <td></td>

                                      </tr>

                                 </tbody>

                            </table>

                            </div>

                            <?php  // if(  $result[0]['confirm_payment'] =='done' && $pend_row->confirm_payment == 'done') {

                            

                            if(  $result[0]['confirm_payment'] =='done' ) {

                            

                            

                            ?>

                            <div class="row">

                                 <div class="col-md-offset-7 col-md-1">

                            

                                     <button type="submit" class="btn btn-success" onclick="save_order()" >Save Order </button>

                                   

                            </div>

                                <div class="col-md-1">

                                    

                                      <form action="<?php echo base_url('Admin/placeorder'); ?>" method="post">

                                          

                                          <input type="hidden" name="finalprice" id="finalprice" value="<?php  echo $invoice ; ?>">  

                                            <input type="hidden" name="due_amount"  value="<?php  echo round($due_amount ,2); ?>">  

                                           <input type="hidden" name="carton"  value="<?php  echo $carton ; ?>">  

                                          

                                          <input type="hidden" name="total_discount" class="total_discount_final" value="<?php  echo  $admin_discount ; ?>">  

                                          

                                        <input type="hidden" name="total_gst"  value="<?php  echo $totalgst = $gst_12 + $gst_18 ; ?>">  

                                         <input type="hidden" name="gst_5"  value="<?php  echo $gst_5 ; ?>">  

                                         <input type="hidden" name="gst_12"  value="<?php  echo $gst_12  ; ?>">  

                                         <input type="hidden" name="gst_18"  value="<?php  echo $gst_18 ; ?>">  

                                         <input type="hidden" name="gst_28"  value="<?php  echo  $gst_18 ; ?>">  

                                          

                                                  

                                          <input type="hidden" name="sub_total" id="totalprice" value="<?php echo $total_price; ?>"> 

                                          

                                               <input type="hidden" name ="request_id" id="request_id" value="<?= $result[0]['order_rand_id'] ?>">

                                      

                                     <button type="submit" class="btn btn-success"> Save & Placeorder </button>

                                    </form>

                                    <!--<input type="submit" class="btn btn-success" value="Placeorder">-->

                                </div>

                            </div>

                            <?php }else{ ?>

                            <div class="row">

                            <div class="col-md-offset-9 col-md-1">

                            

                                     <button type="submit" class="btn btn-success" onclick="save_order()" >Save Order </button>

                                   

                            </div></div>

                            <?php } ?>

                            

                            

                        

                     <input type="button" class="btn btn-danger" value="Download PDF" onclick="printDiv('content2')" style="margin-top: -40px;" />

                     </div>

                    </div>

                </div>

                <!-- row-->

            </section>

        </aside>

<?php

include 'footer.php';

?>







<!--<script type="text/javascript">-->

<!--    if( $('.clienttable').length > 0 ) {-->

<!--        $('.clienttable').DataTable( {           -->

<!--            pageLength: 10,-->

<!--            responsive: true,-->

<!--            dom: '<"html5buttons"B>lTfgitp',-->

<!--            buttons: [-->

                

<!--                {-->

<!--                    extend: 'csvHtml5',-->

<!--                    exportOptions: { stripHtml: false }-->

<!--                },-->

                

<!--            ],  -->

<!--        });-->

<!--    }-->

    

<!--</script>-->





<input type="hidden" id="url" value="<?=base_url();?>">



<script>

    function dis_percent(){

        

        

    var g_total =    $('#g_total').html();

    

    var discount_percent = $('#discount_percent').val();

    

    var discount = (g_total*(discount_percent/100)).toFixed(2) ;

        

      $('#total_discount').html(discount);

      

    //   var total_amt =  $('#g_total').html();

      

    //   var net_total = (total_amt - discount).toFixed(2) ;

      

    //   $('#net_total').html(net_total);

       

       

    //   var total_gst =  $('#total_gst').html();

       

    //   var total_invoice = Number(net_total)+Number(total_gst); 

       

       

    //     $('#total_invoice').html((total_invoice).toFixed(2));

        

        

    //     var advance = $('#advance').html() ;

        

    //     var final = ( total_invoice - advance ).toFixed(2) ;

        

    //     $('#final_amt').html(final);

       

        

    }

    

    

     function flat_dis(){

        

    var g_total =    $('#g_total').html();

    var discount = $('#flat_discount').val();

    



     $('#total_discount').html(discount);

     

        // var total_amt =  $('#g_total').html();

        // var net_total = (total_amt - discount).toFixed(2) ;

        // $('#net_total').html(net_total);

       

        // var total_gst =  $('#total_gst').html();

        // var total_invoice = Number(net_total)+Number(total_gst); 

        // $('#total_invoice').html((total_invoice).toFixed(2));

       

        // var advance = $('#advance').html() ;

        // var final = ( total_invoice - advance ).toFixed(2) ;

        // $('#final_amt').html(final);

       

    //============++Ratio========

    

   

        

    }

    

    

    function dis_apply(){

        

     var urls=$("#url").val();

        

      var total_discount = $('#total_discount').html(); 

      

        if(total_discount == ''){



alert('Please Insert Discount') ; 



exit;



}

     

      var req_id = $('#req_id').val();

      

      

       $.ajax({

            type: "POST",

            url: urls+"Admin/apply_discount",

            

            

            data: {total_discount:total_discount,req_id:req_id},

            cache: false,

            success: function(result){

                

                //  alert(result) ;

          location.reload();

              

                }

            });

        

        

    }

      

      

      

        function carton_change(){

        

     var urls=$("#url").val();

        

      var carton  = $('#Carton_no').val(); 

      

        if(carton == ''){



        alert('Please Insert Carton') ; 

        exit;

        }

             

      var req_id = $('#req_id').val();

      

       $.ajax({

            type: "POST",

            url: urls+"Admin/carton_update",

            

            

            data: {carton:carton,req_id:req_id},

            cache: false,

            success: function(result){

                

                //  alert(result) ;

          location.reload();

              

                }

            });

        

        

    }

    

    function save_order(){

        

     var urls=$("#url").val();

        

      var finalprice  = $('#finalprice').val(); 

      var total_discount  = $('.total_discount_final').val(); 

      var total_gst  = $('#total_gst').val(); 

      var sub_total  = $('#totalprice').val(); 
  var remain_amt   = $('#due_amt').val(); 

// alert(remain_amt) ; 

    //   var request_id  = $('#request_id').val(); 

      

    //   alert(urls) ;

    //  alert(finalprice) ;

    //   alert(total_discount) ;

    //   alert(total_gst) ;

    //   alert(sub_total) ;

    

      var request_id = $('#req_id').val();

      

       $.ajax({

            type: "POST",

            url: urls+"Admin/save_orderconfirm",

            

            

            data: {finalprice:finalprice,total_discount:total_discount,total_gst:total_gst,sub_total:sub_total,request_id:request_id,remain_amt:remain_amt},

            cache: false,

            success: function(result){

            //   alert(result) ;

            location.reload();

              

                }

            });

        

        

    }

    

    

    $('#Freightid').keyup(function (e){

        

    

    var freight = $('#Freightid').val() ;

     var req_id = $('#req_id').val();

     var urls=$("#url").val();

    

    if(freight != ''){

      

    if(e.keyCode == 13 || e.keyCode == 10){

        

         $.ajax({

            type: "POST",

            url: urls+"Admin/Freight_change",

            data: {freight:freight,req_id:req_id},

            cache: false,

            success: function(result){

                

          location.reload();

              

                }

            });

         

    }

    

    }

})



</script>



<script type="text/javascript">

    if( $('.clienttable1').length > 0 ) {

        $('.clienttable1').DataTable( {           

            "bPaginate": false,

            responsive: true,

            dom: '<"html5buttons"B>lTfgitp',

            buttons: [

                

                {

                    extend: 'csvHtml5',

                    exportOptions: { }

                },

                

            ],  

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



