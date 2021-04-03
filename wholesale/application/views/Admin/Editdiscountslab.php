
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatediscountslab');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messages[0]['id']?>">
		    
	 <div class="col-md-6">

     Quantity Discount Slab<input type="text" name="quan"  value="<?php echo $messages[0]['disc_slab']; ?>" class="form-control"><br></div>  


     <div class="col-md-6">

     Discount %<input type="text" name="discount"  value="<?php echo $messages[0]['disc_per']; ?>" class="form-control"><br></div>  


     <div class="col-md-6">

     Discount Code<input type="text" name="code"  value="<?php echo $messages[0]['disc_code']; ?>" class="form-control"><br></div>  


     <div class="col-md-6">

     Product Page Show<input type="text" name="pgeshow"  value="<?php echo $messages[0]['disc_show']; ?>" class="form-control"><br></div>  

     
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>