<?php
    //pr($_SESSION);die;
    include 'headcss.php';
    include 'header.php';
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
    .paddlft{
        padding-left: 20%;
    }
    .brdcpn{
        padding: 10px;
        border-radius: 10px;
        border: 2px solid #2874f0;
    }
    .img75{
        width:75px !important;
        height:75px !important;
    }
</style>
<style>
    .qty .count {
        color: #555;
        display: inline-block;
        vertical-align: top;
        font-size: 16px;
        font-weight: 400;
        line-height: 30px;
        padding: 0 2px;
        min-width: 35px;
        text-align: center;
    }
    .qty .plus {
        margin-top: 5px;
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 20px;
        height: 20px;
        font: 20px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        background-color: #3863d1;
    }
    .qty .minus {
        margin-top: 5px;
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 20px;
        height: 20px;
        font: 20px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        background-clip: padding-box;
        background-color: #3863d1;
    }
    .minus:hover{
        background-color: #83b735 !important;
    }
    .plus:hover{
        background-color: #83b735 !important;
    }

    /*Prevent text selection*/

    span{
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    nput::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input:disabled{
        background-color:white;
    }

</style>
<style type="text/css"> 
    
    .not-active { 
        pointer-events: none; 
        cursor: default; 
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
            <div></div>
        </nav>
    </div>
</div>

<?php 

if(!empty($_SESSION['cart'] || $data )){ ?>
<div class="body-content outer-top-xs">
    <div class="container-fluid" style="margin-bottom: 2%;">
        <div class="row ">
            <div class="col-md-9">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table">
                                <thead>
                                    <tr class="hdn">
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <!--<th class="cart-sub-total item">Product Price</th> -->
                                        <th class="cart-sub-total item">Price</th>
                                        <th class="cart-sub-total item">GST</th>
                                        <!--<th class="cart-sub-total item">Discount</th>-->
                                        <th class="cart-total last-item">Grandtotal</th>
                                        <th class="cart-romove item">Remove</th>
                                    </tr>
                                </thead>
                                <!-- /thead -->
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
                                            <a class="entry-thumbnail" href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/product/'.$product[0]['main_image1'])   ?>" alt="" class="img75">
                                            </a>
                                        </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank"><?php echo $product[0]['sku_code']; ?></a></h4>
                                        <?php 
                                            if(empty($product[0]['promotion_price'])){ 
                                                if(!empty($value['discount_price'])){
                                                    $discount_prices=($product[0]['selling_price']*$value['discount_slab'])/100;
                                                    $var=$product[0]['selling_price']-$discount_prices;  
                                                }
                                            else{
                                                $var=$product[0]['selling_price'];
                                            } 
                                        ?>
                                        
                                        
                                        <span class="">Product Price : <span>Rs <?php echo $var; ?></span></span><br/>
                                        <span class="">Wholesale Price : <span>Rs <?php echo $var; ?></span></span><br/>
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
                                <!--<div class="cart-product-info">
                                <span class="product-color">COLOR:<span style="color: #040303;font-weight: 700;"><?php echo $product[0]['color']; ?></span>
                                <span class="dlt"> <a href="#" title="delete" class="icon romove-item" onclick="delcart('<?php echo $value['product_id']; ?>');"></span></span>
                                </div>-->
                            </td>
                            <?php if(empty($product[0]['promotion_price'])){ ?>
                                <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $var; ?>"> 
                            <?php } else { ?>
                                <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $var; ?>"> 
                            <?php } ?>

                     <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 

                        <input type="hidden" id="gstinc_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">

          <td class="cart-product-quantity">

                    	

                        	<div class="qty mt-5">

                        	      <?php if($product[0]['min_order_quan'] < $value['quantity']){ ?>

                        	      

                        <span class="minus bg-dark"  id="minus_<?php echo $value['product_id']; ?>">-</span>

                        

                        <?php }else{ ?>

                        

                          <span class="minus bg-dark not-active"  id="minus_<?php echo $value['product_id']; ?>">-</span>

                     

                     <?php } ?>

                        <input type="text" class="count" name="qty" id="quantity_<?php echo $value['product_id']; ?>"  value="<?php echo $value['quantity']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>"  max="<?php echo $product[0]['availability'] - $product[0]['inventory_hold'] ; ?>"  style="border: 0;width: 2%;">

                        <span class="plus bg-dark" id="plus_<?php echo $value['product_id']; ?>">+</span>

                        

                          

                         <input type="hidden" id="avaible_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['availability']  - $product[0]['inventory_hold'] ; ?>">

                          <input type="hidden" id="min_qty_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['min_order_quan']; ?>">

                          

                    </div>

                    

                    

                     

           <script>

         		$(document).ready(function(){

		    $('.count').prop('disabled', true);

   			$(document).on('click','#plus_<?php echo $value['product_id']; ?>',function(){

   			    

   			      var minimum = $('#min_qty_<?php echo $value['product_id']; ?>').val() ;

		          var available = $('#avaible_<?php echo $value['product_id']; ?>').val() ; 

   			    

   			      var id = '<?php echo $value['product_id']; ?>' ;

   			      var qty = $("#quantity_"+id).val();

   			

   			    

   			  //  if(Number(qty) >=Number(available) ){

   			       

   			  //    //   $("#plus_<?php echo $cart['product_id']; ?>").addClass("not-active");

   			  //      exit ;

   			        

   			  //  }

   			    

   			    

				$('#quantity_<?php echo $value['product_id']; ?>').val(parseInt($('#quantity_<?php echo $value['product_id']; ?>').val()) + 1 );

				

        var id = '<?php echo $value['product_id']; ?>' ;

        

       

        var urls=$("#url").val();

        var selling_price=$("#selling_price_"+id).val();

        var gst=$("#gst_"+id).val();

        var gstinc=$("#gstinc_"+id).val();

        //alert(selling_price);exit();

        var quantity=$("#quantity_"+id).val();

        

          $.ajax({

            type: "POST",

            url: urls+"Artnhub/addproduction",
          
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},

            cache: false,

            success: function(result){

                

            //  alert(result);

            

            location.reload();

              

                }

            });



    		});

        	$(document).on('click','#minus_<?php echo $value['product_id']; ?>',function(){

        	    

        	     

   			      var minimum = $('#min_qty_<?php echo $value['product_id']; ?>').val() ;

		          var available = $('#avaible_<?php echo $value['product_id']; ?>').val() ; 

   			      var id = '<?php echo $value['product_id']; ?>' ;

   			      var qty = $("#quantity_"+id).val();

   			

   			    

   			    if(Number(qty) <=Number(minimum) ){

   			     

   			     exit ;    

   			    }

   			    

   			    

    			$('#quantity_<?php echo $value['product_id']; ?>').val(parseInt($('#quantity_<?php echo $value['product_id']; ?>').val()) - 1 );

    				if ($('.count').val() == 0) {

						$('.count').val(1);

					}

	       var id = '<?php echo $value['product_id']; ?>' ;

           

        var urls=$("#url").val();

        var selling_price=$("#selling_price_"+id).val();

        var gst=$("#gst_"+id).val();

        var gstinc=$("#gstinc_"+id).val();

        //alert(selling_price);exit();

        var quantity=$("#quantity_"+id).val();

        

          $.ajax({

            type: "POST",

           url: urls+"Artnhub/addproduction",
          
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},

            cache: false,

            success: function(result){

                

            //  alert(result);

            

            location.reload();

              

                }

            });



     	});

    	    	

   	    	

 		});

                    </script>       

                    

                </td>

        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php if($product[0]['gst']=='2'){ echo round($value['cart_price'],2); }else{ echo round($value['cart_price']-$value['gst'],2); } ?></span>

                    </td>

                     <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($value['cart_price']*$product[0]['gst_per']/100,2);   $gst_total+= $value['cart_price']*$product[0]['gst_per']/100 ;?>(<?php echo $product[0]['gst_per']; ?>%)</span></td>

                       



                 <?php



                    if($product[0]['gst']=='2'){

                //   $carttt= round($value['cart_price']+$value['gst'],2);

       

                 ?>



                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($value['discount_price'])){ echo round($value['cart_price']+$value['gst'],2).'.00'; }else{ echo round($value['discount_price']+$value['gst'] ,2); } ?></span></td>

                <?php } else{

                  

     

        ?>

                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($value['discount_price'])){ echo round($value['cart_price'],2); }else{ echo round($value['discount_price']); } ?>.00</span></td>

                <?php } ?>

                    <td class="romove-item"><a href="#" title="cancel" class="icon" onclick="delcart('<?php echo $value['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>

            </tr>

           <?php

           

             $carttt= round($value['cart_price']+$value['gst'],2); 

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

                    

                 $finalgst=  $gst_total ;   //$finalgst122+$finalgst22+$finalgst12+$finalgst2;

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

                                                 

                                                 $cart_total = $cart['quantity'] * $product[0]['selling_price'] ;

                                                 

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

                                        $cartusersums+=$cart_total;



                                          $volume=$product[0]['box_volume_weight']*$cart['quantity'];

                                         

                                                 

                                               if(!empty($cart['discount_price'])){

                                                $disarr['disc'][]=$cart;



                                               }else{

                                                    $pricearr['price'][]=$cart;

                                               }

                                            if($product[0]['gst']=='1'){

                                              $addgst=100+$product[0]['gst_per'];

                                          $gst=$cart_total*$product[0]['gst_per']/$addgst;



                                            }else{

                                          $gst=$cart_total*$product[0]['gst_per']/100;

                                        }

                                        ?>

                                        <tr>

                    

                    <td class="cart-image">

                        <a class="entry-thumbnail" href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank">

                            <img src="<?php echo base_url('assets/product/'.$product[0]['main_image1'])   ?>" alt="" class="img75">

                        </a>

                    </td>

                    <td class="cart-product-name-info">

                          

                        <h4 class='cart-product-description'><a href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank"><?php echo $product[0]['sku_code']; ?></a></h4>

                        <?php if(empty($product[0]['promotion_price'])){

                         if(!empty($cart['discount_price'])){

                         $discount_prices=($product[0]['selling_price']*$cart['discount_slab'])/100;

                             $var=$product[0]['selling_price']-$discount_prices;  

                          }

                             else{

                             $var=$product[0]['selling_price'];

                             }  ?>
                             
<?php

   	$user_id = $_SESSION['session_id'] ;
 
		
		    $user_detail   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
 		$discount_per = $user_detail->discount_per ; 
 		
 			$dis_price  = $product[0]['selling_price']*($discount_per/100) ;
	
	
?>

                       <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $Wp_price = $product[0]['selling_price']- $dis_price; ?>"> 

                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 

                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">

                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span></br>
   <span class="">Wholesale Price : <span >Rs <?php echo $Wp_price; ?></span></span>

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

                       <?php if($this->session->flashdata('low_availability') ==  $product[0]['sku_code'] ){ ?>

                          

                          <h5 style="color:red"> Out of Stork !<br> Please Add To Production </h5>

                          

                          <?php  }   ?> 

                    </td>

                  <!--fdfsdfdssdfsdf-->

                    <td class="cart-product-quantity">

                       	<div class="qty mt-5">

                       	    <?php if($product[0]['min_order_quan'] < $cart['quantity']){ ?>

                        <span class="minus bg-dark"  id="minus_<?php echo $cart['product_id']; ?>">-</span>

                        

                        <?php }else{ ?>

                          <span class="minus bg-dark not-active" id="minus_<?php echo $cart['product_id']; ?>">-</span>

                          <?php } ?>

                        <input type="text" class="count" name="qty" id="quantity_<?php echo $cart['product_id']; ?>"  value="<?php echo $cart['quantity']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>"  max="<?php echo $product[0]['availability']  - $product[0]['inventory_hold'] ; ?>"  style="border: 0;width: 2%;">

                        <span class="plus bg-dark" id="plus_<?php echo $cart['product_id']; ?>">+</span>

                        

                         <input type="hidden" id="avaible_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['availability'] - $product[0]['inventory_hold'] ; ?>">

                         

                          <input type="hidden" id="min_qty_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['min_order_quan']; ?>">

                    </div>

                  

           <script>

     		$(document).ready(function(){

		    $('.count').prop('disabled', true);

		    

		  

		    

   			$(document).on('click','#plus_<?php echo $cart['product_id']; ?>',function(){

   			    

   			      var minimum = $('#min_qty_<?php echo $cart['product_id']; ?>').val() ;

		          var available = $('#avaible_<?php echo $cart['product_id']; ?>').val() ; 

   			    

   			      var id = '<?php echo $cart['product_id']; ?>' ;

   			      var qty = $("#quantity_"+id).val();

   			

   			    

   			  

   			    

				$('#quantity_<?php echo $cart['product_id']; ?>').val(parseInt($('#quantity_<?php echo $cart['product_id']; ?>').val()) + 1 );

				

            var id = '<?php echo $cart['product_id']; ?>' ;

            var urls=$("#url").val();

            var selling_price=$("#selling_price_"+id).val();

            var gst=$("#gst_"+id).val();

            var gstinc=$("#gstinc_"+id).val();

            //alert(selling_price);exit();

            var quantity=$("#quantity_"+id).val();

            

          $.ajax({

            type: "POST",

            url: urls+"Artnhub/addproduction",
          
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},

            cache: false,

            success: function(result){

                

            //  alert(result);

            location.reload();

              

                }

            });



    		});

        	$(document).on('click','#minus_<?php echo $cart['product_id']; ?>',function(){

        	    

        	    

   			      var minimum = $('#min_qty_<?php echo $cart['product_id']; ?>').val() ;

		          var available = $('#avaible_<?php echo $cart['product_id']; ?>').val() ; 

   			      var id = '<?php echo $cart['product_id']; ?>' ;

   			      var qty = $("#quantity_"+id).val();

   			

   			    

   			    if(Number(qty) <=Number(minimum) ){

   			     

   			     exit ;    

   			    }

   			       

        	    

    			$('#quantity_<?php echo $cart['product_id']; ?>').val(parseInt($('#quantity_<?php echo $cart['product_id']; ?>').val()) - 1 );

    				if ($('.count').val() == 0) {

						$('.count').val(1);

					}

	

            var id = '<?php echo $cart['product_id']; ?>' ;

        var urls=$("#url").val();

        var selling_price=$("#selling_price_"+id).val();

        var gst=$("#gst_"+id).val();

        var gstinc=$("#gstinc_"+id).val();

        //alert(selling_price);exit();

        var quantity=$("#quantity_"+id).val();

        

          $.ajax({

            type: "POST",

             url: urls+"Artnhub/addproduction",
          
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},

            cache: false,

            success: function(result){

                

            //  alert(result);

            

            location.reload();

              

                }

            });



     

    	    	});

    	    	

     	    	

 		});

                </script>       

                         

                    </td>

                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"> <?php  echo $cart_total = $cart['quantity'] * $Wp_price ;  ?></span>

                    </td>

          <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($cart_total*$product[0]['gst_per']/100 ,2);    $gst_one = round($cart_total*$product[0]['gst_per']/100,2) ; $gst_total+=$gst_one?>(<?php echo $product[0]['gst_per']; ?>%)</span></td>

    

    

                <?php 

                  

       $carttt= round($cart_total+$gst_one ,2);

     
    //   print_r($carttt) ;

        ?>

                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo $carttt ; ?></span></td>

                <?php    $total_amt+= $carttt ;
 ?>

                

                 

                    <td class="romove-item"><a href="#" title="cancel" class="icon"onclick="delusercart('<?php echo $cart['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>

                

                </tr>

        <?php

               

                 $finalvolume+=$volume;

                 $carttotal+=$carttt;

                 

            //    print_r($carttotal) ; 



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

                

                 $finalgst=  $gst_total; //$finalgst12+$finalgst22+$finalgst122+$finalgst123;

                     

                

                $_SESSION['allgst']=$allgst1+$allgst2;

                

                  $totalprice=$total_amt;

                  

                  $_SESSION['finalgst']= $finalgst;

                 

                 $disc=$cartprice-$discount_pricess;

                  

                   $onlyprice=$carttotal;

                 

                //   $_SESSION['totalprice']= $totalprice;

                   $_SESSION['discount']=$disc;

                    $_SESSION['subprice']=$onlyprice;

                 ?>

                 <input type="hidden" id="finalvolume" value="<?php echo $finalvolume; ?>">

                <?php 

               

                 } ?>

      </tbody><!-- /tbody -->

            

    </table><!-- /table -->

     <div class="row">

              <div class="col-md-offset-9 col-md-3" style="margin-top: 5px;">

            <div class="shopping-cart-btn">

            

                <a href="<?php echo base_url('login'); ?>" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>

              </div></div>

             

                </div>

                 <input type="hidden" id="totalprice" value="<?php echo $totalprice; ?>">

  </div>

