<?php
include('header.php');
include('sidebar.php');

?>
<style>
  #DataTables_Table_0_length {
    margin-bottom: -30px;
    margin-top: 20px;
}
    #DataTables_Table_0_length {
    display: none;
}
#DataTables_Table_0_info {
    display: none;
}
#DataTables_Table_0_paginate {
    display: none;
}
#DataTables_Table_0_filter {
    display: none;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Inventory List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Inventory</a>
                    </li>
                    <li class="active">Inventory List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Inventory List
                            </h4>
                        </div>
                      
                        <br />
                        <div class="panel-body" style="overflow-x: auto;">
                            <div class="table-responsive">
                                
                                 <!--<a href="<?php echo base_url('Admin/inventory'); ?>" class="btn btn-default  <?php if($current_uri=='inventory'){ echo "active"; } ?>">All Inventory</a>-->
                                 <!--  <a href="<?php echo base_url('Admin/lowstock'); ?>" class="btn btn-default <?php if($current_uri=='lowstock'){ echo "active"; } ?>">Low Stock</a>-->
                                 <!--   <a href="<?php echo base_url('Admin/outofstock'); ?>" class="btn btn-default <?php if($current_uri=='outofstock'){ echo "active"; } ?>">Out of Stock</a>-->
                                    
                                    
                                    <!--<a href="<?php echo base_url('Admin/invenreport'); ?>"> <button type="button" class="btn btn-default">Download Product CSV</button></a>-->
                                    <!--<a href="<?php echo base_url('Admin/invenvarreport'); ?>"> <button type="button" class="btn btn-default">Download Varient Product CSV</button></a>-->
                                    <!--<a href="<?php echo base_url('Admin/uploadvarproduct'); ?>" class="btn btn-default">Update  Varient Product</a>-->
                                    
                                       <!--<a href="<?php echo base_url('Admin/updateproductinvent'); ?>" class="btn btn-primary">Update Bulk Inventory</a><br><br>-->
                                   	  
                                      <!--<a href="<?php echo base_url('Admin/lowstockarreport'); ?>" class="btn btn-default">Download Low Stock Varient Product</a>-->
                                      <!--<a href="<?php echo base_url('Admin/outstockarreport'); ?>" class="btn btn-default">Download Out of Stock Varient Product</a>-->
                                      <!--<a href="<?php echo base_url('Admin/lowstockreport'); ?>" class="btn btn-default">Download Low Stock Product</a>-->
                                      <!--<a href="<?php echo base_url('Admin/outstockreport'); ?>" class="btn btn-default">Download Out of Stock Product</a><br>-->
                                      <div class="row" style="padding: 10px 0px; margin-left: -15px;">
                                <!--        <div class="col-md-1">
                                          <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button> </div> --> 
                                     <form action="<?php echo base_url('Admin/invent_categories'); ?>" method="POST">
                                          <div class="col-md-2">
                                               <select class="form-control" name="inventory_type">
                                               <option value="All">All Inventory</option>
                                                <option value="Low"<?php if($inventory_type == "Low"){ echo "selected" ;} ?>>Low Stock</option>
                                                <option value="Out" <?php if($inventory_type == "Out"){ echo "selected" ;} ?>  >Out of Stock</option>
                                                <option value="Hightolow">High to Low</option>
                                        </select> </div>
                                   
                                        
                                         <div class="col-md-3">
                                   <?php 
                            			 	 $cat_id = $this->db->get('category')->result() ;
                            			  ?>
                                    <select class="form-control" onchange="subcat()" id="category"  name="cat" required>
			                            <option value="please choose">please Category</option>
			                            	<?php
                            			 	 
                            			foreach($cat_id as $catt) { 
                            			?>
                            		<option value="<?=  $catt->id ?>"  <?php if($current_uri == $catt->id ){echo 'selected';} ?> ><?=  $catt->name ?></option>
                            				<?php }  ?>
			                    	</select>
                                </div>
                                
                                          <div class="col-md-3">
                                   
                                    <select class="form-control"  id="subcategory"  name="cat_id" >
			                            <option value="please choose">please Subcategory</option>
			                            	<?php 
                            			 	 $subcat_id = $this->db->get_where('sub_category' , array('cat_id' => $current_uri))->result() ;
                            			foreach($subcat_id as $catt) { 
                            			?>
                            		<option value="<?=  $catt->id ?>"  <?php if($subcatid == $catt->id ){echo 'selected';} ?> ><?=  $catt->subcategory_name ?></option>
                            				<?php }  ?>
			                    	</select>
                                </div>
                                        
                                        <!--<div class="col-md-3">-->
                                        <!-- <input type="text" class="form-control" name="sku_code" placeholder="Search by SKU" />-->
                                        <!--</select> </div>-->

                                        <div class="col-md-2">
                                        <input type="submit" name="submit" class="btn btn-default" value="Apply">
                                      </div>
                                       <div class="col-md-2">
                                             <a href="<?php echo base_url('Admin/inventory'); ?>" class="btn btn-success">Reset</a>
      </div>
                                        </form>
                                      

                                    </div>
                                      
                            <table class="table table-striped table-bordered    <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'inventory' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ echo  'clienttable' ; } ?>" style="display:none;">
                                <div class="upload-btn-wrapper">
                                     <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'inventory' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           
           <?php if($filter_apply =='Yes'){ ?>
                           <a href="<?php echo base_url('Product/invent_categories'); ?>?inventorytype=<?=$inventory_type;?>&cat=<?=$current_uri;?>&subcatid=<?=$subcatid;?>" class="btn btn-default" download>Download Excel with image </a>
                      
                      <?php }else{ 	$page = $this->uri->segment(3);	 ?>
                      <a href="<?php echo base_url('Product/inventory_download/'.$page); ?>" class="btn btn-default" download>Download Excel with image </a>
                       
                       <?php } ?>     
                                  <a href="<?php echo base_url(); ?>/assets/excelsheet/inventory_sample.csv" class="btn btn-success" download>Download Template</a>
                                  <?php } ?>
                                   <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'inventory' ))->row();
                
                
                
               }
            
           if($user_rm->upload == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
             
                                <a href="<?php echo base_url('Admin/updateproductinvent'); ?>" class="btn btn-success">UPLOAD CSV</a>
                                <?php } ?>
                                 </div>
                                
                                <thead>
                                    <tr >
                                        <!--<th>S.N.</th>-->
                                        <th>Image </th>
                                        <th>Product</th>
                                        <th>W.P</th>
                                        <th>Min Qty</th>
                                        <th>Inventory Qty</th>
                                        <th>Inventory Hold</th>
                                        <th>Net Inventory</th>
                                        <th> Status</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                     $inventory_type ; 
                                     
                                     $i =1 ;
                                    foreach ($product_detail as  $value) {
                                        if($inventory_type =="Low"){
                                            
                                            
                                        if($value['availability'] <= $value['low_alert']  &&  $value['availability'] > 0){
                                        
                                        
                                    ?>
                                       <tr>
                                       
                                         <!--<td><?= $i ;?></td> -->
                                         <td>
                                            
                                            <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                           
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                            
                                        </td>
                                              
                                        <td><?= $value['selling_price'] ;?></td> 
                                        <td><p style = "display:none"><?=$value['min_order_quan'];?></p>
                                       <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           
                                        <input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')">
                                 <?php }else{ ?>
             
             <?=$value['min_order_quan'];?>
             <?php } ?>       
                                        </td>
                      
                        <td><p style = "display:none"><?=$value['availability'];?> </p>
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
             <input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')">                           
             
             <?php }else{ ?>
             
             <?=$value['availability'];?>
             <?php } ?>
             </td> 
             
             <?php
                                //  $hold =  $value['inventory_hold'] ;
                                 $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
                                  $hold = $result[0]->quantity ; 
                                      
                                       
                                 if($hold){
                                      $holdlow = $result[0]->quantity  ;
                                 }else{
                                     
                                     
                                     $holdlow = 0 ;
                                 }
                                 
                                 ?>
                                         <td><?php  print_r($holdlow)    ; ?></td> 
                                       <td><?php echo $value['availability']- $holdlow ; ?></td> 
                                     
                                         <td>  <span style="color: red">Low Stock</span> </td>
                                      
                                    </tr>
                                    
                                    
                                   <?php } }  elseif($inventory_type =="Out"){
                                        
                                         if($value['availability'] <= 0 ){
                                    ?>
                                       <tr>
                                           
                                            <!--<td><input type="checkbox" name="" id=""></td>-->
                                          <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                           
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                          
                                        </td>
                                              
                                       <td><?= $value['selling_price'] ;?></td> 
                                        <td><?=$value['min_order_quan'];?></td>
                                        <td><?=$value['availability'];?></td>                            
                                       
                             <?php  
                            //  $hold =  $value['inventory_hold'] ;
                                    $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
        $hold = $result[0]->quantity ; 
                                 if($hold){
                                     $holdout = $result[0]->quantity ;
                                 }else{
                                     
                                     $holdout = 0 ;
                                 }
                                 
                                 ?>
                                         <td><?php echo $holdout ; ?></td> 
                                       <td><?php echo $value['availability']- $holdout ; ?></td> 
                                     
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
                                             <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                             </td>
                                              
                                       <td><?= $value['selling_price'] ;?></td> 
                                        <td><?=$value['min_order_quan'];?></td>
                                        <td><?=$value['availability'];?></td>                             
                                     
                       <?php 
                    //   $hold =  $value['inventory_hold'] ;
                $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                             	
        $hold = $result[0]->quantity ; 
                                 if($hold){
                                     $holdelse = $result[0]->quantity ;
                                 }else{
                                     
                                     $holdelse = 0 ;
                                 }                   
                               
                                 
                                 ?>
                                         <td><?php  echo $holdelse ; ?></td> 
                                       <td><?php echo $value['availability']- $holdelse ; ?></td> 
                                     
                                      <td>
                                    <?php if($value['availability'] <= 0){ ?>
                                    
                                        <span style="color: red">Out of Stock</span>
                                         <?php }elseif($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){ ?>
                                         
                                                <span style="color: red">Low Stock</span>
                                   
                                         <?php }else{ ?>
                                      <span style="color: green">In Stock</span>
                                   <?php } ?>
                                        </td>
                                      
                                    </tr>
                                    
                                    
                                   <?php }
                                            $i++ ;
                                            
                                        }
                                    ?>
                                   
                                     
                                </tbody>
                            </table>
                             
                                      

                            <table class="table table-striped table-bordered" id="table2">
                                <thead>
                                    <tr >
                                        <!--<th>S.N.</th>-->
                                        <th>Image </th>
                                        <th>Product</th>
                                        <th>W.P</th>
                                        <th>Min Qty</th>
                                        <th>Inventory Qty</th>
                                        <th>Inventory Hold</th>
                                        <th>Net Inventory</th>
                                        <th> Status</th>
                                       
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php  
                                     $inventory_type ; 
                                     
                                     $i =1 ;
                                    foreach ($product_detail as  $value) {
                                        if($inventory_type =="Low"){
                                            
                                            
                                        if($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){
                                        
                                        
                                    ?>
                                       <tr>
                                       
                                         <!--<td><?= $i ;?></td> -->
                                         <td>
                                            
                                            <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                           
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                            
                                        </td>
                                              
                                        <td><?= $value['selling_price'] ;?></td> 
                                        <td><p style = "display:none"><?=$value['min_order_quan'];?></p>
                                                 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                        <input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')">
                                        <?php }else{ ?>
                                        <?=$value['min_order_quan'];?>
                                        <?php } ?>
                                        </td>
                        <td><p style = "display:none"><?=$value['availability'];?> </p>
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
           <input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')">
           <?php }else{ ?>
                                        <?=$value['availability'];?>
                                        <?php } ?> </td>                            
                                 <?php
                                //  $hold =  $value['inventory_hold'] ;
                                $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                             	
        $hold = $result[0]->quantity ; 
                                 if($hold){
                                     $holdelse = $result[0]->quantity ;
                                 }else{
                                     
                                     $holdelse = 0 ;
                                 }                   
                               
                                 
                                 ?>
                                         <td><?php  print_r($hold)    ; ?></td> 
                                       <td><?php echo $value['availability']- $hold ; ?></td> 
                                     
                                         <td>  <span style="color: red">Low Stock</span> </td>
                                      
                                    </tr>
                                    
                                    
                                   <?php } }  elseif($inventory_type =="Out"){
                                        
                                         if($value['availability'] <= 0 ){
                                    ?>
                                       <tr>
                                           
                                            <!--<td><input type="checkbox" name="" id=""></td>-->
                                          <!--<td><?= $i ;?></td> -->
                                         <td>
                                             <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                           
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                          
                                        </td>
                                              
                                       <td><?= $value['selling_price'] ;?></td> 
                                       <td><p style = "display:none"><?=$value['min_order_quan'];?></p>
                                                 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
             
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                        <input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')">
                                        <?php }else{ ?>
                                        <?=$value['min_order_quan'];?>
                                        <?php } ?>
                                        </td>
                                        
                                             <td><p style = "display:none"><?=$value['availability'];?> </p>
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
           <input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')">
           <?php }else{ ?>
                                        <?=$value['availability'];?>
                                        <?php } ?> </td>                             
                                       
                             <?php
                             
                            $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                             	
        $hold = $result[0]->quantity ; 
                                 if($hold){
                                     $holdelse = $result[0]->quantity ;
                                 }else{
                                     
                                     $holdelse = 0 ;
                                 }                   
                                
                                 
                                 ?>
                                         <td><?php echo $holdelse ; ?></td> 
                                       <td><?php echo $value['availability']- $holdelse ; ?></td> 
                                     
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
                                             <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" height="50px" width="50px">
                                          
                                          </td>  
                                           <td>                                   
                                            <p style="color: green"><?php echo $value['sku_code']; ?></p>
                                             </td>
                                              
                                       <td><?= $value['selling_price'] ;?></td> 
                                        <td><p style = "display:none"><?=$value['min_order_quan'];?></p>
                                                 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
                                        <input type="text" name="" class="form-control" id="min_<?php echo $value['sku_code']; ?>" value="<?=$value['min_order_quan'];?>" onchange="quan('<?php echo $value['sku_code'] ?>')">
                                        <?php }else{ ?>
                                        <?=$value['min_order_quan'];?>
                                        <?php } ?>
                                        </td>
                                        
                                            <td><p style = "display:none"><?=$value['availability'];?> </p>
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Inventory' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> 
           <input type="text" name="" class="form-control" id="avail_<?php echo $value['sku_code']; ?>" value="<?=$value['availability'];?>" onchange="avail('<?php echo $value['sku_code'] ?>')">
           <?php }else{ ?>
                                        <?=$value['availability'];?>
                                        <?php } ?> </td>                  
                       <?php 
                     $pro_id =  $value['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                             	
        $hold = $result[0]->quantity ; 
                                 if($hold){
                                     $holdelse = $result[0]->quantity ;
                                 }else{
                                     
                                     $holdelse = 0 ;
                                 }                   
                                
                               
                                 ?>
                                    
                                         <td><?php  echo $holdelse ; ?></td> 
                                       <td><?php echo $value['availability']- $holdelse ; ?></td> 
                                     
                                       <td>
                                    <?php if($value['availability'] <= 0){ ?>
                                    
                                        <span style="color: red">Out of Stock</span>
                                         <?php }elseif($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){ ?>
                                         
                                                <span style="color: red">Low Stock</span>
                                   
                                         <?php }else{ ?>
                                      <span style="color: green">In Stock</span>
                                   <?php } ?>
                                        </td>
                                      
                                    </tr>
                                    
                                    
                                   <?php }
                                            $i++ ;
                                            
                                        }
                                    ?>
                                   
                                     
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

<!--datatable JS-->
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
                    columns: [1,3,4,5,6,7]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6],
                    },
                    title: 'List',
                }
            ],  
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
                
                // alert(result) ;
             
              location.reload();
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
               location.reload();
              
                }
            });
}

function selprice(id) {
        var urls=$("#url").val();

        var type = $("#sel_"+id).val();
alert(id);
   $.ajax({
            type: "POST",
            url: urls+"Admin/priceupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
               location.reload();
              
                }
            });
}
</script>

<script type="text/javascript">

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

