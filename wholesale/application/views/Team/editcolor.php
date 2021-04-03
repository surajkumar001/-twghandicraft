
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatecolor');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$message[0]['id']?>">
		
		 <div class="col-md-6">
		 Name<input type="text" name="c_name"  value="<?php echo $message[0]['color_name']?>" class="form-control"><br></div>    
      <div class="col-md-6">
     Code<input type="text" name="c_code"  value="<?php echo $message[0]['color_code']?>" class="form-control"><br></div>    
       
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>