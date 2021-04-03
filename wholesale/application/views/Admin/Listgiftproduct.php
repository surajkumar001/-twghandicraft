
 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');

?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Product List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">Product</a>
                    </li>
                    <li class="active">Product List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Product List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body" style="overflow-x: auto;">
                            <div class="table-responsive">
                                 <a href="<?php echo base_url('Admin/addProductgift'); ?>" class="btn btn-default">Add New Product</a>
                                   
                             <br/><br/>
                                      
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr >
                                         <tr><td><input type="checkbox" name="" id="chkSelectAll"></td>
                                     
                                        <th>Product Detail </th>
                                        <th>Listing Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Occasion</th>
                                        <th>Action</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($messages as  $value) {
                                    ?>
                                        <td><input type="checkbox" name="" id=""></td>
                                      <!--   <td><?=$value['id'];?></td> -->
                                         <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                            <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          </div>
                                          <div class="col-md-9">
                                            <?php echo substr($value['pro_name'],0,40); ?>...
                                            <p style="color: green">Sku Code :<?php echo $value['sku_code']; ?></p>
                                             </div>
                                             </div>  
                                          
                                        </td>
                                        <td><?=$value['selling_price'];?></td>
                                        <td><?=$value['availability'];?></td>
                                        <td><?php $id = $value['cat_id']; 
                                            $where='id';
                                            $table='category';
                                             $messags = $this->Model->select_common_where($table,$where,$id);
                                             echo $messags[0]['name']; ?>   </td> 
                                        </td>
                                        <td><?php $id = $value['occasion']; 
                                            $where='id';
                                            $table='occasion';
                                             $messages = $this->Model->select_common_where($table,$where,$id);
                                             echo $messages[0]['name']; ?>   </td> 
                                        
                                       
                                         
                                        
                                        <td>
                                        <a href="<?php echo base_url('Admin/Editgiftproduct/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit "></i>
                                            </a>

                                          <a href="<?php echo base_url('Admin/deletegiftproduct/'.$value['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete "></i>
                                            </a>

                                        </td>
                                      <!--    <td>
                                            <select id="<?php echo $value['id']?>_protype" onchange="protype('<?=$value['id'];?>');" class="form-control">
                                            <?php foreach ($page_type as  $value1) { ?>
                                                <option value="<?=$value1['id'];?>" <?php if($value['page_id']==$value1['id']){echo 'selected';}?> ><?=$value1['page_name'];?></option>
                                            <?php } ?>

                                            <?php ?>
                                          </select>
                                        </td> -->
                                    </tr>
                                   <?php } ?>
                                  
                                   
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
        </aside><input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>
<script type="text/javascript">
    function protype(id){
        var urls=$("#url").val();
      
        var type = $("#"+id+"_protype").val();
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/protype",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              
                }
            });

    }

</script>
<script type="text/javascript">
$('#chkSelectAll').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
  
});
</script>