</div><!-- /.shopping-cart-table -->



      </div><!-- /.shopping-cart -->

    </div>

        <div class="col-md-3 col-sm-12 estimate-ship-tax">

            <div class="row">

                <div class="col-md-12">

                    <div class="Courier-bg">

                        <div class="row">

                            <div class="col-md-9">

                                 <input type="text" class="form-control" maxlength="6" onkeypress="javascript:return isNumber(event)"  name="pincode" id="default_pincode" value ="<?php if($_SESSION['pincodeno']){ echo $_SESSION['pincodeno'] ;}else{ echo '201301';   } ?>" placeholder="Enter PinCode" required="">

                            </div>

                            <div class="col-md-3" style="margin-top: 5px;">
                              <button class="btn btn-primary" onclick="new_pin_check()" style="padding: 7px 10px 7px 10px;"> Check</button>
                            </div>

                        </div><br>

                       <h4>Courier type</h4>

                     

                            

                            <!-- <div class="radio">-->

                            <!--<label><input type="radio" name="optradio"  value="CourierByAir"  onchange="delivery();"  <?php if($_SESSION['delievry']=='CourierByAir'){ echo "checked"; } ?>><p> Courier By air Delivery</p></label>-->

                            <!--</div>-->

                              <div class="radio">

                            <label><input type="radio" name="optradio"  value="Transport" checked  onchange="delivery();"  <?php if($_SESSION['delievry']=='Transport'){ echo "checked"; } ?>><p> Transport Delivery</p></label>

                            </div>

                              <div class="radio">

                                <label><input type="radio"  value="self" name="optradio"  onchange="delivery();" <?php if($_SESSION['delievry']=='self'){ echo "checked";  $_SESSION['del_charge'] = 0 ; $_SESSION['packingprice'] =0 ; } ?> ><p> Self Pick from From our Factory</p></label>

                            </div>

                            

                             <div class="radio">

                            <label><input type="radio" name="optradio"  value="CourierByroad"   onchange="delivery();"  ><p> Courier By road Delivery</p></label>

                            </div>

                           



                            <span style="display: none; color: #295f2b " id="hideaddr">Factory Address-12/57, Sunrise Indl. Area,Site-2 Loni Road, Mohan Nagar, Ghaziabad -201007 India</span>

                    </div>

                </div>

                

                

                

                <div class="col-md-12">

            <div class="shopping-cart">

                <table class="table">

                    <thead>

                        <tr>

                            <td>



                               Sub-Total:&nbsp;<?php echo $sub_amt = round($onlyprice - $finalgst ,2); ?> &nbsp;RS<br/>

                               

                             

                   <?php    $cart_price =   $sub_amt ;

                   

                   if($sub_amt>4999 && $sub_amt < '11999' ){

                            

                            $order_processing = 500 ;

                            ?>

                             

                             Order Processing:&nbsp;<span id="order_processing">500 &nbsp;RS</span><br/>

                             <span style="color:red ;"> *Order Processing will be ZERO for order above 12000"</span><br/>

                             

                            <?php  }else{ 

                                

                                  if($cart_price>='40000' && $cart_price < '100000' ){

                            

                                    $total_discount  =   ($cart_price*3)/100 ; 

                                    

                                    $gst_dis = $finalgst*3/100 ;

                                    

                                    $final_discount = $total_discount  ;

                                    

                                      $_SESSION['tot_discount'] =  $final_discount;

                                      

                           ?>

                              <span style="color:red">Discount 3% :&nbsp; <span id=""><?php echo $dis_total =round($final_discount ,2); ?> &nbsp;RS</span></span>  <br/>    

                                

                         

                        <?php    } elseif($cart_price >='100000' ){

                            

                                    $total_discount  =   ($cart_price*5)/100 ; 

                                    

                                    $gst_dis = ($finalgst*5/100) ;

                                    

                                    $final_discount = $total_discount  ;

                                    

                                    

                                  $_SESSION['tot_discount'] =  $final_discount;

                                  

                            ?>

                                

                          <span style="color:red"> Discount 5% :&nbsp; <span id="" ><?php echo $dis_total =  round($final_discount ,2); ?> &nbsp;RS</span></span>  <br/>    

                                

                         

                        <?php  }

                            elseif($cart_price < 40000){

                                

                                $final_discount = 0 ;

                                $gst_dis = 0;

                                

                            }

                                



                                $order_processing = 0 ; }?>

                            

                            

                          <span id="transport_delivery"> Transport Charge:</span>

                          

                           <span id="shipping_delivery"> Shipping Charge: </span><span id="shipcharge"> 0 &nbsp;RS</span><br/>

                            Packing-charge:&nbsp;<span id="packingcharge">0 </span>&nbsp; RS<br/>

                            

            <span style="color:red ;" id="transport_deliverys" style="display : none ; "> Transport Dropping Charges are from our factory to Transporter office only & 

            further Transportation Charges would be Extra</span> <br>  

            

            

                      <?php       $over_all_gst =  $finalgst + $_SESSION['del_charge']*18/100 + $_SESSION['packingprice']*12/100 - $gst_dis  ?>

                      

                               GST-Total:&nbsp;<span id="over_all_gst"><?php echo  round($over_all_gst  ,2); ?></span>  &nbsp;RS<br/>

                               

               

                             <span></span>

                             

                             

                             <!--Coupon-Discount:&nbsp;<span id="coupondis"><?php if(empty($_SESSION['coupon'])){  ?>0<?php } else {  echo $_SESSION['coupon'];  } ?> &nbsp;RS</span><br/>-->

                               <!--Discount:&nbsp;<?php echo round($disc,2); ?> &nbsp;-->

                            </td>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>

                                Total:&nbsp;<span id="pricereplace"><?php  echo  $_SESSION['finalprice'] = round($sub_amt +$_SESSION['del_charge'] + $_SESSION['packingprice'] + $over_all_gst  - $dis_total ,2)   ; ?></span>&nbsp;RS

                              <div style="padding-top: 5%">

                                  <?php if($sub_amt>4999){ ?>

                                    <?php if(!empty($_SESSION['session_id'])){ ?>

                                    

                                      <a href="<?= base_url('checkout')?>"  class="btn btn-primary"> CHECKOUT</a>

                                      

                                     

                              <!--<button type="button" class="button wc-backward btn btn-primary mg-top-10" data-toggle="modal" data-target="#stock" style="width: 100%;">Submit For Stock Confirmation</button>-->

                            <?php }else{ ?>

                              <a href="<?php echo base_url('login'); ?>" >

                                  

                                      <a href="<?= base_url('checkout')?>"  class="btn btn-primary"> CHECKOUT</a>

                                      

                                  

                                   <!--<a href="#" data-toggle="modal" data-target="#login"  class="btn btn-primary" style="width: 100%;"> checkout Login</a>-->

                              <!--<button type="button" class="button wc-backward btn btn-primary mg-top-10" style="width: 100%;">Submit For Stock Confirmation</button></a>-->

                          <?php } ?>

                              <?php } else{ ?>

                                    <span style="color: red">Minimum Order Value is Rs 5000 ( Your Cart Price is Rs <?php echo round($sub_amt,2); ?> )</span>

                            

                            <?php   } ?>

                              </div>



                                

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

