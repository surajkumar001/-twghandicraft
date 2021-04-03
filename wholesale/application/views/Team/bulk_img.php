<?php

include('header.php');
include('sidebar.php');
?>


	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Bulk Image Upload</strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/bulk_upload');?>" enctype="multipart/form-data" class="form-group"><br>
     
		
		 <div class="col-md-12">
		 Image<input type="file" name="file[]"  value="" class="form-control" multiple><br></div>    
       
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Upload Image </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>