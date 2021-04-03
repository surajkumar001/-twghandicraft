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
                    <li class="active">Edit User</li>
                </ol>
            </section>


<section class="content paddingleft_right15">
    
    <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>
                        
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Edit User
                            </h4>
                        </div>

		<div class="col-md-12">
	<form method="post" action="<?php echo base_url('Admin/updateuser');?>" enctype="multipart/form-data">
		<br>

		<div class="col-md-3">
		Customer Id<input type="text" name="id" readonly="true" value="<?php echo $edituser[0]['id']?>" class="form-control" required><br></div>
		<input type="hidden" name="idd" value="<?php echo $edituser[0]['id']?>">
		
			<div class="col-md-3">
	         RM
                       <select class="form-control" name="rm_id" required>
                       <option value="">---Select RM---</option>
                       <?php foreach($rm_list as $rm){ ?>
                       <option  value="<?= $rm_id =  $rm->id ?>"   <?php  if($rm_id == $edituser[0]['Rm_id'] ){ echo "selected" ;}?>><?php echo $rm->rm_name ; ?></option>
                      <?php } ?>
                      
                                           </select>
		</div>
		<div class="col-md-3">
		Business Name<input type="text" value="<?php echo $edituser[0]['Business']?>" name="bname" class="form-control" required><br></div>
		<div class="col-md-3">
		Owner Name<input type="text" value="<?php echo $edituser[0]['Owner']?>" name="cname" class="form-control" required><br></div>
		<div class="col-md-3">
		Email ID<input type="email" value="<?php echo $edituser[0]['email']?>" name="email" class="form-control">
		
			<input type="hidden" value="<?php echo $edituser[0]['email']?>" name="old_email" class="form-control" >
		<br></div>
        <div class="col-md-3">
		Mobile No<input type="text" value="<?php echo $edituser[0]['phone']?>" onkeypress="javascript:return isNumber(event)" maxlength="10" minlength="10" name="Mobile" class="form-control" >
		
		<input type="hidden" value="<?php echo $edituser[0]['phone']?>" name="old_Mobile" class="form-control" >
		<br></div>
		<div class="col-md-3">
		Password<input type="password" value="<?php echo $edituser[0]['password']?>" name="password" class="form-control"><br></div>
		<div class="col-md-3">
		Landline No<input type="text" value="<?php echo $edituser[0]['landline']?>" onkeypress="javascript:return isNumber(event)" maxlength="11" minlength="11" name="landline" class="form-control"><br></div>
		<div class="col-md-4">
		Pincode<input type="text" value="<?php echo $edituser[0]['PinCode']?>" id="Pincode" onkeypress="javascript:return isNumber(event)" maxlength="6" minlength="6" name="pincode" class="form-control" required><br></div>
		<div class="col-md-4">
		City<input type="text" value="<?php echo $edituser[0]['city']?>" id="city" name="city" class="form-control" required><br></div>
		<div class="col-md-4">
		State<input type="text" value="<?php echo $edituser[0]['state']?>" id="State" name="state" class="form-control" required><br></div>
		<div class="col-md-9">
		Address<input type="text" value="<?php echo $edituser[0]['Address']?>" name="address" class="form-control" required><br></div>
		<div class="col-md-3">
		Gst No<input type="text" value="<?php echo $edituser[0]['GSTNumber']?>" id="GSTNumber" onkeypress="lowerupper();" maxlength="15" name="gst" class="form-control gstinnumber" ><br></div>
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

		<div class="col-md-3">
		  Aadhar No<input type="text" value="<?php echo $edituser[0]['adhaar_no']?>" maxlength="12" minlength="12" onkeypress="javascript:return isNumber(event)" id="aadhar" name="aadhar" class="form-control"><br></div>
		<script>
         function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
   </script>
   
		<div class="col-md-3">
		   	PAN No<input type="text" value="<?php echo $edituser[0]['PANNumber']?>" maxlength="10" minlength="10" id="pan" name="pan_no" class="form-control pannumber"><br></div>
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

		<div class="col-md-3">
		   <label for="name">Ownership Type</label>
									<select class="form-control"  name= "ownertype" required="required">
									        <option value="" >Ownership Type</option>
                                            <option <?php if($edituser[0]['ownertype']=='Sole Proprietorship' ) {echo "selected" ;} ?> >Sole Proprietorship</option>
                                            <option <?php if($edituser[0]['ownertype']=='Partnership' ) {echo "selected" ;} ?> >Partnership</option>
                                            <option <?php if($edituser[0]['ownertype']=='Private LTD' ) {echo "selected" ;} ?> >Private LTD</option>
                                            <option <?php if($edituser[0]['ownertype']=='Public LTD' ) {echo "selected" ;} ?> >Public LTD</option>
                                            <option <?php if($edituser[0]['ownertype']=='Corporation' ) {echo "selected" ;} ?> >Corporation</option>
                                            <option <?php if($edituser[0]['ownertype']=='Limited Liability Company(LLC)' ) {echo "selected" ;} ?> >Limited Liability Company(LLC)</option>
                                            <option <?php if($edituser[0]['ownertype']=='Trust' ) {echo "selected" ;} ?> >Trust</option>
                                            <option <?php if($edituser[0]['ownertype']=='Non-Profit Organization' ) {echo "selected" ;} ?> >Non-Profit Organization</option>
									</select>
		    
		<!--Ownership Type<input type="text" value="<?php// echo $edituser[0]['ownertype']?>" name="otype" class="form-control">-->
		<br>
		</div>
		<div class="col-md-3">
		    	<label for="name">Business Type</label>
					<select class="form-control" name= "btype" required="required">
					   <option value="">Business Type</option>
                            <option  <?php if($edituser[0]['btype']== 'Gift Shop') {echo "selected" ;} ?>  >Gift Shop</option>
                            <option  <?php if($edituser[0]['btype']== 'Wholesale') {echo "selected" ;} ?>  >Wholesale</option>
                            <option  <?php if($edituser[0]['btype']== 'Buying House') {echo "selected" ;} ?>  >Buying House</option>
                            <option <?php if($edituser[0]['btype']== 'Agency') {echo "selected" ;} ?>  >Agency</option>
                            <option<?php if($edituser[0]['btype']== 'Interior Designing') {echo "selected" ;} ?>  >Interior Designing</option>
                            <option<?php if($edituser[0]['btype']== 'Freelance') {echo "selected" ;} ?>  >Freelance</option>
					</select>
									
		    
		<!--Business Type<input type="text" value="<?php// echo $edituser[0]['btype']?>" name="otype" class="form-control">-->
		<br></div>
		<div class="col-md-4">
		Visting Card <input type="file" class="form-control" onchange="ValidateSingleInput(this);" name="visting" id="file1" class="form-control-file" accept=".png,.jpg,.pdf" >
		<br>
	    <span><img src="<?php echo $edituser[0]['vcard']?>" style="height: 160px; width: 100%;" ></span>
	    </div>
	    
	    <div class="col-md-4">
		GST<input type="file" name="Certificate" class="form-control" onchange="ValidateSingleInput(this);" id="Certificate" class="form-control-file  Certificate" accept=".png,.jpg,.pdf" >
		<br>
	    <span><img src="<?php echo $edituser[0]['gstimg']?>" style="height: 160px; width: 100%;"></span>
	    </div>
	    
	    <div class="col-md-4">
		Aadhar  <input type="file" class="form-control" name="Certificate1" onchange="ValidateSingleInput(this);" id="Certificate1" class="form-control-file" accept=".png,.jpg,.pdf">
		<br>
		    <?php if($edituser[0]['adhaar_img']){ ?>
	    <span><img src="<?php echo $edituser[0]['adhaar_img']?>" style="height: 160px; width: 100%;"></span>
	    </div>
	    
	    <?php } ?>
	    
		<div class="col-md-12">
		<input type="submit" name="Update" value="Update" class="btn btn-success pull-right">
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



<!--Number-->
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