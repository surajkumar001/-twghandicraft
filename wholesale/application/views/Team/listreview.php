 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>List Review & Rating</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">List Review & Rating</a>
                    </li>
                    <li class="active">List Review & Rating </li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>  Review & Rating List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                             
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                         <th>Order ID</th>
                                        <th>User name</th>
                                        <!--<th>Rating</th>                                      -->
                                        <th>Feedback</th>
                                        <th>Review Date</th>
                                        <th>Action </th>
                                        
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    
                                    <?php $i=1; 
                                    $result = $this->db->get('orders')->result() ;
                                    
                                  
                                    
                                    foreach ($result as  $value) {
                                        
                                        if($value->feedback){
                                        ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                            <td>
                                              <?php echo $value->order_id; ?></td>
                                        <td><?=$value->customer_name ;?></td>
                                        
                                           <!--<td></td>-->
                                            <td><?php 
                                           echo  $value->feedback;?>
                                                 
                                             </td> 
                                             <td>
                                                <?= $value->feedback_date ;?> 
                                             </td> 
                                   <td>  <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value->order_id);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a></td>   

                                        
                                    </tr>
                                   <?php $i++; } 
                                                }
                                                ?>
                                  
                                   
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
<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<?php

include 'footer.php';
?>
<script type="text/javascript">
    function review(id){
        var urls=$("#url").val();
      
        var type = $("#"+id+"_flag").val();
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/reviewstatus",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              
                }
            });

    }

</script>