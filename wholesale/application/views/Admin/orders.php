 <?php

 // /pr($message);die;

include('header.php');

include('sidebar.php');

?>

 <aside class="right-side">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Order</h1>

                <ol class="breadcrumb">

                    <li>

                        <a href="<?php echo base_url('Admin/Dashboard');?>">

                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="#">Order</a>

                    </li>

                    <li class="active">Order List</li>

                </ol>

            </section>

            <!-- Main content -->

            <section class="content paddingleft_right15">

                <div class="row">

                    <div class="panel panel-primary ">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order List

                            </h4>

                        </div>

                        <br />

                        <div class="panel-body">

                            <div class="row">
                                <form action="<?php echo base_url('Admin/orderbydate');?>" method="post">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Single Date Picker:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" name="from" class="form-control" id="rangepicker4" />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  name="to"data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" class="form-control" id="check_in_date" placeholder="Check-In Date">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
                                    </div>
                                </form>
                            </div>
>
                        <div class="table-responsive">
                            <table class="table table-bordered " id="table">

                                <thead>

                                    <tr class="filters">

                                        <th>Order ID</th>

                                        <th>Customer</th>

                                        <th>Customer E-mail</th>

                                        <th>

                                            Order Amount

                                        </th>

                                        <th>Order Date</th>

                                        <th>Status</th>

                                        

                                        <th>Actions</th>

                                    </tr>

                                </thead>

                                

                                <tbody>

                                    <?php foreach ($message as  $value) {

                                    ?>

                                    <tr>

                                        <td><?=$value['order_no'];?></td>

                                        <td><?=$value['username']." ".$value['lastname'];?></td>

                                        <td><?=$value['email'];?></td>

                                        <td>

                                            <?=$value['order_amount'];?>

                                        </td>

                                        <td> <?=$value['show_date'];?></td>

                                        <td>

                                            Active

                                        </td>

                                        <td>

                                            <a href="<?php echo base_url('Admin/orderdetail/'.$value['order_id']);?>">

                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>

                                            </a>

                                           <!--  <a href="#" data-toggle="modal" data-target="#delete_confirm">

                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>

                                            </a> -->

                                        </td>

                                    </tr>

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