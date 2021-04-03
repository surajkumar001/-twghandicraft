<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
<style>
    .img50{
        height:150px;width:150px;
    }
</style>
<!-- ============================================== Header : END ============================================== -->	
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </nav>
    </div>
</div>

 <?php
					$id=$_SESSION['session_id'];

						$where='id';

						$table='customerlogin';

						$data=$this->Adminmodel->select_com_where($table,$where,$id); 
						
						?>  
<!-- /.breadcrumb -->
<section class="home-bg-color">
    <div class="container-fluid">
        <div class="row" style="padding: 3% 0% 3% 0%;">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-name pd-set">
                            <img src="<?php echo base_url(); ?>assets/assets/images/d-2.png" class="img-size-2">
                            <span class="text-center" style="font-size: 18px;"><?php echo substr($_SESSION['session_name'],0,13); ?> </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="section-border">
                        <ul class="user-link">
                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('orders'); ?>"><i class="fa fa-file-text fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Order</span></a></li>

                            <li class="border-bt-1 font-19"><i class="fa fa-user fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account Settings</span>
                                <ul class="pd-2">
                                    <li class="active current-pg"><a href="<?php echo base_url('profile'); ?>">Dealer Information</a></li>
                                    <li><a href="<?php echo base_url('manage_address'); ?>">Manage Address</a></li>
                                </ul>
                            </li>
                            <?php  $user_id= $_SESSION['session_id'] ;?>

                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('my_ledger'); ?>"><i class="fa fa-credit-card-alt fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account History</span></a></li>

                            <li class="border-bt-1 font-19 "><a href="<?php echo base_url('wishlist'); ?>"><i class="fa fa-heart fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Wishlist</span></a></li>
 
                          <li class="border-bt-1 font-19 "><a href="<?php echo base_url('production_cart'); ?>"><i class="fa fa-shopping-cart fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2"> production cart </span></a></li>

                            <li class="border-bt-1 font-19 active"><a href="<?php echo base_url('notification'); ?>"><i class="fa fa-bell fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Notification</span></a></li>

                            <li class="pd-2 font-19"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Logout</span></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="side-border">
                   
						<?php if($responce = $this->session->flashdata('message_name')): ?>
    <div class="box-header">
        <div class="col-lg-12">
            <div class="alert alert-success text-center"><?php echo $responce;?></div>
        </div>
    </div>
<?php endif;?>

<?php if($res = $this->session->flashdata('msg_email')): ?>
    <div class="box-header">
        <div class="col-lg-12">
            <div class="alert alert-danger text-center"><?php echo $res;?></div>
        </div>
    </div>
