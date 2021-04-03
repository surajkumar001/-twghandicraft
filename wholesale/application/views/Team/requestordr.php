 <?php
include('header.php');
include('sidebar.php');

?>
<style>
.img50{
    height:50px;
    width:50px;
}



</style>

 <aside class="right-side dvContainer">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1> Order Details</h1>
                <!--<ol class="breadcrumb">-->
                <!--    <li>-->
                <!--        <a href="<?php echo base_url('Admin/Dashboard');?>">-->
                <!--            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard-->
                <!--        </a>-->
                <!--    </li>-->
                <!--    <li>-->
                <!--        <a href="<?php echo base_url('Admin/ProductionNewOrder');?>">Production New Order</a>-->
                <!--    </li>-->
                <!--    <li class="active"> Order List</li>-->
                <!--</ol>-->
            </section>
            <!-- Main content -->
  <section class="content paddingleft_right15">
                <div class="row" >
                    <div class="panel panel-primary" id="content3">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order Details
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <div class="row" style="padding: 0px;">
                                <div class="col-md-3">
                                    <p><b>Order No :</b><?php print_r($result[0]['order_rand_id'])?> </p>
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
                                    <p><b>State :</b>  <?=  $pincode->state ;?></p>
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
                                    <p><b>Business & Ownership TYpe :</b>  <?=  $result[0]['btype'];?> & <?=  $result[0]['ownertype'];?> </p>
                                </div>
                            </div>
                            <div style="overflow-x:auto;">
                             <table class="table table-striped table-bordered clienttable2" >
                                <thead>
                                    
                                         <input type="hidden" id ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                          <input type="hidden" id ="ord_id" value="<?= $result[0]['order_id'] ?>">
                                      
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Product SKU</th>
                                        <th>Qty</th>
                                       <th>Ready Stock</th>
                                        <th>W.P.(before tax)</th>
                                        <th>Disc. W.P.(before tax)</th>
                                      
                                        <!--<th>GST %</th>-->
                                        <!--<th>GST Amount</th>-->
                                        <th>Amount</th>
                                        <th>Add</th>
                                        
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                     
                                   <?php 
                                             foreach ($result as  $value) {
                        
                                         $total_price_new+= $value['cart_price'] ;
                                         
                                         
                                                $befor_dis_sub_total+=  $value['price']*$value['quantity'];
                                         
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
                                         <td><img src="<?= $img ?>" class="img50"></td>
                                         <td><?= $value['product_id']; ?>
                                         <?php if($this->session->flashdata('low_availability') ==  $value['product_id']){ ?>
                          
                          <h5 style="color:red"> Out of Stock !<br> </h5>
                          
                          <?php  }   ?> 
                                         </td>
                                         
                                       
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
                                        
                                         <td><input type="number" class="form-control" value="<?php echo $value['quantity']; ?>" 
                                         min="0" max="<?php if($result[0]['order_type']  == 'orders'){ $product_detail->availability ;} ?>" 
                                         id="quantity_<?php echo $value['product_id']; ?>"  onkeydown="return false" 
                                         onchange="admin_quantity('<?php echo $value['product_id']; ?>');"></td>
                                        
                                           
                                         <td><?= $price = $value['price']; ?></td>
                                         <?php  
                                         //==================== % ratio =====                                
                                  $qty = $value['quantity'];
                                  
                                  if($qty== 0){
                                      
                                      $item_price = 0 ;
                                      
                                  }else{
                                  
                                  $item_price = $price*$value['quantity'] ;
                                  
                                  }
                                  
                                  if($befor_dis_sub_total >= '40000'   && $befor_dis_sub_total < '100000'){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  } elseif($befor_dis_sub_total >= '100000' ){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*5)/100 ; 
                                           
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  }
                                  else{
                                      
                                      $per_item_dicount[$a] = 0 ; 
                                  }
                                  
                                      
                                    ?>
                                         <td>
                                         
                                         <?php  echo  $amount = round($price - $per_item_dicount[$a], 2)  ; $a++ ;
                                         
                                          $qty = $value['quantity'];
                                  
                                  if($qty== 0){
                                      
                                      $sub_price = 0 ;
                                      
                                  }else{
                                  
                                 $sub_price = $amount*$value['quantity'];
                             
                                  }
                                  
                                             
                                          
                                          
                                        $after_discount+= $sub_price ;
                                         
                                         ?></td>
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
                                           <?php if($value['customer_quantity']){ ?>
                                         <td> 
                                         
                                              <?php  $old = $value['product_id']; ?>
                                             
                                     <input class="form-control" placeholder="Enter SKU" type="text" id="textInput_<?=$value['product_id'];?>" value="" onkeyup="myFunction_<?=$value['product_id'];?>()" style="margin-top:5px;"/>
                                         <ul id="myUL_<?= $value['product_id'];?>" style="display:none;border: 1px solid #418bca;padding: 5px;                                              ">
                                                 
                                                 <?php $old = $value['product_id'];
                                                 foreach($total_product as $pro ){ 
                                                          foreach($pro as $row){?>
                                                          
                                                          <?php $sku = $row->sku_code ; ?>
                                                     
                  <li><a href="<?= base_url('Admin/link_product_add')?>?sku=<?=$sku;?>&old_sku=<?=$old;?>&orderid=<?=$order_id;?>"><?= $sku ; ?></a></li>
                  
                                                       <?php } } ?>
                                                       
                                                       
                                                
                                                </ul>
                                             </td>
                                               <td> 
                                          
                                            <input type="hidden"  id ="product_sku_<?=$value['product_id'];?>"  value="<?=$value['product_id'];?>"  placeholder="Enter SKU"><br>
                                         
                                             <p class="btn btn-danger" onclick="delete_product('<?=$value['product_id'];?>')" style="width: 100%; margin-top:-20px">Delete Product</p>
                                             </td>
                                             
                                         <?php }else{ ?>
                                         
                                          <td> 
                                         
                                              <?php  $old = $value['product_id']; ?>
                                             
                                     <input class="form-control" placeholder="Enter SKU" type="text" id="textInput_<?=$value['product_id'];?>" value="" onkeyup="myFunction_<?=$value['product_id'];?>()" style="margin-top:5px;"/>
                                         <ul id="myUL_<?= $value['product_id'];?>" style="display:none;border: 1px solid #418bca;padding: 5px;                                              ">
                                                 
                                     <?php $old = $value['series_product'];
                                                 foreach($total_product as $pro ){ 
                                                          foreach($pro as $row){?>
                                                          
                                                          <?php $sku = $row->sku_code ; ?>
                                                     
                                           <li><a href="<?= base_url('Admin/link_product_add')?>?sku=<?=$sku;?>&old_sku=<?=$old;?>&orderid=<?=$order_id;?>"><?= $sku ; ?></a></li>
                  
                                                       <?php } } ?>
                                                
                                                </ul>
                                             </td>
                                             
                                          <td> 
                                          
                                            <input type="hidden"  id ="product_sku_<?=$value['product_id'];?>"  value="<?=$value['product_id'];?>"  placeholder="Enter SKU"><br>
                                         
                                             <p class="btn btn-danger" onclick="delete_product('<?=$value['product_id'];?>')" style="width: 100%; margin-top:-20px">Delete Product</p>
                                             </td>
                                            <?php } ?> 
                                             
                                                <!--<td><p class="btn btn-primary" onclick="add('<?=$value['id'];?>');" style="width: 100%;">Update</p>-->
                                         

                                    </td>

                                      </tr>
                                      
                                      
                                      <script>

                                                
                                                function myFunction_<?=$value['product_id'];?>() {
                                                   var ins = $("#textInput_<?=$value['product_id'];?>").val();
                                                  
                                                   if(ins != ''){
                                                $('#myUL_<?=$value['product_id'];?>').show();
                                                  var input, filter, ul, li, a, i;
                                                  input = document.getElementById("textInput_<?=$value['product_id'];?>");
                                                  filter = input.value.toUpperCase();
                                                  ul = document.getElementById("myUL_<?=$value['product_id'];?>");
                                                  li = ul.getElementsByTagName("li");
                                                  for (i = 0; i < li.length; i++) {
                                                    a = li[i].getElementsByTagName("a")[0];
                                                    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                      li[i].style.display = "";
                                                    } else {
                                                      li[i].style.display = "none";
                                                    }
                                                  }
                                                }else{
                                                  $('#myUL_<?=$value['product_id'];?>').hide();
                                                }
                                                }
                                                </script>
                                
                                      
                                      <?php } ?>
                                      
                                        
                                      <tr>
                                          <td style="color:#fff;">10000</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>Subtotal ( Before Discount )</td>
                                          <td><?= $befor_dis_sub_total ?></td>

                                          <td>Sub Total </td>
                                          
                                           <td> <span id="pricereplaces"><?php  echo  $sub_total = round($after_discount,2); ?></span></td>
                                           <td></td>
                                           <td></td>
                                      </tr>
                                      
                                      
                                      <!--<tr>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--     <td ></td>-->
                                      <!--    <td ></td>-->
                                      <!--    <td>Shhipping Charge </td>-->
                                          
                                      <!--     <td> <span id="pricereplaces"><?php  echo $shipping = round($result[0]['shipping_charge'],2); ?></span></td>-->
                                      <!--</tr>-->
                                      
                                      <!--  <tr>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--     <td ></td>-->
                                      <!--    <td ></td>-->
                                      <!--    <td>Packing Charge </td>-->
                                          
                                      <!--     <td> <span id="pricereplaces"><?php  echo $packing = round($result[0]['packing_charge'],2); ?></span></td>-->
                                      <!--</tr>-->
                                      
                                      
                                      <!--  <tr>-->
                                      <!--    <td></td>-->
                                          <!--<td></td>-->
                                          <!--<td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--    <td></td>-->
                                      <!--     <td ></td>-->
                                      <!--    <td ></td>-->
                                      <!--    <td>Final Amount </td>-->
                                          
                                           <!--<td> <span id="pricereplaces" ><?php  echo $sub_total + $shipping + $packing ; ?></span></td>-->
                                      <!--     <td> <span id="pricereplaces" ><?php  echo $sub_total  ; ?></span></td>-->
                                      <!--</tr>-->
                                      
                                      
                                      
                                   
                                 </tbody>
                            </table>
                            
                        
                            <table class="table table-striped table-bordered">
                               
                                 <tbody>
                                                  
                        <?php  $order_id = $result[0]['order_rand_id'] ;
                                
                                    $i = 1 ;
                                    
                                  
                                     foreach ($result as  $value) {
                                   
                                         ?>
                                     <tr style="display:none">
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
                                        
                                         <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->gst_per; ?>"> 
                                         
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
                                          
                                              
                                        //   $total_price+= $value['cart_price']  ;
         
                                          
                                        //   echo $total_price;
                                         
                                         ?>
                                        
                                         
                                         
                                         <!--<td><p class="btn btn-primary" onclick="onButtonClick()" style="width: 100%;">Add</p>-->
                                                <!--<td><p class="btn btn-primary" onclick="add('<?=$value['id'];?>');" style="width: 100%;">Update</p>-->
                                         <input class="hide"  type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"/>
                                       

                             </td>

                                      </tr>
                                      
                                      <?php } ?>
                                      
                                       
                                   
                      <?php $a = 1 ;
                                     $percent_amount = array();
                                      $discount = array() ;
                                          
                                   foreach($result as  $amount){
                                       
                                       //==================== % ratio =====                                
                                          
                                $percent_amount[$a] =round(($amount['cart_price'] / $total_price)*100,2); 
                                        
                                    $a++ ;       
                                   } 
                                       
                                          ?>
                                          
                                      
                         </tbody>
                            </table>
          
                            
                             <table class="table table-striped table-bordered" id="mytable" style="display:none">
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
                                      
                                        <tr  >
                                         <td></td>
                                         <td><b>Sub Total (Cart Value)</b></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td style="background-color:yellow;"><span id="g_total"><?php echo $cart_value  = round($befor_dis_sub_total ,2) ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                      
                                      
                                       <tr>
                                         <td></td>
                                         <td>Carton Packing</td>
                                         <td></td>
                                         <td style="text-align : right; "> No. of Carton :</td>
                                         <td> <input type="number" class="form-control" name="Carton" id="Carton_no" min='1' value="<?php $paking = $result[0]['packing_charge'];   echo $carton = $paking/350 ; ?>" >  </td>
                                         <td></td>
                                         <td><button type="submit" class="form-control btn btn-primary"  onclick="carton_change()">Update Carton</button></td> </td>
                                         <td><?php echo $paking = $result[0]['packing_charge']; ?></td>
                                         <td>12%</td>
                                         <td><?= $paking_gst = round($paking*(12/100),2); ?></td>
                                      </tr>
                                      
                                       <tr>
                                         <td></td>
                                         <?php $delievry = $result[0]['delievry_type']  ;
                                         
                                         if($delievry == 'Transport'){
                                         
                                         ?>
                                         <td>Freight Charge </td>
                                         
                                         <?php }else{ ?>
                                          <td>Freight Charge </td>
                                          
                                          <?php } ?>
                                         
                                         <td></td>
                                         <td></td>
                                         <td><input type="text" class="form-control" name="Freight" id="Freightid"  placeholder = "Freight Charge"> </td>
                                         <td></td>
                                         <td></td>
                                         <td>  <?= $shipping ?></td>
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
                                         <td><input type="text" class="form-control" name="discount" id="discount_percent" onkeyup="dis_percent()" placeholder="Discount in %"></td>
                                         <td></td>
                                         <td></td>
                                         <td><input type="text" class="form-control" name="discountprice" id="flat_discount" onkeyup="flat_dis()"  placeholder="Flat Discount"></td>
                                         <td><span id="total_discount"> <?php echo $admin_discount =  $result[0]['discountcharge'] ;?></span></td>
                                         <td></td>
                                         <td>
                                             <input type="hidden" id="req_id" value="<?php print_r($result[0]['order_rand_id'])?> ">
                                             <button type="submit" class="form-control btn btn-primary"  onclick="dis_apply()">Apply</button></td>
                                      </tr>
                                      
                                       
                                       <tr>
                                         <td></td>
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
                                        <td><span id="total_gst"> <?= $gst_5 = $totalgst_5  ; ?> </span></td>
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
                                         <td>Total Invoice Value</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                <td  id="total_invoice" style="background-color:yellow;"><?= $invoice = $net_amount +  $gst_5 + $gst_12 +  $gst_18+ $gst_28 ;?></td>
                                         <td><?php $_SESSION['finalamount_req'] = $invoice ;
                                         $_SESSION['totalprice'] = $invoice ; ?></td>
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
                                         <td>Balance Amount</td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><span id="final_amt"><?php  $final = $invoice - $advance ;
                                                            
                                                                echo round($final ,2 );
                                         
                                         ?></span></td>
                                         <td></td>
                                         <td></td>
                                      </tr>
                                       <tr>
                                         <td></td>
                                         <td>Balance Payment Received</td>
                                         <td></td>
                                         <td>Payment Mode :  <?php 
                                         
                                            $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id))->row() ;
                                         
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
                                      
                                 </tbody>
                            </table>
                            
                          
                                                 <div class="row" style="margin-top: 50px;">
                                <div class="col-md-offset-8 col-md-1">
                                    
                                    <!--<p class="btn btn-danger" onclick="cancelled_('<?= $result[0]['order_rand_id'] ?>')" style="width: 100%;">Cancelled Order</p>-->
                                       
                                    
                                      <a href="#cancle_confirm" data-toggle="modal" ><button type="submit" class="btn btn-danger" >Order Cancel</button></a>
                                    
                                </div>
                                 <div class="col-md-2" >
                                     
                                       
                               <form action="<?php echo base_url('Admin/confirmdetails'); ?>" method="post">
                                        <input type="hidden" id ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                          <input type="hidden" id ="ord_id" value="<?= $result[0]['order_id'] ?>">
                                      
                                          <input type="hidden" name="finalvolume" id="finalvolume" value="<?php echo $finalvolume; ?>"> 
                                          
                                             <input type="hidden" name="before_sub_total" id="finalprice" value="<?php  echo $befor_dis_sub_total ; ?>">  
                                          
                                          <input type="hidden" name="finalprice" id="finalprice" value="<?php  echo $_SESSION['totalprice'] ; ?>">  
                                          
                                         <input type="hidden" name="shipping" id="shipping" value="<?php echo $shipping; ?>">  
                                         
                                            <input type="hidden" name="total_discount" id="total_discount" value="<?php echo $total_discount; ?>">  
                                                  
                                          <input type="hidden" name="sub_total" id="totalprice" value="<?php echo $sub_total; ?>"> 
                                          <input type="hidden" name="delievry_type" id="delievry_type" value="<?=  $orders->delievry_type ;?>"> 
                                          
                                               <input type="hidden" name ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                      
                                     <button type="submit" class="btn btn-success"  width="100%" style="margin-left:40px;">Save & Continue Order</button>
                                    </form>
                                    <!--<a href="<?php echo base_url('Admin/confirmdetails'); ?>" class="btn btn-primary">Continue</a>-->
                                    
                                </div>
                                
                                
                                <input type="button" class="btn btn-danger" value="Download PDF" onclick="printDiv('content3')" style="margin-top: -50px;" />
                            </div>     
                        
                      </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside><input type="hidden" id="url" value="<?=base_url();?>">
        
        
        <!-- Confirm Cancel -->
  <div class="modal fade" id="cancle_confirm" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action="<?php echo base_url('Admin/cancelled_done'); ?>" method=post>
      <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Give Reason</h4>
        </div>
          <input type="hidden" name="req_id" value="<?= $result[0]['order_rand_id'] ?>">
                                       
        <div class="modal-body">
          <textarea class="form-control" name="cancle_reason" style="height: 100px !important;" placeholder="Please Give Reason"></textarea>
        </div>
        <div class="modal-footer">
          <input type="Submit" class="btn btn-primary" style="width: 15%;" value="Confirm">
          
        </div>
      </div>
      </form>
    </div>
  </div>
        
