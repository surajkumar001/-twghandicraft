<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
                                      
<!-- ============================================== Header : END ============================================== -->	
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Address</li>
            </ol>
        </nav>
    </div>
</div>

<!-- /.breadcrumb -->
<section class="home-bg-color">
    <div class="container-fluid">
        <div class="row" style="padding: 3% 0% 3% 0%;">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-name pd-set">
                            <img src="<?php echo base_url(); ?>assets/assets/images/d-2.png" class="img-size-2">
                            <span class="text-center" style="font-size: 18px;"><?php echo $_SESSION['session_name']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="section-border">
                        <ul class="user-link">
                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('orders'); ?>"><i class="fa fa-file-text fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Order</span></a></li>

                            <li class="border-bt-1 font-19"><i class="fa fa-user fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account Settings</span>
                                <ul class="pd-2">
                                    <li><a href="<?php echo base_url('profile'); ?>">Dealer Information</a></li>
                                    <li><a href="<?php echo base_url('manage_address'); ?>">Manage Address</a></li>
                                </ul>
                            </li>

                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('my_ledger'); ?>"><i class="fa fa-credit-card-alt fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account History</span></a></li>

                            <li class="border-bt-1 font-19 current-pg"><a href="<?php echo base_url('wishlist'); ?>"><i class="fa fa-heart fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Wishlist</span></a></li>

                            <li class="border-bt-1 font-19 active"><a href=""><i class="fa fa-bell fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Notification</span></a></li>

                            <li class="pd-2 font-19"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Logout</span></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="side-border">
                    <h2 style="margin: 0;margin-bottom: 10px;">Manage Addresses:</h2>
                        
                <div class="panel-group box-group">
                    <div class="panel panel-default box-1 box-color">
                        <div class="panel-heading box-name">
                            <a data-toggle="collapse" href="#collapse1">
                                <h4 class="panel-title box-title">
                                    <i class="fa fa-plus-circle fa-color" aria-hidden="true"></i><span class="mg-left-2">Add a new Address</span>
                                </h4>
                            </a>
                        </div>

                        <div id="collapse1" class="panel-collapse collapse">
                            <form method="POST">
                          	           <div class="panel-body">
                                        
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="name" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" maxlength="10" onkeypress="javascript:return isNumber(event)" id="mobile" placeholder="10-digit-Mobile Number" maxlength="10" required>
                                        </div>
                                          <div class="form-group col-md-6">
                                            <!--<input type="text" class="form-control" id="pin" placeholder="Pincode" value="<?php  echo $_SESSION['pincodeno'];  ?>" onchange="pincodenew()" required>-->
                                            
                                             <input type="text" class="form-control" id="Pincode" maxlength="6" name="PinCode"   onkeypress="javascript:return isNumber(event)" placeholder="Enter Your Pin Code" required="">
                                             
                                        </div>
                                       <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="locality" placeholder="Locality" required>
                                        </div>
                                         <div class="form-group col-md-12">
                                           <textarea class="form-control" id="address" rows="4" placeholder="Address(Area and Street)" required></textarea>
                                        </div>
                                          <div class="form-group col-md-6">
                                             
                                            <input type="text" class="form-control" id="city" placeholder="City" value="<?php echo $address[0]->Division;  ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                             
                                            <input type="text" class="form-control" placeholder="State" id="State"value="<?php echo $address[0]->State;  ?>">
                                        </div>
                                           <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="landmark" placeholder="Landmark(Optional)">
                                        </div>
                                         <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="alternate" placeholder="Alternate Phone(Optional)">
                                        </div>
                                       
                                        <!--<div class="col-md-6 pdtp3">-->
                                             
                                        <!--    <label><input type="radio" name="types" id="optradio" value="home"><span>&nbsp;&nbsp;Home(All Day Delivery)</span></label>-->
                                        
                                        <!--</div>-->
                                        <!-- <div class="col-md-6 pdtp3">-->
                                             
                                        <!--    <label><input type="radio" name="types" id="optradio" value="work"><span>&nbsp;&nbsp;Work(Delivery between 10AM-5PM)</span></label>-->
                                        
                                        <!--</div>-->
                                         <div class="form-group col-md-6">
                                             <button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue mg-t-6 example-p-1 save" id="newAddress" style="width: 100%;">Add New Address</button>
                                        </div>
                                       
                                       </div>
            
      </div>
								</form>
							</div>
						</div>
					</div>
					
					  <?php foreach ($default_add as  $value) {
                                        
                                    ?>
                                    <div id="collapse2" class="panel panel-default box-1 box-color">
                                        <div class="panel-body box-body">
                                          
                                            <div class="row m-t-10"><br />
                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <span class=" tag-1 tag-color">Default </span>
                                                        <p><strong><?php echo $value['Owner']; ?> | <span>+91-<?php echo $value['phone']; ?></span></strong></p>
                                                        <p><?php echo $value['Address']; ?></p>
                                                    
                                                    <input type="hidden" id="pinocde" value="<?php echo $_SESSION['pincodeno']; ?>">
                                                </div>
                                        
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <div class="text-right">
                                                        <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" ><i class="fa fa-pencil fa-color" aria-hidden="true"></i><span> Update</span></a>
                                                        <!--<a href="#"  onclick="deladdr('<?php echo $value['id']; ?>')"><i class="fa fa-trash fa-color" aria-hidden="true"></i>   <span>Delete</span></a>-->
                                                    </div>
                                                </div>
                                                    <div id="collapse2_<?php echo $value['id']; ?>" class="panel-collapse collapse" style="    width: 100%;">
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
                                      <div class="panel panel-default box-1 box-color">
                                    <?php foreach ($addr as  $value) {
                                        
                                    ?>
                                
                                        <div class="panel-body box-body">
                                            <span class=" tag-1 tag-color"><?php echo $value['delievry']; ?></span>
                                            <div class="row m-t-10"><br />
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <p><strong><?php echo $value['name']; ?><span class="mg-left-2">+91 <?php echo $value['mobile']; ?></span></strong></p>
                                                    <p><?php echo $value['address']; ?></p>
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
                                                <input type="text" class="form-control pins_<?php echo $value['id']; ?>" maxlength="6" onkeypress="javascript:return isNumber(event)" id="pins_<?php echo $value['id']; ?>"  placeholder="Enter your Pin Code" value="<?php echo $value['pincode'] ?>">
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

                                                <!--<select class="form-control"  id="states_<?php echo $value['id']; ?>">-->
                                                                
                                                <!--                    <option value="Andaman & Nicobar Islands" <?php if($value['state']=='Andaman & Nicobar Islands'){ echo "selected"; } ?>>Andaman &amp; Nicobar Islands</option>-->
                                                <!--                    <option value="Andhra Pradesh" <?php if($value['state']=='Andhra Pradesh'){ echo "selected"; } ?>>Andhra Pradesh</option>-->
                                                <!--                    <option value="Arunachal Pradesh" <?php if($value['state']=="Arunachal Pradesh"){ echo "selected"; } ?>>Arunachal Pradesh</option>-->
                                                <!--                    <option value="Assam" <?php if($value['state']=="Assam"){ echo "selected"; } ?>>Assam</option>-->
                                                <!--                    <option value="Bihar" <?php if($value['state']=="Bihar"){ echo "selected"; } ?>>Bihar</option>-->
                                                <!--                    <option value="Chandigarh" <?php if($value['state']=="Chandigarh"){ echo "selected"; } ?>>Chandigarh</option>-->
                                                <!--                    <option value="Chhattisgarh" <?php if($value['state']=="Chhattisgarh"){ echo "selected"; } ?>>Chhattisgarh</option>-->
                                                <!--                    <option value="Dadra & Nagar Haveli" <?php if($value['state']=="Dadra & Nagar Haveli"){ echo "selected"; } ?>>Dadra &amp; Nagar Haveli</option>-->
                                                <!--                    <option value="Daman and Diu" <?php if($value['state']=="Daman and Diu"){ echo "selected"; } ?>>Daman and Diu</option>-->
                                                <!--                    <option value="Delhi" <?php if($value['state']=="Delhi"){ echo "selected"; } ?>>Delhi</option>-->
                                                <!--                    <option value="Goa" <?php if($value['state']=="Goa"){ echo "selected"; } ?>>Goa</option>-->
                                                <!--                    <option value="Gujarat" <?php if($value['state']=="Gujarat"){ echo "selected"; } ?>>Gujarat</option>-->
                                                <!--                    <option value="Haryana" <?php if($value['state']=="Haryana"){ echo "selected"; } ?>>Haryana</option>-->
                                                <!--                    <option value="Himachal Pradesh" <?php if($value['state']=="Himachal Pradesh"){ echo "selected"; } ?>>Himachal Pradesh</option>-->
                                                <!--                    <option value="Jammu & Kashmir" <?php if($value['state']=="Jammu & Kashmir"){ echo "selected"; } ?>>Jammu &amp; Kashmir</option>-->
                                                <!--                    <option value="Jharkhand" <?php if($value['state']=="Jharkhand"){ echo "selected"; } ?>>Jharkhand</option>-->
                                                <!--                    <option value="Karnataka" <?php if($value['state']=="Karnataka"){ echo "selected"; } ?>>Karnataka</option>-->
                                                <!--                    <option value="Kerala" <?php if($value['state']=="Kerala"){ echo "selected"; } ?>>Kerala</option>-->
                                                <!--                    <option value="Lakshadweep" <?php if($value['state']=="Lakshadweep"){ echo "selected"; } ?>>Lakshadweep</option>-->
                                                <!--                    <option value="Madhya Pradesh" <?php if($value['state']=="Madhya Pradesh"){ echo "selected"; } ?>>Madhya Pradesh</option>-->
                                                <!--                    <option value="Maharashtra" <?php if($value['state']=="Maharashtra"){ echo "selected"; } ?>>Maharashtra</option>-->
                                                <!--                    <option value="Manipur" <?php if($value['state']=="Manipur"){ echo "selected"; } ?>>Manipur</option>-->
                                                <!--                    <option value="Meghalaya" <?php if($value['state']=="Meghalaya"){ echo "selected"; } ?>>Meghalaya</option>-->
                                                <!--                    <option value="Mizoram" <?php if($value['state']=="Mizoram"){ echo "selected"; } ?>>Mizoram</option>-->
                                                <!--                    <option value="Nagaland" <?php if($value['state']=="Nagaland"){ echo "selected"; } ?>>Nagaland</option>-->
                                                <!--                    <option value="Odisha" <?php if($value['state']=="Odisha"){ echo "selected"; } ?>>Odisha</option>-->
                                                <!--                    <option value="Puducherry" <?php if($value['state']=="Puducherry"){ echo "selected"; } ?>>Puducherry</option>-->
                                                <!--                    <option value="Punjab" <?php if($value['state']=="Punjab"){ echo "selected"; } ?>>Punjab</option>-->
                                                <!--                    <option value="Rajasthan" <?php if($value['state']=="Rajasthan"){ echo "selected"; } ?>>Rajasthan</option>-->
                                                <!--                    <option value="Sikkim" <?php if($value['state']=="Sikkim"){ echo "selected"; } ?>>Sikkim</option>-->
                                                <!--                    <option value="Tamil Nadu" <?php if($value['state']=="Tamil Nadu"){ echo "selected"; } ?>>Tamil Nadu</option>-->
                                                <!--                    <option value="Telangana" <?php if($value['state']=="Telangana"){ echo "selected"; } ?>>Telangana</option>-->
                                                <!--                    <option value="Tripura" <?php if($value['state']=="Tripura"){ echo "selected"; } ?>>Tripura</option>-->
                                                <!--                    <option value="Uttarakhand" <?php if($value['state']=="Uttarakhand"){ echo "selected"; } ?>>Uttarakhand</option>-->
                                                <!--                    <option value="Uttar Pradesh" <?php if($value['state']=="Uttar Pradesh"){ echo "selected"; } ?>>Uttar Pradesh</option>-->
                                                <!--                    <option value="West Bengal" <?php if($value['state']=="West Bengal"){ echo "selected"; } ?>>West Bengal</option>-->
                                                <!--</select>-->
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
                                 
                                  <?php } ?>
                                     </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!--<div class="body-content outer-top-xs">
  <div class='container-fluid  mg-bt-4'>
    <div class='row'>
   <div class='col-md-3 sidebar'> 

        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <div class="sidebar-widget wow fadeInUp pd-set">
              <p><img src="<?php echo base_url(); ?>assets/assets/images/d-2.png" class="img-size-2" /> <span class="text-center" style="font-size:18px;"> <?php echo $_SESSION['session_name']; ?></span></p>  
            </div>
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                <div class="sidebar-widget-body">
                    <ul class="list">
                        <li class="border-bt-1 font-19"><a href="<?php echo base_url('Artnhub/orders'); ?>"><i class="fa fa-file-text fa-fw fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2"> My Order</span></a></li>

                        <li class="border-bt-1 font-19"><a href="#"><i class="fa fa-user fa-fw fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Account Settings</span></a>
                            <ul class="pd-2">
                                <li class="active"><a href="<?php echo base_url('Artnhub/profile'); ?>">Profile Information</a></li>
                                <li><a href="<?php echo base_url('Artnhub/manage_address'); ?>">Manage Address</a></li>
                            </ul>
                        </li>

                        <li class="border-bt-1 font-19"><a href="my-profile"><i class="fa fa-credit-card-alt fa-fw fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Wallet</span></a></li>

                        <li class="border-bt-1 font-19"><a href="<?php echo base_url('Artnhub/wishlist'); ?>"><i class="fa fa-heart fa-fw fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">My Wishlist</span></a></li>

                        <li class="pd-2 font-19"><a href="<?php echo base_url('Artnhub/logout'); ?>"><i class="fa fa-sign-out fa-fw fa-lg fa-color" aria-hidden="true"></i> <span class="mg-left-2">Logout</span></a></li>
                    </ul>
                </div>
            </div>
            
          </div>

        </div>

      </div>

      <div class='col-md-9 wow fadeInUp'> 
     
        <div class="clearfix filters-container">
            <h3>Manage Addresses:</h3>

                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" href="#collapse1">
                                <h4 class="panel-title">
                                    <i class="fa fa-plus-circle fa-color" aria-hidden="true"></i><span class="mg-left-2">Add a new Address</span>
                                </h4>
                            </a>
                        </div>

                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                              
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Phone Number</label>
                                                <input type="Number" class="form-control" id="mobile" placeholder="Enter your Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Pin Code">Pin Code</label>
                                                <input type="text" class="form-control"  id="pin"  placeholder="Enter your Pin Code">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Locality</label>
                                                <input type="text" class="form-control"  id="locality" placeholder="Enter your Locality" >
                                        </div>
                                    </div>
                                    <div class="form-group side-width">
                                        <label for="address">Address</label>
                                            <textarea class="form-control" rows="3" id="address" placeholder="Enter your Address"></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="City">City</label>
                                                <input type="text" class="form-control" id="city" placeholder="Enter your City/District/town">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="State">State</label>
                                                <select class="form-control"  id="state">
                                                                    <option value="" disabled="">--Select State--</option>
                                                                    <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                    <option value="Assam">Assam</option>
                                                                    <option value="Bihar">Bihar</option>
                                                                    <option value="Chandigarh">Chandigarh</option>
                                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                                    <option value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
                                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                                    <option value="Delhi">Delhi</option>
                                                                    <option value="Goa">Goa</option>
                                                                    <option value="Gujarat">Gujarat</option>
                                                                    <option value="Haryana">Haryana</option>
                                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                    <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                                                    <option value="Jharkhand">Jharkhand</option>
                                                                    <option value="Karnataka">Karnataka</option>
                                                                    <option value="Kerala">Kerala</option>
                                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                                    <option value="Maharashtra">Maharashtra</option>
                                                                    <option value="Manipur">Manipur</option>
                                                                    <option value="Meghalaya">Meghalaya</option>
                                                                    <option value="Mizoram">Mizoram</option>
                                                                    <option value="Nagaland">Nagaland</option>
                                                                    <option value="Odisha">Odisha</option>
                                                                    <option value="Puducherry">Puducherry</option>
                                                                    <option value="Punjab">Punjab</option>
                                                                    <option value="Rajasthan">Rajasthan</option>
                                                                    <option value="Sikkim">Sikkim</option>
                                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                                    <option value="Telangana">Telangana</option>
                                                                    <option value="Tripura">Tripura</option>
                                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                    <option value="West Bengal">West Bengal</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Landmark">Landmark</label>
                                                <input type="text" class="form-control" id="landmark" placeholder="Enter your Landmark">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Alternate Phone">Alternate Phone</label>
                                                <input type="text" class="form-control" id="alternate" placeholder="Enter your Alternate Phone(optional)">
                                        </div>

                                        <div class="side-width">
                                            <label>Address Type</label>
                                            <br>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="optradio" value="home">Home
                                                </label>

                                                <label class="radio-inline">
                                                    <input type="radio"  id="optradio" value="work">Work
                                                </label>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-color-1  example-p-1 save" >Save</button>
                                        <a data-toggle="collapse" href="#collapse1" class="btn btn-color-1">Cancel</a>
                                    </div>
                                                  
								</div>
							</div>
						</div>
					</div>
                                    <?php foreach ($addr as  $value) {
                                        
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <span class="label label-default"><?php echo $value['delievry']; ?></span>
                                            <div class="row m-t-10"><br />
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <p><strong><?php echo $value['name']; ?><span class="mg-left-2">+91 <?php echo $value['mobile']; ?></span></strong></p>
                                                    <p><?php echo $value['address']; ?></p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <div class="text-right">
                                                        <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" ><i class="fa fa-pencil fa-color" aria-hidden="true"></i><span> Edit | </span></a>
                                                        <a href="#"  onclick="deladdr('<?php echo $value['id']; ?>')"><i class="fa fa-trash fa-color" aria-hidden="true"></i>   <span>Delete</span></a>
                                                    </div>
                                                </div>
                                                    <div id="collapse2_<?php echo $value['id']; ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                              
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                                <input type="text" class="form-control" id="names_<?php echo $value['id']; ?>" placeholder="Enter your name" value="<?php echo $value['name'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Phone Number</label>
                                                <input type="Number" class="form-control" id="mobiles_<?php echo $value['id']; ?>" placeholder="Enter your Phone Number" value="<?php echo $value['mobile'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Pin Code">Pin Code</label>
                                                <input type="text" class="form-control"  id="pins_<?php echo $value['id']; ?>"  placeholder="Enter your Pin Code" value="<?php echo $value['pincode'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone-number">Locality</label>
                                                <input type="text" class="form-control"  id="localitys_<?php echo $value['id']; ?>" placeholder="Enter your Locality"  value="<?php echo $value['locality'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group side-width">
                                        <label for="address">Address</label>
                                            <textarea class="form-control" rows="3" id="addresss_<?php echo $value['id']; ?>" placeholder="Enter your Address"><?php echo $value['address'] ?></textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="City">City</label>
                                                <input type="text" class="form-control" id="citys_<?php echo $value['id']; ?>" placeholder="Enter your City/District/town" value="<?php echo $value['city']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="State">State</label>
                                                <select class="form-control"  id="states_<?php echo $value['id']; ?>">
                                                                
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
                                                                    <option value="Uttar Pradesh" <?php if($value['state']=="Uttar Pradesh"){ echo "selected"; } ?>>Uttar Pradesh</option>
                                                                    <option value="West Bengal" <?php if($value['state']=="West Bengal"){ echo "selected"; } ?>>West Bengal</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="Landmark">Landmark</label>
                                                <input type="text" class="form-control" id="landmarks_<?php echo $value['id']; ?>" placeholder="Enter your Landmark" value="<?php echo $value['landmark']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Alternate Phone">Alternate Phone</label>
                                                <input type="text" class="form-control" id="alternates_<?php echo $value['id']; ?>" placeholder="Enter your Alternate Phone(optional)" value="<?php echo $value['alternate']; ?>">
                                        </div>

                                        <div class="side-width">
                                            <label>Address Type</label>
                                            <br>
                                                <label class="radio-inline">
                                                    <input type="radio"  id="optradios_<?php echo $value['id']; ?>" value="home" <?php if($value['delievry']=="home"){ echo "checked"; } ?>>Home
                                                </label>

                                                <label class="radio-inline">
                                                    <input type="radio"  id="optradios_<?php echo $value['id']; ?>" value="work" <?php if($value['delievry']=="work"){ echo "checked"; } ?>>Work
                                                </label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="addrid" value="<?php echo $value['id']; ?>">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-color-1 " onclick="updateaddr('<?php echo $value['id']; ?>')">Update</button>
                                        <a data-toggle="collapse" href="#collapse2_<?php echo $value['id']; ?>" class="btn btn-color-1">Cancel</a>
                                    </div>
                                                  
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                  <?php } ?>
                                </div>
                            </div>
      </div>

    </div>




</div>-->

<!-- ============================================================= FOOTER ============================================================= -->
      <?php 
include 'footer.php';
      ?>
      <script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
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

 <?php foreach ($default_add as  $value) {?>
 
 <script>
 $('#addresss_<?php echo $value['id']; ?>').keyup(function (e){
    
   
    var address = $('#addresss_<?php echo $value['id']; ?>').val() ;
    // var pass = $('#forgot_pass').val() ;
    
    if(address != ''){
        
      
    if(e.keyCode == 13 || e.keyCode == 10){
        
    //   $( "#forgot_submit" ).trigger( "click" );
        
         default_add('<?php echo $value['id']; ?>');
    }
    
    }
})

</script>
 
 <?php }?>

  <?php foreach ($addr as  $value) {
                                        
                                    ?>
<script>
                         
 $(".pins_<?php echo $value['id']; ?>").keyup(function(){
  var pincode  = $(".pins_<?php echo $value['id']; ?>").val();
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


 $('#addresss_<?php echo $value['id']; ?>').keyup(function (e){
    
   
    var address = $('#addresss_<?php echo $value['id']; ?>').val() ;
    // var pass = $('#forgot_pass').val() ;
    
    if(address != ''){
        
      
    if(e.keyCode == 13 || e.keyCode == 10){
        
    //   $( "#forgot_submit" ).trigger( "click" );
        
       updateaddr('<?php echo $value['id']; ?>');
    }
    
    }
});


 $('#newAddress').keydown(function (e){
    if(e.keyCode == 13 || e.keyCode == 10){
    //   e.preventDefault();
       
        $( "#newAddress" ).trigger( "click" );
    }
})

</script>

<?php } ?>
