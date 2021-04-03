<?php

include('header.php');
include('sidebar.php');
?>


	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Slider Image </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/sliderUpload');?>" enctype="multipart/form-data" class="form-group"><br>
      <div class="col-md-12">
    Name<input type="text" name="name"  class="form-control">    
     <br></div>
	<div class="col-md-12">
    Link<input type="text" name="link"  class="form-control">    
     <br></div>
	<div class="col-md-12">
    position<input type="text" name="position"  class="form-control">    
     <br></div>
		
		 <div class="col-md-12">
		 Image<input type="file" name="file"  value="" class="form-control" ><br></div>    
       
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Upload Image </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>