<?php
include 'footer.php';
?>

<!--<script>-->
<!--$('#tab tbody tr:last').after('<tr><td colspan="4"></td><td>Subtotal ( Before Discount )</td><td><?= $befor_dis_sub_total ?></td><td>Sub Total </td><td> <span id="pricereplaces"><?php  echo  $sub_total = round($after_discount,2); ?></span></td><td colspan="2"></td></tr>');-->

<!--</script>-->
<script>
      function onButtonClick(){
          document.getElementById('textInput').className="show";
        }
  </script>
  <style>
      .hide{
  display:none;
}
.show{
  display:block;
}
</style>
<script type="text/javascript">
    function protype(id){
        var urls=$("#url").val();
      
        var type = $("#"+id+"_protype").val();
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/protype",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              
                }
            });

    }

</script>
<script type="text/javascript">
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
  
});

function quan(id){

        var urls=$("#url").val();
      
        var type = $("#min_"+id).val();
     $.ajax({
            type: "POST",
            url: urls+"Admin/quantityupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              location.reload();
                }
            });
}
 function add(id){
   var urls=$("#url").val();
      
        var name = $("#name_"+id).val();
        var quantity = $("#quantity_"+id).val();
        var pid = $("#pid_"+id).val();
      
           $.ajax({
            type: "POST",
            url: urls+"Admin/addsuggest",
            data: {id:id,name:name,quantity:quantity,pid:pid},
            cache: false,
            success: function(result){
            // alert(result);
             location.reload();
                }
            });
 }
 
