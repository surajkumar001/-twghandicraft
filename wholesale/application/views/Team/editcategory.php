
<?php

include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatecategory');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messagess[0]['id']?>">
		
		 <div class="col-md-6"></div> 

		  <label>Name </label><input type="text" name="catname"  value="<?php echo $messagess[0]['name']?>" class="form-control"><br> 

        <label>Meta Tag </label>
        <input name="meta_tag" type="text"   id="meta_tag"  value="<?php echo $messagess[0]['meta_tag']?>"  class="form-control">
       <label>Meta Key</label>
        <input name="meta_key" type="text"   id="meta_key"   value="<?php echo $messagess[0]['meta_key']?>" class="form-control">
       <label>Meta Des</label>
        <!--<input name="meta_des" type="text"   id="meta_des"   value="<?php echo $messagess[0]['meta_des']?>" class="form-control">-->
        <textarea type="text"  name="meta_des"  class="form-control"><?php echo $messagess[0]['meta_des']?></textarea>

      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>