<?php endif;?>
					<div class="clearfix filters-container">
					<h3>Personal Information:</h3>
						<form action="<?php echo base_url('Artnhub/updateprofile'); ?>" method="POST"   enctype="multipart/form-data" >
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="name">Business Name</label>
										<input type="text" class="form-control" name="Business" placeholder="First Name" value="<?php echo $data[0]['Business']; ?>" required="required">
								</div>
									<div class="form-group col-md-4">
									<label for="name">Owner Name</label>
										<input type="text" class="form-control" name="Owner" placeholder="First Name" value="<?php echo $data[0]['Owner']; ?>" required="required" >
								</div>									
								<div class="form-group col-md-4">
								<label for="phone-number">Password</label>
								<input type="password" class="form-control"  placeholder="******" name="password" value="<?php echo $data[0]['password']; ?>" >	
								
								<input type="hidden" class="form-control"  placeholder="******" name="old_password" value="<?php echo $data[0]['password']; ?>" >
								</div>
								<!--<div class="side-width">
									<label>Your Gender</label><br />
										<label class="radio-inline">
											<input type="radio" name="gender" value="male" <?php if($data[0]['gender']=='male'){ echo "checked"; } ?>>Male
										</label>

										<label class="radio-inline">
											<input type="radio" name="gender" value="female" <?php if($data[0]['gender']=='female'){ echo "checked"; } ?>>Female
										</label>
								</div>-->
							</div>

							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="name">Email</label>
										<input type="email" class="form-control"  name="Email"  placeholder="Enter your Email Id" value="<?php echo $data[0]['email']; ?>">
										
										<input type="hidden" class="form-control"  name="old_email"  placeholder="Enter your Email Id" value="<?php echo $data[0]['email']; ?>">
										
										
								</div>
																	
								<div class="form-group col-md-4">
									<label for="phone-number">Mobile Number</label>
										<input type="text" class="form-control"   placeholder="Enter your Mobile Number" value="<?php echo $data[0]['phone']; ?>" disabled>
										<span style="float:right;display:none;"><a href=#>Verify</a></span>
										<span style="float:right"><a href="<?= base_url('changemobile');?>">Change</a></span>
								</div>
								<div class="form-group col-md-4">
									<label for="phone-number">Landline Number</label>
										<input type="text" class="form-control" name="landline" placeholder="Enter your Landline Number" value="<?php echo $data[0]['landline']; ?>" >
								</div>
							</div>
								<div class="form-row">
								<div class="form-group col-md-12">
									<label for="name">Address</label>
										<input type="text" class="form-control"name="Address"  placeholder="Enter your Address" value="<?php echo $data[0]['Address']; ?>" required="required">
								</div>
								</div>
						
						 <div class="form-row">
                                    
                                    <div class="form-group col-md-4">
                                        <label>Pincode<span class="clr">*</span></label>
                                        <input type="text" class="form-control" id="Pincode" maxlength="6" name="PinCode"  value="<?php  echo $data[0]['PinCode']; ?>" onkeypress="javascript:return isNumber(event)" placeholder="Enter Your Pin Code" required="required">
                                    </div>
                                     <div class="form-group col-md-4">
                                          <label>City<span class="clr">*</span></label>
                                         <input type="text" class="form-control" id="city"  name="city"  value="<?php  echo $data[0]['city']; ?>"  placeholder="Enter Your City"required="" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State<span class="clr">*</span></label>
                                        <input type="text" class="form-control" id="State" onkeypress="return onlyAlphabets(event,this);" name="State" value="<?php  echo $data[0]['state']; ?>" placeholder="Enter Your State"required="" >
                                    </div>
                                </div>
						
							<div class="form-row"> 
								<div class="form-group col-md-6">
									<label for="name">Ownership Type</label>
									<select class="form-control"  name= "ownertype" required="required">
									        <option value="">Ownership Type</option>
                                            <option <?php if($data[0]['ownertype']=='Sole Proprietorship' ) {echo "selected" ;} ?> >Sole Proprietorship</option>
                                            <option <?php if($data[0]['ownertype']=='Partnership' ) {echo "selected" ;} ?> >Partnership</option>
                                            <option <?php if($data[0]['ownertype']=='Private LTD' ) {echo "selected" ;} ?> >Private LTD</option>
                                            <option <?php if($data[0]['ownertype']=='Public LTD' ) {echo "selected" ;} ?> >Public LTD</option>
                                            <option <?php if($data[0]['ownertype']=='Corporation' ) {echo "selected" ;} ?> >Corporation</option>
                                            <option <?php if($data[0]['ownertype']=='Limited Liability Company(LLC)' ) {echo "selected" ;} ?> >Limited Liability Company(LLC)</option>
                                            <option <?php if($data[0]['ownertype']=='Trust' ) {echo "selected" ;} ?> >Trust</option>
                                            <option <?php if($data[0]['ownertype']=='Non-Profit Organization' ) {echo "selected" ;} ?> >Non-Profit Organization</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="name">Business Type</label>
									<select class="form-control" name= "btype" required="required">
									   <option value="">Business Type</option>
                                            <option  <?php if($data[0]['btype']== 'Gift Shop') {echo "selected" ;} ?>  >Gift Shop</option>
                                            <option  <?php if($data[0]['btype']== 'Wholesale') {echo "selected" ;} ?>  >Wholesale</option>
                                            <option  <?php if($data[0]['btype']== 'Buying House') {echo "selected" ;} ?>  >Buying House</option>
                                            <option <?php if($data[0]['btype']== 'Agency') {echo "selected" ;} ?>  >Agency</option>
                                            <option<?php if($data[0]['btype']== 'Interior Designing') {echo "selected" ;} ?>  >Interior Designing</option>
                                            <option<?php if($data[0]['btype']== 'Freelance') {echo "selected" ;} ?>  >Freelance</option>
									</select>
								</div>									
								
							
								<div class="form-group col-md-2">
									<label for="phone-number">Visting Card</label>
									    <input type="file" class="form-control" name="visting" id="file1" accept=".png,.jpg,.pdf">
								</div>
								<div class="form-group col-md-2">
								    <img src="<?php echo $data[0]['vcard']; ?>" class="img50">
								</div>
								
							
									<div class="form-group col-md-4">
									<label for="phone-number">GST Number</label>
										<?php $gstNO = $data[0]['GSTNumber'] ;
									
									if($gstNO) {?>
										<input type="text" class="form-control gstinnumber"  placeholder="Enter GST Number" value="<?php echo $data[0]['GSTNumber']; ?>" disabled>
									
										<?php } else{ ?>
										
										<input type="text" class="form-control gstinnumber" name="GSTNumber" placeholder="Enter GST Number" value="<?php echo $data[0]['GSTNumber']; ?>">
										
										<?php } ?>
								</div>
								<?php if(empty($data[0]['gstimg'])){ ?>
								<div class="form-group col-md-2">
									<label for="phone-number">GST</label>
										 <input type="file" class="form-control" id ="Certificate" name="Certificate" accept=".png,.jpg,.pdf">
								</div>
								<?php } ?>
								<div class="form-group col-md-2">
								    <img src="<?php echo $data[0]['gstimg']; ?>" class="img50">
								</div>
								
										<div class="form-group col-md-4">
									<label for="phone-number">Aadhaar Number</label>
									<?php $adhaar = $data[0]['adhaar_no'] ;
									
									if($adhaar) {?>
									
										<input type="text" class="form-control" minlength="12" maxlength="12" onkeypress="return isNumberKey(event)"  placeholder="Enter your Adhaar Number" value="<?php echo $data[0]['adhaar_no']; ?>" disabled>
						
							<?php }else{ ?>
							    	<input type="text" class="form-control" minlength="12" maxlength="12" onkeypress="return isNumberKey(event)" name="aadhar" placeholder="Enter your Adhaar Number" value="<?php echo $data[0]['adhaar_no']; ?>">
						
						<?php 	} ?>
								</div>
									<?php if(empty($data[0]['adhaar_img'])){ ?>
									<div class="form-group col-md-2">
									<label for="phone-number">Aadhaar </label>
										 <input type="file" name="Certificate1" id="Certificate1" class="form-control" accept=".png,.jpg,.pdf"  >
								</div>
								<?php } ?>
							
								<div class="form-group col-md-2">
								    <img src="<?php echo $data[0]['adhaar_img']; ?>" class="img50">
								</div>
									<div class="form-group col-md-4">
									<label for="phone-number">PAN Number</label>
										<?php $panno = $data[0]['PANNumber'] ;
									
									if($panno) {?>
									 <input type="text"  class="form-control pannumber"  value="<?php echo $data[0]['PANNumber']; ?>"   id="pan"  placeholder="Enter PAN No" disabled>
								
								<?php } else{ ?>
								
									 <input type="text"  class="form-control pannumber"  value="<?php echo $data[0]['PANNumber']; ?>"  maxlength="10" minlength="10" id="pan" name="PANNumber" placeholder="Enter PAN No">
								

								<?php  } ?>
								
								
								</div>
								
							</div>
							
								
							<p style="color:red">NOTE : If Want to Change GST Number, Adhar Number, PAN Number please contact our Team *</p><br>

							<div class="text-center">
								<button type="submit" class="btn btn-color-1 btn-lg login">Update</button>
								
							</div>
						</form>
						
					</div>
					<div class="row">
					    <div class="discount-profile">Discount: 30%</div> 
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
  
