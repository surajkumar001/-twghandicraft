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
        </aside>
<?php
include 'footer.php';
?>




