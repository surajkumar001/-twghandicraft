<?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>User</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">RM</a>
                    </li>
                    <li class="active">Edit RM</li>
                </ol>
            </section>


<section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Edit RM
                            </h4>
                        </div>

		<div class="col-md-12">
	<form method="post" action="<?= base_url('Admin/Rm_update') ; ?>" enctype="multipart/form-data">
		<br>

		<div class="col-md-6">
		RM Name<input type="text"  name="name" value="<?= $rm_detail->rm_name; ?>" class="form-control" required>
		<input type="hidden"  name="id" value="<?= $rm_detail->id; ?>" class="form-control" required>
		<br></div>
		<div class="col-md-6">
		RM Email-ID<input type="email"  name="email"   value="<?= $rm_detail->rm_email; ?>" class="form-control" required><br></div>
        <div class="col-md-6">
		RM Mobile No<input type="text"  name="Mobile"  value="<?= $rm_detail->rm_email; ?>" class="form-control" required><br></div>
		 <div class="col-md-6">
        RM Password<input type="Password"  name="password"  value="<?= $rm_detail->rm_password; ?>"  required class="form-control">
        
        <input type="hidden"  name="old_password"  value="<?= $rm_detail->rm_password ; ?>"  required class="form-control">
        <br></div>
	    <div class="col-md-3">
        RM Profile Pic
        <input type="file"  name="file" class="form-control"><br></div>
		<div class="col-md-2">
        <img src="<?= 	$rm_detail->rm_file ;?>" style="width:100px;height:100px;">
        </div>
		<div class="col-md-6"><br>
		<input type="submit" name="submit" value="Update" class="btn btn-success">
		</div>
	</form>
</div>
	</div>
</div>
</section>
</aside>
	
<input type="hidden" id="url" value="<?=base_url();?>">

<?php
include 'footer.php';
?>