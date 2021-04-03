 <?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>RM</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">RM</a>
                    </li>
                    <li class="active">RM List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RM List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <a href="<?=base_url('Admin/addrm')?>" class="btn btn-primary">Add RM </a>
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>RM ID</th>
                                        <th>RM Name</th>
                                        <th>RM E-mail</th>
                                        <th>RM Mobile</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                
                                <tbody>
                                   <?php foreach ($messa as  $value) {
                                    ?>
                                    <tr style="text-align: center;">
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['rm_name'];?></td>
                                        <td><?=$value['rm_email'];?></td>
                                        <td>
                                            <?=$value['rm_mobile'];?>
                                        </td>
                                             <td style="text-align: center;">
                                            <a href="<?php echo base_url('Admin/editrm/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit User"></i>
                                            </a>
                                            <a href="<?php echo base_url('Admin/deleterm/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                &nbsp;&nbsp;<i class="fa fa-trash" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete User"></i>
                                            </a>
                                         </td>
                                     </tr>
                                   <?php } ?>
                                  
                                   
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
