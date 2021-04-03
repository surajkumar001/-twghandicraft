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
                <li class="breadcrumb-item active" aria-current="page">Change Phone No</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
              <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">
                                                    
                                              <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            
                            </h5>
                        </div>
                        <?php } ?>             
                                                
                        
                <div class="xs-customer-form-wraper">
                            <h3>Change Phone No</h3>
                           
              	<form class="register-form outer-top-xs" role="form"  action="<?= base_url('Artnhub/updatemobile') ;?>" method="post">
            		<div class="form-group" >
            		    <label class="info-title" for="signemail">Enter Phone Number <span>*</span></label>
            		    <input type="text" class="form-control unicase-form-control text-input" name="New_mobile" required="">
            		    
            		    
            		</div>

            	<button type="submit" class="btn-upper btn btn-primary"> Verify OTP</button>
	        </form>
		

                         
                        </div><!-- .xs-customer-form-wraper END -->
                    </div>
         </div>  
    </div>
</section>


<?php include 'footer.php'; ?>

