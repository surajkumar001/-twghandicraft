 <?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}
.html5buttons {
    margin-left: 30px;
}
a.btn.btn-default.buttons-pdf.buttons-html5 {
    display: none;
}
#table1_filter {
    display: none;
}
#table1_length {
    display: none;
}

#table1_paginate {
    display: none;
}

#table1_info {
    display: none;
}
#table_wrapper {
    margin-left: -30px;
}

</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Customer</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="active">Customer List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Customer List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <a href="<?=base_url('Admin/adduser')?>" class="btn btn-primary">Add New </a>
                            
                             <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                             
                             
 		        <form action="<?php echo base_url('Admin/customer_filter'); ?>" method="POST">
                            <div class="row" style="padding: 12px 0px; margin-left: -15px;">
                               
                                   <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>
                                <div class="col-md-3">
                                          <select class="form-control" name="rm_id" required>
                                           <option value="All">Search by RM </option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?=  $rm->id ?>" <?php if($rm_id == $rm->id ) { echo "selected";}?>><?php echo $rm->rm_name ; ?></option>
                                          <?php } ?>
                                          </select>
                                  </div> 
                                  
                                  <div class="col-md-3">
                                        <select class="form-control" name="type" id="select_type" required>
                                          <option value="All">All </option>
                                          <option value="Pending_Approval" <?php if($type == 'Pending_Approval'){ echo 'selected' ;} ?> >Pending Approval</option>
                                         <option   value="Owner"  <?php if($type == 'Owner'){ echo 'selected' ;} ?> >Customer Name</option>
                                         <option   value="Business" <?php if($type == 'Business'){ echo 'selected' ;} ?>  >Business name</option>
                                         <option   value="phone" <?php if($type == 'phone'){ echo 'selected' ;} ?> >Customer Mobile No </option>
                                          <option  value="city"  <?php if($type == 'city'){ echo 'selected' ;} ?> > Customer City</option>
                                          <option  value="state" <?php if($type == 'state'){ echo 'selected' ;} ?>  > Customer State</option>
                                          <option  value="email"  <?php if($type == 'email'){ echo 'selected' ;} ?> >Customer Email </option>
                                          <option  value="ownertype" <?php if($type == 'ownertype'){ echo 'selected' ;} ?>  > Ownership Type</option>
                                          <option  value="btype" <?php if($type == 'btype'){ echo 'selected' ;} ?>  >Business Type </option>
                                          </select>
                                  </div> 
                                  
                                  <div class="col-md-3" id="ownership" style="display:none ; " >
                                         <select class="form-control" name="ownership" >
                                            <option value="">--Select Ownership Type--</option>
                                            <option>Sole Proprietorship</option>
                                            <option>Partnership</option>
                                            <option>Private LTD</option>
                                            <option>Public LTD</option>
                                            <option>Corporation</option>
                                            <option>Limited Liability Company(LLC)</option>
                                            <option>Trust</option>
                                            <option>Non-Profit Organization</option>
                                        </select>
                                  </div> 
                                  <div class="col-md-3" id="btype"  style="display:none ; " >
                                       <select class="form-control" name="btype" >
                                            <option value ="">--Select Business Type--</option>
                                            <option>Gift Shop</option>
                                            <option>Wholesale</option>
                                            <option>Buying House</option>
                                            <option>Agency</option>
                                            <option>Interior Designing</option>
                                            <option>Freelance</option>
                                        </select>
                                  </div> 
                                  
                                  
                                   <!--<div class="col-md-3" id="search_input">-->
                                   <!--    <input type="text"  class="form-control" name="search"  placeholder="Search">-->
                                   <!--</div> -->
                                   
                                    <div class=" col-md-3" id="search_name"  style="display:none ;">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    <?php $user = $this->db->get('customerlogin')->result(); ?>
                                    <input  name="search" list="cars" placeholder="Enter For Search"  type="text"  class="form-control" autocomplete="off">
                                      <datalist id="cars" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option><?= $res->Owner ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_business" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_business" list="business" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="business" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->Business ; ?>"><?= $res->Business ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                  <div class=" col-md-3" id="search_phone" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_phone" list="phone" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="phone" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->phone ; ?>"><?= $res->phone ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                  <div class=" col-md-3" id="search_city" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_city" list="city" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="city" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->city ; ?>"><?= $res->city ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_state" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_state" list="state" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="state" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->state ; ?>"><?= $res->state ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_email" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_email" list="email" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="email" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->email ; ?>"><?= $res->email ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                       <div class="col-md-3">
                                      <button type="submit" class="btn btn-primary btn-block"> Apply</button>
                                       </div>
                            </div>
                            </form>
                            <table class="table table-bordered table-responsive" style="display:none;" id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>RM ID</th>
                                        <th>Customer ID</th>
                                        
                                        <th>Customer Name</th>
                                        <th>Business Name</th>
                                         <th>Mobile</th>
                                       
                                        <th>Customer E-mail</th> 
                                         <th>Landline</th>
                                         <th>PIN Code</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>State</th>
                                       <th>Ownership Type</th>
                                       <th>Business Type</th>
                                       <th>GST No</th>
                                       <th>PAN No</th>
                                       <th>Adhaar No.</th>
                                        <th>Registration Date</th> 
                                       <th>Account Approval date</th>
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($messa as  $value) {
                                    ?>
                                    <tr>
                                          <td><?php if($value['Rm_id']) {
                                              echo $value['Rm_id'] ;
                                          }else{
                                              echo "Not RM" ;
                                          }
                                          ;?></td>
                                        <td><?=$value['id'];?></td>
                                        
                                      
                                        <td><?=$value['Owner'];?></td>
                                        <td><?=$value['Business'];?></td>
                                        
                                        
                                       
                                        <td>
                                            <?=$value['phone'];?> <br><?php if(  $value['otp_validation'] == '1'){ ;?>
                                            <span style="color:green">Verifed </span> 
                                            <?php }else{ ?>
                                            
                                            <span style="color:red"> Not Verifed </span> 
                                            <?php } ?>
                                        </td>
                                         <td><?=$value['email'];?></td>
                                       <td><?=$value['landline'];?></td>
                                       <td><?=$value['PinCode'];?></td>
                                       <td><?=$value['city'];?></td>
                                       <td><?=$value['Address'];?></td>
                                       <td><?=$value['state'];?></td>
                                      
                                       <td><?=$value['ownertype'];?></td>
                                      
                                       <td><?=$value['btype'];?></td>
                                       <td><?=$value['GSTNumber'];?></td>
                                       <td><?=$value['PANNumber'];?></td>
                                       <td><?=$value['adhaar_no'];?></td>
                                       <td>
                                       <?php 
                                        $date = $value['created']; 
                                    if($date){
                                    $newDate = date("d-M-Y", strtotime($date));  
                                    echo  $newDate;  
                                    }    
                                        ?>
                                       ?></td>
                                       <td><?= $newDate; ?></td>
                                      
                                      
                                      
                                        
                                         
                                     </tr>
                                     
                                       <div class="modal fade" id="accept_<?= $value['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">
                                                Assign RM
                                            </h4>
                                        </div>
                                        <form action="<?= base_url('Admin/conform_user_rm'); ?>" method="post" >
                                        <input type="hidden" name="user_id" value="<?= $value['id'] ; ?>" >
                                        <div class="modal-body">
                                            
                                           <label>Select RM</label>
                                           <select class="form-control" name="rm_id">
                                           <option value="">---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>"><?php echo $rm->rm_name ; ?></option>
                                          <?php } ?>
                                          
                                           </select>
                                        </div>
                                        
                                      
                                        
                                        <div class="modal-footer">
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            
                                            </a>
                                        </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="modal fade" id="reject_<?= $value['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">
                                                Region
                                            </h4>
                                        </div>
                                        
                                            <form action="<?= base_url('Admin/reject_user'); ?>" method="post" >
                                                
                                                 <input type="hidden" name="user_id" value="<?= $value['id'] ; ?>" >
                                                 
                                        <div class="modal-body">
                                           <label>Select Region</label>
                                           <select class="form-control" id="selectRegion" name= "selectRegion" >
                                           <option>---Select Region---</option>
                                           <option>Retail customer</option>
                                           <option>Fake customer</option>
                                           <option>Comptetitor</option>
                                           <option value="Other">Other</option>
                                           </select>
                                          <div id="region_details" style="display: none;">
                                        <label>Enter Region Details</label>
                                        <textarea class="form-control"  rows="2" placeholder="Enter Region Details" name="region_details" ></textarea>
                                          <!--<input type="submit" class="btn btn-success" value="Submit" style="margin-top:2%;">-->
                                    </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                              <button type="submit" class="btn btn-default" >Submit</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            
                                            </a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                                   <?php } ?>
                                  
                                   
                                </tbody>
                            </table>
                            <div style="overflow-x:auto;">
                            <table class="table table-bordered table-responsive" id="table" style="width: 99%;overflow-y:auto; ">
                                <thead>
                                    <tr class="filters">
                                        <th>RM ID</th>
                                        <th>ID</th>
                                        <th>Registration Date</th>
                                        <th>Customer Name</th>
                                        <th>E-mail</th> 
                                        <th>Mobile</th>
                                        <th>View Detail</th>  
                                        <th>Edit Detail</th>
                                        <th>Action (Accept/Reject)</th>
                                        <th>Updation</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($messa as  $value) {
                                    ?>
                                    <tr>
                                          <td><?php if($value['Rm_id']) {
                                              echo $value['Rm_id'] ;
                                          }else{
                                              echo "Not RM" ;
                                          }
                                          ;?></td>
                                        <td><?=$value['id'];?></td>
                                        <td><?php 
                                        $date = $value['created']; 
                                    if($date){
                                    $newDate = date("d-M-Y", strtotime($date));  
                                    echo  $newDate;  
                                    }    
                                        ?>
                                        </td>
                                      
                                        <td><?=$value['Owner'];?></td>
                                        
                                        
                                        <td><?=$value['email'];?></td>
                                        <td>
                                            <?=$value['phone'];?> <br><?php if(  $value['otp_validation'] == '1'){ ;?>
                                            <span style="color:green">Verifed </span> 
                                            <?php }else{ ?>
                                            
                                            <span style="color:red"> Not Verifed </span> 
                                            <?php } ?>
                                        </td>
                                      
                                       <td style="text-align: center;">
                                        <a href="<?php echo base_url('Admin/customer_details/'.$value['id']);?>">&nbsp;&nbsp;
                                        Details</a>
                                          
                                            </td>
                                       <td style="text-align: center;">
                                            
                                              <a href="<?php echo base_url('Admin/Edituser/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit User"></i> Edit
                                            </a>
                                            
                                               </td>
                                      
                                       <td style="text-align: center;">
                                            <?php if($value['valid'] == ''){ ?>
                                            
                                           <button class="btn btn-success"><a class="btn btn-success" href="#accept_<?= $value['id'] ; ?>" data-toggle="modal">Accept</a></button>
                                            
                                            <button class="btn btn-danger"><a class="btn btn-danger" href="#reject_<?= $value['id'] ; ?>"  data-toggle="modal" >Reject</a></button>
                                          
                                            <?php } elseif($value['valid'] == '1'){ ?>
                                            
                                             <button class="btn btn-success"><a href="#" data-toggle="modal" class="btn btn-success">Accepted</a></button>
                                             
                                             <?php }else{ ?>
                                             
                                                 <button class="btn btn-danger"><a href="#" data-toggle="modal" class="btn btn-danger">Rejected</a></button>
                                             <?php } ?>
                                            
                                        </td>
                                        
                                        <td style="text-align: center;">
                                      
                                        
                                            
                                            <?php if($value['valid'] == ''){ ?>
                                            
                                          
                                            <td></td>
                                        
                                            
                                            <?php } elseif($value['valid'] == '1'){ ?>
                                            
                                                <button class="btn btn-danger"><a href="#reject_<?= $value['id'] ; ?>" data-toggle="modal" class="btn btn-danger">Reject</a></button>
                                                
                                             <?php }else{ ?>
                                             
                                               <button class="btn btn-success"> <a href="#accept_<?= $value['id'] ; ?>" data-toggle="modal" class="btn btn-success">Accept</a></button>
                                             <?php } ?>
                                            
                                        </td>
                                        
                                         
                                     </tr>
                                     
                                       <div class="modal fade" id="accept_<?= $value['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">
                                                Assign RM
                                            </h4>
                                        </div>
                                        <form action="<?= base_url('Admin/conform_user_rm'); ?>" method="post" >
                                        <input type="hidden" name="user_id" value="<?= $value['id'] ; ?>" >
                                        <div class="modal-body">
                                            
                                           <label>Select RM</label>
                                           <select class="form-control" name="rm_id">
                                           <option value="">---Select RM---</option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?= $rm->id ?>"><?php echo $rm->rm_name ; ?></option>
                                          <?php } ?>
                                          
                                           </select>
                                        </div>
                                        
                                      
                                        
                                        <div class="modal-footer">
                                               <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            
                                            </a>
                                        </div>
                                          </form>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="modal fade" id="reject_<?= $value['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">
                                                Region
                                            </h4>
                                        </div>
                                        
                                            <form action="<?= base_url('Admin/reject_user'); ?>" method="post" >
                                                
                                                 <input type="hidden" name="user_id" value="<?= $value['id'] ; ?>" >
                                                 
                                        <div class="modal-body">
                                           <label>Select Region</label>
                                           <select class="form-control" id="selectRegion" name= "selectRegion" >
                                           <option>---Select Region---</option>
                                           <option>Retail customer</option>
                                           <option>Fake customer</option>
                                           <option>Comptetitor</option>
                                           <option value="Other">Other</option>
                                           </select>
                                          <div id="region_details" style="display: none;">
                                        <label>Enter Region Details</label>
                                        <textarea class="form-control"  rows="2" placeholder="Enter Region Details" name="region_details" ></textarea>
                                          <!--<input type="submit" class="btn btn-success" value="Submit" style="margin-top:2%;">-->
                                    </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                              <button type="submit" class="btn btn-default" >Submit</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            
                                            </a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                                   <?php } ?>
                                  
                                   
                                </tbody>
                            </table>
                            </div>
                            <!-- Modal for showing delete confirmation -->
                          
                           
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this user? This operation is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="#" class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
      
