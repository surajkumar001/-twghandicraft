
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>ADD Pincode </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/addpincode');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$message[0]['id']?>">
		     <div class="col-md-6">
          Type
          <select class="form-control" name="type">
            <option value="metro" >Metro</option>
            <option value="local">Local</option>
            <option value="other" >National</option>
          </select>
          <br></div>
		 <div class="col-md-6">

		 Name<input type="text" name="catname"  value="" class="form-control"><br></div>  

 <div class="col-md-6">

     Post Office<input type="text" name="post_office"  value="" class="form-control"><br></div>  
 <div class="col-md-6">

     Area<input type="text" name="area"  value="" class="form-control"><br></div>  

     <div class="col-md-6">

     State<input type="text" name="state"  value="" class="form-control"><br></div>  
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Add </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>