<!-- Modal-1-->

 <div class="modal fade" id="login" role="dialog">

        <div class="modal-dialog">

    

        <!-- Modal content-->

          <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h3 class="modal-title">Login</h3>

            </div>

            <div class="modal-body">

               <div class="row">

            

                    <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">

                            <?php  if($this->session->flashdata('login_msg')=="Invalid Credentials"){ ?>

                        <div class="row alert alert-danger" >

                            

                            <p>

                                May be You are not Registered with this  Email/ Phone  Please <a href="<?php  echo base_url('Artnhub/signup')?>" >Create a New Account </a>

                            </p>

                            

                        </div>

                        <?php } ?>

                        <div class="xs-customer-form-wraper">

                           

                           

            	<form class="register-form outer-top-xs" role="form">

		<div class="form-group" id="hideforget">

		    <label class="info-title" for="signemail">Email Address/Phone Number <span>*</span></label>

		    <input type="text" class="form-control unicase-form-control text-input" id="signemail" value="" required="">

		      	<div class="alert alert-danger signemail" style="display: none;">

  <strong>Email!</strong>Enter Valid Email or Phone Number.

</div>

		</div>

			<div class="form-group" style="display: none;" id="showforget">

		    <label class="info-title" for="signemail">Email Address/Phone Number <span>*</span></label>

		    <input type="text" class="form-control unicase-form-control text-input" id="foremail" value="" required="">

		      	<div class="alert alert-danger signemail" style="display: none;">

  <strong>Email!</strong>Enter Valid Email.

