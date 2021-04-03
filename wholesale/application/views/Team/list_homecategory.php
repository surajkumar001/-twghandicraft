 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Home Page Category List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Home Page Category</a>
                    </li>
                   
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Home Page Category List
                            </h4>
                        </div>
                       <?php if($this->session->flashdata('msg')=="Category Not Deleted"){ ?>
                        <div class="row alert alert-danger" >
                            
                            <p>
                            Category can not be Deleted
                            </p>
                            
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <a href="<?php echo base_url('Admin/Home_Page_Deals'); ?>" class="btn btn-primary">Add New Home Page Category</a> <br /> <br />
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Category Name</th> 
                                        <th>Edit Category Name</th>
                                        <th>Position</th>
                                        <th>Delete</th>
                                    <th> Update Status</th>
                                   
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($messagess as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                      
                                        <td><?=$value['name'];?></td> 
                                        
                                          <td><input type="text"  class="form-control" id="Name_<?php echo $value['id']; ?>" 
                            value="<?=$value['Name'];?>" onchange="update_name('<?php echo $value['id'] ?>')"></td>     
                                        
                            <td><input type="text"  class="form-control" id="position_<?php echo $value['id']; ?>" 
                            value="<?=$value['position'];?>" onchange="update_pos('<?php echo $value['id'] ?>')"></td>     
                                        <td>
                                       <!--<a href="<?php echo base_url('#'.$value['id']);?>">-->
                                       <!-- <i class="fa fa-user" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>-->
                                       <!--     </a>-->

                                          <a href="<?php echo base_url('Admin/Deletehomedeals/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete "></i>
                                            </a>

                                        </td>
                                   
                                        <td style="text-align: center;">
                                            <?php if($value['status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/home_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/home_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
                                        </td>
                                           
                                        
                                    </tr>
                                   <?php $i++; } ?>
                                 
                                   
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
<?php
include 'footer.php';
?>
<input type="hidden" id="url" value="<?=base_url();?>">

<script>
    
    function update_pos(id){

        var urls=$("#url").val();
      
        var type = $("#position_"+id).val();
        
       
     $.ajax({
            type: "POST",
            url: urls+"Admin/homedeals_position",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //  alert(result) ;
             
              location.reload();
                }
            });
} 
function update_name(id){

        var urls=$("#url").val();
        var type = $("#Name_"+id).val();
        
       
     $.ajax({
            type: "POST",
            url: urls+"Admin/homedeals_name",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //  alert(result) ;
             
              location.reload();
                }
            });
}
</script>
