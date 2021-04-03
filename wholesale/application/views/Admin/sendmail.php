<?php

include('header.php');
include('sidebar.php');
?>


	<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">

<section>
       <center><h2><u><strong>Send Message </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/adminsendmail');?>" enctype="multipart/form-data" class="form-group"><br>
      <input type="hidden" name="id" value="<?= $result->id ?>" class="form-control">
      
      <?php 
            $user  = $this->db->get_where('customerlogin', array('otp_validation' => 1 ,))->result() ;
	
	?>
    <div class="col-md-12">
   Select Customer  
   
   <select class="form-control" name="user_id" id="selectbox" required>
                       <option value="All">---All Customer---</option>
                       <?php foreach($user as $user){ ?>
                       <option  value="<?=   $user->id ?>"><?php echo $user->Owner ; ?></option>
                      <?php } ?>
                      
                                           </select> <br></div>
                                           <br>
   
   	<div class="col-md-12">
    <input type="checkbox" name="sendemail" value="Yes"  > Email   
   
     <br></div>
    	<div class="col-md-12">
    <input type="checkbox" name="sendsms"   value="Yes" > SMS   
   
     <br></div>
    	<div class="col-md-12">
    <input type="checkbox" name="whatsapp"  value="Yes"  > Whatsapp   
   
     <br></div>
                                           
                  <br> <br>                          
      <div id="all" style="display:none" >                                     
	<div class="col-md-6">
    Email<input type="text" name="email" placeholder="Enter Email"  class="form-control">    
     <br></div>
     
     
	<div class="col-md-6">
    Moblie<input type="text" name="mobile" placeholder="mobile" class="form-control">    
     <br></div>
     </div>
	<div class="col-md-12">
    Subject <input type="text" name="subject"  placeholder="subject"  class="form-control">    
     <br></div>
<div class="col-md-12" style="margin-left: -10px;">
        &nbsp &nbsp Message    
        <textarea type="text" id='editor2' name="message" rows="8" class="form-control"></textarea>
        <br>
    </div>
			
	
	<div class="col-md-12">
	   <center><button type="submit" id="submit" value="submit" class="btn btn-primary" style="padding: 8px 40px;">Send </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>

<script>
      $("#selectbox").change(function () {
    if ($(this).val() != "All") {
        // $('#myModal3').modal('show');
         $("#all").show();
         
         
      }else{
           $("#all").hide();
            // $("#apply_btn").show();
      }
  });
</script>