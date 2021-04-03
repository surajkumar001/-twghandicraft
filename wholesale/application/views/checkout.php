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
	
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: none;
}
</style>
 <?php include 'navbar.php'; ?>


    <!-- ============================================== HEADER : END ============================================== -->
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
<?php if(empty($_SESSION['session_name'])){
   
   	  	unset($_SESSION['session_id']);
   	
 
}?>
    <!-- /.breadcrumb -->

    <div class="body-content" style="padding: 3% 0% 0% 0%;">
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
                                            login
											<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
                                        </a>										
                                    </h4>
                                </div>
                            <?php }else { ?>
                                 <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne">
                                            login
											<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
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
                                                <div class="col-md-12"><p>Please note that upon clicking "Logout" you will lose all items in cart and will be redirected to Artnhub home page.</p></div>
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
                                     
                                      <?php  if($this->session->flashdata('create_account')=="Invalid Credentials"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                                New Customer? <a href="<?= base_url('Artnhub/preRegistration') ; ?>" >Create an account</a>
                            </p>
                            
                        </div>
                        <?php } ?>
                        
                        <?php  if($this->session->flashdata('not_otp_verify')=="Invalid Credentials"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                               <a href="<?php  echo base_url('forgot')?>">Please Verify Your Mobile Number First !</a>
                            </p>
                            
                        </div>
                        <?php } ?>
                        
                        <?php  if($this->session->flashdata('not_admin_verify')=="Invalid Credentials"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                              Your Account is Under Verification We will notify you shortly or contact our Team 8383971129 
                            </p>
                            
                        </div>
                        <?php } ?>
                        
                        
                        <?php  if($this->session->flashdata('login_msg')=="Invalid Credentials"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                            INVALID LOGIN CREDENTIAL
                            </p>
                            
                        </div>
                        <?php } ?>
                        
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
                            <div class="form-group" id="forgetpass2" style="display:none">
                    		    <label class="info-title" for="pass" >New Password <span>*</span></label>
                    		    <input type="password" class="form-control unicase-form-control text-input" id="forgot_pass" required="">
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
                            	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button example-p-1 login" style="width: 25%;">Login</button>
                            	  	<span>Or <a class="btn btn-success btnwidth" href="<?= base_url('Artnhub/preRegistration') ; ?>" style="    width: 68%;">&nbsp;New Customer? Create an Account</a></span>
                            	  	</span>
                            		 	<button type="button" id="showbtn" class="btn-upper btn btn-primary checkout-page-button" onclick="validationforget();"  style="display:none ;width:20%;">Submit</button>
                            		 	
                            		 		<!--<button type="button" class="btn-upper btn btn-primary checkout-page-button" id="backbtn"  style="display:none ;width:20%;" onclick="backlogin();"  >back</button>-->
                            		 	
                            		<div id="forgot-password" class="collapse mg-t-6">
                            			<form>
                            			<div class="form-group">
                            		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            		    <input type="email" class="form-control unicase-form-control text-input">
                            			</div>
                            			</form>
                            			</div>
                            	</form>	
                                               <!-- <p class="text title-tag-line">Enter Email/Mobile Number</p>
                                               <input type="text" class="form-control"  id="signemail" placeholder="email/mobile"   style="width: 100%">
                                               <p class="text title-tag-line" style="padding-top: 2%;">Password</p>
                                               <input type="password" id="pass" class="form-control" placeholder="password"  style="width: 100%">
                                               
                                                <button type="button"  class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6  example-p-1 login" style="width:50%;">Login</button>-->
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
                                 
                                <?php    foreach ($_SESSION['cart'] as  $value) {  
                                  
                                     $id=$value['product_id'];
                                                 $where='sku_code';
                                                 $table='product_detail';
                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);
                                                 
                                   $volume=$product[0]['box_volume_weight']*$value['quantity'];
                                    $finalvolume+=$volume;
                                  }?>
                                
                                  <input type="hidden" id="cartvolume" value="<?php echo $finalvolume; ?>">
                                
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
						          Delivery Address
								  <p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
						        </a>
                                  <?php }else { ?>
                                     <a data-toggle="collapse" class="collapsed" data-parent="#accordion" >
										Delivery Address
										<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
									</a>
                                  <?php } ?>
						      </h4>
                                </div>
                                  <?php if(!empty($_SESSION['session_id'])){ ?>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                                                         
                                    <?php foreach($default_add as $value){
                                        
                                    ?>
                                    <div id="collapse2" class="panel panel-default box-1 box-color">
                                        <div class="panel-body box-body">
                                            <div class="row m-t-10"><br />
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <label>
                                                        <input type="radio"  name="optradios"  value="" id="optradios" onchange="pincodecheck('<?php echo $value['PinCode']; ?>')"
                                                            <?php if($value['PinCode']==$_SESSION['pincodeno']){ echo "checked"; } ?>>
                                                        <span class="tag-1 tag-color">Default </span>
                                                        <p> 
                                                            <?php echo $value['Owner']; ?>, +91<?php echo $value['phone']; ?>
                                                            <br>
                                                            <?php echo $value['Address']; ?>
                                                        </p>
                                                    </label>
                                                    <input type="hidden" id="pinocde" value="<?php echo $_SESSION['pincodeno']; ?>">
                                                </div>
                                        
                            <div class="col-md-3 col-sm-3 col-xs-3" style="padding: 10px;">
                                <div class="text-right">
                                    <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" ><i class="fa fa-pencil fa-color" aria-hidden="true"></i><span> Update </span></a>
                                                        <!--<a href="#"  onclick="deladdr('<?php echo $value['id']; ?>')"><i class="fa fa-trash fa-color" aria-hidden="true"></i>   <span>Delete</span></a>-->
                                </div>
                            </div>
                            <div id="collapse2_<?php echo $value['id']; ?>" class="panel-collapse collapse" style="width: 100%;">
                            <div class="panel-body">
                              
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                                <input type="text" class="form-control" id="names_<?php echo $value['id']; ?>" placeholder="Enter your name" value="<?php echo $value['Owner'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Pin Code">Pin Code</label>
                                               
                                                <input type="text" class="form-control" maxlength="6"  id="pins_<?php echo $_SESSION['session_id'] ; ?>"   placeholder="Enter your Pin Code" value="<?php echo $value['PinCode'] ?>">
                                         </div>
                                    </div>
                                    <div class="form-row">
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                            <textarea class="form-control" rows="3" id="addresss_<?php echo $value['id']; ?>" placeholder="Enter your Address"><?php echo $value['Address'] ?></textarea>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="City">City</label>
                                                <input type="text" class="form-control" id="citys_<?php echo $_SESSION['session_id']; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['city']; ?>">
                                                <!--<input type="text" class="form-control" id="state_<?php echo $_SESSION['session_id'] ; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['state']; ?>">-->
                                                
                                                
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="State">State</label>
                                            <input type="text" class="form-control" id="state_<?php echo $_SESSION['session_id'] ; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['state']; ?>">
                                                <!--<select class="form-control"  id="states_<?php echo $value['id']; ?>">
                                                                
                                                                    <option value="Andaman & Nicobar Islands" <?php if($value['state']=='Andaman & Nicobar Islands'){ echo "selected"; } ?>>Andaman &amp; Nicobar Islands</option>
                                                                    <option value="Andhra Pradesh" <?php if($value['state']=='Andhra Pradesh'){ echo "selected"; } ?>>Andhra Pradesh</option>
                                                                    <option value="Arunachal Pradesh" <?php if($value['state']=="Arunachal Pradesh"){ echo "selected"; } ?>>Arunachal Pradesh</option>
                                                                    <option value="Assam" <?php if($value['state']=="Assam"){ echo "selected"; } ?>>Assam</option>
                                                                    <option value="Bihar" <?php if($value['state']=="Bihar"){ echo "selected"; } ?>>Bihar</option>
                                                                    <option value="Chandigarh" <?php if($value['state']=="Chandigarh"){ echo "selected"; } ?>>Chandigarh</option>
                                                                    <option value="Chhattisgarh" <?php if($value['state']=="Chhattisgarh"){ echo "selected"; } ?>>Chhattisgarh</option>
                                                                    <option value="Dadra & Nagar Haveli" <?php if($value['state']=="Dadra & Nagar Haveli"){ echo "selected"; } ?>>Dadra &amp; Nagar Haveli</option>
                                                                    <option value="Daman and Diu" <?php if($value['state']=="Daman and Diu"){ echo "selected"; } ?>>Daman and Diu</option>
                                                                    <option value="Delhi" <?php if($value['state']=="Delhi"){ echo "selected"; } ?>>Delhi</option>
                                                                    <option value="Goa" <?php if($value['state']=="Goa"){ echo "selected"; } ?>>Goa</option>
                                                                    <option value="Gujarat" <?php if($value['state']=="Gujarat"){ echo "selected"; } ?>>Gujarat</option>
                                                                    <option value="Haryana" <?php if($value['state']=="Haryana"){ echo "selected"; } ?>>Haryana</option>
                                                                    <option value="Himachal Pradesh" <?php if($value['state']=="Himachal Pradesh"){ echo "selected"; } ?>>Himachal Pradesh</option>
                                                                    <option value="Jammu & Kashmir" <?php if($value['state']=="Jammu & Kashmir"){ echo "selected"; } ?>>Jammu &amp; Kashmir</option>
                                                                    <option value="Jharkhand" <?php if($value['state']=="Jharkhand"){ echo "selected"; } ?>>Jharkhand</option>
                                                                    <option value="Karnataka" <?php if($value['state']=="Karnataka"){ echo "selected"; } ?>>Karnataka</option>
                                                                    <option value="Kerala" <?php if($value['state']=="Kerala"){ echo "selected"; } ?>>Kerala</option>
                                                                    <option value="Lakshadweep" <?php if($value['state']=="Lakshadweep"){ echo "selected"; } ?>>Lakshadweep</option>
                                                                    <option value="Madhya Pradesh" <?php if($value['state']=="Madhya Pradesh"){ echo "selected"; } ?>>Madhya Pradesh</option>
                                                                    <option value="Maharashtra" <?php if($value['state']=="Maharashtra"){ echo "selected"; } ?>>Maharashtra</option>
                                                                    <option value="Manipur" <?php if($value['state']=="Manipur"){ echo "selected"; } ?>>Manipur</option>
                                                                    <option value="Meghalaya" <?php if($value['state']=="Meghalaya"){ echo "selected"; } ?>>Meghalaya</option>
                                                                    <option value="Mizoram" <?php if($value['state']=="Mizoram"){ echo "selected"; } ?>>Mizoram</option>
                                                                    <option value="Nagaland" <?php if($value['state']=="Nagaland"){ echo "selected"; } ?>>Nagaland</option>
                                                                    <option value="Odisha" <?php if($value['state']=="Odisha"){ echo "selected"; } ?>>Odisha</option>
                                                                    <option value="Puducherry" <?php if($value['state']=="Puducherry"){ echo "selected"; } ?>>Puducherry</option>
                                                                    <option value="Punjab" <?php if($value['state']=="Punjab"){ echo "selected"; } ?>>Punjab</option>
                                                                    <option value="Rajasthan" <?php if($value['state']=="Rajasthan"){ echo "selected"; } ?>>Rajasthan</option>
                                                                    <option value="Sikkim" <?php if($value['state']=="Sikkim"){ echo "selected"; } ?>>Sikkim</option>
                                                                    <option value="Tamil Nadu" <?php if($value['state']=="Tamil Nadu"){ echo "selected"; } ?>>Tamil Nadu</option>
                                                                    <option value="Telangana" <?php if($value['state']=="Telangana"){ echo "selected"; } ?>>Telangana</option>
                                                                    <option value="Tripura" <?php if($value['state']=="Tripura"){ echo "selected"; } ?>>Tripura</option>
                                                                    <option value="Uttarakhand" <?php if($value['state']=="Uttarakhand"){ echo "selected"; } ?>>Uttarakhand</option>
                                                                    <option value="Uttar Pradesh" <?php if($value['state']=="UTTAR PRADESH"){ echo "selected"; } ?>>Uttar Pradesh</option>
                                                                    <option value="West Bengal" <?php if($value['state']=="West Bengal"){ echo "selected"; } ?>>West Bengal</option>
                                                </select>-->
                                        </div>
                                    </div>

                                    <div class="form-row">
                                  
                                        <!--<div class="side-width">-->
                                        <!--    <label>Address Type</label>-->
                                        <!--    <br>-->
                                        <!--        <label class="radio-inline">-->
                                        <!--            <input type="radio" name="optradio"  id="optradios_<?php echo $value['id']; ?>" value="home" <?php if($value['delievry']=="home"){ echo "checked"; } ?>>Home-->
                                        <!--        </label>-->

                                        <!--        <label class="radio-inline">-->
                                        <!--            <input type="radio" name="optradio"  id="optradios_<?php echo $value['id']; ?>" value="work" <?php if($value['delievry']=="work"){ echo "checked"; } ?>>Work-->
                                        <!--        </label>-->
                                        <!--</div>-->
                                    </div>
                                    <input type="hidden" id="addrid_<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-color-1 " onclick="default_add('<?php echo $value['id']; ?>')">Update</button>
                                        <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" class="btn btn-color-1">Cancel</a>
                                    </div>
                                                  
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                  <?php } ?>
                                    <!------Address Detail -->
                                    
                                     <?php foreach ($message as  $value) {
                                        
                                        
                                    ?>
                                    <div id="collapse2" class="panel panel-default box-1 box-color">
                                        <div class="panel-body box-body">
                                          
                                            <div class="row m-t-10"><br />
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    
                                                     <label><input type="radio" name="optradios"  value="<?php echo  $value['id'];  ?>" id="optradios" onchange="pincodecheck('<?php echo $value['pincode']; ?>')"
                                                     <?php if($value['pincode']==$_SESSION['pincodeno']){ echo "checked"; } ?>>
                                                       <span class=" tag-1 tag-color">Home</span>
                                                    <p><strong><?php echo $value['name']; ?><span class="mg-left-2">+91 <?php echo $value['mobile']; ?></span></strong></p>
                                                    <p><?php echo $value['address']; ?></p></label>
                                                    <input type="hidden" id="pinocde" value="<?php echo $_SESSION['pincodeno']; ?>">
                                                </div>
                                                
                                
                                                
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="text-right">
                                            <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" ><i class="fa fa-pencil fa-color" aria-hidden="true"></i><span> Edit | </span></a>
                                            <a href="#"  onclick="deladdr('<?php echo $value['id']; ?>')"><i class="fa fa-trash fa-color" aria-hidden="true"></i>   <span>Delete</span></a>
                                        </div>
                                    </div>
                                                    <div id="collapse2_<?php echo $value['id']; ?>" class="panel-collapse collapse" style="    width: 100%;">
                            <div class="panel-body">
                              
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                                <input type="text" class="form-control" id="names_<?php echo $value['id']; ?>" placeholder="Enter your name" value="<?php echo $value['name'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Phone Number</label>
                                                <input type="text" class="form-control" maxlength="10" onkeypress="javascript:return isNumber(event)" id="mobiles_<?php echo $value['id']; ?>" placeholder="Enter your Phone Number" value="<?php echo $value['mobile'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Pin Code">Pin Code</label>
                                                <input type="text" class="form-control pins_<?php echo $value['id']; ?>" id="pins_<?php echo $value['id']; ?>"  value= "<?php echo $value['pincode']; ?>" maxlength="6" name="PinCode"    placeholder="Enter Your Pin Code" required="">
                                             
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Locality</label>
                                                <input type="text" class="form-control"  id="localitys_<?php echo $value['id']; ?>" placeholder="Enter your Locality"  value="<?php echo $value['locality'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                            <textarea class="form-control" rows="3" id="addresss_<?php echo $value['id']; ?>" placeholder="Enter your Address"><?php echo $value['address'] ?></textarea>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="City">City</label>
                                                <input type="text" class="form-control" id="city_<?php echo $value['id']; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['city']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="State">State</label>
                                               <input type="text" class="form-control" id="state_<?php echo $value['id']; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['state']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Landmark">Landmark</label>
                                                <input type="text" class="form-control" id="landmarks_<?php echo $value['id']; ?>" placeholder="Enter your Landmark" value="<?php echo $value['landmark']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Alternate Phone">Alternate Phone</label>
                                                <input type="text" maxlength="10" onkeypress="javascript:return isNumber(event)" class="form-control" id="alternates_<?php echo $value['id']; ?>" placeholder="Enter your Alternate Phone(optional)" value="<?php echo $value['alternate']; ?>">
                                        </div>

                                        <!--<div class="side-width">
                                            <label>Address Type</label>
                                            <br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio"  id="optradios_<?php echo $value['id']; ?>" value="home" <?php if($value['delievry']=="home"){ echo "checked"; } ?>>Home
                                                </label>

                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio"  id="optradios_<?php echo $value['id']; ?>" value="work" <?php if($value['delievry']=="work"){ echo "checked"; } ?>>Work
                                                </label>
                                        </div>-->
                                    </div>
                                    <input type="hidden" id="addrid" value="<?php echo $value['id']; ?>">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-color-1 " onclick="updateaddr('<?php echo $value['id']; ?>')" style="width:10%;">Update</button>
                                        <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" class="btn btn-color-1" style="width:10%;">Cancel</a>
                                    </div>
                                                  
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                  <?php } ?>
                                    <!-----end Address detail--->
                                      
                                        <div class="box-warning">
											<div data-toggle="modal" data-target="#new-address"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;  <span>Add New Address</span></div>
										</div>
                                         <!--<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2">
                                  New Address</a>-->
                                    </div>
                                    <?php if(!empty($_SESSION['pincodeno'])){ ?>
                                     
                                    <button type="button" class="btn-upper btn btn-primary checkout-page-button checkout-continue collapsed "  data-toggle="collapse"data-parent="#accordion" href="#collapseThree" style="margin: 10px;">Deliver Here</button>
                                  
                                <?php } ?>
                                </div>
                                <?php } else { ?>
                                     <div id="collapseTwo" class="panel-collapse collapse ">
                                    <div class="panel-body">
										<div class="box-warning">
											<div data-toggle="modal" data-target="#new-address"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;  <span>Add New Address</span></div>
										</div>
                                        
                                         <!--<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2">
                                  New Address</a>-->
                                    </div>
                                </div>
                                <?php } ?>
                              

                            </div>
                            <!-- checkout-step-02  -->
                       
                                    
                            <!-- checkout-step-03  -->
                            <div class="panel panel-default checkout-step-03">
                            	<?php if(empty($_SESSION['session_id'])){ ?>
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#">
						       		order summary
									<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
						        </a>
						      </h4>
                                </div>
                            <?php } else { ?>
                            	 <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		order summary
									<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
						        </a>
						      </h4>
                                </div>
                            <?php } ?>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       
                                         <div class="row">
                                             <div class="col-md-12">
                                             <div class="shopping-cart">
        <div class="shopping-cart-table" style="margin-bottom: 0px;">
                     <div class="table-responsive">
                          <table class="table">
                   <thead>
        <tr class="hdn">
          
          <th class="cart-description item">Image</th>
          <th class="cart-product-name item">SKU Code</th>
          <th class="cart-qty item">Quantity</th>
          <th class="cart-total last-item">Price</th>
               <th>Discount Price </th>   
        </tr>
      </thead><!-- /thead -->
      <tbody>
           <?php
        //=======Order detail database===========                              
                                        $id=$order[0]['order_id'];
                                        
                                         $where='order_rand_id';
                                         $table='order_detail';
                                         
                                         
                                         $fullcart=$this->Model->select_common_where($table,$where,$id);
                                         
                                          	$user_id = $_SESSION['session_id'] ;
 
		
		    $user_detail   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
 		$discount_per = $user_detail->discount_per ; 
 		
 		
	
                                             foreach ($data as  $value) {
                        
                                         $total_price_new+= $value['cart_price'] ;
                                         
                                         	$dis_price  = $value['price']*($discount_per/100) ;
	                                           $net_price = $value['price'] - $dis_price ; 
                                             $befor_dis_sub_total+=  $net_price*$value['quantity'];
                                                
                                                
                                         
                                             }
                                   	$a = 1 ;
                            $percent_amount = array();
                            $discount = array() ;
                              $per_item_dicount = array() ; 
                                
                                    $i = 1 ;

                                         foreach ($data as $cart) {
                                             
                                             
                                                  
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
                                                 
                                                    	$dis_price  = $product[0]['selling_price']*($discount_per/100) ;
	                                           $price = $product[0]['selling_price'] - $dis_price ; 
                                     
                                          //==================== % ratio =====                                
                                  
                                  
                                  $item_price =  $price *$cart['quantity'] ;
                                  
                                  if($befor_dis_sub_total >= '40000'   && $befor_dis_sub_total < '100000'  ){
                                      
                                     
                                        $befor_dis_sub_total ;
                                       
                                            $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                           
                                             $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                            $per_item_dicount[$a] = $discount[$a] / $cart['quantity'] ;
                                          
                                  } elseif($befor_dis_sub_total >= '100000' ){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                            $per_item_dicount[$a] = $discount[$a] / $cart['quantity'] ;
                                          
                                  }
                                  else{
                                      
                                      $per_item_dicount[$a] = 0 ; 
                                  }
                                  
                                    $gst_amt =    round($item_price*$product[0]['gst_per']/100 ,2);
                                        
                                                 $sub_total+= ($price*$cart['quantity']) + $gst_amt;
                                                 $sub_amount+= ($price*$cart['quantity']);
                                                 $gst_total+= $gst_amt ;
                                                 $volume=$product[0]['box_volume_weight']*$cart['quantity'];
                                                  
                                             ?>
                                                         <tr>
                                                            <td class="cart-image" style="width: 50px;height: 50px;">
                                                               
                <img src="<?php echo base_url('assets/product/'.$product[0]['main_image1'])   ?>" alt="" >
          
                                                            </td> 
                                                           
                                                                 <td class="cart-product-name-info text-center">
            <h4 class='cart-product-description'><?php echo $product[0]['sku_code']; ?></h4>
             <input type="hidden" id="pro_id" value="<?php echo $product[0]['sku_code']; ?>">
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $cart['quantity'] ; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="product-color font"><i class="fa fa-inr"></i> <span><?php echo $price; ?></span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="product-color font"><i class="fa fa-inr"></i> <span><?php echo round($price -  $per_item_dicount[$a],2) ; ?></span>
                                                            </td>
                                                      </tr>
                                                       <?php 
                                       $finalvolume+=$volume;
                                       
                                       $a++;
                                       $i++ ; 
                                     
                                       
                                 } ?>
                                    <input type="hidden" id="cartvolume" value="<?php echo $finalvolume; ?>">
                                                       </tbody><!-- /tbody -->
            
                                                </table><!-- /table -->
                                                </div>
                                                </div>
                                                 </div>
                                                 </div>
  
                                    
                                         
                                         </div>
                                    

                                        
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            
                                            <div class="col-md-3 text-right">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue collapsed" style="width: 100%;" data-toggle="collapse"  data-parent="#accordion" href="#collapseFour">Continue</button></div>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                            <!-- checkout-step-03  -->

                            <!-- checkout-step-04  -->
                            <div class="panel panel-default checkout-step-04">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                            <?php if(!empty($_SESSION['session_id'])){ ?>
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	payment Options
									<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
						        </a>
                            <?php } else { ?>
                                <a data-toggle="collapse" class="collapsed" data-parent="#accordion">
									payment Options
									<p class="pull-right" style="margin:0;"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></p>
                                </a>
                            <?php } ?>
						      </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label><input type="radio" name="credit" value="atm" id="cod" onchange="cod();"  ><p>Bank Transfer / Cash Deposit (In Company Account)</p></label>
                                        </div>
                                        
                                        <div class="radio">
                                            <label><input type="radio" name="credit" value="atm" onchange="paytm();" ><p>Payment online With PayTm</p></label>
                                        </div>
                                      
                                          <div class="text2" style="display : none ;">
                  
                  <h5>Choose One Method </h5>
                  
                  <div class="radio">
                        <label><input type="radio" name="credits" onchange="online_pay();"><p>25% payment (<i class="fa fa-inr"></i> <?php echo round(($_SESSION['totalprice'])/4,2) ?> )</p></label>
                    </div>
                    
                    <div class="radio">
                        <label><input type="radio" name="credits" onchange="onlinepay();"><p>100% payment (<i class="fa fa-inr"></i> <?php echo round(($_SESSION['totalprice']),2) ?>)</p></label>
                    </div>
                              </div>  
                                  
                    <button type="button" class="button wc-backward btn btn-primary mg-top-10" id="paytm2" data-toggle="modal" data-target="#stock" style="display: none ; width: 100%;">Submit For Stock Confirmation</button>
                                        <?php 

                                        $id=$order[0]['order_id'];
                                         $where='order_rand_id';
                                         $table='order_detail';
                                         $fullcart=$this->Model->select_common_where($table,$where,$id);

                                         foreach ($fullcart as $value) {
                                         
                                        $id=$value['product_id'];
                        			$where='sku_code';
                        			$table='product';
                        			$cod=$this->Model->select_common_where($table,$where,$id);
                                      if(empty($cod)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $cod=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }

			 if(empty($cart['discount_price'])){
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
		
			
	
		if($var=='true'){
			 ?>
			 <input type="hidden" id="codprice" value="<?php echo $order[0]['finalamount']; ?>"> 
                                        
                                    <?php } ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                             <form action="<?php echo base_url('Artnhub/tokenmoney'); ?>" method="GET">
                                        
                                          <input type="hidden" name="tokenmoney" id="Advance" required>   
                                        
                                        <button type="submit" class="btn btn-upper btn-primary" style="width: 50%;">Place Order</button>
                                        
                                    </form>   </div>     
                                 <!--<a  href="<?= base_url('Artnhub/placeorder') ;?>" class="btn btn-upper btn-primary pull-right outer-right-xs">Place Order offline</a>-->
                                     <div class="col-md-6">
                                <!--<a href="javascript:void(0)" onclick="placeorder();" class="btn btn-upper btn-primary pull-right outer-right-xs" style="width: 50%;">Place Order Offline</a>-->
                                
                                </div></div>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-04  -->
                        </div>
                        <!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
<div class="Courier-bg">
    <div class="panel-group ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="unicase-checkout-title">Price Details</h4>
            </div>
            
              <div clas="row">
                    <div class="col-md-12">
                   
                    
                             <div class="radio">
                            <label><input type="radio" name="optradio"  value="<?= $_SESSION['delievry'] ;?>" checked  onchange="delivery();"  <?php if($_SESSION['delievry']=='CourierByroad'){ echo "checked"; } ?>><p> <?= $_SESSION['delievry'] ?></p></label>
                            </div>
                           
            
                            <span style="display: none; color: #295f2b " id="hideaddr">Factory Address-12/57, Sunrise Indl. Area,Site-2 Loni Road, Mohan Nagar, Ghaziabad -201007 India</span>
                    
                </div>
                </div>
            <div class="">
                
              
                <div class="row">
                    <input type="hidden" id="total_gst" value="<?php if($_SESSION['session_id']){echo $gst_total ;}else{echo $_SESSION['finalgst'] ;       } ?>">
                    
                    <div class="col-md-6" >
                        <p>Sub-Total :</p>
                    </div>
                    <div class="col-md-6 text-right">
                      <i class="fa fa-inr"></i>
                        
                        <span id="subtotal"><?php if($_SESSION['session_id']){ echo $cart_value = $sub_total - $gst_total ; }else{ $sub_total =  $_SESSION['subprice'];  echo $cart_value =  $_SESSION['subprice'] -$_SESSION['finalgst'] ; } ?> </span>
                    </div>
                </div>
                  <?php if($cart_value>4999 && $cart_value < '11999' ){
                            
                           $order_processing = 500 ;
                            
                        $order_processing_gst = 90 ;
                          
                            ?>
                 <div class="row">
                    <div class="col-md-6">
                        <p>  Order Processing :</p>
                    </div> 
                    <div class="col-md-6 text-right">
                      (+) <i class="fa fa-inr"></i>
                            <span id="discountcharge">500 &nbsp; </span><br>
                            
                    </div>
                </div>
                <div class="row"> <span style="color:red ;"> *Order Processing will be ZERO for order above 12000"</span></div>
                             
                            <?php  }else{ 
                                
                                 $order_processing = 0 ;
                                 $order_processing_gst = 0 ; 
                            
                            if($cart_value>='40000' &&$cart_value< '100000' ){
                            
                                    $total_discount  =   ($cart_value*3)/100 ; 
                                    
                                    $gst_dis = $gst_total*3/100 ;
                                    
                                    $final_discount = $total_discount  ;
                                    
                                    $_SESSION['tot_discount'] =  $final_discount;
 
                            ?>
                                
          
             
                <div class="row" style="color:red">
                    <div class="col-md-6">
                        <p>  Total Discount 3% :&nbsp;</p>
                    </div>
                    <div class="col-md-6 text-right">
                       (-) <i class="fa fa-inr"></i>
                            <span id="discountcharge" style="color:red"><?php echo $dis_total =round($final_discount ,2); ?></span>
                             
                    </div>
                </div>                 
                         
                        <?php    } elseif($cart_value < '40000'){
			    
                    			    	 $dis_total  = 0 ;
                    			    $gst_dis = 0 ;
                    			    
                    			}else{
                            
                                    $total_discount  =   ($cart_value*5)/100 ; 
                                    
                                      $gst_dis = $gst_total*5/100 ;
                                    
                                    $final_discount = $total_discount  ;
                                    
                                    $_SESSION['tot_discount'] =  $final_discount;
                                
                            ?>
                                
                          <div class="row">
                    <div class="col-md-6">
                        <p>  Total Discount 5% :&nbsp;</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa fa-inr"></i>
                            <span id="discountcharge" style="color:red">(-)<?php echo $dis_total =round($final_discount ,2); ?></span>
                             
                    </div>
                </div>             
                         
                        <?php    }
                        } 
                    			
             
                     $_SESSION['order_processing'] =  $order_processing ;
                     
                     
                   
                    			?>
                
                
          
                <div class="row">
                    <div class="col-md-6">
                        <p>Shipping-charge :</p>
                    </div>
                    <div class="col-md-6 text-right">
					(+)	<i class="fa fa-inr"></i>
                        <span id="shipcharges"><?php echo $shipcharge = round(($_SESSION['del_charge']),2); ?></span>
                    </div>
                </div>
                
               
               
                <!--<div class="row">-->
                <!--    <div class="col-md-6">-->
                <!--        <p>GST</p>-->
                <!--    </div>-->
                <!--    <div class="col-md-6 text-right">-->
                <!--        <i class="fa fa-inr"></i>-->
                <!--        <span> <?php echo round($order[0]['gst_total']); ?> </span></span>-->
                <!--    </div>-->
                <!--</div>-->
				<div class="row">
                    <div class="col-md-6">
                        <p>Packing-charge :</p>
                    </div>
                    <div class="col-md-6 text-right">
                        (+) <i class="fa fa-inr"></i>
                            <span id="packingprice"><?php echo $packingprice =round(($_SESSION['packingprice']),2) ; ?></span>
                    </div>
                </div>
            
              <?php       $over_all_gst =  $gst_total + $_SESSION['del_charge']*18/100 + $_SESSION['packingprice']*12/100 + $order_processing_gst ?>
              
             <div class="row">
                    <div class="col-md-6">
                        <p>GST-Total :</p>
                    </div>
                    <div class="col-md-6 text-right">
                       (+)  <i class="fa fa-inr"></i>
                        
                        <span id="Gsttotal"><?php if($_SESSION['session_id']){ echo round($over_all_gst - $gst_dis, 2); }else{ echo  round($_SESSION['finalgst'] + $_SESSION['del_charge']*18/100 + $_SESSION['packingprice']*12/100 -$_SESSION['gst_dis'] ,2)  ; } ?> </span>
                    </div>
                </div>
               
            <div>
            <div class="box-footer">
                <div class="row">
                    
                    <div class="col-md-6">
                        <p>Final :</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <i class="fa fa-inr"></i>
                        
                            
                            <!--<span id="pricereplaces"><?php echo  $_SESSION['totalprice'] = round( $sub_total+round($shipcharge*118/100,2)+round($packingprice*112/100,2)+$order_processing - $dis_total - $gst_dis  ,2 );  ?></span>-->
                             <span id="pricereplaces">Loading ..</span>
                    </div>
                </div>
            </div>
			<input type="hidden" id="totalprice" value="<?php if($_SESSION['session_id']){ echo $sub_total ; }else{ echo $_SESSION['subprice'] ; } ?>">
			<input type="hidden" id="delievry" value="<?php  echo $_SESSION['delievry']; ?>">
			<input type="hidden" id="finalvolume" value="<?php  echo $_SESSION['finalvolume'];  ?>">
            </div>
            </div>
        </div>
    </div>
</div>	

<div id="new-address" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        <h4 class="modal-title">Add Shipping Address</h4>
      </div>
      <div class="modal-body">
            
                                       <div class="panel-body">
                                         <h4>New Address</h4>
                                       <div class="row">

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" maxlength="10" onkeypress="javascript:return isNumber(event)" id="mobile" placeholder="10-digit-Mobile Number" maxlength="10" required>
                                        </div>
                                         <div class="col-md-6 pdtp3">
                                            <!--<input type="text" class="form-control" id="pin" placeholder="Pincode" value="<?php  echo $_SESSION['pincodeno'];  ?>" onchange="pincodenew()" required>-->
                                            
                                             <input type="text" class="form-control" id="Pincode" maxlength="6" name="PinCode"   onkeypress="javascript:return isNumber(event)" placeholder="Enter Your Pin Code" required="">
                                             
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="locality" placeholder="Locality">
                                        </div>
                                        <div class="col-md-12 pdtp3">
                                           <textarea class="form-control" id="address" rows="4" placeholder="Address(Area and Street)"></textarea>
                                        </div>
                                          <div class="col-md-6 pdtp3">
                                             
                                            <input type="text" class="form-control" id="city" placeholder="City" value="<?php echo $address[0]->Division;  ?>">
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                             
                                            <input type="text" class="form-control" placeholder="State" id="State"value="<?php echo $address[0]->State;  ?>">
                                        </div>
                                          <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="landmark" placeholder="Landmark(Optional)">
                                        </div>
                                        <div class="col-md-6 pdtp3">
                                            <input type="text" class="form-control" id="alternate" placeholder="Alternate Phone(Optional)">
                                        </div>
                                       
                                        <!--<div class="col-md-6 pdtp3">-->
                                             
                                        <!--    <label><input type="radio" name="types" id="optradio" value="home"><span>&nbsp;&nbsp;Home(All Day Delivery)</span></label>-->
                                        
                                        <!--</div>-->
                                        <!-- <div class="col-md-6 pdtp3">-->
                                             
                                        <!--    <label><input type="radio" name="types" id="optradio" value="work"><span>&nbsp;&nbsp;Work(Delivery between 10AM-5PM)</span></label>-->
                                        
                                        <!--</div>-->
                                        <div class="col-md-4 pdtp3">
                                             <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6 example-p-1 save" style="width: 100%;">Save and Deliver Here</button>
                                        </div>
                                       
                                       </div>
            
      </div>
    </div>

  </div>
</div>

					
           <!-- <div class="shopping-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <td>

                               Sub-Total:&nbsp;<span id="subtotal"><?php echo round($_SESSION['subprice'],2); ?> </span>&nbsp;RS<br/>
                            Shipping-charge:&nbsp;<span id="shipcharges"><?php echo round($_SESSION['del_charge']); ?></span> &nbsp;RS<br/>
                               COD-charge:&nbsp;<span id="codcharges"><?php  echo $_SESSION['codprice']; ?> </span>&nbsp;RS<br/>
                            
                               GST:&nbsp;<span ><?php  echo $_SESSION['allgst']; ?> </span>&nbsp;RS<br/>

                             Coupon-Discount:&nbsp;<span id="coupon"><?php if(empty($_SESSION['coupon'])){  ?>0<?php } else {  echo $_SESSION['coupon'];  } ?> </span>&nbsp;RS<br/>
                               Discount:&nbsp;<span id="discountcharge"><?php echo round($_SESSION['discount']); ?></span> &nbsp;
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Total:&nbsp;<span id="pricereplaces"><?php  if(empty($_SESSION['couponapplyprice'])){ echo $_SESSION['totalprice']; }else { echo $_SESSION['couponapplyprice'];  }  ?></span> &nbsp; (Include all Taxes & Discount)
                           
                            </td>
                           
                        	  <input type="hidden" id="totalprice" value="<?php  echo $_SESSION['subprice']+$_SESSION['finalgst']; ?>">
                       
                          <input type="hidden" id="delievry" value="<?php  echo $_SESSION['delievry']; ?>">
                          <input type="hidden" id="finalvolume" value="<?php  echo $_SESSION['finalvolume']; ?>">
                        </tr>
                    </tbody>
                </table>
            </div> -->
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.checkout-box -->
        </div>
        <!-- /.container -->

    </div>
    
    
    <!-- Modal-1-->
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
               
                <li>After our Confirmation you may proceed the Payment.</li>
              </p>
              </ul>
           
            
            
              <div class="text">
                  
                  <h5>choose One Method </h5>
                  
                  <div class="radio">
                        <label><input type="radio" name="credit" id="radio_btn" value="<?php echo round(($_SESSION['totalprice'])/4,2) ?>" checked><p>25% payment (<i class="fa fa-inr"></i> <?php echo round(($_SESSION['totalprice'])/4,2) ?> )</p></label>
                    </div>
                    
                    <div class="radio">
                        <label><input type="radio" name="credit" id="radio_btn"  value="<?php echo round(($_SESSION['totalprice']),2) ?>" ><p>100% payment (<i class="fa fa-inr"></i> <?php echo round(($_SESSION['totalprice']),2) ?>)</p></label>
                    </div>
                                       
                <button type="Submit" class="btn btn-primary" >Submit</button>
              </div>
            </div>
          </div>
      
      </div>
    </div>
    
    <!-- /.body-content -->
  <?php  include('footer.php'); ?>
  

  
<script type="text/javascript">
  $(document).ready(function(){
    var codprice = $("#pricereplaces").html();
  var urls = $("#url").val();

    if(codprice==''){
      //  window.location.href = urls;
    }
 
});



function paytm(){
    
    $(".text2").show() ;
    $(".text3").hide() ;
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}
function cod(){
    $(".text2").hide() ;
    $(".text3").show() ;
    
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}

function online_pay(){
    
   $("#Advance").val(1) ; 
    
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}
function onlinepay(){
    
   $("#Advance").val(2) ; 
    
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}



 $("#pins_<?php echo $_SESSION['session_id'] ; ?>").keyup(function(){
        
        
  var pincode  = $("#pins_<?php echo $_SESSION['session_id'] ; ?>").val();
  
    var urls = $("#url").val();
 
  
     $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/fetchbypincode",

                    data: {pincode:pincode  },

                    cache: false,

                    success: function(result){
                        
                        
                      
                      if(result){
                          
                          var data = JSON.parse(result);
                         
                          $("#citys_<?php echo $_SESSION['session_id'] ; ?>").val(data.post_office);
                         
                            $("#state_<?php echo $_SESSION['session_id'] ; ?>").val(data.state);
                         
                      }
                        
                    }

                    });
                
  
});






