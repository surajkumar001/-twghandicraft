 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>List Coupon</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">List Coupon</a>
                    </li>
                    <li class="active">List Coupon List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> List Coupon List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                              <a href="<?php echo base_url('Admin/coupon'); ?>" class="btn btn-default">Add New</a>
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                         <th>Coupon Name</th>
                                        <th>Coupon Percent</th>
                                        <th>Max. Discount</th>                                      
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action </th>
                                        
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($messages as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                            <td><?=$value['coupon_name'];?></td>
                                            
                                        <td><?=$value['coupon_percent'];?></td>
                                        <td><?php  echo $value['max_discount'];?></td>
                                           <td><?php 
                                           $originalDate=$value['start_date'];
                                        echo $newDate = date("d-m-Y", strtotime($originalDate));
                                          ?></td>
                                            <td><?php 
                                                $originalDate1=$value['end_date'];
                                             echo $endDate = date("d-m-Y", strtotime($originalDate1));?>
                                                 
                                             </td> 
                                        <td>
                                         <a href="<?php echo base_url('Admin/Editcoupon/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit "></i>
                                            </a>

                                           <a href="<?php echo base_url('Admin/deletecoupon/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete "></i>
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