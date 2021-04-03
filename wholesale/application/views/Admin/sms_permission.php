

<?php
$priv = $message[0]['role'];
$priveledges =  (explode(",",$priv));
include 'header.php';

include('sidebar.php');

?>



  <div class="container">

  <div class="row">

    <div class="col-md-12 col-md-offset-2">



<section>
    <?php $user_rm = $this->db->get_where('rm', array('id'=> $user_id ))->row() ; ?>
    
      <h3><u><strong>Add SMS Permission</strong></u> </h3> 

    <!--<form name="form3" method="post" action="<?php echo base_url('Admin/updatePrevileges');?>" class="form-group">-->
        <form name="form3" method="post" action="<?php echo base_url('Admin/insert_sms');?>" class="form-group">
         <input type="hidden" name="user_id" value="<?= $user_id ;?>" >   
         
       
  <br>
     <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                          
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'new_registration'))->row() ; ?>
      <h4>New Registration:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="new_registration_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="new_registration_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="new_registration_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="new_registration_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="new_registration_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="new_registration_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Account_Approved'))->row() ; ?>
      <h4>Account Approved:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Account_Approved_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Account_Approved_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Approved_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Approved_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Approved_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Approved_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

     <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Account_Disapproved'))->row() ; ?>
      <h4>Account Disapproved:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Account_Disapproved_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Account_Disapproved_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Disapproved_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Disapproved_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Disapproved_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Account_Disapproved_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Discount_Approved'))->row() ; ?>
      <h4>Discount Approved:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Discount_Approved_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Discount_Approved_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Discount_Approved_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Discount_Approved_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Discount_Approved_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Discount_Approved_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
     <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Payment'))->row() ; ?>
      <h4>Order Payment:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Payment_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Payment_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Payment_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Payment_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Payment_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Payment_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Booked'))->row() ; ?>
      <h4>Order Booked:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Booked_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Booked_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Booked_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Booked_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Booked_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Booked_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Pending'))->row() ; ?>
      <h4>Order Pending:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Pending_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Pending_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Pending_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Pending_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Pending_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Pending_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
   <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Readyship'))->row() ; ?>
      <h4>Order Ready to ship:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Readyship_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Readyship_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Readyship_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Readyship_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Readyship_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Readyship_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Shipped'))->row() ; ?>
      <h4>Order Shipped:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Shipped_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Shipped_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Shipped_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Shipped_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Shipped_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Shipped_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Cancelled'))->row() ; ?>
      <h4>Order Cancelled:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Cancelled_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Cancelled_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Cancelled_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Cancelled_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Cancelled_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Cancelled_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Order_Information'))->row() ; ?>
      <h4>Order Information:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Information_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Order_Information_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Information_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Information_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Information_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Order_Information_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'ProductionOrder_Booked'))->row() ; ?>
      <h4>Production Order Booked:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="ProductionOrder_Booked_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="ProductionOrder_Booked_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="ProductionOrder_Booked_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="ProductionOrder_Booked_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="ProductionOrder_Booked_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="ProductionOrder_Booked_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'Payment_Verified'))->row() ; ?>
      <h4>Payment Verified:</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Payment_Verified_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Payment_Verified_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Payment_Verified_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Payment_Verified_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Payment_Verified_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="Payment_Verified_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
    <div class="row">
          <?php $role = $this->db->get_where('sms_permission', array('name'=> 'low_amount'))->row() ; ?>
      <h4>Low Amount :</h4>
      <div class="col-md-2">Client SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="low_amount_sms" id="ownership" required="">
           <option value="No"  <?php if($role->sms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->sms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
     <div class="col-md-2">Self SMS
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="low_amount_adminsms" id="ownership" required="">
           <option value="No"  <?php if($role->adminsms == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminsms == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
      
      </div>
      <div class="col-md-2">Client Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="low_amount_email" id="ownership" required="">
           <option value="No"  <?php if($role->email == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->email == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
        <div class="col-md-2">Self Email
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="low_amount_adminemail" id="ownership" required="">
           <option value="No"  <?php if($role->adminemail == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminemail == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
          <div class="col-md-2">Client Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="low_amount_whatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->whatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->whatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     <div class="col-md-2">Self Whatsapp
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
          <select class="form-control" name="low_amount_adminwhatsapp" id="ownership" required="">
           <option value="No"  <?php if($role->adminwhatsapp == 'No'){echo "selected" ;} ?>>No</option>
           <option value="Yes" <?php if($role->adminwhatsapp == 'Yes'){echo "selected" ;} ?>>Yes</option>
        
      </select>
     
          </div>
     
      </div>

   
   
     <div class="row">
        <div class="col-md-2">
          <input type="submit" name="Submit" class="btn btn-success btn-block">
       </div>
    </div>
    </form>
      </section>

                </div>
            </div>
        </div>




<?php

include 'footer.php';

?>

