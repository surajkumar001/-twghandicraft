 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Excel Sheet</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Excel Sheet</a>
                    </li>
                    <li class="active">Excel Sheet List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Excel List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Sheet</th>
                                        <th>Upload BY</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action 2</th>
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($sheet as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?php if($value['url']=='excel'){ 
                                            echo "Upload New Product and Varient Product";
                                        } elseif ($value['url']=='updatevarpro') {
                                            echo "Update Varient Product Inventory";
                                        }elseif ($value['url']=='updateproductcsv') {
                                            echo "Update Product";
                                        }elseif ($value['url']=='updatepriceproductcsv') {
                                           echo "Update Product Price";
                                        }elseif ($value['url']=='updatepricevarproductcsv') {
                                           echo "Update Varient Product Price";
                                        }elseif ($value['url']=='promoexcel') {
                                           echo "Promotion Sku Sheet";
                                        }elseif ($value['url']=='product_management_upload') {
                                           echo "Product Management";
                                        }else{
                                           echo "Update Product Inventory";

                                          } ?>
                                            </td>
                                        <td><?=$value['sheetname'];?><br>
                                        <a href="<?php echo $value['sheet']; ?>">Download</a></td>
                                      
                                             <td> <?php if($value['member'] == 'Admin'){
                                                 echo 'Admin' ;
                                             }else{
                                                 	$rm = $this->db->get_where('rm', array('id' => $value['member']))->row() ;
                                                 	
                                                 	echo $rm->rm_name ; 


                                             }?> </td>
                                           <td><?=$value['date'];?></td>
                                        <td><?php if($value['approved']=='0'){ ?>
                  <a href="<?php echo base_url('Admin/approvecsv/'.$value['id'].'/'.$value['url']);?>">
                                                <button type="button" class="btn btn-success">Approve</button>
                                            </a>
                                        <?php } else { ?>
                                          Approved
                                        <?php } ?>
                                            
                                        </td>
                                      <td>
                                           <a href="<?php echo base_url('Admin/deleteexcel/'.$value['id'].'/'.$value['sheetname']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
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