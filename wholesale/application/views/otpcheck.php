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
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
          
                    <div class="col-md-offset-2 col-md-8 col-xs-12 col-sm-12">
                        <div class="xs-customer-form-wraper">
                              <?php  if($this->session->flashdata('msg')=="Wrong OTP"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                Wrong OTP &nbsp	
                            
                            </h5>
                            
                        </div>
                        <?php } ?>
                        
                            <h3>Verify Mobile Number</h3>
                            
                            
                            <form method="post"  action="<?php echo base_url('Artnhub/otpvalid'); ?>" enctype="multipart/form-data" class="form-p-text">
                            
                             <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>OTP<span class="clr">*</span></label>
                                        <input type="text" class="form-control" id="foremail"  name="moblie" value="<?= $mob ;?>" placeholder="Enter your OTP" readonly><br>
                                        <input type="text" class="form-control"  name="otp" id="otp" placeholder="Enter your OTP" >
                                        
                                        
                                    </div>
                              </div>      
                             <div class="row">
                                     <div class="col-8 text-center">
                                         
                                          <button type="submit" style="color:#fff;">Submit</button>
                                          
                                          <button type="submit" style="color:#fff;"  onclick="resendotp();"  >Resend OTP</button>
                                 </div>
                               </div>
                                
                                     
                              
                            </form><!-- .xs-customer-form END -->
                        </div><!-- .xs-customer-form-wraper END -->
                    </div>
                 
        </div><!-- .row END -->
    </div><!-- .container END -->
</section>


<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<?php   $open='not' ;   include 'footer.php'; ?>


