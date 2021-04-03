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
                <li class="breadcrumb-item active" aria-current="page">OTP Verify</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">
                                                    
                                                
                                                
                        
                    <div class="xs-customer-form-wraper">
                            <h3>OTP Verify </h3>
                           
                    	<form class="register-form outer-top-xs"  role="form" action="<?php echo base_url('Artnhub/otpvalid'); ?>" method="post" >
                    		<div class="form-group" >
                    		    <label class="info-title" for="signemail">Enter OTP <span>*</span></label>
                    		     <input type="text" class="form-control unicase-form-control text-input"  name= "moblie"  value="<?php echo $mobile; ?>" required="">
                    		     
                    		    <input type="text" class="form-control unicase-form-control text-input"  name= "otp" maxlength="6" onkeypress="javascript:return isNumber(event)" required="">
                    		    <!--<a href="#" style="float:right;">Resend OTP</a>-->
                    		</div>
                    		<div class="row">
                    		    
                    		    <div class="col-md-8">
                    		        
                    		        <input type="submit" class="btn-upper btn btn-primary checkout-page-button example-p-1 login" style="width: 30%;" value="Verify">
	                	</form>
		
                    		    </div>
                    		    
                    		    <div class="col-md-4">
                    		        	<form class="register-form outer-top-xs" role="form"  action="<?php echo base_url('otpverify'); ?>" method="post">
            		
            		    <input type="hidden" class="form-control unicase-form-control text-input" name="mobile" value="<?php echo $mobile; ?>" required="">
            		
            	<button type="submit" class="btn-upper btn btn-primary" style="width: 55%;"> Resend OTP</button>
	        </form>
		
                    		        
                    		    </div>
                    		</div>
                    	    

                         
                        </div><!-- .xs-customer-form-wraper END -->
                    </div>
         </div>  
    </div>
</section>


<?php include 'footer.php'; ?>

<script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>