<?php

include('header.php');
include('sidebar.php');
?>


	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">
<section>
       <center><h2><u><strong>Edit Material</strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/updatematerial');?>" class="form-group">
<br>

   <input type="hidden" name="id" value="<?=$result->id?>">
	
          <label>Category ID</label>
        <input name="category" type="text" value="<?=$result->category?>" required class="form-control">

<label>Material Name</label>
        <input name="name" type="text" value="<?=$result->name?>" required class="form-control">
  

        <br>        
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                        </section>

        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>