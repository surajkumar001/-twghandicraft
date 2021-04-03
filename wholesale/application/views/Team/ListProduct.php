
 <?php

                                  
//pr($_SESSION);die;
include('header.php');
include('sidebar.php');

?>
<style type='text/css'>
    div.table { display: table; }
    div.row { display: table-row; }
    div.cell { display: table-cell; }
  </style>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="http://dev.jquery.com/view/tags/ui/latest/ui/ui.core.js"></script>
  <script src="http://dev.jquery.com/view/tags/ui/latest/ui/ui.draggable.js"></script>
  <script>
  $(document).ready(function(){
    $(".row").draggable();
  });
  </script>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Product List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Product</a>
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
                                 <a href="<?php echo base_url('Admin/Productupload'); ?>" class="btn btn-default">Add New Product</a>
                                   <a href="<?php echo base_url('Admin/excelupload'); ?>" class="btn btn-default">Bulk Add New Product</a>
                                    <a href="<?php echo base_url(); ?>assets/excelsheet/final%20bulk%20upload%20sheet11.csv" class="btn btn-default">Sample CSV</a>
                                      <a href="<?php echo base_url('Admin/downloadprocsv/'); ?>" class="btn btn-default">Download CSV</a>
                                         <a href="<?php echo base_url('Admin/updateprocsv'); ?>" class="btn btn-default">Update Product CSV</a>
                             <br/><br/>
                                       <div class="row">
                                        <div class="col-md-2">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
                                     <form action="<?php echo base_url('Admin/productbycategories'); ?>" method="POST">
                                      <div class="col-md-6">
                                        <select class="form-control" name="cat">
                                               <option>Select Category</option>
                                          <?php foreach ($parent_category as $key){ ?>
                                       
                                          <option value="<?php echo $key['id']; ?>" <?php if($current_uri== $key['id']){ echo "selected"; } ?>><?php echo $key['name']; ?></option>
                                        <?php } ?>
                                        </select> </div>
                                        <div class="col-md-2">
                                        <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                        </form>
                                    </div><br>
                            <table class="table table-striped table-bordered" id="table">
                                <thead>
                                   
                                         <td><input type="checkbox" name="" id="chkSelectAll"></td>
                                     
                                        <th>Product Detail </th>
                                        <th>Listing Price</th>
                                        <th>Display Category</th>
                                          <th>Position </th>
                                         <th>Enble/Disble </th>
                                        <th>Action</th>
                                        <th>Variant</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>

                                    <?php foreach ($messages as  $values) {
                               
                                    ?>
                                     <tr id="<?php echo $values["id"]; ?>">
                                        <td><input type="checkbox" name="" id=""></td>
                                      <!--   <td><?=$value['id'];?></td> -->
                                         <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                            <img src="<?=$values['main_image1'];?>" height="50px" width="50px">
                                          </div>
                                          <div class="col-md-9">
                                            <?php echo substr($values['pro_name'],0,40); ?>...
                                            <p style="color: green">Sku Code :<?php echo $values['sku_code']; ?></p>
                                             </div>
                                             </div>  
                                          
                                        </td>
                                        <?php if($_SESSION['session_namee']=='admin'){ ?>
                                          <td><input type="text" name="" class="form-control" id="sel_<?php echo $values['sku_code']; ?>" value="<?=$values['selling_price'];?>" onchange="selprice('<?php echo $values['sku_code'] ?>')">
                                          </td>
                                        
                                       
                                        <?php } else { ?>
                                             <td>
                                          <?=$values['selling_price'];?></td>
                                        
                                        <td><?=$values['availability'];?></td><?php } ?>
                                     
                                       
                                      <!--   <td><img src="<?=$value['main_image1'];?>" height="100" width="100"></td>
                                       

                                        <td><?= substr($value['description'],0,50);
                                        $value['description'];
                                        ?></td>
                                        <td><?=$value['subname'];?></td> -->
                                      
                                          <td>
                                                <?php $deals_list = $this->db->get('home_page_deals')->result() ;  ?>
                                                
                                            <select id="<?php echo $values['id']?>_flag" onchange="diplaycat('<?=$values['id'];?>');" class="form-control">
                                                <option value="null" <?php if($values['flag']=='null'){echo 'selected';}?> >Select Category</option>
                                         <?php     foreach ($deals_list as $deals){ 
        
                                        ?>  
                                               <option value="<?php echo $deals_code =  $deals->flag_code ; ?>" <?php if($values['flag']==$deals_code){echo 'selected';}?> ><?php echo $deals_name =  $deals->Name ; ?> </option>
                                              <?php } ?>
                                          </select>
                                        </td> 
                               <td><input type="text"  class="form-control" id="position_<?php echo $values['id']; ?>" 
                            value="<?=$values['home_deals_position'];?>" onchange="update_deals_pos('<?php echo $values['id'] ?>')"></td>   
                            
                             <td style="text-align: center;">
                               
                                            <?php if($values['status'] == '0'){ ?>
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/product_active/'.$values['id']);?>">Enble</a></button>
                                           <br> 
                                            <?php } else{ ?>
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/product_inactive/'.$values['id']);?>" >Disble</a></button>
                                            <?php } ?>
                                            
                                        </td>
                                        
                            
                                        <td>
                                        <a href="<?php echo base_url('Admin/Editproduct/'.$values['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a>

                                          <a href="<?php echo base_url('Admin/deleteproduct/'.$values['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">
                                                <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>
                                            </a>

                                        </td>
                                        <td>
                                          <a href="<?php echo base_url('Admin/variant/'.$values['sku_code']);?>" class="btn btn-info" style="width:100%;">variant</a>
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

    function diplaycat(id){
     // alert(id);exit();
        var urls=$("#url").val();
      
        var type = $("#"+id+"_flag").val();
     //  alert(type);exit();
        $.ajax({
            type: "POST",
            url: urls+"Admin/flag",
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
<script type="text/javascript">
      var $sortable = $( "#table > tbody" );
   
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );


          $.post("<?php echo base_url(); ?>/Admin/dragtest",{value:parameters},function(result){
             // location.reload();
          });
      }
  });


function selprice(id) {
        var urls=$("#url").val();

        var type = $("#sel_"+id).val();

   $.ajax({
            type: "POST",
            url: urls+"Admin/priceupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
               //location.reload();
              
                }
            });
}

function avail(id) {
        var urls=$("#url").val();

        var type = $("#avail_"+id).val();

   $.ajax({
            type: "POST",
            url: urls+"Admin/availupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
               //location.reload();
              
                }
            });
}


 function update_deals_pos(id){
     
           var urls=$("#url").val();
      
        var type = $("#position_"+id).val();
        
      
     $.ajax({
            type: "POST",
            url: urls+"Admin/dealsproduct_position",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //  alert(result) ;
             
              location.reload();
                }
            });
} 
</script>