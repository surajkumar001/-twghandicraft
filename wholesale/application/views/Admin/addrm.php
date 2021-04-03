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
                    <li class="active">Add RM</li>
                </ol>
            </section>


<section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Add RM
                            </h4>
                        </div>

		<div class="col-md-12">
	<form method="post" action="<?php echo base_url('Admin/addrms');?>" enctype="multipart/form-data">
		<br>

		
		<div class="col-md-6">
		RM Name<input type="text"  name="name" class="form-control"><br></div>
		<div class="col-md-6">
		RM Email-ID<input type="text"  name="email" class="form-control"><br></div>

		<div class="col-md-6">
		RM Mobile No<input type="text"  name="mobile" class="form-control"><br></div>
		 <div class="col-md-6">
        RM Password<input type="Password"  name="password" required class="form-control"><br></div>
	    <div class="col-md-6">
        RM Profile Pic
        <input type="file"  name="file" required class="form-control"><br></div>
		
		<div class="col-md-6"><br>
		<input type="submit" name="submit" value="submit" class="btn btn-success">
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