</script>
<script>
      document.getElementById("cod").onclick = function () {
        location.href = "<?php echo base_url('uploadslip'); ?>";
    };
</script>

    <?php foreach ($message as  $value) {
                                        
                                        
                                    ?>
   <script>
                                        
                         
 $(".pins_<?php echo $value['id']; ?>").keyup(function(){
        
        
      
  var pincode  = $("#pins_<?php echo $value['id']; ?>").val();
  
    var urls = $("#url").val();
 
  
     $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/fetchbypincode",

                    data: {pincode:pincode  },

                    cache: false,

                    success: function(result){
                        
                        
                      
                      if(result){
                          
                          var data = JSON.parse(result);
                         
                          $("#city_<?php echo $value['id']; ?>").val(data.post_office);
                         
                            $("#state_<?php echo $value['id']; ?>").val(data.state);
                         
                      }
                        
                    }

                    });
                
  
});
   </script>

  <?php  }  ?>
  


<script type="text/javascript">

    	$(document).ready(function(){
           var finalvolume=$("#cartvolume").val();
           
            var delievry=$("input[name='optradio']:checked").val();
           console.log(delievry);
                 var totalprice=$("#totalprice").val();
                 
                 var totalgst = $("#total_gst").val();
        //   alert(totalgst);
        //  alert(finalvolume);exit();
        var urls=$("#url").val();
      //  alert(totalprice);exit();
        
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/checkout_afterlogin",
            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice , gst_total:totalgst},
            cache: false,
            success: function(result){
    
    //  alert(result) ; 
                
              if(delievry=='self'){
               $("#hideaddr").show();
               
                $('#transport_delivery').hide();
                   
                     $('#shipping_delivery').show();
                   
                
              }
               else if (delievry=='Transport') {
                   
                   $('#transport_delivery').show();
                   
                     $('#shipping_delivery').hide();
                   
                   
                   
               $("#hideaddr").hide();
               
                 }
              else{
               $("#hideaddr").hide();
               
                 $('#transport_delivery').hide();
                   
                     $('#shipping_delivery').show();
              

              }

             var obj = JSON.parse(result);
             
            // alert(result) ;
             
               $("#shipcharges").html(obj.charge);
               $("#pricereplaces").html(obj.totalprice);
                $("#packingprice").html(obj.packingprice);
                  $("#Gsttotal").html(obj.over_all_gst);
                
        //  location.reload();
              
                }
            });
            
            document.getElementById('radio_btn').checked = false;

    	});
  </script> 