<?php
					$id=$_SESSION['session_id'];

	$where='id';

	$table='customerlogin';

	$data=$this->Adminmodel->select_com_where($table,$where,$id); ?>    
<div class="clearfix filters-container">
<h3>Personal Information:</h3>
	<form action="<?php echo base_url('Artnhub/updateprofile'); ?>" method="POST">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="name">Name</label>
					<input type="text" class="form-control" name="name" placeholder="First Name" value="<?php echo $data[0]['name']; ?>">
			</div>
												
			<div class="form-group col-md-6">
			<label for="phone-number">Password</label>
			<input type="Password" class="form-control" placeholder="******" name="password">
			</div>
			<div class="side-width">
				<label>Your Gender</label><br />
					<label class="radio-inline">
						<input type="radio" name="gender" value="male" <?php if($data[0]['gender']=='male'){ echo "checked"; } ?>>Male
					</label>

					<label class="radio-inline">
						<input type="radio" name="gender" value="female" <?php if($data[0]['gender']=='female'){ echo "checked"; } ?>>Female
					</label>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="name">Email</label>
					<input type="email" class="form-control" placeholder="Enter your Email Id" value="<?php echo $data[0]['email']; ?>" readonly>
			</div>
												
			<div class="form-group col-md-6">
				<label for="phone-number">Mobile Number</label>
					<input type="text" class="form-control" placeholder="Enter your Mobile Number" value="<?php echo $data[0]['phone']; ?>" readonly>
			</div>
		</div>

		<div class="text-center mg-14">
			<button type="submit" class="btn btn-color-1 btn-lg">Update</button>
			<button type="submit" class="btn btn-color-2 btn-lg">Cancel</button>
		</div>
	</form>
	
</div>
 </div>



</div>

  
</div>
</div>-->
<!-- /.body-content --> 
<!-- ============================================================= FOOTER ============================================================= -->
      <?php 
include 'footer.php';
      ?>
 <script>
  $(document).on('change',".gstinnumber", function(){    
    var inputvalues = $(this).val();
    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
    
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
        $(".gstinnumber").val('');
        $(".gstinnumber").focus();
    }
    
});
</script>
<script>
      $(document).on('change',".pannumber", function(){    
    var inputvalues = $(this).val();
    var pannumber = new RegExp('^[A-Z]{5}[0-9]{4}[A-Z]{1}$');
    
    if (pannumber.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid PAN Number');
        $(".pannumber").val('');
        $(".pannumber").focus();
    }
    
});
 $(function() {
    $('.pannumber').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});



    $("#Certificate").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#Certificate").val(null);
        }

    });
            $("#Certificate1").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#Certificate1").val(null);
        }

    });
          
          
           $("#file1").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#file1").val(null);
        }

    });
    
   </script>
<script language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </script>
