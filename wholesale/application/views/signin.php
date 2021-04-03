<?php
include 'headcss.php';
include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<style>
    .clr{
        color:red;
    }

    /*.btnwidth {
        width:50%;
    }
    @media only screen and (max-width: 480px) {
        .btnwidth {
            width:68%;
        }
    }*/
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>
<section class="xs-section-padding home-bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12 col-sm-12">
                <?php  if($this->session->flashdata('user_rejected')){ ?>
                <div class="row alert alert-danger" >
                    <p>
                        <?php echo $this->session->flashdata('user_rejected') ;?>
                    </p>
                </div>
                <?php }elseif($this->session->flashdata('create_account')=="Invalid Credentials"){ ?>
                <div class="row alert alert-danger" >
                    <p>
                        New Customer? <a href="<?php  echo base_url('signup')?>" >Create an account</a>
                    </p>
                </div>
                <?php } elseif($this->session->flashdata('not_otp_verify')=="Invalid Credentials"){ ?>
                <div class="row alert alert-danger" >
                    <p>
                      Please Verify Your Mobile Number First ! <a href="<?php  echo base_url('forgot')?>"> Verify Your Number</a>
                    </p>
                </div>
                <?php }elseif($this->session->flashdata('not_admin_verify')=="Invalid Credentials"){ ?>
                <div class="row alert alert-danger" >
                    <p>
                      Your Account is Under Verification We will notify you shortly or contact our Team 8383971129 
                    </p>
                </div>
                <?php }elseif($this->session->flashdata('login_msg')=="Invalid Credentials"){ ?>
                <div class="row alert alert-danger" >
                    <p>
                    INVALID LOGIN CREDENTIAL
                    </p>
                </div>
                <?php } ?>
                <div class="xs-customer-form-wraper">
                    <h3>Log in</h3>
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
                              <strong>Email!</strong>Enter Valid Email or Phone Number.
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
                		  	<a href="javascript:void(0);"  class="forgot-password pull-right" id="forgot_submit" onclick="sendforgototp();">Forgot?</a>
                			</span>
                			<span id="resendotp" style="display: none;">
                		  	<a href="javascript:void(0);"  class="forgot-password pull-right" onclick="sendforgototp();">Resend OTP?</a>
                			</span>
                		</div>
                		<span id="hidebtn">
                	  	    <button type="submit" class="btn-upper btn btn-primary checkout-page-button example-p-1 login" id="login_btn" style="width: 25%;">Login</button>
                    	  	<span>Or <a class="btn btn-success btnwidth" href="<?= base_url('Artnhub/preRegistration') ; ?>" style="font-size: 13px;font-weight: 400;">&nbsp;New Customer? Create an Account</a>
                    	    </span>
                	  	</span>
		 	            <button type="button" id="showbtn" class="btn-upper btn btn-primary checkout-page-button"  onclick="validationforget();"  style="display:none ;width:20%;">Submit</button>
                		<div id="forgot-password" class="collapse mg-t-6">
                			<form>
                    			<div class="form-group">
                        		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        		    <input type="email" class="form-control unicase-form-control text-input">
                    			</div>
                			</form>
                		</div>
	                </form>	

                </div><!-- .xs-customer-form-wraper END -->
            </div>
        </div>
    </div><!-- .container END -->
</section>


<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<?php  $open='not' ; include 'footer.php'; ?>


  <script type="text/javascript">


function validotp(){

  var urls = $("#url").val();
            var otp = $("#enterotp").val();
            var usernumber = $("#mobile").val();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/validotp",

                    data: {otp:otp,usernumber:usernumber},

                    cache: false,

                    success: function(result){
                      if(result=='invalid'){
                      $.alert({
                            title: 'OTP',
                            content: 'Please Enter Valid OTP',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                     
                     }
                     else if(result=='done'){
                      $.alert({
                            title: 'Success',
                            content: 'You have Successfully Registered',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                     action: function () {
                              location.reload();
                              }
                             
                                }
                         
                            }
                        });
                     }
              
                    }

                    });
 }

 // this is the id of the form
$("#idForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);

var urls = $("#url").val();
 
    $.ajax({
           type: "POST",
        url: urls+"Artnhub/validotp",
           data: form.serialize(), // serializes the form's elements.
           success: function(result)
           {
            alert(result);
           
              // show response from the php script.
           }
         });


});
</script>  
<script>
    $("#selectNEWBox").change(function (){
		var value = this.value;
		if(value=='Yes'){
            $('#gst_details').show();
            $('#gst_detailss').show();
        }
        else {
            $('#gst_details').hide();
            $('#gst_detailss').hide();
        }
    });
   
</script>
<script>
    // function isNumber(evt) {
    //     var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    //     if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
    //         return false;

    //     return true;
    // }
</script>
<script language="Javascript" type="text/javascript"> 

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        } 

    </script>
	<script>
	
$('#foremail').keyup(function (e){
    
   
    var foremail = $('#foremail').val() ;
    if(foremail != ''){
        
      
    if(e.keyCode == 13 || e.keyCode == 10){
        
      $( "#forgot_submit" ).trigger( "click" );
        
        
    }
    
    }
})


$('#forgetotp').keyup(function (e){
    
   
    var forgetotp = $('#forgetotp').val() ;
    var pass = $('#pass').val() ;
    
    if(forgetotp != '' || pass != ''){
        
      
    if(e.keyCode == 13 || e.keyCode == 10){
        
       $( "#forgot_submit" ).trigger( "click" );
        
     
    }
    
    }
})

// =======validation =============

$('#forgot_pass').keyup(function (e){
    
   
    var forgetotp = $('#forgetotp').val() ;
    var pass = $('#forgot_pass').val() ;
    
    if(forgetotp != '' || pass != ''){
        
      
    if(e.keyCode == 13 || e.keyCode == 10){
        
    //   $( "#forgot_submit" ).trigger( "click" );
        
         validationforget();
    }
    
    }
})



	</script>