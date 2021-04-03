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
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
                                    <li class=""><a href="<?php echo base_url('profile'); ?>">Dealer Information</a></li>
                                    <li><a href="<?php echo base_url('manage_address'); ?>">Manage Address</a></li>
                                </ul>
                            </li>

                            <li class="border-bt-1 font-19"><a href="<?php echo base_url('my_ledger'); ?>"><i class="fa fa-credit-card-alt fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Account History</span></a></li>

                            <li class="border-bt-1 font-19 "><a href="<?php echo base_url('wishlist'); ?>"><i class="fa fa-heart fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">My Wishlist</span></a></li>

                            <li class="border-bt-1 font-19 active"><a href="<?php echo base_url('notification'); ?>"><i class="fa fa-bell fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Notification</span></a></li>

                            <li class="pd-2 font-19"><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw fa-lg fa-color" aria-hidden="true"></i><span class="mg-left-2">Logout</span></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
          
<!-- notification start -->

                 
            <div class="col-md-9">
                <div class="side-border">
                    <h3>Notifications</h3>
                    <?php
             $id=$_SESSION['session_id'];
	  		$where='user_id';
			$table='orders';
			$data=$this->Model->select_common_where($table,$where,$id);
			foreach ($data as  $value) {
				if($value['request_accept']=='1'){
			
			 ?>
                    <div class="row bd-bottom">
                      <!--   <div class="col-md-2 col-sm-4 col-xs-6 text-center">
                            <img src="assets\images\deals\d1.jpg" class="img-src" style="height: 70px; width: 70px;"/>
                        </div> -->
                        <div class="col-md-9 col-sm-8 col-xs-6">
                            <p>
                                Your order Request has been Accepted. Place Your Order.
                            </p>
                            <p><?php echo $value['order_date']; ?><span class="pull-right"><a href="<?php echo base_url('checkout'); ?>">Place Your Order</a></span></p>     
                        </div>
                    </div>
                  
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- notification end -->

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