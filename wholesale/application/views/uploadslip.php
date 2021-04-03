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
                <li class="breadcrumb-item active" aria-current="page">Upload Bank Slip</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="terms-conditions-page mg-bt-3">
          <h2 class="heading-title">Upload Bank Slip</h2>
          <form action="<?php echo base_url('Artnhub/offline_order'); ?>"   method="post" enctype="multipart/form-data" >
          <div class="row">
          
          <div class="col-md-3">
              <div class="radio">
                    <label>
                        <input type="radio" name="credits" id="offline" onchange="online_pay(<?php echo round(($_SESSION['totalprice'])/4,2) ?>);"  value="<?php echo round(($_SESSION['totalprice'])/4,2) ?>" ><p>25% payment (<?php echo round(($_SESSION['totalprice'])/4,2) ?>Rs.)</p></label>
                </div>
          </div>
              <div class="col-md-3">
                    <div class="radio">
                        <label><input type="radio" name="credits" id="offline" onchange="online_pay(<?php echo round(($_SESSION['totalprice']),2) ?>);" value="<?php echo round(($_SESSION['totalprice']),2) ?>" ><p>100% payment(<?php echo round(($_SESSION['totalprice']),2) ?>Rs.) </p></label>
                   <input type="hidden" class="form-control amount"  id="25Advance" value="<?php echo round(($_SESSION['totalprice'])/4,2) ?>" Placeholder="25 Advance Amount">
                <input type="hidden" class="form-control amount"  id="100" value="<?php echo round(($_SESSION['totalprice']),2) ?>" Placeholder="100 Advance Amount">
                <input type="hidden" class="form-control amount"   id="10Advance" value="<?php echo round(($_SESSION['totalprice'])/10,2) ?>"  Placeholder="10 Advance Amount">
               
                     </div>
                  </div>
            </div>
         <div class="row">
            <div class="col-md-2 terms-conditions">
                <label>Bank Transfer Amount</label>
                <input type="text" class="form-control amount" name="advance_amount" onkeypress="return isNumberKey(event)" id="Advance" Placeholder="Min Adv Amount" required="required">
                
            </div>
            <div class="col-md-2 terms-conditions" style="padding-right: 7px;">
                <label>Transfer Date</label>
                <input type="date" class="form-control" name="offline_transferdate" Placeholder="Enter Transfer Date" required="required">
            </div>
            <div class="col-md-2 terms-conditions" style="padding-right: 7px;">
                <label>Do you have UTR No?</label>
                <select class="form-control" id="utr" required>
                    <option value=''>---Select---</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="col-md-3 terms-conditions" style="display:none;" id="utrno">
                <label>UTR Number</label>
                <input type="text" class="form-control" id  = "utr_no" name="utr_number" Placeholder="Enter UTR Number">
            </div>
            
            <div class="col-md-2 terms-conditions" style="display:none;" id="slip">
               <label>Upload Bank Slip</label>
               <input type="file" name="upload_file" id = "file_upload" class="form-control" accept=".pdf,.jpg" >
            </div>
          
            <div class="col-md-1 terms-conditions" style="padding-top: 16px;">
                <input type="submit" value="submit" class="btn btn-primary" style="width: 100%;padding: 10px;margin-top: 15%;">
            </div>
         </div>
         </form>
            <div class="row">
				<div class="col-md-12" style="padding: 20px 15px;">
				    <p>This Service Only available for the <b>Bank Transfer/NEFT/RTGS/Cash Deposit</b> in Our Company Bank Account.</p>
				    <p>Account Name : ARTNHUB</p>
				    <p>Account No: XXXXXXXXX</p>
				    <p>IFSC Code: ABC0000180</p>
				    <p>Bank Name: ABC Bank</p>
				    <p><b>Note*</b> Order Will be Confirm after Verifying Payment Status in Our Company Account.</p>
				</div>
			</div>
		 <?php echo $message[0]['terms']; ?>
      </div>
   </div>
</div>
<!-- /.row -->
</div><!-- /.sigin-in-->
</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php include('footer.php'); ?>


<script>
    
    function online_pay(id){
    
   $("#Advance").val(id) ; 
    
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}
</script>

<script>
  $(document).on('change',".amount", function(){    
      
      $("input:radio").removeAttr("checked");
      
    var inputvalues = $(this).val();
    
    var min_amount = $('#10Advance').val() ;
    
    var amount  = $('#Advance').val() ; 
    
    if (Number(amount) >= Number(min_amount) ) {
     return true;
    } else {
        alert('Please Enter Minmum 10% Advance Amount');
        $("#Advance").val('');
        $("#Advance").focus();
    }
    
});
</script>
<script language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
       
         $("#file_upload").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#file_upload").val(null);
        }

    });
      
    </script>
 <script>
    $("#utr").change(function (){
		var value = this.value;
		if(value=='Yes'){
            $('#utrno').show();
            $('#slip').show();
            
            $("#utr_no").attr("required", "true");
            
             $("#file_upload").removeAttr("required"); 
          
        }
        else {
            $('#utrno').hide();
            $('#slip').show();
            
               $("#file_upload").attr("required", "true");
            
              $("#utr_no").removeAttr("required"); 
          }
    });
   
</script>
