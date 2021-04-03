<?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>User</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">User</a>
                    </li>
                    <li class="active">Add User</li>
                </ol>
            </section>


<section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Add User
                            </h4>
                        </div>
                         <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>

		<div class="col-md-12">
		    
                        
	<form method="post" action="<?php echo base_url('Admin/insertuser');?>" enctype="multipart/form-data">
		<br>

		
		<div class="col-md-3">
		Business Name <span style="color:red">*</span><input type="text" placeholder="Enter Business Name" required name="bname" class="form-control"><br></div>
		<div class="col-md-3">
		Owner Name <span style="color:red">*</span><input type="text" placeholder="Enter Owner Name" required name="cname" class="form-control"><br></div>
		<div class="col-md-3">
		Email ID <input placeholder="Enter Email Id" type="email" name="email" class="form-control"><br></div>

		<div class="col-md-3">
		 Mobile No <span style="color:red">*</span><input type="text" placeholder="Enter Mobile No." onkeypress="javascript:return isNumber(event)" maxlength="10" minlength="10" required  name="Mobile" class="form-control" autocomplete="off"><br></div>
		 <div class="col-md-3">
        Password <span style="color:red">*</span><input type="Password" required placeholder="Enter Password" name="password" required class="form-control"><br></div>
		<div class="col-md-3">
		Landline No <input type="text" placeholder="Enter Landline No." onkeypress="javascript:return isNumber(event)" maxlength="11" minlength="11" name="landline" class="form-control"><br></div>
		<div class="col-md-3">
		Pin Code <span style="color:red">*</span><input type="text" placeholder="Enter Pin Code" id="Pincode" onkeypress="javascript:return isNumber(event)" maxlength="6" minlength="6" required name="pincode" class="form-control"><br></div>
		<div class="col-md-3">
		City <span style="color:red">*</span><input placeholder="Enter City" id="city" type="text" required name="city" class="form-control"><br></div>
		<div class="col-md-9">
		Address <span style="color:red">*</span><input type="text" required name="address" required placeholder="Enter Address" class="form-control"><br></div>
		<div class="col-md-3">
		State <span style="color:red">*</span> <input type="text" id="State" onkeypress="return onlyAlphabets(event,this);" required name="state" placeholder="Enter State" class="form-control"><br></div>
		<div class="col-md-4">
		    
		<!--Ownership Type<input type="text"  name="" class="form-control"><br>-->
		 Select Ownership Type <span style="color:red">*</span>
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
		<div class="col-md-4">
		    
		<!--Business Type<input type="text"  name="" class="form-control"><br>-->
		
		Select Business Type <span style="color:red">*</span>
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
		 <?php   $rm_list = $this->db->get('rm')->result(); ?>
 		
		<div class="col-md-4">
		    
		<!--Select RM<input type="text"  name="otype" class="form-control"><br>-->
			Select RM <span style="color:red">*</span><select class="form-control" name="rm_id" style="font-size: 13px;" required="" >
                                       <option value="">--Select RM-- </option>
                                       <option value="All">Search by RM </option>
                                       <?php foreach($rm_list as $rm){ ?>
                                       <option  value="<?=  $rm->id ?>" ><?php echo $rm->rm_name ; ?></option>
                                      <?php } ?>
                                      </select>
		
		</div>
		<div class="col-md-4">
		Gst No <input type="text" id="GSTNumber" onkeypress="lowerupper();" maxlength="15" placeholder="Enter GST No" name="gst" class="form-control gstinnumber"><br></div>
		
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
		
		
		<div class="col-md-4">
		PAN No <input type="text" maxlength="10" minlength="10" id="pan" placeholder="Enter PAN No." name="pan_no" class="form-control pannumber"><br></div>
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
		
		
		
		<div class="col-md-4">
		Aadhar No <input type="text" maxlength="12" minlength="12" placeholder="Enter Aadhar No." onkeypress="javascript:return isNumber(event)" id="aadhar" name="aadhar" class="form-control"><br></div>
		
		<script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
   </script>
		
		
		
		<div class="col-md-4">
		GST Certificate<input type="file" class="form-control" onchange="ValidateSingleInput(this);" name="Certificate"><br></div>
		<!--<div class="col-md-3">-->
		<!--PAN Number <input type="text"  class="form-control pannumber"  maxlength="10" minlength="10" id="pan" name="PANNumber" placeholder="Enter PAN No"><br></div>-->


		
		<div class="col-md-4">
		Adhaar Certificate<input type="file"  class="form-control" onchange="ValidateSingleInput(this);" name="Certificate1"><br></div>
		<div class="col-md-4">
		Visting Card<input type="file"  name="visting" onchange="ValidateSingleInput(this);" class="form-control"><br></div>
		
		<div class="col-md-6">
		<input type="submit" name="submit" value="submit" class="btn btn-success">
		</div>
	</form>
</div>
	</div>
</div>
</section>
</aside>
	
<input type="hidden" id="url" value="<?=base_url();?>">

<?php
include 'footer.php';
?>

<!--Pannumber Script-->
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




<!--Format Validation-->
<script>
    var _validFileExtensions = [".jpg", ".jpeg", ".pdf", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
    
</script>


<script type="text/javascript">
	function sub(){
		var urls=$("#url").val();
		catid= $("#cat").val();
		 $.ajax({
            type: "POST",
            url: urls+"Admin/cati",
            data: {id:catid},
            cache: false,
            success: function(result){
              $("#category").html(result);
                }
            });
	}
	function subcat(){
		var urls=$("#url").val();
		var sub= $("#category").val();
		$.ajax({
            type: "POST",
            url: urls+"Admin/subcat",
            data: {id:sub},
            cache: false,
            success: function(result){
              $("#subcategory").html(result);
                }
            });
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