<?php
include 'footer.php';
?>
 <script>
    $("#selectRegion").change(function (){
        var value = this.value;
        if(value=='Other'){
            $('#region_details').show();
        }
        else {
            $('#region_details').hide();
        }
    });
    
    
    $("#select_type").change(function (){
        
        var type = $('#select_type').val(); 
        if(type=='ownertype'){
            
            $('#ownership').show();
            
            $('#search_input').hide();
            
            $('#btype').hide();
              $('#search_business').hide();
             $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_name').hide();
        }
        else if (type=='btype') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').show();
            
              $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_name').hide();
              $('#search_business').hide();
        }else if (type=='Owner') {
            
            $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
             $('#search_business').hide();
            $('#search_name').show();
        }else if (type=='Business') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').hide(); 
            $('#search_name').hide();
             $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').show();
        }
        else if (type=='phone') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').show();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').hide();
        }
        else if (type=='city') {
            
             $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').show();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').hide();
        }
        else if (type=='state') {
            
             $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').hide();
            $('#search_state').show();
            $('#search_business').hide();
            $('#search_email').hide();
        }
        else if (type=='email') {
            
            $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').hide();
            $('#search_state').hide();
            $('#search_email').show();
            $('#search_business').hide();
        }
        else {
            
            $('#ownership').hide();
            
            $('#search_input').show();
            
            $('#btype').hide();
        }
    });
    
    
    
</script>