</div>

		</div>

	

		<div class="form-group" style="display: none;" id="foregetotp">

		    <label class="info-title" for="exampleInputEmail1">Enter OTP <span>*</span></label>

		    <input type="text" id="forgetotp" class="form-control unicase-form-control text-input">

			</div>

	  	<div class="form-group" id="forgetpass">

		    <label class="info-title" for="pass" >Password <span>*</span></label>

		    <input type="password" class="form-control unicase-form-control text-input" id="pass" required="">

		</div>



		<div class="radio outer-xs">

		  

		  	<span id="forpass">

		  	<a href="javascript:void(0);"  class="forgot-password pull-right" onclick="forgot();">Forgot your Password?</a>

			</span>

			<span id="resend" style="display: none;">

		  	<a href="javascript:void(0);"  class="forgot-password pull-right" onclick="sendforgototp();">Forgot?</a>

			</span>

			<span id="resendotp" style="display: none;">

		  	<a href="javascript:void(0);"  class="forgot-password pull-right" onclick="sendforgototp();">Resend OTP?</a>

			</span>

		</div>

		<span id="hidebtn">

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button example-p-1 login">Login</button>

	  	<span>Or<a href="<?php echo base_url('Artnhub/signup'); ?>">&nbsp;Signup</a></span>

	  	</span>

		 	<button type="button" id="showbtn" class="btn-upper btn btn-primary checkout-page-button" onclick="validationforget();"  style="display:none ;">Submit</button>

		 	

		 		<button type="button" class="btn-upper btn btn-primary checkout-page-button" id="backbtn"  style="display:none ;" onclick="backlogin();"  >back</button>

		 	

		<div id="forgot-password" class="collapse mg-t-6">

			<form>

			<div class="form-group">

		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>

		    <input type="email" class="form-control unicase-form-control text-input">

			</div>

			</form>

			</div>

	</form>	



                        </div><!-- .xs-customer-form-wraper END -->

                    </div>

                  

                </div>

            </div>

          </div>

      

      </div>

    </div>

    <div class="modal fade" id="stock" role="dialog">

        <div class="modal-dialog">

    

        <!-- Modal content-->

          <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h5 class="modal-title">Stock Confirmation</h5>

            </div>

            <div class="modal-body">

              <ul class="modal-list">

                <li>We will Inform You within 24hrs Regarding stock Availability and  Dispatch Date by Email, SMS or Phone Call.</li>

                <li>After our Confirmation you may proceed the Payment.</li>

              </p>

              </ul>

              <form action="<?php echo base_url('Artnhub/tokenmoney'); ?>" method="GET">

              <input type="text" class="form-control" name="tokenmoney" placeholder="Token Money"><br>

              <div class="text-center">

                <button type="Submit" class="btn btn-primary" >Submit</button>

              </div></form>

            </div>

          </div>

      

      </div>

    </div>



