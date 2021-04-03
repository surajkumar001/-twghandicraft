
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatecoupon');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messages[0]['id']?>">
		      
       
         <div class="col-md-6">
             Name<input type="text" name="coupon_name"  value="<?php echo $messages[0]['coupon_name']; ?>" class="form-control">
        
          <br></div>
     <div class="col-md-6">

     Percent<input type="text" name="coupon_percent"  value="<?php echo $messages[0]['coupon_percent']; ?>" class="form-control"><br></div>  

 <div class="col-md-6">

     Max. Discount<input type="text" name="max_discount"  value="<?php echo $messages[0]['max_discount']; ?>" class="form-control"><br></div>  
 <div class="col-md-6">

     Start Date<input type="date" class="form-control" id="rangepicker5" name="start_date" value="<?php echo $messages[0]['start_date']; ?>"><br></div>  

     <div class="col-md-6">

     End Date<input type="date" class="form-control" id="rangepicker4" name="end_date" value="<?php echo $messages[0]['end_date']; ?>"><br></div>  
     
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>