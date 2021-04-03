
<?php

include('header.php');
include('sidebar.php');
?>



 <aside class="right-side">
          
            <!-- Main content -->
            <section class="content-header">
              
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">




	<div class="container">
  <div class="row">
    <div class="col-md-12">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatepincode');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messages[0]['id']?>">
		     <div class="col-md-6">
          Type
          <select class="form-control" name="type">
            <option value="metro" <?php if($messages[0]['pincodecat']=='metro'){ echo "selected"; } ?>>Metro</option>
            <option value="local" <?php if($messages[0]['pincodecat']=='local'){ echo "selected"; } ?>>Local</option>
            <option value="other" <?php if($messages[0]['pincodecat']=='other'){ echo "selected"; } ?>>Other</option>
          </select>
          <br></div>
		 <div class="col-md-6">

		 Name<input type="text" name="catname"  value="<?php echo $messages[0]['name']?>" class="form-control"><br></div>  

 <div class="col-md-6">

     Post Office<input type="text" name="post_office"  class="form-control" value="<?php echo $messages[0]['post_office']; ?>"><br></div>  
 <div class="col-md-6">

     Area<input type="text" name="area"  class="form-control" value="<?php echo $messages[0]['area']; ?>"><br></div>  

     <div class="col-md-6">

     State<input type="text" name="state" class="form-control" value="<?php echo $messages[0]['state']; ?>"><br></div>  
     
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	</section>
	</aside>

<?php
include 'footer.php';
?>