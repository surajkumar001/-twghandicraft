 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Promotion category</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Promotion category</a>
                    </li>
                    <li class="active">Promotion category List</li>
                </ol>
            </section>
            <div class="row" style="margin-left: 15px;">
                            <a href="<?php echo base_url('Admin/Promotioncategory');?>" class="btn btn-primary">Promotion Category</a>
                            <a href="<?php echo base_url('Admin/Promotionproduct');?>" class="btn btn-default">Promotion Product</a>
            </div>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Promotion category List
                            </h4>
                        </div>
                       
                        <div class="panel-body">
                              <a href="<?php echo base_url('Admin/addnewpromocat'); ?>" class="btn btn-default">Add New</a> <br /> <br />
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Percent</th>
                                        <th>Max Discount</th>
                                        <th>Status</th>
                                        <th>Action </th>
                                        
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($cat as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                           
                                            
                                        <td><?=$value['occasion'];?></td>
                                        <td><?=$value['per'];?>%</td>
                                        <td><?=$value['maxdiscount'];?></td>
                                        <td><?php if($value['status']==1){ ?><a href="<?php echo base_url('Admin/deactivepromotion/'.$value['id']); ?>"><button type="submit" class="btn btn-success">Active</button></a>
                                            <?php }  else { ?>
                                         <a href="<?php echo base_url('Admin/activepromotion/'.$value['id']); ?>"><button type="submit"  class="btn btn-danger">Deactive</button> </a><?php } ?> </td>
                                           
                                        <td>
                                        

                                           <a href="<?php echo base_url('Admin/deleterromocat/'.$value['id']);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete"></i>
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