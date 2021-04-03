
<?php
//pr($_SESSION);die;
include 'headcss.php';
include 'header.php';
?>
<style type="text/css">
  .paddlft{
      padding-left: 20%;
  }
  .brdcpn{
    padding: 10px;
    border-radius: 10px;
    border: 2px solid #2874f0;
  }
</style>
 <?php include 'navbar.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>
<?php if(!empty($_SESSION['cart'] || $data )){ ?>
<div class="body-content outer-top-xs">
  <div class="container-fluid" style="margin-bottom: 2%;">
    <div class="row ">
      <div class="col-md-9">
      <div class="shopping-cart">
        <div class="shopping-cart-table ">
                     <div class="table-responsive">
                          <table class="table">
                   <thead>
        <tr class="hdn">
          
          <th class="cart-description item">Image</th>
          <th class="cart-product-name item">Product Name</th>
          <th class="cart-qty item">Quantity</th><!-- 
                    <th class="cart-sub-total item">Product Price</th> -->
                    <th class="cart-sub-total item">Price</th>
                    <th class="cart-sub-total item">GST</th>
          <th class="cart-sub-total item">Discount</th>
          <th class="cart-total last-item">Grandtotal</th>
                    <th class="cart-romove item">Remove</th>
        </tr>
      </thead><!-- /thead -->
      
      
           
            
      
      <tbody>
                 <?php if(empty($_SESSION['session_id'])){


                                         foreach ($_SESSION['cart'] as  $value) {
                                           
                                                $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);
                                                   if(empty($product)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                    if(empty($product)){
                                                    $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                // pr($value);
                                               $cartsums+=$value['cart_price'];
                                                $volume=$product[0]['box_volume_weight']*$value['quantity'];

                                                     if(!empty($value['discount_price'])){
                                                $disarr['disc'][]=$value;

                                               }else{

                                                    $pricearr['price'][]=$value;
                                               }
                                                 if($product[0]['gst']=='1'){
                                              $addgst=100+$product[0]['gst_per'];
                                          $gst=$value['cart_price']*$product[0]['gst_per']/$addgst;

                                            }else{
                                          $gst=$value['cart_price']*$product[0]['gst_per']/100;
                                        }
                                         ?>
        <tr>
          
          <td class="cart-image">
            <a class="entry-thumbnail" href="detail.html">
                <img src="<?php echo $product[0]['main_image1']; ?>" alt="">
            </a>
          </td>
          <td class="cart-product-name-info">
            <h4 class='cart-product-description'><a href="#"><?php echo substr($product[0]['pro_name'],0,32); ?>... </a></h4>
                        <?php if(empty($product[0]['promotion_price'])){ 
                          if(!empty($value['discount_price'])){
                         $discount_prices=($product[0]['selling_price']*$value['discount_slab'])/100;
                             $var=$product[0]['selling_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['selling_price'];
                             } ?>
                          <span class="">Product Price : <span>Rs <?php echo $var; ?></span></span><br />

                          
                        <?php } else{ 

                          if(!empty($value['discount_price'])){
                         $discount_prices=($product[0]['promotion_price']*$value['discount_slab'])/100;
                             $var=$product[0]['promotion_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['promotion_price'];
                             }
                          ?>
                           <span class="">Product Price : <span>Rs <?php echo $var; ?></span></span><br />
                        
                        <?php } ?>

            <div class="cart-product-info">
                      <span class="product-color">COLOR:<span><?php echo $product[0]['color']; ?></span>
                     
                      <span class="dlt"> <a href="#" title="delete" class="icon romove-item" onclick="delcart('<?php echo $value['product_id']; ?>');"><i class="fa fa-trash-o" style="font-size: 24px"></i></a></span></span>
            </div>
          </td>
           <?php if(empty($product[0]['promotion_price'])){ ?>
            <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $var; ?>"> 
            <?php } else { ?>
                <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $var; ?>"> 
            <?php } ?>
                     <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
          <td class="cart-product-quantity">
            
                        
                        <input type="number" value="<?php echo $value['quantity']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>" max="<?php echo $product[0]['availability']; ?>" id="quantity_<?php echo $value['product_id']; ?>"  onkeydown="return false" onchange="quantity('<?php echo $value['product_id']; ?>');">
                    
                </td>
        <!--  <td class="cart-product-sub-total"><span class="cart-sub-total-price"><i class="fa fa-inr"></i> <?php echo $product[0]['selling_price']; ?>.00</span>
                    </td> -->
                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php if($product[0]['gst']=='2'){ echo round($value['cart_price']); }else{ echo round($value['cart_price']-$value['gst']); } ?>.00</span>
                    </td>
                     <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($value['gst']); ?>(<?php echo $product[0]['gst_per']; ?>)</span></td>
                       

                 <?php if(!empty($value['discount_price'])){ ?>
                     <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php  $m= $value['cart_price']-$value['discount_price']; echo round($m); ?>.00(<?php echo $value['discount_slab'] ?>% off)</span>
                    </td>
                    <?php } else{ ?>
                  <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo '0' ?>% off</span>
                    </td>
                <?php } 

                          if($product[0]['gst']=='2'){
       $carttt= round($value['cart_price']+$value['gst']);
       
                 ?>

                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($value['discount_price'])){ echo round($value['cart_price']+$value['gst']).'.00'; }else{ echo round($value['discount_price']+$value['gst']); } ?>.00</span></td>
                <?php } else{
                  
       $carttt= round($value['cart_price']);
        ?>
                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($value['discount_price'])){ echo round($value['cart_price']).'.00'; }else{ echo round($value['discount_price']); } ?>.00</span></td>
                <?php } ?>
                    <td class="romove-item"><a href="#" title="cancel" class="icon" onclick="delcart('<?php echo $value['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>
            </tr>
           <?php
   $finalvolume+=$volume;
   $carttotal+=$carttt;

             } 
                  
                 foreach ($disarr['disc'] as $key ) {
                  
                  $allgst1+= $key['gst'];
                   if($key['gstinc']==2){
                   $finalgst2+= $key['gst'];
                   }else{
                   
                    $finalgst12= 0;
                   }  
                  $cartprice+=$key['cart_price'];
                  $discount_pricess+=$key['discount_price'];

                 }
                 foreach ($pricearr['price'] as $pricea ) {
             
                    $ctprice+=$pricea['cart_price'];
                    $allgst2+= $pricea['gst'];
                  if($pricea['gstinc']==2){
                
                    $finalgst22+= $pricea['gst'];
                }else{

                 $finalgst122= 0;
                }
                 }
                    
                 $finalgst=$finalgst122+$finalgst22+$finalgst12+$finalgst2;
                $_SESSION['allgst']=$allgst1+$allgst2;
                
            
                  $totalprice=$discount_pricess+$ctprice+$finalgst;
                  $_SESSION['finalgst']= $finalgst;
                 $disc=$cartprice-$discount_pricess;
                  $onlyprice=$carttotal;
                   $_SESSION['totalprice']= $totalprice;
                   $_SESSION['discount']=$disc;
                    $_SESSION['subprice']=$onlyprice;
                  ?>
                 <input type="hidden" id="finalvolume" value="<?php echo $finalvolume; ?>">
           <?php  }else {

                                       foreach ($data as  $cart) {
                                              $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);
                                                    if(empty($product)){
                                                       $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                    if(empty($product)){
                                                    $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                        $cartusersums+=$cart['cart_price'];

                                          $volume=$product[0]['box_volume_weight']*$cart['quantity'];
                                         
                                                 
                                               if(!empty($cart['discount_price'])){
                                                $disarr['disc'][]=$cart;

                                               }else{
                                                    $pricearr['price'][]=$cart;
                                               }
                                            if($product[0]['gst']=='1'){
                                              $addgst=100+$product[0]['gst_per'];
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/$addgst;

                                            }else{
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/100;
                                        }
                                        ?>
                                        <tr>
                    
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="detail.html">
                            <img src="<?php echo $product[0]['main_image1']; ?>" alt="">
                        </a>
                    </td>
                    <td class="cart-product-name-info">
                        <h4 class='cart-product-description'><a href="#"><?php echo substr($product[0]['pro_name'],0,32); ?>... </a></h4>
                        <?php if(empty($product[0]['promotion_price'])){
                         if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['selling_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['selling_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['selling_price'];
                             }  ?>
                       <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['selling_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span>
                     <?php } else { 
                       if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['promotion_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['promotion_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['promotion_price'];
                             }
                      ?>
                <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['promotion_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span>
                     <?php } ?>
 
                       <br />
                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span><?php echo $product[0]['color']; ?></span></span>
                        </div>
                    </td>
                  
                    <td class="cart-product-quantity">
                       
                                
                                <input type="number" value="<?php echo $cart['quantity']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>" max="<?php echo $product[0]['availability']; ?>" id="quantity_<?php echo $cart['product_id']; ?>" onkeydown="return false" onchange="quantity('<?php echo $cart['product_id']; ?>');">
                          
                    </td>
                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"> <?php if($product[0]['gst']=='2'){ echo round($cart['cart_price']); }else{ echo round($cart['cart_price']-$cart['gst']); } ?>.00</span>
                    </td>
                        <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($cart['gst']); ?>(<?php echo $product[0]['gst_per']; ?>%)</span></td>
                    <?php if(!empty($cart['discount_price'])){ ?>
                      <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php $m=$cart['cart_price']-$cart['discount_price']; echo round($m); ?>.00(<?php echo $cart['discount_slab'] ?>% off)</span>
                    </td>
                    <?php } else{ ?>
                  <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo '0' ?>% off</span>
                    </td>
                <?php }
                if($product[0]['gst']=='2'){
       $carttt= round($cart['cart_price']+$cart['gst']);
       
                 ?>

                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price']+$cart['gst']).'.00'; }else{ echo round($cart['discount_price']+$cart['gst']); } ?>.00</span></td>
                <?php } else{
                  
       $carttt= round($cart['cart_price']);
        ?>
                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price']).'.00'; }else{ echo round($cart['discount_price']); } ?>.00</span></td>
                <?php } ?>
                    <td class="romove-item"><a href="#" title="cancel" class="icon"onclick="delusercart('<?php echo $cart['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>
                
                </tr>
        <?php
               
                 $finalvolume+=$volume;
                 $carttotal+=$carttt;

                 }
                   

                  
                 foreach ($disarr['disc'] as $key ) {
                  
                   $allgst2+= $key['gst'];
                 
                   if($key['gstinc']==2){
                   $finalgst12+= $key['gst'];
                   }else{
                   
                    $finalgst22= 0;
                   }  
                  $cartprice+=$key['cart_price'];
                  $discount_pricess+=$key['discount_price'];

                 }
                 foreach ($pricearr['price'] as $pricea ) {
                 
                    $ctprice+=$pricea['cart_price'];
                   $allgst1+= $pricea['gst'];
                  if($pricea['gstinc']==2){
                
                   $finalgst122+= $pricea['gst'];
                }else{

                 $finalgst123= 0;
                }
                 }
                
                 $finalgst=$finalgst12+$finalgst22+$finalgst122+$finalgst123;
                     
                
                $_SESSION['allgst']=$allgst1+$allgst2;
                
                  $totalprice=$discount_pricess+$ctprice+$finalgst;
                  $_SESSION['finalgst']= $finalgst;
                 
                 $disc=$cartprice-$discount_pricess;
                  
                   $onlyprice=$carttotal;
                 
                 
                   $_SESSION['totalprice']= $totalprice;
                   $_SESSION['discount']=$disc;
                    $_SESSION['subprice']=$onlyprice;
                 ?>
                 <input type="hidden" id="finalvolume" value="<?php echo $finalvolume; ?>">
                <?php 
               
                 } ?>
      </tbody><!-- /tbody -->
            
    </table><!-- /table -->
     <div class="row">
              <div class="col-md-3">
            <div class="shopping-cart-btn">
            
                <a href="<?php echo base_url(); ?>" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
              </div></div>
              <?php if(empty($_SESSION['coupon'])){ ?>
              <div class="col-md-5">
                 <div class="form-group">
                                    <input type="text" class="form-control unicase-form-control text-input" id="coupon" placeholder="You Coupon..">
                                </div>
                                 <p class="estimate-title">Discount Code
                  <span>Enter your coupon code if you have one..</span></p>
                              </div>
                              <div class="col-md-2">
                                <div class="clearfix ">
                                    <button type="button" class="btn-upper btn btn-primary" onclick="couponapply();">APPLY COUPON</button>
                                </div>
                                
                              </div>
                            <?php } else { 
                                  
                                  ?>
                                  <div class="paddlft">
                                   <div class="brdcpn"> 
                              <h3 style="color: green"><?php echo $_SESSION['couponname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button" class="btn-upper btn btn-danger" onclick="couponremove();">Remove Coupon</button></h3>
                              <span style="color: green"><i class="glyphicon glyphicon-ok"></i>&nbsp;Coupon Applied</span>
                            </div></div>
                          <?php } ?>
                
                  <div class="col-md-2">
                </div></div>
                 <input type="hidden" id="totalprice" value="<?php echo $totalprice; ?>">
  </div>
</div><!-- /.shopping-cart-table -->
<?php 
          $id=$uri;
         $where='order_id';
         $table='orders';
         $orders=$this->Model->select_common_where($table,$where,$id);
?>
<input type="hidden" id="optradio"  value="<?php echo $orders[0]['delievry_type'];  ?>"  onchange="delivery();">
      </div><!-- /.shopping-cart -->
    </div>
        <div class="col-md-3 col-sm-12 estimate-ship-tax">
            <div class="row">
                
                <div class="col-md-12">
            <div class="shopping-cart">
                <table class="table">
                    <thead>
                        <tr>
                              <td>
<input type="hidden" id="subtotal" value="<?php echo round($onlyprice); ?>">
<input type="hidden" id="subtotal" value="<?php echo round($_SESSION['finalvolume']); ?>">
                               Sub-Total:&nbsp;<?php echo round($onlyprice); ?> &nbsp;RS<br/>
                            Shipping-charge:&nbsp;<span id="shipcharge">0 &nbsp;RS</span><br/>

                             Coupon-Discount:&nbsp;<span id="coupondis"><?php if(empty($_SESSION['coupon'])){  ?>0<?php } else {  echo $_SESSION['coupon'];  } ?> &nbsp;RS</span><br/>
                               Discount:&nbsp;<?php echo $disc; ?> &nbsp;<br/>
                               <?php if(!empty($orders[0]['transportcharge'])){ 
                                $_SESSION['transportcharge']=$orders[0]['transportcharge'];
                                ?>
                                Transport Charge:&nbsp;<span id=""><?php   echo $orders[0]['transportcharge'];   ?> &nbsp;RS</span><br/>

                                  <?php } if(!empty($orders[0]['admindiscount'])){
                                $_SESSION['admindiscount']=$orders[0]['admindiscount'];
                                   ?>
                            
                                Admin-Discount:&nbsp;<span id=""><?php  echo   $orders[0]['admindiscount'];   ?> &nbsp;RS</span><br/>
                              <?php } ?>
                               
                            </td>
                            <input type="hidden" id="transport" value="<?php   echo $orders[0]['transportcharge'];   ?>">
                            <input type="hidden" id="admindiscount" value="<?php   echo $orders[0]['admindiscount'];   ?>">
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Total:&nbsp;<span id="pricereplace"><?php  echo $_SESSION['totalprice']+$orders[0]['transportcharge']; ?></span>&nbsp;RS
                          

                                <div style="padding-top: 5%">

                                <a href="#" onclick="placeorder();"  class="btn btn-upper btn-primary pull-right outer-right-xs">Checkout </a></div>
                            </td>
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div>
            </div>
        </div>
        </div><!-- /.estimate-ship-tax -->
    </div> <!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.body-content -->
<?php } else { ?>
  <div class="body-content outer-top-xs">
<img src="<?php echo base_url(); ?>/assets/images/emptycart.png" style="
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 36%;"></br>
    <center><h1 class="module-title"  style="    margin-bottom: 32px;">Your Cart is Empty</h1></center>
    <center><a href="<?php echo base_url(); ?>"><h1 class="btn btn-primary"  style="    margin-bottom: 32px;">Continue Shopping</h1></a></center>
  </div>
<?php } ?>
<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'footer.php'; ?>
<script type="text/javascript">

     function delivery(){
           var finalvolume=$("#finalvolume").val();
           var delievry=$("#optradio").val();
                 var totalprice=$("#totalprice").val();
                 var transport=$("#transport").val();
                 var admindisc=$("#admindiscount").val();
         
         // alert(finalvolume);exit();
        var urls=$("#url").val();
        //alert(selling_price);exit();
        
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/checkout",
            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice,admindisc:admindisc,transport:transport},
            cache: false,
            success: function(result){

              if(delievry=='self'){
               $("#hideaddr").show();
              }else{
               $("#hideaddr").hide();

              }

             var obj = JSON.parse(result);
            
               $("#shipcharge").html(obj.charge);
               $("#pricereplace").html(obj.totalprice);
           // location.reload();
              
                }
            });

    }
  </script>
