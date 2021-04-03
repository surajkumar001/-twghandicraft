 <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Image</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Image</a>
                    </li>
                    <li class="active">Image List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Image List
                            </h4>
                        </div>
                     
                        <div class="panel-body">
                        	<div class="row" style="padding: 0px;">
                        	    <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'BulkImage' ))->row();
                
               }
            
           if($user_rm->upload == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                        	    <a href="<?php echo base_url("Admin/uploadbulkimage") ?>"><button class="btn btn-default">Upload Image</button></a>
                        	    <?php } ?>
                        	    
                        	    <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'BulkImage' ))->row();
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                        	    <input type="button" class="btn btn-default" value="Download PDF" onclick="printDiv('content2')" />
                        	    <?php } ?>
                        	</div>
                        	<br><br>
                            <div id="content2">
                                <table class="table table-bordered  <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'BulkImage' ))->row();
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> clienttable <?php } ?>">
                                <thead>
                                    <tr class="filters">
                                    	
                                        <th>S.No</th>
                                        <th>Image </th>
                                        <th>Image Path</th>
                                        <th>Action</th>
                                      
                                       
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=1; 
$url=base_url();
 $dsir = $url."assets/product";

 $dir = $_SERVER['DOCUMENT_ROOT']."/wholesale/assets/product/";
// Open a directory, and read its contents
$images = scandir($dir, 1);
foreach ($images as  $value) {
	$imgname=$dsir.'/'.$value;
 if($value=="." || $value==".." )

    {
        //this will not display specified files
    }else{
   
                                    ?>
                                    <tr>

                                        <td><?=$i;?></td>
                                        <td><img src="<?= $imgname; ?>" height="80px" width="80px"></td>
                                         <td><?= $value; ?></td>
                                      
                                             
                                        <td>
                                      
 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'BulkImage' ))->row();
                
               }
            
           if($user_rm->upload == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                          <a href="<?php echo base_url('Admin/unlinkimage/'.$value);?>">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete "></i>
                                            </a>
                                            </php } ?>

                                        </td>
                                    </tr>
                                   <?php $i++;
                               }
                               }
                            }
 ?>
                                  
                                   
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
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
<?php
include 'footer.php';
?>

<!--datatable JS-->
<script type="text/javascript">
    if( $('.clienttable').length > 0 ) {
        $('.clienttable').DataTable( {           
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100, 200, 500,1000,5000,10000],
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
                {
                    extend: 'csvHtml5',
                    exportOptions: { }
                },
            ],  
        });
    }
    
</script>


<!--Save as PDF JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


<!--print PDF Page-->
<script>
    function printDiv(content2) {
     var printContents = document.getElementById(content2).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