<?php } else { ?>

  <div class="body-content outer-top-xs" style="margin: 25px;">

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



<script>

    

    



       function backlogin(){

             

  $("#showforget").hide();

  

   

   $("#backbtn").hide(); 

   

   $("#foregetotp").hide();

  

  $("#resend").hide(); 

  

  $("#showbtn").hide();

  

  $("#hidebtn").show();

  $("#forgetpass").show();

  $("#hideforget").show();

  $("#forpass").show();

}      







// ======================new pincode check ===================



function new_pin_check(){

    

    



 var urls=$("#url").val();

  var pincodecheck = $("#default_pincode").val(); 

  

// alert(pincodecheck) ;

  

          



          $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/pincode_check",

                    data: {pincodecheck:pincodecheck,},

                    cache: false,

                    success: function(result){

                        

                        //   alert(result) ;

                         

                           var obj = JSON.parse(result);

                

                      if(obj.status==true){

                          

                        //   alert("pincode check");

                        

           var finalvolume=$("#finalvolume").val();

           

           var delievry=$("input[name='optradio']:checked").val();

           console.log(delievry);

                 var totalprice=$("#totalprice").val();

                 

                 var default_pincode = $("#default_pincode").val();

                 

          // alert(delievry);exit();

         // alert(finalvolume);exit();

        var urls=$("#url").val();

      //  alert(totalprice);exit();

        

          $.ajax({

            type: "POST",

            url: urls+"Artnhub/checkout",

            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice ,},

            cache: false,

            success: function(result){

                

                // alert(result) ;



              if(delievry=='self'){

               $("#hideaddr").show();

               

                $('#transport_delivery').hide();

                   $('#transport_deliverys').hide();

                     $('#shipping_delivery').show();

                   

                

              }

               else if (delievry=='Transport') {

                   

                   $('#transport_delivery').show();

                   $('#transport_deliverys').show();

                     $('#shipping_delivery').hide();

                   

                   

                   

               $("#hideaddr").hide();

               

                 }

              else{

               $("#hideaddr").hide();

               

                 $('#transport_delivery').hide();

                   $('#transport_deliverys').hide();

                     $('#shipping_delivery').show();

              



              }



             var obj = JSON.parse(result);

               $("#shipcharge").html(obj.charge);

              $("#pricereplace").html(obj.totalprice);

                $("#packingcharge").html(obj.packingprice);

                

                  $("#over_all_gst").html(obj.over_all_gst);

                

                

        //  location.reload();

              

                }

            });



    

                        

                        

                        

                          location.reload();

                          

                      }

        else{

          alert("Pincode Not Available ,Please Change Pincode");

          location.reload();

        }

              

                    }



                    });



    

    

}



