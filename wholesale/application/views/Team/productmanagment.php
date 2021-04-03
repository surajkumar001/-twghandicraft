 <?php //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Product Management</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="active">Product Management</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Product Management
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            
                      <a href="<?php echo base_url('Admin/productmanagment');?>" class="btn btn-success">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> All 
                        </a>
                            <form action="<?php echo base_url('Admin/position_list'); ?>" method="POST">            
                        <div class="panel-body">
                            <div class="row" style="padding-left: 0px;padding-right: 50px; margin-left: -15px;">
                                <div class="col-md-2">
                                      <label>Sales Data Range</label>
                                    <select class="form-control" name="date" id="selectNEWBox">
                                        <option value="All">Select Date</option>
                                        <option value="Month">Last Month</option>
                                        <option value="Quarter" >Last Quarter</option>
                                        <option value="custom">Select Date Range</option>
                                    </select>
                                </div>
                               
                                  <div class="col-md-3">
                                    <label>	Parent Category</label>
                    		        <select class="form-control" onchange="sub()" id="cat"  name="pcat" required>
                    		        	<option value="">please choose</option>
                    		          <?php foreach ($pcat as  $value) { ?>
                    		          <option value="<?php echo $value['id'];?>" <?php if($pcat_id == $value['id']){echo 'selected';} ?>  ><?php echo $value['name'];?></option>
                    		          <?php } ?>
                    		        </select>
                                </div>
                                <div class="col-md-3">
                                    <label>	Category</label>
                                    <select class="form-control" onchange="subcat()" id="category"  name="cat" required>
			                            <option value="">please choose</option>
			                            
			                            	<?php 
			 
			 	      
			 $cat_id = $this->db->get_where('category' , array('parent_id' => $pcat_id))->result() ;
			 
			 
			foreach($cat_id as $catt) { 
			
			?>
		<option value="<?=  $catt->id ?>"  <?php if($category_id == $catt->id ){echo 'selected';} ?> ><?=  $catt->name ?></option>
				<?php }  ?>
			                            
		 	                    	</select>
                                </div>
                             
                             <div class="col-md-3" id="subcathide">
                                     <label>Sub Category</label>
                                    <select class="form-control"  id="subcategory" name="sub_cat">
			                            <option value="0">please choose</option>
			                            
			                            <?php 
			
			 	      	 $subcat_id = $this->db->get_where('sub_category' , array('cat_id' => $category_id))->result() ;
			foreach($subcat_id as $subcatt) { 
			?>
		<option value="<?=  $subcatt->id ?>"  <?php if($subcategory_id == $subcatt->id ){echo 'selected';} ?> ><?=  $subcatt->subcategory_name ?></option>
				<?php }  ?>
			                        </select>
                                </div>
                                <!-- <div class="col-md-2">-->
                                    <!--<select class="form-control">-->
                                    <!--    <option>Search by SKU</option>-->
                                    <!--</select>-->
                                <!--</div>-->
                       
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" id="apply_btn" value="Apply" style="margin-top:25px">
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
                            <div class="row">
                             <a href="<?php echo base_url(); ?>/assets/excelsheet/productmangment.csv" class="btn btn-primary" download>  Sample Download  </a> 
                             
                             <a href="<?= base_url('Admin/Upload_productmanagent');?>" class="btn btn-primary">   Upload CSV </a>   
                            </div>
                             
                         <div style="overflow-x:auto;">
                              
                            <table class="table table-bordered clienttable" style="width: 99%;overflow-y:auto;">
                                <thead>
                                    <tr class="filters" >
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Product SKU</th>
                                        <th>Category</th>
                                        
                                        <th>W.P</th>
                                        <th>Sales In Unit</th>
                                        <th>Sales Amount</th>
                                        
                                        <th> Switch Position in Category </th>
                                        
                                        <th>Postion</th>
                                        <th>Available Qty.</th>
                                        <th>Low Stock</th>
                                        
                                        <!--<th>Action</th>-->
                                     </tr>
                                     
                                     
                                </thead>
                                
                                <tbody>
                                  <?php $i = 1 ; foreach($position_list as $position){
                                      
                             
                                //   print_r($position) ; 
                                  ?>
                                    <tr>
                                        <td><?= $i++  ;?></td>
                                        <?php  $sku = $position['product_sku'] ;
                                        $product = $this->db->get_where('product_detail',array('sku_code'=> $sku))->row();
                                        ?>
                                        
                                         <td><img src="<?= $product->main_image1 ?>" width="50px;" height="50px;"></td>
                                        <td><?= $position['product_sku'] ;?></td>
                                        <td><?php
                                         $cat_id =  $position['category']; 
                                        if(empty($cat_id)){
                                            
                                            $cat_id = $position['sub_cat']; 
                                        }
                                            echo $cat_id  ;                 
                                        // $category = $this->db->get_where('category', array('id'=> $cat_id))->row(); 
                                        
                                        //  $category->name ; 
                                        
                                        ?></td>
                                      <td><?= $p =$product->selling_price ; ?></td> 
                                      <?php 
                                      
                                    //   $order = $this->db->get_where('order_detail' , array('product_id'=> $sku))->row();
                                      
                                      
                                                		$this->db->select_sum('quantity');;
                                                		$this->db->from('order_detail');
                                                		$this->db->where("product_id","$sku");
                                                		if($first_date){
                                                		$this->db->where('date >=', $first_date);
                                                		}
                                                		if($second_date){
                                                        $this->db->where('date <=', $second_date);
                                                		}
                                                		$query = $this->db->get();
                                                
                                                
                                                
                                                		$result = $query->result();
                                                
                                                	
                                      
                                      ?>
                                      <td><?php $qty = $result[0]->quantity ; 
                                      if($qty){
                                          
                                          echo $qty ;
                                      }else{
                                          echo $qty = 0  ;
                                      }
                                      
                                      ?></td>
                                       <td><?= $p*$qty ; ?></td>
                                      <td><input type="text"  class="form-control" id="position_<?php echo $position['id']; ?>" 
                                         value="<?=$position['category_position'];?>" onchange="update_pos('<?php echo $position['id'] ?>')"></td>     
                                    
                                        <td><?=$position['category_position'];?></td>
                                        <td><?= $product->availability ; ?></td>
                                        <td> <?= $product->low_alert ; ?> </td>
                                      
                                         <!--    <td>-->
                                            <!--<a href="#">-->
                                            <!--    <i class="fa fa-pencil" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Edit User"></i>-->
                                            <!--</a>-->
                                         <!--   <a href="#" onclick="return confirm('Are you sure you want to delete this ?');">-->
                                         <!--       &nbsp;&nbsp;<i class="fa fa-trash" data-name="info" data-size="28" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Delete User"></i>-->
                                         <!--   </a>-->
                                         <!--</td>-->
                                     </tr>
                                   
                                <?php  } ?>  
                                   
                                </tbody>
                            </table>
                            </div>
                            <!-- Modal for showing delete confirmation -->
                           
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside>
      
<?php
include 'footer.php';
?>

<input type="hidden" value="<?= base_url() ; ?>" id="url">
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
	
	 function update_pos(id){
	     
	    var urls=$("#url").val();
        var type = $("#position_"+id).val();
        
       
     $.ajax({
            type: "POST",
            url: urls+"Admin/position_product",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
                
                //   alert(result) ;
             
              location.reload();
                }
            });
} 
</script>


 <script>
    $("#selectNEWBox").change(function (){
        var value = this.value;
        if(value=='custom'){
            $('#showdate').show();  
            
            $('#apply_btn').hide();
        }
        else {
            $('#showdate').hide();
            
             $('#apply_btn').show();
            
        }
    });
    
    
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
                    exportOptions: { }
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