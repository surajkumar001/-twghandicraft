 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Parent Category</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Parent Category</a>
                    </li>
                    <li class="active">Parent Category List</li>
                </ol>
            </section>
            <!-- Main content -->
            <div class="row" style="margin-left: 15px;">
                            <a href="<?php echo base_url('Admin/Listparentcategory');?>" class="btn btn-primary">List Parent Category</a>
                            <a href="<?php echo base_url('Admin/Listcategory');?>" class="btn btn-default">List Category</a>
                            <a href="<?php echo base_url('Admin/Listsubcategory');?>" class="btn btn-default">List Sub Category</a>
            </div>
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Parent Category List
                            </h4>
                        </div>
                        <br />
                        
                         <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <a href="<?php echo base_url('Admin/parentcategory'); ?>" class="btn btn-default">Add New</a>
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Parent id</th>
                                        
                                          
                                        <th>Parent Category Name</th> 
                                        
                                        <!--<th>Category List</th>-->
                                        
                                          <th>Position</th>
                                      <th>Action</th>
                                      <th>Enble/Disble</th>
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($messagess as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                         <td><?=$value['id'];?></td>
                                            
                                        <td><?=$value['name'];?></td>
                                       
                                <td><input type="text"  class="form-control" id="position_<?php echo $value['id']; ?>"
                            value="<?=$value['Position'];?>" onchange="update_parent_pos('<?php echo $value['id'] ?>')"></td>     
                                         
                                         
                                          <td>
                                       <a href="<?php echo base_url('Admin/parentwise_category/'.$value['id']);?>">
                                       Show Category
                                            </a>
                                            </td>    
                                        <td>
                                       <a href="<?php echo base_url('Admin/Editparent/'.$value['id']);?>">
                                        <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit"></i>
                                            </a>

                                          <a href="<?php echo base_url('Admin/Deleteparent/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete"></i>
                                            </a>

                                        </td>
                                        
                                           <td style="text-align: center;">
                                            <?php if($value['status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/parentcat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/parentcat_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
                                        </td>
                               
                                    </tr>
                                   <?php $i++; } ?>
                                   <?php
                                   $pcat=$this->Adminmodel->Listparentcategory2();
                                    ?>
                                     <?php $i=1; foreach ($pcat as  $values) {
                                    ?>
                                   <tr>
                                        <td><?=$i;?></td>
                                         <td><?=$values['id'];?></td>
                                            
                                        <td><?=$values['name'];?></td>
                                        
                                             
                                        <td>
                                       <a href="<?php echo base_url('Admin/Editparent2/'.$values['id']);?>">
                                        <i class="fa fa-user" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a>

                                          <a href="<?php echo base_url('Admin/Deleteparent2/'.$values['id']);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>
                                            </a>

                                        </td>
                                        
                                        
                                           <td style="text-align: center;">
                                            <?php if($value['status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/parentcat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/parentcat_inactive/'.$value['id']);?>" >Inactive</a></button>
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
    
    function update_parent_pos(id){
        
            var urls=$("#url").val();
            var type = $("#position_"+id).val();
           
         $.ajax({
                type: "POST",
                url: urls+"Admin/parent_position",
                data: {id:id,type:type},
                cache: false,
                success: function(result){
                    
                    //  alert(result) ;
                 
                  location.reload();
                    }
                });
} 
</script>