//===================================





</script>

<script type="text/javascript">



     function delivery(){

           var finalvolume=$("#finalvolume").val();

           

           var delievry=$("input[name='optradio']:checked").val();

           console.log(delievry);

                 var totalprice=$("#totalprice").val();

                 

                 var default_pincode = $("#default_pincode").val();

                 

          // alert(delievry);exit();

         // alert(finalvolume);exit();

        var urls=$("#url").val();

      //  alert(totalprice);exit();

        

          $.ajax({

            type: "POST",

            url: urls+"Artnhub/checkout",

            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice ,},

            cache: false,

            success: function(result){

                

                // alert(result)



              if(delievry=='self'){

               $("#hideaddr").show();

               

                $('#transport_delivery').hide();

                   $('#transport_deliverys').hide();

                     $('#shipping_delivery').show();

                   

                

              }

               else if (delievry=='Transport') {

                   

                   $('#transport_delivery').show();

                   $('#transport_deliverys').show();

                     $('#shipping_delivery').hide();

                   

                   

                   

               $("#hideaddr").hide();

               

                 }

              else{

               $("#hideaddr").hide();

               

                 $('#transport_delivery').hide();

                   $('#transport_deliverys').hide();

                     $('#shipping_delivery').show();

              



              }



             var obj = JSON.parse(result);

             

            

               $("#shipcharge").html(obj.charge);

              $("#pricereplace").html(obj.totalprice);

                $("#packingcharge").html(obj.packingprice);

                

                  $("#over_all_gst").html(obj.over_all_gst);

                

                

        //  location.reload();

              

                }

            });



    }

  </script>

<script type="text/javascript">

function minmax(value, min, max) 

{

    if(parseInt(value) < min || isNaN(parseInt(value))) 

        return min; 

    else if(parseInt(value) > max) 

        return max; 

    else return value;

}



/*$(document).ready(function(){

 delivery()

});*/

window.onload = function() {

  delivery();

};

</script>

<script>

    $('#default_pincode').keydown(function (e){

    if(e.keyCode == 13){

       new_pin_check();

       e.preventDefault();

    }

})

function isNumber(evt) {

        var iKeyCode = (evt.which) ? evt.which : evt.keyCode

        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))

            return false;



        return true;

    }

</script>