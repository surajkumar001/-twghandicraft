<?php 
include 'headcss.php';
include 'header.php';
?>

<?php include 'navbar.php'; ?>
<div class="xs-breadcumb">

    <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Order Details</li>

            </ol>

        </nav>

    </div>

</div>



<!-- /.breadcrumb -->

<section class="home-bg-color">
    <div class="container">
        <div class="row" style="padding: 3% 0% 0% 0%;">
            <div class="col-md-12">
                <div class="clearfix">
                    <div class="heading-title">
                        <h3>Order Details</h3>
                    </div>
                    <div class="box-1 box-color">
                      <div class="box-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Order No :</b><?php print_r($result[0]['order_rand_id'])?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Owner Name :</b>  <?=  $result[0]['customer_name'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Business Name :</b>  <?=  $result[0]['Business'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Order Date :</b> <?=  $result[0]['show_date'];?> </p>
                                </div>
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
                                    <p><b>PinCode :</b>  <?= $pin =  $result[0]['pincode'];?></p>
                                </div>
                                <div class="col-md-12">
                                    <p><b>Address :</b> <?=  $result[0]['cutomer_address'];?> </p>
                                </div>
                                <?php  $pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ; ?>
                                <div class="col-md-3">
                                    <p><b>City :</b>  <?=  $pincode->area  ;?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>State :</b>  <?= $state =  $pincode->state ;?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Ownership Type :</b>  <?=  $result[0]['ownertype'];?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Business Type :</b>  <?=  $result[0]['btype'];?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Delivery Mode :</b>  <?=  $result[0]['delievry_type'];?></p>
                                </div> 
                                    <?php if($result[0]['order_status'] == 'Readyshipped' ){ ?>
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
                                <?php } ?>
                            </div>
                            <div style="overflow-x: auto;">
                                <table class="table table-striped table-bordered">
                                    <input class="hide" type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"><input class="hide" type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"><table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Image</th>
                                            <th>Sku</th>
                                            <th>Demanded Qty</th>
                                            <th>Dispatched Qty</th>
                                            <th>W.P (before tax)</th>
                                            <th>Discounted W.P (before tax)</th>
                                            <th>Net price</th>
                                            <th>Amount</th>
                                            <th>GST %</th>
                                            <th>GST Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    foreach ($result as  $value) {
                                        $total_price_new+= $value['cart_price'] ;
                                        $befor_dis_sub_total+=  $value['price']*$value['quantity'];
                                        $price2 = $value['price_after_discount'] ;
                                        $total_price_new2+= $value['cart_price'];
                                        if($value['gst'] == '12'){
                                            $totalgst_12+=$gst_val;
                                                }elseif($value['gst']=='18'){
                                                    $totalgst_18+=$gst_val ;
                                                }elseif($value['gst']=='5'){
                                                    $totalgst_5+=$gst_val ;
                                                }elseif($value['gst']=='28'){
                                                    $totalgst_28+=$gst_val;
                                            }
                                        }

                                       ?>
                                    <?php  $order_id = $result[0]['order_rand_id'] ;
                                        $a = 1 ;
                                        $percent_amount = array();
                                        $discount = array() ;
                                        $per_item_dicount = array() ; 
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
                                            <td><img src="<?php echo base_url('assets/product/'.$img)   ?>" class="img50"  width="70px" height="70px"></td>
                                            <td><?= $value['product_id']; ?></td>
                                            <td><?php echo $value['customer_quantity']; ?> </td>
                                            <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->selling_price; ?>"> 
                                            <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->gst_per; ?>"> 
                                            <input type="hidden" id="user_id_<?php echo $value['product_id']; ?>" value="<?php echo $value['user_id']; ?>"> 
                                            <input type="hidden" id="box_volume_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->box_volume_weight ; ?>"> 
                                            <?php  
                                                $volume= $product_detail->box_volume_weight *$value['quantity'];
                                                $finalvolume+=$volume;
                                                $sub_gst =$value['productgst'];
                                                $total_gst+= $sub_gst ;
                                                //   $total_price+= $value['cart_price'] + $value['productgst'] ;
                                                $total_price+= $value['cart_price']  ;
                                                //   echo $total_price;
                                            ?>
                                                <td><?php echo $value['quantity']; ?> </td>
                                                <!--===1 price==-->
                                                <td><?= $price = $value['price']; ?></td>
                                            <?php  

                                             //==================== % ratio =====                                
                                            $item_price = $price*$value['quantity'] ;
                                        if($befor_dis_sub_total >= '40000'   && $befor_dis_sub_total < '100000'  ){
                                            $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                            $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                            $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                            } elseif($befor_dis_sub_total >= '100000' ){
                                            $total_discount  =   ($befor_dis_sub_total*5)/100 ; 
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                            $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                            $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                        }
                                        else{
                                            $per_item_dicount[$a] = 0 ; 
                                        } ?>
                                        <!--===2 Price ===-->
                                        <td><?php $price2 = $value['price_after_discount'] ;
                                            if($price2){
                                                echo $amount =  $price2 ;
                                            //==================== % ratio ==============                             
                                            $total_discount = $value['discountcharge'] ;
                                            $percent_amount2[$a] =round(($value['cart_price']/ $total_price_new2)*100,2); 
                                            $discount2[$a] =   $total_discount*($percent_amount2[$a]/100);
                                            $per_item_discount2[$a] =  $discount2[$a] /$value['quantity'] ;
                                                //=============================================
                                            }else{
                                                echo  $amount = round($price - round($per_item_dicount[$a], 2) ,2) ;
                                            } ?>

                                        </td>
                                        <td><?php  if($price2){
                                            echo  $amount = $value['price_after_discount'] -  $value['discount_price']; 
                                        }
                                        else{
                                            echo   $amount ;
                                        }
                                        $a++ ;
                                        $sub_price = $amount*$value['quantity'];
                                        $after_discount+= $sub_price ;
                                        ?></td>
                                        <?php  
                                        ?>
                                        <!--<td>175</td>-->
                                        <!--<td>12</td>-->
                                        <!--<td><?= $value['productgst'] ; ?></td>-->
                                        <td><?php  echo $sub_price ; ?></td>
                                            <!--<td><p class="btn btn-primary" onclick="onButtonClick()" style="width: 100%;">Add</p>-->
                                            <?php 
                                            $total_product = array() ;

                                                $pro_detail1 =  $this->db->get('product')->result() ;

                                                

                                                  $pro_detail2 =  $this->db->get('product_detail')->result() ;

                                                

                                                 $total_product[1] = $pro_detail1 ;

                                                 

                                                 $total_product[2] = $pro_detail2 ;

                                                 

                                               ?>

                                              <td> <?php 

                                                  echo $value['gst'];

                                                  

                                             

                                               ?>%</td>

                                              

                                             <td><?= $gst_val =  round($sub_price*$value['gst']/100 ,2 ) ; ?></td>

                                                 

                                                    <!--<td><p class="btn btn-primary" onclick="add('<?=$value['id'];?>');" style="width: 100%;">Update</p>-->

                                             <input class="hide"  type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"/>

                                          

                                    

                                        </td>



                                          </tr>

                                          

                                             <?php  

                                               $volume= $product_detail->box_volume_weight *$value['quantity'];

                                               

                                              $finalvolume+=$volume;

                                              

                                              

                                              

                                              if($value['gst'] == '12'){

                                                  

                                                  $totalgst_12+=$gst_val;

                                                  

                                              }elseif($value['gst']=='18'){

                                                  

                                                  

                                                   $totalgst_18+=$gst_val;

                                              }elseif($value['gst']=='5'){

                                                  

                                                  

                                                   $totalgst_5+=$gst_val;

                                              }elseif($value['gst']=='28'){

                                                  

                                                  

                                                   $totalgst_28+=$gst_val;

                                              }

                                              

                                                  

                                              $total_price+= $gst_val  ;

             

                                              

                                            //   echo $total_price;

                                             

                                             ?>

                                          

                                          <?php } ?>

                                          

                                           

                                     </tbody>

                                </table>
                            </div>

                            <div style="overflow-x: auto;">
                            <table class="table table-striped table-bordered" id="mytable">
                                <thead></thead>
                                <tbody>
                                <!-- <tr>-->
                                    <!--   <td></td>-->
                                    <!--   <td><b>Total (After tax)</b></td>-->
                                    <!--   <td></td>-->
                                    <!--   <td></td>-->
                                    <!--   <td></td>-->
                                    <!--   <td></td>-->
                                    <!--   <td></td>-->
                                    <!--   <td><b>9287.91</b></td>-->
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
                                    <td style="background-color:yellow;">
                                        <span id="g_total">
                                            <?php if($price2){  
                                                    echo  $sub_total = round($total_price_new2,2) ; }
                                                  else{ 
                                                        if($total_price_new >= '40000' && $total_price_new < '100000' ){
                                                            echo $sub_total =round($total_price_new ,2)-  $total_price_new*3/100 ;} 
                                                        elseif($total_price_new >= '100000' ){
                                                            echo $sub_total =round($total_price_new ,2)-  $total_price_new*5/100 ;}else{
                                                                    echo $sub_total =round($total_price_new ,2) ;
                                                                }
                                                    } ?>
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Carton Packing</td>
                                    <td></td>
                                    <td style="text-align : right; "> No. of Carton :</td>
                                    <td><?php $paking = $result[0]['packing_charge'];   echo $carton = $paking/350 ; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $paking = $result[0]['packing_charge']; ?></td>
                                    <td>12%</td>
                                    <td><?= $paking_gst = round($paking*(12/100),2); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Transport Dropping</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>  <?= $shipping =$result[0]['shipping_charge']; ?></td>
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
                                     <?php  if($sub_total < 12000){   $order_processing = 500 ;  $orderprocess_gst = 90 ; 
                                    
                                    echo " <td>500</td><td>18%</td>
                                    <td>90</td>" ;
                                    
                                    }else{  $order_processing= 0 ; $orderprocess_gst = 0 ; 
                                    
                                       echo " <td>0</td><td></td>
                                    <td></td>" ;
                                    
                                    }  ?>
                                   
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>Total W.P.(before tax)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="background-color:yellow;">
                                        <span id="g_total">
                                            <?php echo $sub_amount = round($sub_total + $order_processing +$paking + $shipping ,2) ?>
                                        </span>
                                    </td>
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
                                    <td> <span id="discout"><?= $admin_discount = $result[0]['discountcharge']?></span></td>
                                    <td></td>
                                    <td>
                                        <input type="hidden" id="req_id" value="<?= $admin_discount = $result[0]['discountcharge']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Net Amount</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="background-color:yellow;">
                                        <span id="net_total">
                                            <?= $net_amount =  $sub_amount  - $admin_discount ; ?>
                                        </span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php if(!empty($totalgst_5)){ ?>  
                                <tr>
                                    <td></td>
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
                                    <td></td>
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
                                    <td></td>
                                    <td>GST @18%</td>
                                    <td></td>
                                    <?php
                                        $gst_18 =  $totalgst_18 + $shipping_gst + $orderprocess_gst;
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
                                    <td><?= $gst_18 =  $totalgst_18 + $shipping_gst + $orderprocess_gst ;?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php if(!empty($totalgst_28)){ ?>   
                                <tr>
                                    <td></td>
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
                                    <td id="total_invoice" style="background-color:yellow;">
                                        <?= $invoice = $net_amount +  $gst_5 +$gst_12  +$gst_18 + $gst_28 ;?>
                                    </td>
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
                                    <?php  if($result[0]['offline_file']){ ?>
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
                                                            <a href="<?php echo $value['offline_file'] ; ?>" class="btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 300px;"> Download File </a>
                                                            <button type="button" class="btn-default" data-dismiss="modal">Close</button>   
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
                                    <td></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Balance 2nd Payment Received</td>
                                    <td></td>
                                    <td>Payment Mode :  
                                        <?php 
                                        $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2 ))->row();
                                            echo $payment_mode= $pend_row->pend_payment_type; ?></td>
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

                                         <td><span id="final_amt"><?php $final = $invoice - $advance -$pend_amount -$pend_3_amount ;

                                                            

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
                        </div>

                            

                        </div>

                        </div>

                    </div>

				

                </div>

            </div>

        </div>

    </div>

</section>

<?php

include('footer.php');

?>