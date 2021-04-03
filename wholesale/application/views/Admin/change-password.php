<?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Change Password</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                   
                    <li class="active">Change Password</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Change Password
                            </h4>
                        </div>
                        <?php    if($this->session->flashdata('failed')){ ?>
                <div class="row alert alert-danger" >
                    <p>
                    Password Not Updated ! 
                    </p>
                </div>
                <?php } ?> <?php    if($this->session->flashdata('sucess')){ ?>
                <div class="row alert alert-sucess" >
                    <p>
                     Password update sucessful ! 
                    </p>
                </div>
                <?php } ?>
                      <?php    if($this->session->flashdata('notmatch')){ ?>
                <div class="row alert alert-sucess" >
                    <p>
                    New Password and Confirm Password not match  ! 
                    </p>
                </div>
                <?php } ?>
                        <div class="panel-body">
                            <form action="<?php echo base_url('Admin/updatepassword');?>" method="POST">
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <label>Current Password</label>
                                       <input type="text" class="form-control" name="old_pass" placeholder="Current Password">
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label>New Password</label>
                                       <input type="text" class="form-control" name="new_pass" placeholder="New Password">
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label>Confirm Password</label>
                                       <input type="text" class="form-control" name="conf_pass" placeholder="Confirm Password">
                                    </div>
                                     
                                    <!--suggation---->
                                    <div class="col-md-3">
                                        <input type="submit" class="btn btn-primary btn-block" value="Change" style="margin-top:25px">
                                    </div>
                                </div>  
                                     <!-------end suggation-->
                            </form>
                        </div>    
                    </div>
                </div>
            </section>    
        </aside>
      
<?php
include 'footer.php';
?>
