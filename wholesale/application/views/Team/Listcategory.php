 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Category</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Category</a>
                    </li>
                    <li class="active">Category List</li>
                </ol>
            </section>
            <div class="row" style="margin-left: 15px;">
                            <a href="<?php echo base_url('Admin/Listparentcategory');?>" class="btn btn-default">List Parent Category</a>
                            <a href="<?php echo base_url('Admin/Listcategory');?>" class="btn btn-primary">List Category</a>
                            <a href="<?php echo base_url('Admin/Listsubcategory');?>" class="btn btn-default">List Sub Category</a>
            </div>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Category List
                            </h4>
                        </div>
                         <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>
                        <br />
                        <div class="panel-body">
                              <a href="<?php echo base_url('Admin/category'); ?>" class="btn btn-default">Add New</a>
                              
                                   <form action="<?php echo base_url('Admin/Listcategoryfilter'); ?>" method="POST">            
                        <div class="panel-body">
                            <div class="row" style="padding-left: 0px;padding-right: 50px; margin-left: -15px;">
                               
                              
                                <div class="col-md-3">
                                    <?php   $category = $this->db->get('parent_category')->result()?>
                                    <select class="form-control" name="parent_id">
                                          <option value="All">--Select Category--</option>
                                       <?php foreach($category as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->id ; ?>"><?= $res->name	 ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                     </select>
                                </div>
                              
                               
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" id="apply_btn" value="Apply">
                                </div>
                            </div>
                            <div class="row" style="display:none;" id="showdate">
                                <div class="col-md-3">
                                    <label>From Date</label>
                                    <input type="date" name="date1" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>To Date</label>
                                    <input type="date" name="date2"  class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-success" value="Search" style="margin-top: 18%;">
                                </div>
                                
                            </div>
                            </form>
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                         <th>Category id</th>
                                        <th>Category Name</th>
                                        <th>Parent Category Name</th>
                                        <th> Position</th>
                                        <th>Action </th>
                                         <th>Home Page </th>
                                         <th>Enble/Disble </th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; foreach ($messagess as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                            <td><?=$value['id'];?></td>
                                            
                                        <td><?=$value['name'];?></td>
                                        <td><?php
                                        $id=$value['parent_id'];
                                        $where='id';
                                        $table='parent_category';
                                        $parent=$this->Adminmodel->select_com_where($table,$where,$id);
                                         echo $parent[0]['name'];?></td>
                                           
                                             <!--<td><?=$value['Position'];?></td>-->
                                              <td><input type="text"  class="form-control" id="position_<?php echo $value['id']; ?>"
                            value="<?=$value['Position'];?>" onchange="update_parent_pos('<?php echo $value['id'] ?>')"></td>     
                                         
                                             
                                        <td>
                                         <a href="<?php echo base_url('Admin/Editcategory/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit"></i>
                                            </a>

                                           <a href="<?php echo base_url('Admin/deletecategory/'.$value['id']);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete"></i>
                                            </a>

                                        </td>
                                        
                                               <td style="text-align: center;">
                                            <?php if($value['home_status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/homecat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/homecat_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
                                        </td>
                                    <td style="text-align: center;">
                                            <?php if($value['status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/cat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/cat_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
                                        </td>
                                 
                                        
                                    </tr>
                                   <?php $i++; } ?>
                                  <?php $data=$this->Adminmodel->Listcategory2();
                                  foreach ($data as $key ) {
                                     ?>
                                   <tr>
                                        <td><?=$i;?></td>
                                            <td><?=$key['id'];?></td>
                                            
                                        <td><?=$key['name'];?></td>  
                                        <td><?php
                                        $id=$key['parent_id'];
                                        $where='id';
                                        $table='parent_category2';
                                        $parent=$this->Adminmodel->select_com_where($table,$where,$id);
                                         echo $parent[0]['name'];?></td>
                                           
                                           <td><?=$key['Position'];?></td>
                                        <td>
                                         <a href="<?php echo base_url('Admin/Editcategory2/'.$key['id']);?>">
                                                <i class="fa fa-user" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a>

                                           <a href="<?php echo base_url('Admin/deletecategory2/'.$key['id']);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>
                                            </a>

                                        </td>
                                        
                                               <td style="text-align: center;">
                                            <?php if($value['home_status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/homecat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/homecat_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
                                        </td>
                                       <td style="text-align: center;">
                                            <?php if($value['status'] == '0'){ ?>
                                            
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/cat_active/'.$value['id']);?>">Active</a></button>
                                           <br> 
                                           
                                            <?php } else{ ?>
                                             
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/cat_inactive/'.$value['id']);?>" >Inactive</a></button>
                                            <?php } ?>
                                            
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<input type="hidden" id="url" value="<?=base_url();?>">
<script>
    
    function update_parent_pos(id){
        
            var urls=$("#url").val();
            var type = $("#position_"+id).val();
           
         $.ajax({
                type: "POST",
                url: urls+"Admin/cat_position",
                data: {id:id,type:type},
                cache: false,
                success: function(result){
                    
                    //  alert(result) ;
                 
                  location.reload();
                    }
                });
} 
</script>
