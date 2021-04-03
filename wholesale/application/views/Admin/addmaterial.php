
<?php
include 'header.php';
include('sidebar.php');
?>

<input type="hidden" id="url" value="<?php echo base_url(); ?>" name="">


<center><h1 style="font-style: arial; color: red;" id="success"> </h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">
        <div class="row" style="margin-left: 100px;">
                            <a href="<?php echo base_url('Admin/addcolor');?>" class="btn btn-default btn-lg">Color</a>
                            <a href="<?php echo base_url('Admin/addmaterial');?>" class="btn btn-primary btn-lg">Material</a>
                            <a href="<?php echo base_url('Admin/adddisplay');?>" class="btn btn-default btn-lg">Display</a>
            </div>

<section>
       <center><h2><u><strong>Add Material</strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/insertmaterial');?>" class="form-group">
<br>


          <label>Category Name</label>
        <input name="category" type="text" required class="form-control">

<label>Material Name</label>
        <input name="name" type="text" required class="form-control">
  

        <br>        
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Submit </button></center>
    </form>
                                        </section>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-10 col-md-offset-2">
                                     <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Material List
                            </h4>
                        </div>
                         <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        </div>
                        </div>
                        <?php } ?>
                        <br />
                          
                            <div class="panel panel-primary ">        
                            <table class="table table-bordered " id="table1">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                          <th>Material Name</th>
                                        <th>Category ID</th>
                                         <th>Action </th>
                                       
                                    </tr>
                                </thead>
                                    <?php   $messagess = $this->db->get('material')->result_array()?>
                               
                                <tbody>
                                    <?php $i=1; foreach ($messagess as  $value) {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                            
                                        <td><?=$value['name'];?></td>
                                        <td><?=$value['category'];?></td>
                                          
                                             <td>
                                             
                                                <a href="<?php echo base_url('Admin/editmaterial/'.$value['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a>

                                            </td>
                                    </tr>
                                   <?php $i++; } ?>
                                 </tbody>
                            </table>
                            </div>
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
                        </form>
                    </div>
                </div>
                <!-- row-->
            </section>
                            </div>
                             </div>
                            
                            
                             
                     

<?php
include 'footer.php';
?>
