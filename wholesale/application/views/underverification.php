<?php 
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Under Verification</li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
	<div class="container">
		<div class="terms-conditions-page mg-bt-3">
			<div class="row">
				<div class="col-md-12 terms-conditions">
	<h2 class="heading-title">Under Verification</h2>
	<div style="background-image:url('<?php echo base_url(); ?>assets/images/thanks-for-shopping.jpg'); width: auto; height: 365px; background-size: cover;">
		        <?php  //$user_id  = $_SESSION['session_id'] ; 
		        	$q = $this->db->select()
            				->where('id',$user_id )
            				->from('customerlogin')
            				->get();
	    
	    	$user  = $q->row();
            $mob = $user->phone ;
			$name  = $user->Owner ;
			  
		    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                    $show_contact = $admin->show_contact   ;  
  
                    $message_content = "
                 Congrats ".$name.", <br><br>
                 
                 Your account is successfully registered with mobile number ".$mob.". Customer Support team will contact you within 24 hr for account approval. <br> <br>
                 
                 for more information get in touch with our customer support team.  <br>
                 ".$show_contact." <br>
                 www.twghandicraft.com <br>
                 Thank you !";
                  ?>
                <p style="padding-top: 7%; padding-left: 11%; padding-right: 30%; color: #d2461e; font-weight: 600; font-size: 17px;">
                   <?php echo $message_content  ; ?> 
                </p>  
                 
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
			</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php  $open='not' ;  include('footer.php'); ?>