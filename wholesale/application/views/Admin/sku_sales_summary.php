 <?php
 //pr($messa);die;
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
                <h1>Sales Report</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="active">Sales Summary</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_detailed');?>" class="btn btn-default">Sales Detailed</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sales_summary');?>" class=" btn btn-default">Sales Summary</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('Admin/sku_sales_summary');?>" class="active btn btn-primary">SKU Sales Summary</a>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Sales Summary
                            </h4>
                        </div>
             <form action="<?php echo base_url('Admin/sales_skusummary_filter'); ?>" method="POST">            
                        <div class="panel-body">
                            <div class="row" style="padding-left: 0px;padding-right: 50px; margin-left: -15px;">
                                <div class="col-md-3">
                                    <select class="form-control" name="cat_date" id="selectNEWBox">
                                        <option value="All" <?php if($cat_date == 'All' ) { echo 'selected' ; } ?>>Select Date</option>
                                        <option value="Month" <?php if($cat_date == 'Month' ) { echo 'selected' ; } ?>>Last Month</option>
                                        <option value="Quarter"  <?php if($cat_date == 'Quarter' ) { echo 'selected' ; } ?>>Last Quarter</option>
                                        <option value="custom" <?php if($cat_date == 'custom' ) { echo 'selected' ; } ?>>Select Date Range</option>
                                    </select>
                                </div>
                                <!--<div class="col-md-3">-->
                                <!--    <select class="form-control" name="order_by">-->
                                <!--        <option value="All">Sale Qty. by SKU</option>-->
                                <!--        <option value="high">High to Low</option>-->
                                <!--        <option value="low">Low to High</option>-->
                                <!--     </select>-->
                                <!--</div>-->
                                <div class="col-md-3">
                                    <?php   $category = $this->db->get('category')->result()?>
                                    <select class="form-control" name="category">
                                          <option value="All">--Select Category--</option>
                                       <?php foreach($category as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->id ; ?>"  <?php if($category_id == $res->id  ) { echo 'selected' ; } ?>><?= $res->name	 ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                     </select>
                                </div>
                                <!-- <div class="col-md-2">-->
                                    <!--<select class="form-control">-->
                                    <!--    <option>Search by SKU</option>-->
                                    <!--</select>-->
                                <!--</div>-->
                                  <div class=" col-md-2" id="search_phone" >
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                               <?php   $product = $this->db->get('product_detail')->result()?> 
                                    <input  name="search" list="phone" placeholder="Search by SKU"  type="text" value="<?= $skuid ; ?>"  class="form-control"  >
                                      <datalist id="phone" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($product as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->sku_code ; ?>"><?= $res->sku_code ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                <div class="col-md-1">
                                    <input type="submit" class="btn btn-success" id="apply_btn" value="Apply">
                                </div>
                            </div>
                            <div class="row" style="<?php if($cat_date == 'custom') { echo 'd ' ; }else{  echo 'display:none;' ; } ?> " id="showdate">
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
                            <br>
                            <table class="table table-bordered clienttable">
                                <thead>
                                    <tr class="filters">
                                        <th>SN</th>
                                        <th>Image</th>
                                        <th>Product CODE</th>
                                        <th>Last Category</th>
                                        <th>W.P</th>
                                        <th>Sales In Unit</th>
                                        <th>Sales Amount</th>
                                        <!--<th>Position in Category</th>-->
                                        <!--<th>Switch Position in Category</th>-->
                                        <th>Available Qty.</th>
                                        <th>Low Stock</th>
                                     </tr>
                                </thead>
                                
                                 <tbody>
                                    <?php  
                                    $i = 1 ;
                                    
                                    // foreach($result as $row){   
                                        
                                //          $order_id = $row->order_id ;
                                // $result  =$this->db->get('product_detail')->result(); 
                                
                                  foreach($result as $product_detail){ 
                                    
                                    ?>
                                    <tr>
                           
                             
                                <td><?= $i ; ?></td> 
                                <td><img src="<?php echo base_url('assets/product/'.$product_detail->main_image1)   ?>"  width="50px" height="50px">
                                    
                                   </td>
                            
                                <td><?= $sku = $product_detail->sku_code ; ?></td>
                                <td>
                                       <?php $cat_id = $product_detail->category_id ;
                                       
                                         $pat_cat =    explode(",",$cat_id) ;
                                    
                            			  foreach($pat_cat as $pc ){
                            			      
                            			     
                            			 $cat_id = $this->db->get_where('category' , array('id' => $pc))->row() ;
                            			 
                                                           ?>
                               
                                        <?= $cat_id->name ?>,<br>
                                        <?php } ?>
                                </td>
                                
                                 <td><?= $p =$product_detail->selling_price ; ?></td> 
                             
                            
                                <td>
                                                              <?php 
                                      
                                                		$this->db->select_sum('quantity');;
                                                		$this->db->from('order_detail');
                                                		$this->db->where("product_id","$sku");
                                                		$this->db->where("place_order",1);
                                                		if($first_date){
                                                		$this->db->where('date >=', $first_date);
                                                		}
                                                		if($second_date){
                                                        $this->db->where('date <=', $second_date);
                                                		}
                                                		$query = $this->db->get();
                                                
                                                
                                                
                                                		$result = $query->result();
                                                
                                                	
        $qty = $result[0]->quantity ; 
                                      if($qty){
                                          
                                          echo $qty ;
                                      }else{
                                          echo $qty = 0  ;
                                      }
                                      
                                                                    
                                      ?>
        
                                </td>
                                    <td><?= $p*$qty ;?></td>
                                
                            <!--<td><?= $product_detail->Position ;?></td> -->
                             <!--<td><?= $product_detail->Position ;?></td> -->
                               <td><?= $product_detail->availability; ?></td> 
                             <td><?= $product_detail->low_alert; ?></td> 
                            
                              
                                    </tr>
                                    
                                 <?php }  $i++; 
                                 
                            //     }
                                 
                                 ?>   
                                </tbody>
                            </table>
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


<!--datatable-->
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
                    exportOptions: {},
                    title: 'List',
                     orientation: 'landscape',
                     pageSize: 'LEGAL'
                }
            ],  
        });
    }
    
</script>


