
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>ADD Discount Slab </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/adddiscountslab');?>" enctype="multipart/form-data" class="form-group"><br>

    

		 <div class="col-md-6">

		 Quantity Discount Slab<input type="text" name="quan"  value="" class="form-control"><br></div>  


     <div class="col-md-6">

     Discount %<input type="text" name="discount"  value="" class="form-control"><br></div>  


     <div class="col-md-6">

     Discount Code<input type="text" name="code"  value="" class="form-control"><br></div>  


     <div class="col-md-6">

     Product Page Show<input type="text" name="pgeshow"  value="" class="form-control"><br></div>  


     
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Add </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>