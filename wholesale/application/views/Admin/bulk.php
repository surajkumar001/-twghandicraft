 <?php

//pr($bulks);die;

include('header.php');

include('sidebar.php');

?>

 <aside class="right-side">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Bulk Enquiry</h1>

                <ol class="breadcrumb">

                    <li>

                        <a href="<?php echo base_url('Admin/Dashboard');?>">

                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="#">Bulk Enquiry</a>

                    </li>

                    <li class="active">Bulk Enquiry List</li>

                </ol>

            </section>

            <!-- Main content -->

            <section class="content paddingleft_right15">

                <div class="row">

                      <div class="panel panel-primary filterable">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Bulk Enquiry

                            </h4>

                        </div>

                        <br />

                        <div class="panel-body" style="overflow-x: auto;">
                             <div class="table-responsive">

                            <table class="table table-striped table-bordered" id="table1">

                                <thead>

                                    <tr class="filters">

                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                         <th>Email id </th>
                                         <th>Mobile No</th>
                                         <th>Whatsapp No</th>
                                         <th>Product Type</th>
                                         <th>Quantity</th>
                                         <th>Purpose</th>
                                         <th>Type of Business</th>


                                    
                                    </tr>

                                </thead>

                                

                                <tbody>

                                    <?php $i=1; foreach ($bulk as  $value) {

                                    ?>

                                    <tr>

                                        <td><?php echo $i++;?></td>
                                        <td><?=$value['name'];?></td>
                                        <td><?=$value['address'];?></td>

                                        <td><?=$value['email'];?></td>

                                        <td><?=$value['mobile'];?></td>

                                        <td><?=$value['whatsmobile'];?></td>
                                        <td><?=$value['product_type'];?></td>
                                        <td><?=$value['quantity'];?></td>

                                            <td><?=$value['purpose'];?></td>
                                            <td><?=$value['business'];?></td>

                                        

                                    </tr>

                                   <?php  } ?>

                                  

                                   

                                </tbody>

                            </table></div>

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
