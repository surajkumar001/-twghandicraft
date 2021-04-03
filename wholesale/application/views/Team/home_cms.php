<?php

include('header.php');
include('sidebar.php');
?>


	<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">

<section>
       <center><h2><u><strong>Home Page CMS </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/update_homecms');?>" enctype="multipart/form-data" class="form-group"><br>
      <input type="hidden" name="id" value="<?= $result->id ?>" class="form-control">
    <div class="col-md-12">
    facebook Link<input type="text" name="facebook_link" value="<?= $result->facebook_link ?>" class="form-control">    
     <br></div>
	<div class="col-md-12">
    Instagram Link<input type="text" name="insta_link" value="<?= $result->insta_link ?>" class="form-control">    
     <br></div>
	<div class="col-md-12">
    Twitter Link<input type="text" name="twitter_link" value="<?= $result->twitter_link ?>" class="form-control">    
     <br></div>
	<div class="col-md-12">
    Linkedin Link <input type="text" name="linkedin_link" value="<?= $result->linkedin_link ?>" class="form-control">    
     <br></div>
	<div class="col-md-12">
    Meta Title<input type="text" name="meta_title" value="<?= $result->meta_title ?>" class="form-control">    
     <br></div>
		
		<div class="col-md-12">
    Meta Key<input type="text" name="meta_key" value="<?= $result->meta_key ?>" class="form-control">    
     <br></div>
		
	<div class="col-md-12">
        Meta Des     
        <textarea type="text" name="meta_des" rows="8" class="form-control"><?= $result->meta_des ?></textarea>
    <br></div>
    
    <div class="col-md-12" style="margin-left: -10px;">
        &nbsp &nbsp Home Description     
        <textarea type="text" id='editor2' name="home_des" rows="8" class="form-control"><?= $result->home_des ?></textarea>
        <br>
    </div>
		
	<div class="col-md-12">
	   <center><button type="submit" id="submit" value="submit" class="btn btn-primary" style="padding: 8px 40px;">Save </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>