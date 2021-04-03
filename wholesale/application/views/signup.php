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
                        <?php  if($this->session->flashdata('message_name')){ ?>
                        <div class="row alert alert-danger">
                            
                            <p><?php echo $this->session->flashdata('message_name'); ?></p>
                            
                        </div>
                        <?php } ?>
                        <div class="xs-customer-form-wraper">
                            <h3>Registration</h3>
                            <p>There are no enrollment fees or shipping quotas. Simply provide your contact information, create a user ID and password.</p>
                            <form method="post"  action="<?php echo base_url('Artnhub/registration_user'); ?>" enctype="multipart/form-data" class="form-p-text">
                                    <input type="hidden" class="form-control" name="id" value="<?= $insertid ?>" placeholder="Enter Your Owner Name" required="">
                               
                             <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Business Name<span class="clr">*</span></label>
                                        <input type="text" class="form-control"  name="Business" id="Business" placeholder="Enter your Business Name" required="">
                                    </div>
                                    <!--<div class="form-group col-md-6">-->
                                    <!--    <label>Owner Name<span class="clr">*</span></label>-->
                                    <!--    <input type="text" class="form-control" name="Owner" id="Owner" placeholder="Enter Your Owner Name" required="">-->
                                    <!--</div>-->
                                </div>
                                
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Email Id</label>
                                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter Your Business Email Id">
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label>Password<span class="clr">*</span></label>
                                        <input type="password" class="form-control" name="Password" id="Password" minlength="6" placeholder="Enter Your Password" required="">
                                    </div>
                                </div>
                                
                                  <div class="form-row">
                                    <!--<div class="form-group col-md-6">-->
                                    <!--     <label>Mobile No<span class="clr">*</span></label>-->
                                    <!--    <input type="text" class="form-control" maxlength="10" minlength="10" id="mobile" name="Mobile" onkeypress="javascript:return isNumber(event)" placeholder="Enter Your Mobile Number" required="">-->
                                    <!--</div>-->
                                    <div class="form-group col-md-6">
                                        <label>Landline No</label>
                                        <input type="text" class="form-control" maxlength="10" name="landline" id="landline" onkeypress="javascript:return isNumber(event)" placeholder="Enter Your landline Number">
                                    </div>
                                </div>
                                
                                   <div class="form-row">
                                       <div class="form-group col-md-12">
                                     <label>Address<span class="clr">*</span></label>
                                    <input type="text" class="form-control" name="Address" id="Address" placeholder="Enter Your Address" required="">
                                    </div>
                                </div><br>
                                
                                   <div class="form-row">
                                    
                                    <div class="form-group col-md-4">
                                        <label>Pincode<span class="clr">*</span></label>
                                        <input type="text" class="form-control" id="Pincode" maxlength="6" minlength="6" name="PinCode" onkeypress="javascript:return isNumber(event)" placeholder="Enter Your Pin Code" required="">
                                    </div>
                                     <div class="form-group col-md-4">
                                          <label>City<span class="clr">*</span></label>
                                         <input type="text" class="form-control" id="city"  name="city"  placeholder="Enter YourCity"required="" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>State<span class="clr">*</span></label>
                                        <input type="text" class="form-control" id="State" onkeypress="return onlyAlphabets(event,this);" name="State" placeholder="Enter Your State"required="" >
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Select Ownership Type<span class="clr">*</span></label>
                                        <select class="form-control" name="ownertype" id="ownership" required="">
                                            <option value="">--Select Ownership Type--</option>
                                            <option>Sole Proprietorship</option>
                                            <option>Partnership</option>
                                            <option>Private LTD</option>
                                            <option>Public LTD</option>
                                            <option>Corporation</option>
                                            <option>Limited Liability Company(LLC)</option>
                                            <option>Trust</option>
                                            <option>Non-Profit Organization</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label>Select Business Type<span class="clr">*</span></label>
                                        <select class="form-control" name="btype" id="btype" required>
                                            <option value ="">--Select Business Type--</option>
                                            <option>Gift Shop</option>
                                            <option>Wholesale</option>
                                            <option>Buying House</option>
                                            <option>Agency</option>
                                            <option>Interior Designing</option>
                                            <option>Freelance</option>
                                        </select>
                                    </div>
                                </div>
                              
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                         <label>Is your company registered with GST<span class="clr">*</span></label>
                                <select class="form-control" id="selectNEWBox"  name="document" required="">
                                            <option value="">---Is your company registered with GST---</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6" id="gst_details" style="display: none;">
                                         <label>GST No<span class="clr">*</span></label>
                                        <input type="text"  class="form-control gstinnumber" name="GSTNumber" id="GSTNumber" placeholder="Enter GST No" onkeypress="lowerupper();" maxlength="15">
                                    </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function lowerupper(){
         var str = document.getElementById('GSTNumber').value   
        document.getElementById('GSTNumber').value = str.toUpperCase();
         var s = document.getElementById('lower').value   
        document.getElementById('lower').value = s.toLowerCase();
}
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
<script type="text/javascript">
    $(function() {
    $('.gstinnumber').keyup(function() {
        this.value = this.value.toUpperCase();
    });
});
  </script>

                                   <div class="form-group col-md-6" id="aadhar_details" style="display: none;">
                                        <label>Aadhar No<span class="clr"></span></label>
                                        <input type="text"  class="form-control"  maxlength="12" minlength="12" onkeypress="javascript:return isNumber(event)" id="aadhar" name="aadhar" placeholder="Enter Aadhar No">
                                        <br><label>PAN No<span class="clr"></span></label>
                                        <input type="text"  class="form-control pannumber"  maxlength="10" minlength="10" id="pan" name="PANNumber" placeholder="Enter PAN No">
                                    </div>
                                       <!-- <div class="col-md-3">
                                            <label for="GSTIN">GST No</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" name="file" class="form-control-file">
                                        </div>-->
                                </div>
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



                                </script>
                                       <h5>Upload Your Documents</h5>
                                    <div class="form-group" id="gst_detailss" style="display: none;">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="Card">GST Certificate<span class="clr">(Only Upload JPG, PNG, PDF Files)</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="Certificate" id="Certificate" class="form-control-file  Certificate" accept=".png,.jpg,.pdf" >
                                            
                                              <!--<input type="file" name="Certificate" id="Certificate" class="form-control-file" accept=".png,.jpg,.pdf" >-->
                                        </div>
                                    </div>
                                </div>
                                
                             
                                   <div class="form-group" id="aadhar_detailss" style="display: none;">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="Card">Aadhar Card<span class="clr"> (Only Upload JPG, PNG, PDF Files)</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="Certificate1" id="Certificate1" class="form-control-file" accept=".png,.jpg,.pdf">
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="Card">Visiting Card<span class="clr"> (Only Upload JPG, PNG, PDF Files)</span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="visting" id="file1" class="form-control-file" accept=".png,.jpg,.pdf" >
                                        </div>
                                    </div>
                                </div>
                                
                                   <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" required="">
                                    <label class="custom-control-label" for="customCheck1"><a target="_blank" href="<?php echo base_url('termsandconditions');?>">I Agree to the <span>Terms and Conditions</span></a></label>
                                </div>
                                
                                
                                
                                <div class="text-center">
                                    <button type="submit" style="color:#fff;">Registration</button>
                                </div>
                               
                            
                            </form><!-- .xs-customer-form END -->
                        </div><!-- .xs-customer-form-wraper END -->
                    </div>
                 
        </div><!-- .row END -->
    </div><!-- .container END -->
