 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Return Product List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Return Product List</a>
                    </li>
                    <li class="active">Return Product List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Return Product List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Product Sku Code</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>View Detail</th>
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($return as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$value['product_id'];?>
                                            </td>
                                        <td><?php $id=$value['user_id'];
                                                  $where='id';
                                                  $table='customerlogin';
                                                  $user=$this->Model->select_common_where($table,$where,$id);
                                                  echo $user[0]['name']; ?><br>
                                    
                                      
                                             <td><?=$value['created'];?></td>
                                        <td><?php if($value['approved']=='0'){ ?>
                  <a href="<?php echo base_url('Admin/approvereturn/'.$value['id'].'/'.$value['order_id']);?>">
                                                <button type="button" class="btn btn-success">Approve</button>
                                            </a>
                                        <?php } else { ?>
                                          Approved
                                        <?php } ?>

                                        </td>
                                        <td><button type="button" class="btn btn-info " data-toggle="modal" data-target="#<?php echo $value['id']; ?>">View Details</button></td>
                                        <!-- <td>
                                          <a href="<?php echo base_url('Admin/deleteexcel/'.$value['id'].'/'.$value['sheetname']);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete"></i>
                                            </a></td> -->
                                    </tr>


<!-- Modal -->
<div id="<?php echo $value['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <?php 
         $id=$value['product_id'];
            $where='sku_code';
            $table='product';
            $products=$this->Model->select_common_where($table,$where,$id);

              if(empty($products)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $products=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }

              if(empty($products)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $products=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
            

                                                       $id=$value['address_id'];

                                                 $where='id';

                                                    $table='user_address';

                                                 $user_address=$this->Adminmodel->select_com_where($table,$where,$id); 
            
             ?>
      <div class="modal-body">
       <div class="text-center"><img src="<?php echo $products[0]['main_image1'];   ?>" style="height: 57px; margin-bottom: 23px;"></div>
       <span>Product Name-:  </span> <span><?php echo $products[0]['pro_name']; ?>(<?php echo $products[0]['sku_code']; ?>)</span><br/><br/>
        <span>Return Reason-:  </span> <span><?php echo $value['return_reason']; ?></span><br/><br/>
        <span>Reason Detail-:  </span> <span><?php echo $value['reason_detail']; ?></span><br/><br/>
         <span>Comment-:  </span> <span><?php echo $value['coment']; ?></span><br/><br/>

         <span>Address-:  </span> <span><?php echo $user_address[0]['address'].' '.$user_address[0]['city'].' '.$user_address[0]['state'] ; ?></span><br/><br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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