// ===New row for New Prduct ====== 
  function addnew_product(id){
     
      
   var urls=$("#url").val();
      
         var sku = $("#product_sku_" +id).val();
         var req_id = $("#request_id").val();
         
         var ord_id = $("#ord_id").val();
         
         var old_sku = id ;
         
        // alert(req_id) ;
         
         if(sku ==''){
             
             alert("please insert sku code") ;
             exit; 
         }
         
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/new_product_add",
            data: {sku:sku,req_id:req_id , ord_id:ord_id ,old_sku:old_sku},
            cache: false,
            success: function(result){
             alert(result);
            
             location.reload();
                }
            });
 }
 
 
 
  function delete_product(id){
      var txt;
      var r = confirm("Are You Sure !");
      if (r == true) {
      
     
  //================================   
      
   var urls=$("#url").val();
      
         var sku = $("#product_sku_" +id).val();
         var req_id = $("#request_id").val();
         
         var ord_id = $("#ord_id").val();
         
         var old_sku = id ;
         
        //  alert(sku) ;
         
         if(sku ==''){
             
             alert("please insert sku code") ;
             exit; 
         }
         
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/delete_newproduct",
            data: {sku:sku,req_id:req_id , ord_id:ord_id ,old_sku:old_sku},
            cache: false,
            success: function(result){
            // alert(result);
            
             location.reload();
                }
            });
            
    //=============================   
    txt = "You pressed OK!";
 
  } else {
      
    txt = "You pressed Cancel!";
    
  }
  
  document.getElementById("demo").innerHTML = txt;

 }
 
 
 //=====cancelled order =====
 
  
  function cancelled_(id){
      
  var txt;
  var r = confirm("Are You Sure  Want to Cancelled Order !");
  if (r == true) {
      
     
  //================================   
      
   var urls=$("#url").val();
      
         var sku = $("#product_sku_" +id).val();
         var req_id = $("#request_id").val();
         
         var ord_id = $("#ord_id").val();
         
         var old_sku = id ;
         
        //  alert(sku) ;
         
         if(sku ==''){
             
             alert("please insert sku code") ;
             exit; 
         }
         
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/cancelled_done",
            data: {req_id:req_id , },
            cache: false,
            success: function(result){
            // alert(result);
            
              window.open(urls+"Admin/orderbystatus/Cancelled");
            
            //  location.reload();
                }
            });
            
    //=============================   
      
      
    txt = "You pressed OK!";
    
    
    
    
    
  } else {
      
      
      
    txt = "You pressed Cancel!";
    
    
  }
  
  document.getElementById("demo").innerHTML = txt;

     
       
 }
 
 
 //=============Update product==========
 
  function update_product(id){
   var urls=$("#url").val();
      
        var name = $("#name_"+id).val();
        var quantity = $("#quantity_"+id).val();
        var pid = $("#pid_"+id).val();
        
        
    //    var user_id = $("#user_id_"+id).val();
      
           $.ajax({
            type: "POST",
            url: urls+"Admin/update_product",
            data: {id:id,name:name,quantity:quantity,pid:pid},
            cache: false,
            success: function(result){
            // alert(result);
             location.reload();
                }
            });
 }
 
 //============================
</script>
<script>
$('a').click( function(){
      var $parentTR = $(this).closest('tr');

    //   $parentTR.clone(true).insertAfter($parentTR);
    });
/*    $("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});*/

/*$('a').live('click', function(){
      var $this     = $(this),
          $parentTR = $this.closest('tr');

      $parentTR.clone().insertAfter($parentTR);
    });*/
/*    $('a').bind('click', function(){
  $('<tr><td>new td</td></tr>').insertAfter($(this).closest('tr'));
});*/
</script>


<!--datatable JS-->
<script type="text/javascript">
    if( $('.clienttable2').length > 0 ) {
        $('.clienttable2').DataTable( {           
            "paging":   false,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
                {
                    extend: 'csvHtml5',
                    exportOptions: { }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: { },
                    title: 'List',
                }
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
    function printDiv(content3) {
     var printContents = document.getElementById(content3).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
