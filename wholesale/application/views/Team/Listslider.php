 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Side Bannerlist</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Banner</a>
                    </li>
                    <li class="active">Side Bannerlist</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Side Bannerlist
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                             <a href="<?php echo base_url('Admin/addslider'); ?>" class="btn btn-default">Add New Slider</a>
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                       
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>image</th>
                                        <th>position</th>
                                         <th>Action</th> 
                                        
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($messagess as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$value['name'];?></td>
                                        <td><?=$value['link'];?></td>
                                         <td><img src="<?=$value['images'];?>" height="10%" width="10%"></td>
                                       
                                            <td><input type="text"  class="form-control" id="position_<?php echo $value['id']; ?>"
                            value="<?=$value['position'];?>" onchange="update_parent_pos('<?php echo $value['id'] ?>')"></td>     
                               
                                        <td>
                                       <a href="<?php echo base_url('Admin/edit_slider/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a> 

                                        
                                            <a href="<?php echo base_url('Admin/deleteslider/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>
                                            </a>

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
    
    function update_parent_pos(id){
        
            var urls=$("#url").val();
            var type = $("#position_"+id).val();
           
         $.ajax({
                type: "POST",
                url: urls+"Admin/slider_position",
                data: {id:id,type:type},
                cache: false,
                success: function(result){
                    
                  //   alert(result) ;
                 
                  location.reload();
                    }
                });
} 
</script>