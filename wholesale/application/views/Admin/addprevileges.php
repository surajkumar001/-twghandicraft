

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
    
      <h3><u><strong>Add Previleges</strong></u> <span style="margin-left:20px;"> </span> (<?= $user_rm->rm_name ; ?>) </span> </h3> 

    <!--<form name="form3" method="post" action="<?php echo base_url('Admin/updatePrevileges');?>" class="form-group">-->
        <form name="form3" method="post" action="<?php echo base_url('Admin/insertPrevileges');?>" class="form-group">
         <input type="hidden" name="user_id" value="<?= $user_id ;?>" >   
         
       
  <br>
     <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                          
    <div class="row">
          <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'Inventory'))->row() ; ?>
      <h4>Inventory:</h4>
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Inventory_view" id="ownership" required="">
                                               <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="Inventory_edit" id="ownership" required="">
                                             <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Inventory_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Inventory_upload" id="ownership" required="">
                                          <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
     
    </div>
      <div class="row">
          <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'NewOrder'))->row() ; ?>
      <h4>New Order:</h4>
      <!--<div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Edit<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Downlod<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
           <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="NewOrder_view" id="ownership" required="">
                                           <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="NewOrder_edit" id="ownership" required="">
                                         <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                                <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="NewOrder_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
     
    </div>
    <div class="row">
      <h4>Production Order:</h4>
       
      <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'ProductionOrder'))->row() ; ?>
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="ProductionOrder_view" id="ownership" required="">
                                        <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                                <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="ProductionOrder_edit" id="ownership" required="">
                                         <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                               <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="ProductionOrder_download" id="ownership" required="">
                                         <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                                <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
     
     
    </div>
    <div class="row">
      <h4>Order List:</h4>
        
        <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'Orderlist'))->row() ; ?>
        <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Orderlist_view" id="ownership" required="">
                                          <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                               <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="Orderlist_edit" id="ownership" required="">
                                           <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Orderlist_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      
      <div class="col-md-2">RM No.
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Orderlist_rm" id="ownership" required="">
                                           <option >---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>" <?php if($rm->id  == $role->rm_no ){ echo "selected" ; } ?>><?php echo $rm->rm_name ; ?>(<?php echo $rm->id ; ?>)</option>
                                          <?php } ?> 
                                        </select>
      
      </div>
    </div>
    
    
    <div class="row">
      <h4>Production Order List:</h4>
       
        <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'Productionlist'))->row() ; ?>
        <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Productionlist_view" id="ownership" required="">
                                          <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="Productionlist_edit" id="ownership" required="">
                                            <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Productionlist_download" id="ownership" required="">
                                           <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
      
      </div>
      
      <div class="col-md-2">RM No.
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Productionlist_rm" id="ownership" required="">
                                           <option >---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>"<?php if($rm->id  == $role->rm_no ){ echo "selected" ; } ?>><?php echo $rm->rm_name ; ?>(<?php echo $rm->id ; ?>)</option>
                                          <?php } ?>  
                                        </select>
      
      </div>
    </div>
    <div class="row">
      <h4>Customers:</h4>
    
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'customer'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="customer_view" id="ownership" required="">
                                           <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="customer_edit" id="ownership" required="">
                                           <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="customer_download" id="ownership" required="">
                                             <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="customer_upload" id="ownership" required="">
                                         <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
      <div class="col-md-2">RM No.  
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="customer_rm" id="ownership" required="">
                                        <option >---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>" <?php if($rm->id  == $role->rm_no ){ echo "selected" ; } ?>><?php echo $rm->rm_name ; ?>(<?php echo $rm->id ; ?>)</option>
                                          <?php } ?>
                                          
                                           </select>    
                                      
    </div>
    </div>
    <div class="row">
      <h4>Ledger:</h4>
      <!--<div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Downlod<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">RM No.<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      
              <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'Ledger'))->row() ; ?>
        <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Ledger_view" id="ownership" required="">
                                           <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
    
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Ledger_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      
      <div class="col-md-2">RM No.
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Ledger_rm" id="ownership" required="">
                                          <option >---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>"<?php if($rm->id  == $role->rm_no ){ echo "selected" ; } ?>><?php echo $rm->rm_name ; ?>(<?php echo $rm->id ; ?>)</option>
                                          <?php } ?>       
                                        </select>
      
      </div>
      
    </div>
    <div class="row">
      <h4>Payment:</h4>
      <!--<div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Downlod<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">RM No.<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      
              <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'Payment'))->row() ; ?>
        <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="Payment_view" id="ownership" required="">
                                           <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
    
    <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="Payment_edit" id="ownership" required="">
                                           <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="Payment_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      
      <!--<div class="col-md-2">RM No.-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
      <!-- <select class="form-control" name="Payment_rm" id="ownership" required="">-->
      <!--                                    <option >---Select RM---</option>-->
      <!--                                     <?php foreach($rm_list as $rm){ ?>-->
      <!--                                     <option  value="<?= $rm->id ?>"><?php echo $rm->rm_name ; ?></option>-->
      <!--                                    <?php } ?>       -->
      <!--                                  </select>-->
      
      <!--</div>-->
      
    </div>
    <div class="row">
      <h4>List Product:</h4>
      <!--<div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Edit<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Upload<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      <!--<div class="col-md-2">Active/Inactive<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
      
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'ListProduct'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="ListProduct_view" id="ownership" required="">
                                          <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="ListProduct_edit" id="ownership" required="">
                                          <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="ListProduct_download" id="ownership" required="">
                                             <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="ListProduct_upload" id="ownership" required="">
                                         <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
      <div class="col-md-2">Active/Inactive
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="ListProduct_active" id="ownership" required="">
                                            <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
    </div>
    
    </div>
    <div class="row">
      <h4>Bulk Price:</h4>
      
      
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'BulkPrice'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="BulkPrice_view" id="ownership" required="">
                                             <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="BulkPrice_edit" id="ownership" required="">
                                            <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="BulkPrice_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="BulkPrice_upload" id="ownership" required="">
                                          <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
    </div>
    <div class="row">
      <h4>Nav Bar:</h4>
       
             <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'ListProduct'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="NavBar_view" id="ownership" required="">
                                              <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
          <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
          
           <select class="form-control" name="NavBar_edit" id="ownership" required="">
                                           <option value="No"  <?php if($role->edit == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->edit == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                             
                                        </select>
          
          </div>
  
 
      
      <div class="col-md-2">Active/Inactive
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="NavBar_active" id="ownership" required="">
                                          <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
    </div>
    
    </div>
    
     <div class="row">
      <h4>Bulk Image List:</h4>
    
           <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'BulkImage'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="BulkImage_view" id="ownership" required="">
                                          <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="BulkImage_download" id="ownership" required="">
                                           <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      
        <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="BulkImage_upload" id="ownership" required="">
                                      <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                                 <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
      </div>
    
    
     
    <div class="row">
      <h4>Home Page Category:</h4>
        
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'homecategory'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="homecategory_view" id="ownership" required="">
                                           <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
   
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="homecategory_download" id="ownership" required="">
                                            <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Upload
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="homecategory_upload" id="ownership" required="">
                                          <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                              <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      
      <div class="col-md-2">Delete
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="homecategory_active" id="ownership" required="">
                                            <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>
                                           <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
    </div>
    
    </div>
    <div class="row">
      <h4>CMS:</h4>
        
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'cms'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="cms_view" id="ownership" required="">
                                            <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
   
      <!--<div class="col-md-2">Downlod-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
      <!-- <select class="form-control" name="cms_download" id="ownership" required="">-->
      <!--                                   <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>-->
      <!--                                         <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                           
      <!--                                  </select>-->
      
      <!--</div>-->
      <div class="col-md-2">Update
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="cms_upload" id="ownership" required="">
                                          <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
    <!--  <div class="col-md-2">Active-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
    <!--   <select class="form-control" name="cms_active" id="ownership" required="">-->
    <!--                                       <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                        <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                           
    <!--                                    </select>-->
    <!--</div>-->
    
    </div>
    
    <div class="row">
      <h4>Product Management:</h4>
        
       <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'product_management'))->row() ; ?>
       
      <div class="col-md-2">View
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="product_management_view" id="ownership" required="">
                                            <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>
                                            <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
   
      <div class="col-md-2">Downlod
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
       <select class="form-control" name="product_management_download" id="ownership" required="">
                                         <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>
                                               <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                           
                                        </select>
      
      </div>
      <div class="col-md-2">Edit
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
       <select class="form-control" name="product_management_edit" id="ownership" required="">
                                          <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>
                                             <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>
                                            
                                        </select>
      
      </div>
      
    <!--  <div class="col-md-2">Active-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
    <!--   <select class="form-control" name="product_management_active" id="ownership" required="">-->
    <!--                                       <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                        <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                           
    <!--                                    </select>-->
    <!--</div>-->
    
    </div>
    <!--<div class="row">-->
    <!--  <h4>Excel Sheet List:</h4>-->
        
    <!--   <?php $role = $this->db->get_where('team_role', array('user_id'=> $user_id , 'navbar_name'=> 'excel'))->row() ; ?>-->
       
    <!--  <div class="col-md-2">View-->
      
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
    <!--   <select class="form-control" name="excel_view" id="ownership" required="">-->
    <!--                                        <option value="No"  <?php if($role->view == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                        <option value="Yes" <?php if($role->view == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                            
    <!--                                    </select>-->
      
    <!--  </div>-->
   
    <!--  <div class="col-md-2">Downlod-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
    <!--   <select class="form-control" name="excel_download" id="ownership" required="">-->
    <!--                                     <option value="No"  <?php if($role->download == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                           <option value="Yes" <?php if($role->download == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                           
    <!--                                    </select>-->
      
    <!--  </div>-->
    <!--  <div class="col-md-2">Upload-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
    <!--   <select class="form-control" name="excel_upload" id="ownership" required="">-->
    <!--                                      <option value="No"  <?php if($role->upload == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                         <option value="Yes" <?php if($role->upload == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                            
    <!--                                    </select>-->
      
    <!--  </div>-->
      
    <!--  <div class="col-md-2">Active-->
      <!--<input type="checkbox" name="art[]" <?php if (in_array("1", $priveledges)){ echo 'Checked';} ?> value="1">-->
      
    <!--   <select class="form-control" name="excel_active" id="ownership" required="">-->
    <!--                                       <option value="No"  <?php if($role->active == 'No'){echo "selected" ;} ?>>No</option>-->
    <!--                                        <option value="Yes" <?php if($role->active == 'Yes'){echo "selected" ;} ?>>Yes</option>-->
                                           
    <!--                                    </select>-->
    <!--</div>-->
    
    <!--</div>-->
    
    <!--<div class="row">-->
    <!--  <h4>Video:</h4>-->
    <!--  <div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!-- <div class="col-md-2">Uplaod<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--  <div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Delete<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->

    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h4>Broucher List:</h4>-->
    <!--  <div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!-- <div class="col-md-2">Uplaod<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--  <div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Delete<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->

    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h4>Excel Sheet List:</h4>-->
    <!--  <div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!-- <div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--  <div class="col-md-2">Approve<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Delete<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->

    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h4>Home Page Category:</h4>-->
    <!--  <div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!-- <div class="col-md-2">Edit<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--  <div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Upload<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Active/Inactive<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->

    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h4>CMS:</h4>-->
    <!--  <div class="col-md-2">View<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!-- <div class="col-md-2">Edit<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--  <div class="col-md-2">Download<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Upload<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->
    <!--<div class="col-md-2">Active/Inactive<input type="checkbox" name="art[]" <?php if (in_array("28", $priveledges)){ echo 'Checked';} ?> value="28"></div>-->

    <!--</div>-->
    
    
    
    <!--    <div class="row">-->
    <!--  <h3>CMS:</h3>-->
    <!--  <div class="col-md-3">FAQ<input type="checkbox" name="art[]" value="2" <?php if (in_array("2", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--  <div class="col-md-3">Terms And Conditions<input type="checkbox" name="art[]" value="3" <?php if (in_array("3", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--   <div class="col-md-3">Return Policy<input type="checkbox" name="art[]" value="4" <?php if (in_array("4", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--    <div class="col-md-3">Shipping Policy<input type="checkbox" name="art[]" value="5" <?php if (in_array("5", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--     <div class="col-md-3">Shopping Guide<input type="checkbox" name="art[]" value="6" <?php if (in_array("6", $priveledges)){ echo 'Checked';} ?>> </div>-->
    <!--</div> -->
     
    <!--<div class="row">-->
    <!--  <h3>Customers:</h3>-->
    <!--  <div class="col-md-3">Customers<input type="checkbox" name="art[]" value="7" <?php if (in_array("7", $priveledges)){ echo 'Checked';} ?>></div>-->
     
    <!--</div>-->
    <!-- <div class="row">-->
    <!--  <h3>Inventory:</h3>-->
    <!--  <div class="col-md-3">Inventory<input type="checkbox" name="art[]" value="8" <?php if (in_array("8", $priveledges)){ echo 'Checked';} ?>></div>-->
     
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h3>New Bar 1:</h3>-->
    <!--  <div class="col-md-3"> List Parent Category<input type="checkbox" name="art[]" value="9" <?php if (in_array("9", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--  <div class="col-md-3"> List Category<input type="checkbox" name="art[]" value="10" <?php if (in_array("10", $priveledges)){ echo 'Checked';} ?>> </div>-->
    <!--   <div class="col-md-3"> List Sub Category<input type="checkbox" name="art[]" value="11" <?php if (in_array("11", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!-- </div> -->
         
    <!-- <div class="row">-->
    <!--  <h3>List Pincode:</h3>-->
    <!--  <div class="col-md-3">List Pincode<input type="checkbox" name="art[]" value="14" <?php if (in_array("14", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!-- <div class="row">-->
    <!--  <h3>List Discount Slab:</h3>-->
    <!--  <div class="col-md-3">List Discount Slab<input type="checkbox" name="art[]" value="15" <?php if (in_array("15", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h3>List Bulk Image:</h3>-->
    <!--  <div class="col-md-3">List Bulk Image<input type="checkbox" name="art[]" value="16" <?php if (in_array("16", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h3>Rating & Review:</h3>-->
    <!--  <div class="col-md-3">Rating & Review<input type="checkbox" name="art[]" value="17" <?php if (in_array("17", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!--  <div class="row">-->
    <!--  <h3>Coupon Detail:</h3>-->
    <!--  <div class="col-md-3">Coupon Detail<input type="checkbox" name="art[]" value="18" <?php if (in_array("18", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!--<div class="row">-->
    <!--  <h3>Personlized Gifts:</h3>-->
    <!--  <div class="col-md-3"> List Category<input type="checkbox" name="art[]" value="19" <?php if (in_array("19", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--  <div class="col-md-3">  Occasion<input type="checkbox" name="art[]" value="20" <?php if (in_array("20", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--   <div class="col-md-3">Themes<input type="checkbox" name="art[]" value="21" <?php if (in_array("21", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--   <div class="col-md-3">List Product<input type="checkbox" name="art[]" value="22" <?php if (in_array("22", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!-- </div>-->
    <!--  <div class="row">-->
    <!--  <h3>Video List:</h3>-->
    <!--  <div class="col-md-3">Video List<input type="checkbox" name="art[]" value="23" <?php if (in_array("23", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!--   <div class="row">-->
    <!--  <h3>Excel Sheet List:</h3>-->
    <!--  <div class="col-md-3">Excel Sheet List<input type="checkbox" name="art[]" value="25" <?php if (in_array("25", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div> -->
    <!--   <div class="row">-->
    <!--  <h3>Promotion Category:</h3>-->
    <!--  <div class="col-md-3">Promotion Category<input type="checkbox" name="art[]" value="26" <?php if (in_array("26", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>-->
    <!-- <div class="row">-->
    <!--  <h3> Promotion Product:</h3>-->
    <!--  <div class="col-md-3"> Promotion Product<input type="checkbox" name="art[]" value="27" <?php if (in_array("27", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--</div>  -->
    <!-- <div class="row">-->
    <!--  <h3>Broucher List:</h3>-->
    <!--  <div class="col-md-3">Broucher List<input type="checkbox" name="art[]" value="24" <?php if (in_array("24", $priveledges)){ echo 'Checked';} ?>></div>-->
    <!--  <input type="hidden" name="id" value="<?php echo $uri; ?>">-->
       
    <!--</div> -->
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

