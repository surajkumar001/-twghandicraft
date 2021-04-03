<?php
include('header.php');
include('sidebar.php');

?>

<style>
div#DataTables_Table_0_length {
    display: none;
}

div#DataTables_Table_0_filter {
    display: none;
}
div#DataTables_Table_0_paginate {
    display: none;
}
div#DataTables_Table_0_info {
    display: none;
}

#DataTables_Table_0_length {
    margin-bottom: -30px;
    /* margin-top: 20px; */
}

.btn-group{
    margin-left: 30px;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Price/Inventory Update</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Product Update</a>
                    </li>
                    <li class="active">Price/Inventory Update</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Price/Inventory Update
                            </h4>
                        </div>
                      
                        <br />
                        <div class="panel-body" style="overflow-x: auto;">
                            <div class="table-responsive">
                            
                                    <!--<a href="<?php echo base_url('Admin/invenpricereport'); ?>"> <button type="button" class="btn btn-default">Download Product CSV</button></a>-->
                                    <!--<a href="<?php echo base_url('Admin/invenpricevarreport'); ?>"> <button type="button" class="btn btn-default">Download Varient Product CSV</button></a>-->
                                    <!--<a href="<?php echo base_url('Admin/updatepricevarproduct'); ?>" class="btn btn-default">Update  Varient Product</a>-->
                                   	<!--<a href="<?php echo base_url('Admin/updatepriceproduct'); ?>" class="btn btn-default">Update Product</a><br>-->
                                      <div class="row">
                                        <!--<div class="col-md-1">-->
                                        <!-- <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button>-->
                                        <!-- </div>-->
                                  <form action="<?php echo base_url('Admin/price_categories'); ?>" method="POST">
                                          <div class="col-md-3">
                                               <select class="form-control" name="inventory_type">
                                               <option value="All">All Inventory</option>
                                                <option value="Low"<?php if($inventory_type == "Low"){ echo "selected" ;} ?>>Low Stock</option>
                                                <option value="Out" <?php if($inventory_type == "Out"){ echo "selected" ;} ?>  >Out of Stock</option>
                                                <option value="Hightolow">High to Low</option>
                                        </select> </div>
                                      <div class="col-md-3">
                                        <select class="form-control" name="cat">
                                               <option  value="" >All Category</option>
                                          <?php foreach ($parent_category as $key){ ?>
                                       
                                          <option value="<?php echo $key['id']; ?>" <?php if($current_uri== $key['id']){ echo "selected"; } ?>><?php echo $key['name']; ?></option>
                                        <?php } ?> 
                                        <?php 
                                        $catgory = $this->db->get('sub_category') ;
                                        
                                        foreach ($catgory as $cat){ ?>
                                       
                                          <option value="<?php echo $cat->id; ?>" <?php if($current_uri== $cat->id){ echo "selected"; } ?>><?php echo $cat->subcategory_name; ?></option>
                                        <?php } ?>
                                        </select> </div>
                                        
                                        <!--<div class="col-md-3">-->
                                        <!-- <input type="text" class="form-control" name="sku_code" placeholder="Search by SKU" />-->
                                        <!--</select> </div>-->

                                        <div class="col-md-3">
                                        <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                        </form>
                                      
                                      

                                    </div>
                                    </div>
                                    </div>
                                      
                                        
                                <div class="row" style="overflow-x: auto;">
                                   <table class="table table-striped table-bordered clienttable" style="display:none;">
                                 <div class="upload-btn-wrapper" style="margin-left: 31%">
                                 <a href="<?php echo base_url(); ?>/assets/excelsheet/price_inventory.csv" class="btn btn-success">Download Template</a>
                                               
                                  <a href="<?php echo base_url('Admin/updateproductinvent'); ?>" class="btn btn-success">Upload CSV</a>
                                </div>
                                
                                <thead>
                                    <tr>
                                        <!--<th>S.N.</th>-->
                                        <th>Image </th>
                                        <th>sku code</th>
                                        <th>Category Code</th>
                                        <th>Retail</th>
                                        <th>W.P</th>
                                        <th>Inventory Qty</th>
                                        <th>Min Qty</th>
                                        <th>low_alert</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                     $inventory_type ; 
                                     
                                     $i =1 ;
                                    foreach ($product_detail as  $value) {
                                        if($inventory_type =="Low"){
                                        if ($value['availability']<= $value['low_alert']) {
                                          
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?> </p>
                                             </td>
                                          <td><?=$value['category_id'];?>
                                          </td>
                                       
                                            <td><?=$value['price'];?> </td>                            
                                      
                                           <td> <?=$value['selling_price'];?> </td>
                                       
                                        <td><?=$value['availability'];?> </td>                            
                                       <td> <?=$value['min_order_quan'];?></td>
                                      
                           <td>
                          <?=$value['low_alert'];?></td>
                                      
                                       <td>  <span style="color: red">Low Stock</span> </td>
                                      
                                    </tr>
                                    
                                    
                                   <?php } } elseif($inventory_type =="Out"){
                                        
                                         if($value['availability'] <= 0 ){
                                        
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?> </p>
                                             </td>
                                          <td><?=$value['category_id'];?>
                                          </td>
                                       
                                            <td><?=$value['price'];?> </td>                            
                                      
                                           <td> <?=$value['selling_price'];?> </td>
                                       
                                        <td><?=$value['availability'];?> </td>                            
                                       <td> <?=$value['min_order_quan'];?></td>
                                      
                           <td>
                          <?=$value['low_alert'];?></td>
                                      
                                      <td>
                                          <span style="color: red">Out of Stock</span>
                                      
                                        </td>
                                      
                                      
                                    </tr>
                                    
                                    
                                   <?php } }else {
                                        
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?> </p>
                                             </td>
                                          <td><?=$value['category_id'];?>
                                          </td>
                                       
                                            <td><?=$value['price'];?> </td>                            
                                      
                                           <td> <?=$value['selling_price'];?> </td>
                                       
                                        <td><?=$value['availability'];?> </td>                            
                                       <td> <?=$value['min_order_quan'];?></td>
                                      
                           <td>
                          <?=$value['low_alert'];?></td>
                                      
                                  <td>
                                        <?php if($value['availability']==0){ ?>
                                          <span style="color: red">Out of Stock</span>
                                        <?php }elseif ($value['availability']<=20) { ?>
                                          <span style="color: red">Low Stock</span>
                                      <?php   }else{ ?>
                                        <span style="color: green">In Stock</span>
                                    <?php   } ?>
                                        </td>
                                          
                                      
                                    </tr>
                                    
                                    
                                   <?php }
                                            $i++ ;
                                            
                                        }
                                    ?>
                                   
                                     
                                </tbody>
                            </table>
                             <table class="table table-striped table-bordered clienttable2">
                               
                                <thead>
                                    <tr >
                                        <th>Image </th>
                                        <th>sku code</th>
                                        <th>category code</th>
                                        <th>Retail</th>
                                        <th>W.P</th>
                                        <th>Inventory Qty</th>
                                        <th>Min Qty</th>
                                        <th>low_alert</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                     $inventory_type ; 
                                     
                                     $i =1 ;
                                    foreach ($product_detail as  $value) {
                                        if($inventory_type =="Low"){
                                        if ($value['availability']<= $value['low_alert']) {
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                             </td>
                                          <td><?php echo $category =  $value['category_id'];?>
                                          <!--<input type="text" name="" class="form-control" id="category_<?php echo $value['sku_code']; ?>" value='<?php print_r($category); ?>' onchange="category('<?php echo $value['sku_code'] ?>')">-->
                                          </td>
                                       
                                          
                                            <td><input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['price'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')"></td>                            
                                      
                                           <td><input type="text" name="" class="form-control" id="sel_<?php echo $value['sku_code']; ?>" value="<?=$value['selling_price'];?>" onchange="selprice('<?php echo $value['sku_code'] ?>')"></td>
                                       
                                        
                                        <td><p style = "display:none"><?=$value['availability'];?> </p><input type="text" name="" class="form-control" id="availqty_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="availqty('<?php echo $value['sku_code'] ?>')"></td>                            
                                    <td><p style = "display:none"><?=$value['min_order_quan'];?></p><input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')"></td>
                                      
                           <td>
                          <p style = "display:none"><?=$value['low_alert'];?></p><input type="text" name="" class="form-control" id="low_alert_<?php echo $value['sku_code']; ?>" value="<?=$value['low_alert'];?>" onchange="low_alert('<?php echo $value['sku_code'] ?>')"></td>
                                      
                                      <td>
                                        <?php if($value['availability']==0){ ?>
                                          <span style="color: red">Out of Stock</span>
                                        <?php }elseif ($value['availability']<= $value['low_alert'] ) { ?>
                                          <span style="color: red">Low Stock</span>
                                      <?php   }else{ ?>
                                        <span style="color: green">In Stock</span>
                                    <?php   } ?>
                                        </td>
                                          
                                      
                                    </tr>
                                    
                                    
                                   <?php } }  elseif($inventory_type =="Out"){
                                        
                                         if($value['availability'] <= 0 ){
                                        
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                             </td>
                                          <td><?php echo $category =  $value['category_id'];?>
                                          <!--<input type="text" name="" class="form-control" id="category_<?php echo $value['sku_code']; ?>" value='<?php print_r($category); ?>' onchange="category('<?php echo $value['sku_code'] ?>')">-->
                                          </td>
                                       
                                          
                                            <td><input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['price'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')"></td>                            
                                      
                                           <td><input type="text" name="" class="form-control" id="sel_<?php echo $value['sku_code']; ?>" value="<?=$value['selling_price'];?>" onchange="selprice('<?php echo $value['sku_code'] ?>')"></td>
                                       
                                        
                                        <td><p style = "display:none"><?=$value['availability'];?> </p><input type="text" name="" class="form-control" id="availqty_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="availqty('<?php echo $value['sku_code'] ?>')"></td>                            
                                    <td><p style = "display:none"><?=$value['min_order_quan'];?></p><input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')"></td>
                                      
                           <td>
                          <p style = "display:none"><?=$value['low_alert'];?></p><input type="text" name="" class="form-control" id="low_alert_<?php echo $value['sku_code']; ?>" value="<?=$value['low_alert'];?>" onchange="low_alert('<?php echo $value['sku_code'] ?>')"></td>
                                      
                                      <td>
                                        <?php if($value['availability']==0){ ?>
                                          <span style="color: red">Out of Stock</span>
                                        <?php }elseif ($value['availability']<=20) { ?>
                                          <span style="color: red">Low Stock</span>
                                      <?php   }else{ ?>
                                        <span style="color: green">In Stock</span>
                                    <?php   } ?>
                                        </td>
                                          
                                      
                                    </tr>
                                    
                                    
                                   <?php } }else {
                                        
                                        
                                    ?>
                                       <tr> 
                                       <!--<td><input type="checkbox" name="" id=""></td>-->
                                        <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?=$value['main_image1'];?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                             </td>
                                          <td><?php echo $category =  $value['category_id'];?>
                                          <!--<input type="text" name="" class="form-control" id="category_<?php echo $value['sku_code']; ?>" value='<?php print_r($category); ?>' onchange="category('<?php echo $value['sku_code'] ?>')">-->
                                          </td>
                                       
                                          
                                            <td><input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['price'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')"></td>                            
                                      
                                           <td><input type="text" name="" class="form-control" id="sel_<?php echo $value['sku_code']; ?>" value="<?=$value['selling_price'];?>" onchange="selprice('<?php echo $value['sku_code'] ?>')"></td>
                                       
                                        
                                        <td><p style = "display:none"><?=$value['availability'];?> </p><input type="text" name="" class="form-control" id="availqty_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="availqty('<?php echo $value['sku_code'] ?>')"></td>                            
                                    <td><p style = "display:none"><?=$value['min_order_quan'];?></p><input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')"></td>
                                      
                           <td>
                          <p style = "display:none"><?=$value['low_alert'];?></p><input type="text" name="" class="form-control" id="low_alert_<?php echo $value['sku_code']; ?>" value="<?=$value['low_alert'];?>" onchange="low_alert('<?php echo $value['sku_code'] ?>')"></td>
                                      
                                      <td>
                                        <?php if($value['availability']==0){ ?>
                                          <span style="color: red">Out of Stock</span>
                                        <?php }elseif ($value['availability']<=20) { ?>
                                          <span style="color: red">Low Stock</span>
                                      <?php   }else{ ?>
                                        <span style="color: green">In Stock</span>
                                    <?php   } ?>
                                        </td>
                                          
                                      
                                    </tr>
                                    
                                    
                                   <?php }
                                            $i++ ;
                                            
                                        }
                                    ?>
                                   
                                     
                                </tbody>
                            </table>
                             
                            </div>
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
        </aside><input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>

<script type="text/javascript">
    if( $('.clienttable').length > 0 ) {
        $('.clienttable').DataTable( {           
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: { },
                    title: 'List',
                }
            ],  
        });
    }
    
</script>

<script type="text/javascript">
    if( $('.clienttable2').length > 0 ) {
        $('.clienttable2').DataTable( {           
            pageLength: 10,
            responsive: false,
             
        });
    }
    
</script>

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

function quan(id){

        var urls=$("#url").val();
      
        var type = $("#min_"+id).val();
     $.ajax({
            type: "POST",
            url: urls+"Admin/quantityupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
             alert(result);
              location.reload();
                }
            });
}
function low_alert(id){

        var urls=$("#url").val();
      
        var type = $("#low_alert_"+id).val();
     $.ajax({
            type: "POST",
            url: urls+"Admin/low_alertupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
              alert(result);
              location.reload();
                }
            });
 }
