
<?php

include('header.php');
include('sidebar.php');
?>

<style>
    .cke_inner.cke_reset {
        margin-left: -10px;
        margin-right: 14px;
    }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
<?php  $contact =  $this->db->get_where('contact' , array('id' =>1 ))->row() ; ?>
<section>
       <center><h2><u><strong>Contact Information </strong></u> </h2></center>
    <form action="<?=  base_url("Admin/add_contact") ; ?>"  method="post"  enctype="multipart/form-data" class="form-group"><br>
      <div class="col-md-12">Mailing Email Id
        <input type="text" name="mailing" value="<?= $contact->mailing ; ?>"  class="form-control">    
      <br>
     </div>
     <div class="col-md-12">Mobile Number
        <input type="text" name="phone" value="<?= $contact->phone ; ?>"  class="form-control">    
      <br>
     </div>
     <div class="col-md-12">Email Id
        <input type="text" name="email" value="<?= $contact->email ; ?>"   class="form-control">    
      <br>
     </div>
     <div class="col-md-12">Address
        <textarea name="address" class="form-control"><?= $contact->address ; ?></textarea>    
      <br>
     </div>
     <div class="col-md-12">Add Content
        <textarea name="content" id="editor2"  class="form-control"><?= $contact->content ; ?></textarea>    
      <br>
     </div>
     
     
       
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	

<?php
include 'footer.php';
?>