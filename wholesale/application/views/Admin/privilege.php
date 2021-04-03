 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Team Member</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Team Member</a>
                    </li>
                    <li class="active">Team Member List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Team Member List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                              <a data-toggle="modal" data-target="#myModal" class="btn btn-success" style="margin-left: 30px;">Add New</a>
                            <table class="table table-bordered " id="table"> 
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Rm ID</th>
                                        
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Profile</th>
                                        <th>Mobile </th>
                                         <th>Action </th>
                                       <th>Add </th>
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=0; foreach ($message1 as  $values) {

                                    if($values['name']!='admin'){
                                     ?>
                                    
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                          
                                        <td><?php echo $values['id']; ?></td>
                                        <td><?php echo $values['rm_name']; ?></td>
                                        <td><?php echo $values['rm_email']; ?></td>
                                        
                                        <td><?php echo $values['profile']; ?></td>
                                        
                                        <td><?php echo $values['rm_mobile']; ?></td>
                                              <!--      <td>
                                            <select id="<?php echo $values['id']; ?>_flags" onchange="member('<?php echo $values['id'];?>');" class="form-control">
                                                <option value="0" <?php if($values['status']=='0'){echo 'selected';}?> >Disable</option>
                                               <option value="1" <?php if($values['status']=='1'){echo 'selected';}?> >Enable</option>
                                                
                                          </select>
                                        </td>  -->
                                           
                                        <td class="text-center">
                                            <a data-toggle="modal"  href="#edit<?php echo $values['id']; ?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit"></i>
                                            </a>
                                        
                                           <a href="<?php echo base_url('Admin/deleteteam/'.$values['id']); ?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>
                                            </a>

                                        </td>
                                        <td class="text-center" style="width: 14%;">
                                             <a href="<?php echo base_url('Admin/AddPrevileges/'.$values['id']);?>">
                                               <button class="btn btn-info">Add Previleges</button>
                                            </a>
                                       
                                        </td>
                                        
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $values['id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Team Member</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('Admin/editteam/'.$values['id']); ?>"  enctype="multipart/form-data" method="post">
         <div class="row">
             <div class="col-md-12">
                 <label>Name:</label>
                 <input type="text" name="name" class="form-control" value="<?php echo $values['rm_name']; ?>"  required>
             </div>
             <div class="col-md-12">
                 <label>Email:</label>
                 <input type="email" name="email" class="form-control" value="<?php echo $values['rm_email']; ?>" required>
             </div>
                <div class="col-md-12">
                 <label>Mobile No:</label>
                 <input type="text" name="mobile" class="form-control" value="<?php echo $values['rm_mobile']; ?>" required>
             </div>
             <div class="col-md-12">
                 <label>Password:</label>
                 <input type="Password" name="password" class="form-control"  value="<?php echo $values['rm_password']; ?>" required>
                  <br/> 
             </div>
            
            <?php $profile = $values['profile']; ?>
             <div class="col-md-12">
                 <label>Select Profile:</label>
                 <select class="form-control" name="profile" required>
                     <option value="">---Select Profile---</option>
                     <option value="RM" <?php if($profile == 'RM'){echo "selected";}  ?>>SALES-RM</option>
                     <option value="Store" <?php if($profile == 'Store'){echo "selected";}  ?> >Store</option>
                     <option value="LISTING" <?php if($profile == 'LISTING'){echo "selected";}  ?> >LISTING</option>
                     <option value="ACCOUNT"<?php if($profile == 'ACCOUNT'){echo "selected";}  ?> >ACCOUNT</option>
                     <option value="SEO" <?php if($profile == 'SEO'){echo "selected";}  ?> >SEO</option>
                     <option value="DESIGNER" <?php if($profile == 'DESIGNER'){echo "selected";}  ?> >DESIGNER</option>
                     <option value="OTHER" <?php if($profile == 'OTHER'){echo "selected";}  ?> >OTHER</option>
                 </select>
             </div>
             <div class="row">
             <div class="col-md-6">
                 <label>Profile Picture</label>
                 <input type="file" class="form-control profile" name="file" accept=".jpg,.jpeg,.png" >
                 <br>
             </div><div class="col-md-6">
                 <img src="<?php echo $values['rm_file'] ; ?>" width="100px" height="100px">
                 <br>
             </div>
             </div>
             
             <div class="col-md-12">
                 <input type="submit" name="Submit" class="btn btn-info" >
             </div>
         </div>
     </form>
        </div>
       
      </div>
      
    </div>
  </div>
                                <?php } } ?>
                                  
                                  
                                   
                                </tbody>
                            </table>
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
                                            <a href="deleted_users.html" class="btn btn-danger">Delete
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
         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Team Member</h4>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url('Admin/newteam'); ?>" enctype="multipart/form-data" method="post">
         <div class="row">
             <div class="col-md-12">
                 <label>Name:</label>
                 <input type="text" name="name" class="form-control" required>
             </div>
             <div class="col-md-12">
                 <label>Email:</label>
                 <input type="email" name="email" class="form-control" required>
             </div>
                <div class="col-md-12">
                 <label>Mobile No:</label>
                 <input type="text" name="mobile" class="form-control" required>
             </div>
             <div class="col-md-12">
                 <label>Password:</label>
                 <input type="Password" name="password" class="form-control" required>
                  
             </div>
            <!--<div class="col-md-12">-->
            <!--     <label>Confirm Password:</label>-->
            <!--     <input type="password" name="confirmpassword" class="form-control" required>-->
            <!-- </div>-->
             <div class="col-md-12">
                 <label>Select Profile:</label>
                 <select class="form-control" name="profile" required>
                     <option value="">---Select Profile---</option>
                     <option value="RM">SALES -RM</option>
                     <option value="Store">Store</option>
                     <option value="LISTING">LISTING</option>
                     <option value="ACCOUNT">ACCOUNT</option>
                     <option value="SEO">SEO</option>
                     <option value="DESIGNER" >DESIGNER</option>
                     <option value="OTHER">OTHER</option>
                 </select>
             </div>
             <div class="col-md-12">
                 <label>Profile Picture</label>
                 <input type="file" class="form-control profile" name="file" accept=".jpg,.jpeg,.png" required>
                 <br>
             </div>
             <div class="col-md-12">
                 <input type="submit" name="Submit" class="btn btn-info" value="ADD">
             </div>
         </div>
     </form>
        </div>
       
      </div>
      
    </div>
  </div>

<input type="hidden" id="url" value="<?php echo base_url(); ?>">

<?php
include 'footer.php';
?>
<script type="text/javascript">
    function member(id){
        alert(id);
        var urls=$("#url").val();
        
      
        var types = $("#"+id+"_flags").val();
       
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/teamstatus",
            data: {id:id,type:types},
            cache: false,
            success: function(result){
             
              
                }
            });

    }
    
    $(".profile").on("change", function() {
      
          var fileExtension = ['jpeg', 'jpg', 'png', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $(".profile").val(null);
        }

    });

</script>