function avail(id) {
        var urls=$("#url").val();

        var type = $("#avail_"+id).val();
       var r = confirm("Are Your sure!");
if (r == false) {
  
 exit ;  
} else {
 
   $.ajax({  
            type: "POST",
            url: urls+"Admin/onlypriceupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //  alert(result);
               location.reload();
              
                }
            });
  }
}
function availqty(id) {
        var urls=$("#url").val();

        var type = $("#availqty_"+id).val();
          
        var r = confirm("Are Your sure!");
if (r == false) {
  
 exit ;  
} else {
 

        // alert(type);

   $.ajax({
            type: "POST",
            url: urls+"Admin/availupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //   alert(result); 
               location.reload();
              
                }
            });

  }
}

function selprice(id) {
        var urls=$("#url").val();

        var type = $("#sel_"+id).val();
       var r = confirm("Are Your sure!");
if (r == false) {
  
 exit ;  
} else {
 
   $.ajax({
            type: "POST",
            url: urls+"Admin/priceupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                // alert(result);
               location.reload();
              
                }
            });
    }
}
function category(id) {
        var urls=$("#url").val();

        var type = $("#category_"+id).val();

   $.ajax({
            type: "POST",
            url: urls+"Admin/category_update",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
               location.reload();
              
                }
            });
}
</script>
