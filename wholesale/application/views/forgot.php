<?php

include 'headcss.php';
include 'header.php'; ?>
 <?php include 'navbar.php'; ?>
<style>
    .clr{
        color:red;
    }
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">
                                                    
                                                
                                                   <?php  if($this->session->flashdata('message')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                                <?php echo $this->session->flashdata('message') ;?>
                            </p>
                            
                        </div>
                        <?php } ?>
                        
                <div class="xs-customer-form-wraper">
                            <h3>Verify Your Moblie</h3>
                           
              	<form class="register-form outer-top-xs" role="form"  action="<?php echo base_url('otpverify'); ?>" method="post">
            		<div class="form-group" >
            		    <label class="info-title" for="signemail">Enter Phone Number <span>*</span></label>
            		    <input type="text" class="form-control unicase-form-control text-input" name="mobile" required="">
            		</div>
            		<!--<a href="<?php echo base_url('otpverify'); ?>" class="btn-upper btn btn-primary checkout-page-button example-p-1 login"  style="width: 25%;">Send OTP</a>-->
            	<button type="submit" class="btn-upper btn btn-primary" style="width: 16%;"> Send OTP</button>
	        </form>
		

                         
                        </div><!-- .xs-customer-form-wraper END -->
                    </div>
         </div>  
    </div>
</section>


<?php include 'footer.php'; ?>

