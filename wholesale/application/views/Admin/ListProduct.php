
 <?php

                                  
//pr($_SESSION);die;
include('header.php');
include('sidebar.php');

?>
<style type='text/css'>
    div.table { display: table; }
    div.row { display: table-row; }
    div.cell { display: table-cell; }
    
    div#DataTables_Table_0_length {
        display: none;
    }
    
    div#DataTables_Table_0_filter {
        display: none;
    }
    
    div#DataTables_Table_0_info {
        display: none;
    }
    
    div#DataTables_Table_0_paginate {
        display: none;
    }
    
    .html5buttons {
        margin-bottom: 10px;
    }
    
    a.btn.btn-default.buttons-pdf.buttons-html5 {
        display: none;
    }
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
                                 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'ListProduct' ))->row();
                
                
                
               }
            
           if($user_rm->upload == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                 <a href="<?php echo base_url('Admin/Productupload'); ?>" class="btn btn-default">Add New Product</a>
                                   <a href="<?php echo base_url('Admin/excelupload'); ?>" class="btn btn-default">Bulk Add New Product</a>
                                   <?php } ?>
                                   <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'ListProduct' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
           <a href="<?php echo base_url(); ?>assets/excelsheet/sample.csv" class="btn btn-default">Sample CSV</a>
             <?php if($filter_apply =='Yes'){ ?>
                           <a href="<?php echo base_url('Product/productbycategories'); ?>?pcat=<?=$pcat;?>&cat=<?=$catid;?>&subcatid=<?=$subcatid;?>" class="btn btn-default" download>Download Excel with image </a>
                             <!--<a href="<?php echo base_url('Admin/downloadprocsv/'); ?>" class="btn btn-default">Download CSV</a>-->
                                              
                      <?php }else{  	$page = $this->uri->segment(3);	
 ?>
                                      <a href="<?php echo base_url('Product/export_xls/'.$page); ?>" class="btn btn-default">Download CSV with Image</a>
                                         <!--<a href="<?php echo base_url('Admin/downloadprocsv/'); ?>" class="btn btn-default">Download CSV</a>-->
                                  
                                      <?php }  }?>
                                      <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'ListProduct' ))->row();
                
                
                
               }
            
           if($user_rm->upload == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                         <a href="<?php echo base_url('Admin/updateprocsv'); ?>" class="btn btn-default">Update Product CSV</a>
                                         <?php } ?> 
                             <br/><br/>
                                       <div class="row">
                                        <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
                                     <form action="<?php echo base_url('Admin/productbycategories'); ?>" method="POST">
                                      <div class="col-md-3">
                                             <select class="form-control" onchange="sub()" id="cat" name="pcat" required>
                    		       
                                               <option>Select Category</option>
                                          <?php foreach ($parent_category as $key){ ?>
                                       
                                          <option value="<?php echo $key['id']; ?>" <?php if($pcat== $key['id']){ echo "selected"; } ?>><?php echo $key['name']; ?></option>
                                        <?php } ?>
                                        </select> </div>
                                        
                                          <div class="col-md-3">
                                   <?php 
                            			 	 $cat_id = $this->db->get_where('category' , array('parent_id' => $pcat))->result() ;
                            			 	 
                            		 
                            			  ?>
                                    <select class="form-control" onchange="subcat()" id="category"  name="cat" required>
			                            <option value="please choose">please choose</option>
			                            	<?php
                            			 	 
                            			foreach($cat_id as $catt) { 
                            			?>
                            		<option value="<?=  $catt->id ?>"  <?php if($catid == $catt->id ){echo 'selected';} ?> ><?=  $catt->name ?></option>
                            				<?php }  ?>
			                    	</select>
                                </div>
                                        <div class="col-md-3">
                                   
                                    <select class="form-control"  id="subcategory"  name="cat_id" >
			                            <option value="please choose">please choose</option>
			                            	<?php 
                            			 	 $subcat_id = $this->db->get_where('sub_category' , array('cat_id' => $catid))->result() ;
                            			foreach($subcat_id as $catt) { 
                            			?>
                            		<option value="<?=  $catt->id ?>"  <?php if($subcatid == $catt->id ){echo 'selected';} ?> ><?=  $catt->subcategory_name ?></option>
                            				<?php }  ?>
			                    	</select>
                                </div>
                                        
                                        <div class="col-md-2">
                                        <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                        </form>
                                    </div><br>
                            <table class="table table-bordered clienttable" style="display:none">
                                <thead>
                                   
                                        
                                       <th>SKU </th>
                                        <th>relation </th>
                                        <th>varient </th>
                                        <th>parent_skucode</th>
                                        <th>categoryid</th>
                                          <th>parent category </th>
                                          <th>sub category </th>
                                          <th>product name </th>
                                          <th>RETAIL PRICE </th>
                                          <th>WHOLESALE PRICE </th>
                                         <th>main_image1</th>
                                        <th>main_image2</th>
                                        <th>main_image3</th>
                                        <th>main_image4</th>
                                        <th>main_image5</th>
                                        <th>description</th>
                                        <th>bullet1</th>
                                        <th>bullet2</th>
                                        <th>bullet3</th>
                                         <th>bullet4</th>
                                         <th>bullet5</th>
                                        <th>size</th>
                                        <th>weight</th>
                                        <th>Color</th>
                                        <th>material</th>
                                       <th>other</th>
                                       <th>box_volume_weight</th>
                                       <th>Low Alert</th>
                                       <th>min_order_quan</th>
                                       <th>availability</th>
                                       <th>HSN CODE</th>
                                       <th>GST per</th>
                                       <th>meta_title</th>
                                       <th>meta_Key</th>
                                        <th>meta_description</th>
                                        <th>Occasion</th>
                                        <th>billing name</th>
                                        <th>New Ariival</th>
                                        <th>size filter </th>
                                        <th>Product Status</th>
                                        
                                    </tr>
                                </thead>
                                 <tbody>
                                    <?php foreach ($messages as  $values) { ?>
                                    <tr>
                                     <td><?php echo $values["sku_code"]; ?></td>
                                        <td> <?php echo $values["relation"]; ?></td>
                                        <td> <?php echo $values["varient"]; ?></td>
                                        <td> <?php echo $values["parent_sku"]; ?></td>
                                        <td> <?php echo $values["category_id"]; ?></td>
                                        <td> <?php echo $values["parent_cat"]; ?></td>
                                        <td> <?php echo $values["sub_catid"]; ?></td>
                                        <td> <?php echo $values["pro_name"]; ?></td>
                                        <td> <?php echo $values["price"]; ?></td>
                                        <td> <?php echo $values["selling_price"]; ?></td>
                                        
                                         <td> <?php echo $values["main_image1"]; ?></td>
                                         <td> <?php echo $values["main_image2"]; ?></td>
                                         <td> <?php echo $values["main_image3"]; ?></td>
                                         <td> <?php echo $values["main_image4"]; ?></td>
                                         <td> <?php echo $values["main_image5"]; ?></td>
                                         <td> <?php echo $values["description"]; ?></td>
                                         <td> <?php echo $values["bullet1"]; ?></td>
                                         <td> <?php echo $values["bullet2"]; ?></td>
                                         <td> <?php echo $values["bullet3"]; ?></td>
                                         <td> <?php echo $values["bullet4"]; ?></td>
                                         <td> <?php echo $values["bullet5"]; ?></td>
                                         <td> <?php echo $values["size"]; ?></td>
                                         <td> <?php echo $values["weight"]; ?></td>
                                         <td> <?php echo $values["color"]; ?></td>
                                         <td> <?php echo $values["material"]; ?></td>
                                         <td> <?php echo $values["other"]; ?></td>
                                         <td> <?php echo $values["box_volume_weight"]; ?></td>
                                          <td> <?php echo $values["low_alert"]; ?></td>
                                          <td> <?php echo $values["min_order_quan"]; ?></td>
                                          <td> <?php echo $values["availability"]; ?></td>
                                          <td> <?php echo $values["hsn_code"]; ?></td>
                                          <td> <?php echo $values["gst_per"]; ?></td>
                                          <td> <?php echo $values["meta_title"]; ?></td>
                                          <td> <?php echo $values["meta_keyword"]; ?></td>
                                          <td> <?php echo $values["meta_description"]; ?></td>
                                          <td> <?php echo $values["occasion"]; ?></td>
                                          <td> <?php echo $values["billing_name"]; ?></td>
                                          <td> <?php echo $values["new_arrivel"]; ?></td>
                                          <td> <?php echo $values["size_filter"]; ?></td>
                                          <td> <?php echo $values["status"]; ?></td>
                                         
                                     </tr>
                                  <?php } ?>
                                   
                                </tbody>
                            </table>
                            
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
                                            <img src="<?php echo base_url('assets/product/'.$values['main_image1'])   ?>" height="50px" width="50px">
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
                                        
                                       <?php } ?>
                                     
                                       
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
                               <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'ListProduct' ))->row();
                
                
                
               }
            
           if($user_rm->active == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                            <?php if($values['status'] == '0'){ ?>
                                           <button class="btn btn-success">  <a href="<?php echo base_url('Admin/product_active/'.$values['id']);?>">Enble</a></button>
                                           <br> 
                                            <?php } else{ ?>
                                            <button class="btn btn-danger">  <a href="<?php echo base_url('Admin/product_inactive/'.$values['id']);?>" >Disble</a></button>
                                            <?php } ?>
                                             <?php } ?>
                                            
                                        </td>
                                        
                            
                                        <td>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                                            $rowid = $_SESSION['session_iid'] ;
                                            
                                            $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'ListProduct' ))->row();
                                            
                                            
                                            
                                           }
                                        
                                       if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                        <a href="<?php echo base_url('Admin/Editproduct/'.$values['id']);?>">
                                                <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit Category"></i>
                                            </a>

                                          <!--<a href="<?php echo base_url('Admin/deleteproduct/'.$values['id']);?>" onclick="return confirm('Are you sure you want to delete this ?');">-->
                                          <!--      <i class="fa fa-trash-o" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete Category"></i>-->
                                          <!--  </a>-->
                                            <?php } ?>

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
                            </table>
                                        <div class="clearfix">                        
                                        <?php  echo $this->pagination->create_links();?>                        
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

<script type="text/javascript">
	function sub(){
	    
	    
		var urls=$("#url").val();
		var catid= $("#cat").val();
		 $.ajax({
            type: "POST",
            url: urls+"Admin/positioncati",
            data: {id:catid},
            cache: false,
            success: function(result){
              $("#category").html(result);
                }
            });
	}
	function subcat(){
		var urls=$("#url").val();
		var sub= $("#category").val();
		$.ajax({
            type: "POST",
            url: urls+"Admin/positionSubcati",
            data: {id:sub},
            cache: false,
            success: function(result){
            	if(result==''){
            		$("#subcathide").hide();
            	}else{
            		$("#subcathide").show();

              $("#subcategory").html(result);
          }
                }
            });
	}
	

</script>


<script type="text/javascript">
    if( $('.clienttable').length > 0 ) {
        $('.clienttable').DataTable( {           
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
                {
                    extend: 'csvHtml5',
                    exportOptions: { stripHtml: false }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: { stripHtml: false },
                    title: 'List',
                }
            ],  
        });
    }
    
</script>
