<?php 
//pr($_SESSION);die;
include 'headcss.php';
include 'header.php';
?>
<style type="text/css">
    .pdtp3{
        padding-top: 3%;
    }
    .pdtp5{
            padding-top: 5%;
    font-size: 18px;
    }
    #subDiv {
   cursor: pointer;
    }
</style>
 <?php include 'navbar.php'; ?>


    <!-- ============================================== HEADER : END ============================================== -->
    
    <!-- /.breadcrumb -->
     <div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <?php if(empty($_SESSION['session_id'])){ ?>
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>login
                                        </a>
                                    </h4>
                                </div>
                            <?php }else { ?>
                                 <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>login
                                        </a>
                                    </h4>
                                </div>
                            <?php } ?>
                                <!-- panel-heading -->
                                   <?php if(!empty($_SESSION['session_id'])){ ?>
                                   <div id="collapseOne" class="panel-collapse collapse ">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">
                                             
                                            <!-- guest-login -->
                                             <div class="col-md-6 col-sm-6 guest-login">
                                                <p class="text title-tag-line">Name: <span><?php echo $_SESSION['session_name']; ?></span></p>
                                                <p class="text title-tag-line">Email: <span><?php echo $_SESSION['session_email']; ?></span></p>

                                             

                                            
                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Continue Checkout</button>
                                            </div>
                                             
                                        
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 mg-t-2">
                                                <h4 class="checkout-subtitle">Advantages of our Secure login</h4>
                                                <ul class="text instruction mg-bt-3">
                                                    <li><i class="fa fa-truck fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Easily Track Orders, Hassle free Returns</span></li>
                                                    <li><i class="fa fa-bell fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Get Relevant Alerts and Recommendation</span></li>

                                                    <li><i class="fa fa-star fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Wishlist, Reviews, Ratings and more.</span></li>
                                                </ul>
                                            </div>
                                            <!-- already-registered-login -->
                                           <div class="row" style="margin-top: 3%;">
                                                <div class="col-md-12"><p>Please note that upon clicking "Logout" you will lose all items in cart and will be redirected to Flipkart home page.</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div>
                                <!-- row --><?php }else { ?>
                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">
                                           
                                             <div class="col-md-6 col-sm-6 guest-login">
                                                <p class="text title-tag-line">Enter Email/Mobile Number</p>
                                               <input type="text" class="form-control"  id="signemail" onchange="signmail();" value="gurisingh077@gmail.com" style="width: 100%">
                                               <p class="text title-tag-line" style="padding-top: 2%;">Password</p>
                                               <input type="password" id="pass" class="form-control" value="123456"style="width: 100%">
                                               
                                                <button type="button"  class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6  example-p-1 login">Login</button>
                                            </div>
                                       
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 mg-t-2">
                                                <h4 class="checkout-subtitle">Advantages of our Secure login</h4>
                                                <ul class="text instruction mg-bt-3">
                                                    <li><i class="fa fa-truck fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Easily Track Orders, Hassle free Returns</span></li>
                                                    <li><i class="fa fa-bell fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Get Relevant Alerts and Recommendation</span></li>

                                                    <li><i class="fa fa-star fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Wishlist, Reviews, Ratings and more.</span></li>
                                                </ul>
                                            </div>
                                            <!-- already-registered-login -->
                                          
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div>
                            <?php } ?>
                                <!-- row -->
                            </div>
                            
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                          <?php if(!empty($_SESSION['session_id'])){ ?>
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Delivery Address
						        </a>
                                  <?php }else { ?>
                                     <a data-toggle="collapse" class="collapsed" data-parent="#accordion" >
                                  <span>2</span>Delivery Address
                                </a>
                                  <?php } ?>
						      </h4>
                                </div>
                                  <?php if(!empty($_SESSION['session_id'])){ ?>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php foreach ($message as $values) {
                                           ?>
                                        <div class="radio">
                                            <label><input type="radio" name="optradios"  value="<?php echo  $values['id'];  ?>" onchange="pincodecheck('<?php echo $values['pincode']; ?>')" <?php if($values['pincode']==$_SESSION['pincodeno']){ echo "checked"; } ?>><span><?php echo $values['name']; ?></span> <span>+91 <?php echo $values['mobile']; ?></span> <br /> <span><?php echo $values['address']; ?></span></label>
                                            <input type="hidden" id="pinocde" value="<?php echo $_SESSION['pincodeno']; ?>">
                                        </div>
                                    <?php } ?>
                                        
                                         <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2">
                                  New Address</a>
                                    </div>
                                </div>
                                <?php } else { ?>
                                     <div id="collapseTwo" class="panel-collapse collapse ">
                                    <div class="panel-body">

                                        
                                         <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2">
                                  New Address</a>
                                    </div>
                                </div>
                                <?php } ?>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                         <h4>New Address</h4>
                                       <div class="row">

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="mobile" placeholder="10-digit-Mobile Number">
                                        </div>
                                         <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="pin" placeholder="Pincode" value="<?php  echo $_SESSION['pincodeno'];  ?>" onchange="pincodenew()">
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="locality" placeholder="Locality">
                                        </div>
                                        <div class="col-md-12 pdtp3">
                                           <textarea class="form-control" id="address" rows="4" placeholder="Address(Area and Street)"></textarea>
                                        </div>
                                          <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="city" value="<?php echo $address[0]->Division;  ?>">
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="state"value="<?php echo $address[0]->State;  ?>">
                                        </div>
                                          <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="landmark" placeholder="Landmark(Optional)">
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="alternate" placeholder="Alternate Phone(Optional)">
                                        </div>
                                       
                                        <div class="col-md-6 pdtp3">
                                             
                                            <label><input type="radio" id="optradio" value="home"><span>&nbsp;&nbsp;Home(All Day Delivery)</span></label>
                                        
                                        </div>
                                         <div class="col-md-6 pdtp3">
                                             
                                            <label><input type="radio" id="optradio" value="work"><span>&nbsp;&nbsp;Work(Delivery between 10AM-5PM)</span></label>
                                        
                                        </div>
                                        <div class="col-md-4 pdtp3">
                                             <button type="button" class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6 example-p-1 save" >Save and Deliver Here</button>
                                        </div>
                                        <div class="col-md-6 pdtp5">
                                            <a href="#">Cancel</a>
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-02  -->

                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                            	<?php if(empty($_SESSION['session_id'])){ ?>
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#">
						       		<span>3</span>order summary
						        </a>
						      </h4>
                                </div>
                            <?php } else { ?>
                            	 <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>3</span>order summary
						        </a>
						      </h4>
                                </div>
                            <?php } ?>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php
                                        $id=$_SESSION['session_id'];
                                         $where='user_id';
                                         $table='cart';
                                         $fullcart=$this->Model->select_common_where($table,$where,$id);
                                         foreach ($fullcart as $cart) {
                                             $id=$cart['product_id'];

                                                 $where='id';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);

                                                 
                                                  $volume=$product[0]['box_volume_weight']*$cart['quantity'];
                                          
                                             ?>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <a class="entry-thumbnail" href="#">
                                                    <img src="<?php echo $product[0]['main_image1']; ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-md-5" style="margin-top:2%;">
                                                <h4 class='cart-product-description'><?php echo $product[0]['pro_name']; ?></h4>
                                                <div class="cart-product-info">
                                                    <span class="product-color">COLOR:<span> <?php echo $product[0]['color']; ?></span></span><br />

                                                    <span class="product-color font"><i class="fa fa-inr"></i> <span><?php echo $product[0]['selling_price']; ?></span></span>
                                                </div>
                                            </div>

                                          <!--   <div class="col-md-3" style="margin-top:3%;">
                                                <span>Free delivery by Sun, Apr 22</span><br />
                                                <span class="">GST : <span>5%</span></span><br />

                                                <span>Shipping Cost : <span><i class="fa fa-inr"></i>15</span></span>
                                            </div> -->
                                            <div class="col-md-1">
                                            <div class="text-center" style="margin-top:40%;"><a href="javascript:void(0)" onclick="delusercart('<?php echo $cart['product_id']; ?>');" title="cancel" class="icon"><i class="fa fa-trash-o fa-lg"></i></a></div></div>
                                         </div>
                                     <?php 
                                       $finalvolume+=$volume;
                                 } ?>
                                    <input type="hidden" id="cartvolume" value="<?php echo $finalvolume; ?>">

                                        
                                    </div>
                                   <!--  <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-9 text-left" style="margin-top: 2%;font-size: 16px;">
                                                <span>Order confirmation email will be sent to <span class="label label-default">webentic.sanjeev@gmail.com</span></span>
                                            </div>
                                            <div class="col-md-3 text-right">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue " style="margin-top: 6%;">Continue</button></div>
                                    </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- checkout-step-03  -->

                            <!-- checkout-step-04  -->
                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                            <?php if(!empty($_SESSION['session_id'])){ ?>
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	<span>4</span>payment Options

						        </a>
                            <?php } else { ?>
                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion">
                                    <span>4</span>payment Options

                                </a>
                            <?php } ?>
						      </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label><input type="radio" name="credit" value="atm" onchange="cod();"  <?php if($_SESSION['cod']=='atm'){ echo "checked"; } ?>><p>Credit/ Debit/ ATM Card</p></label>
                                        </div>
                                        <?php 

                                   

                                         foreach ($_SESSION['buynow'] as $value) {
                                         
                                        $id=$value['product_id'];
			$where='id';
			$table='product';
			$cod=$this->Model->select_common_where($table,$where,$id);
			 if(empty($value['discount_price'])){
                                                 $totalprice+=$value['cart_price'];
                                                   }
                                                  else{ 
                                                    $totalprice+=$value['discount_price']; 
                                                  } 
			
			if($cod[0]['cod']=='0'){
			$var= "false";
			}else{
				$var='true';
			}

		}
		if(empty($_SESSION['couponapplyprice'])){
			$price=$_SESSION['totalprice'];
		}else{
			$price=$_SESSION['couponapplyprice'];
		}
		if($var=='true'){
			 ?>
			 <input type="hidden" id="codprice" value="<?php echo $price; ?>">
                                        <div class="radio">
                                            <label><input type="radio" name="credit" value="cod"  onchange="cod();" <?php if($_SESSION['cod']=='cod'){ echo "checked"; } ?>><p>Cash on Delivery</p></label>
                                        </div>
                                    <?php } ?>
                                        <div style="padding-top: 5%">

                                <a href="javascript:void(0)" onclick="placeorder();" class="btn btn-upper btn-primary pull-right outer-right-xs">Place Order </a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-04  -->
                        </div>
                        <!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                             <div class="shopping-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <td>

                               Sub-Total:&nbsp;<span id="subtotal"><?php echo round($_SESSION['subprice']); ?> </span>&nbsp;RS<br/>
                            Shipping-charge:&nbsp;<span id="shipcharges"><?php echo round($_SESSION['del_charge']); ?></span> &nbsp;RS<br/>
                             COD-charge:&nbsp;<span id="codcharges"><?php  echo $_SESSION['codprice']; ?> </span>&nbsp;RS<br/>
                               GST:&nbsp;<span ><?php  echo $_SESSION['finalgst']; ?> </span>&nbsp;RS<br/>
                             Coupon-Discount:&nbsp;<span id="coupon"><?php if(empty($_SESSION['coupon'])){  ?>0<?php } else {  echo $_SESSION['coupon'];  } ?> </span>&nbsp;RS<br/>
                               Discount:&nbsp;<span id="discountcharge"><?php echo round($_SESSION['discount']); ?></span> &nbsp;
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Total:&nbsp;<span id="pricereplaces"><?php  if(empty($_SESSION['couponapplyprice'])){ echo $_SESSION['totalprice']; }else { echo $_SESSION['couponapplyprice'];  }  ?></span> &nbsp;RS
                           
                            </td>
                           
                        	  <input type="hidden" id="totalprice" value="<?php  echo $_SESSION['subprice']+$_SESSION['finalgst']; ?>">
                       
                          <input type="hidden" id="delievry" value="<?php  echo $_SESSION['delievry']; ?>">
                          <input type="hidden" id="finalvolume" value="<?php  echo $_SESSION['finalvolume']; ?>">
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.checkout-box -->
        </div>
        <!-- /.container -->

    </div>
    <!-- /.body-content -->
  <?php  include('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    var codprice = $("#pricereplaces").html();
  var urls = $("#url").val();

    if(codprice==''){
        window.location.href = urls+'/Artnhub';
    }
 
});
</script>