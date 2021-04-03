
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
<?php  $contact =  $this->db->get_where('admin_mail' , array('id' =>1 ))->row() ; ?>
<section>
       <center><h2><u><strong>Mail Information </strong></u> </h2></center>
    <form action="<?=  base_url("Admin/add_mail") ; ?>"  method="post"  enctype="multipart/form-data" class="form-group"><br>
      <div class="col-md-12">From Mailing Email Id
        <input type="text" name="mailing" value="<?= $contact->send_mail ; ?>"  class="form-control">    
      <br>
     </div>
     <div class="col-md-12">Admin Email Id
        <input type="text" name="email" value="<?= $contact->admin_mail ; ?>"   class="form-control">    
      <br>
     </div>
     <div class="col-md-12">Mobile Number
        <input type="text" name="phone" value="<?= $contact->mobile ; ?>"  class="form-control">    
      <br>
     </div>
     
    
      <div class="col-md-12">Customer support team Number
        <input type="text" name="show_contact" value="<?= $contact->show_contact ; ?>"  class="form-control">    
      <br>
     </div>
     
    
      <div class="col-md-12">Admin Name
        <input type="text" name="name" value="<?= $contact->name ; ?>"  class="form-control">    
      <br>
     </div>
     
    
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