</section>


<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<?php  $open='not' ; include 'footer.php'; ?>


  <script type="text/javascript">
function regotp(){
  
  var number=$("#mobile").val();
  var Business=$("#Business").val();
  var Owner=$("#Owner").val();
  
  var Password=$("#Password").val();
  //var landline=$("#landline").val();
  var Address=$("#Address").val();
  var State=$("#State").val();
  var Pincode=$("#Pincode").val();
  var PANNumber=$("#PANNumber").val();
  var ownership=$("#ownership").val();
  var btype=$("#btype").val();
  var selectNEWBox=$("#selectNEWBox").val();
  var file1=$("#file1").val();
  var customCheck1=$("#customCheck1").val();
  var urls = $("#url").val();
  
  if(number!='' && Business!='' && Owner!=''  && Password!='' && Address!='' && State!='' && Pincode!='' && PANNumber!='' && ownership!='' && btype!='' && selectNEWBox!='' && Password!='' && file1!='' && customCheck1!=''){
      
  // alert(number) ;
      $("#otpno").html(number);
      
     $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/newotp",

                    data: {number:number,Business:Business,Owner:Owner,Password:Password,Address:Address,State:State,Pincode:Pincode,PANNumber:PANNumber,ownership:ownership,btype:btype,selectNEWBox:selectNEWBox,file1:file1,customCheck1:customCheck1},

                    cache: false,

                    success: function(result){
                        
                        $('#showsignup2').trigger('click'); 
                    }

                    });
}
else{
    
    alert('Please Enter Your Details') ;
}

}





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
            $('#aadhar_details').hide();
            $('#aadhar_detailss').hide();
            
            // requied gst detail =====
            
            // $('#Certificate').attr('required', true);
              $('#GSTNumber').prop('required', true);
             
            //   $("#Certificate1").removeAttr("required");
            //   $("#aadhar").removeAttr("required");
            
        }
        else {
            $('#gst_details').hide();
            $('#gst_detailss').hide();
            $('#aadhar_details').show();
            $('#aadhar_detailss').show();
            // requied Addhaar  detail =====
            // $("#Certificate1").attr("required", "true");
            //  $("#aadhar").prop("required", "true");
            //   $("#Certificate").removeAttr("required");
               $("#GSTNumber").removeAttr("required");
            
        }
    });
   
</script>
<script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
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
