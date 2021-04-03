 <?php
include('header.php');


?>
<style>
.img50{
    height:50px;
    width:50px;
}
</style>

 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1> List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active"> Order List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> 
                            </h4>
                        </div>
                     
                        <br /> &nbsp;<!--<a href="<?php echo base_url('Admin/neworder'); ?>" class="btn btn-primary">New Order</a>-->
                        <div class="panel-body" style="overflow-x: auto;">
                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Order No :</b><?php print_r($result[0]['order_rand_id'])?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Order Date :</b> <?=  $result[0]['order_Date'];?> </p>
                                </div>
                                <div class="col-md-3">
                                    <p><b>Business Name :</b>  <?=  $result[0]['Business'];?> </p>
                                </div>
                                 <div class="col-md-3">
                                    <p><b>Owner Name :</b>  <?=  $result[0]['Owner'];?> </p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>Email ID :</b> <?=  $result[0]['email'];?> </p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>Mobile No :</b> <?=  $result[0]['phone'];?> </p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>Landline No :</b> <?=  $result[0]['landline'];?></p>
                                </div>
                                <div class="col-md-12">
                                    <p><b>Address :</b> <?=  $result[0]['Address'];?> </p>
                                </div>
                                 <div class="col-md-4">
                                    <p><b>PinCode :</b>  <?= $pincode =  $result[0]['PinCode'];?></p>
                                </div>
                                
                                <?php  $pincode = $this->db->get_where('pincode', array('name'=> $pincode))->row() ;
                                
                                        $city = $pincode->area ;
                                        
                                          $state = $pincode->state ;
                                
                                ?>
                                
                                <div class="col-md-4">
                                    <p><b>City :</b>  <?=  $city;?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>State :</b>  <?= $state ;?></p>
                                </div>
                                
                             
                                 
                            </div>
                           <table class="table table-striped table-bordered" id="mytable">
                                <thead>
                                    
                                     <tr>
                                        
                                         <input type="hidden" id ="request_id" value="<?= $result[0]['order_rand_id'] ?>">
                                          <input type="hidden" id ="ord_id" value="<?= $result[0]['order_id'] ?>">
                                         </td>
                                         
                                     </tr>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Sku</th>
                                        <th>Qty</th>
                                       <th>Ready Stock</th>
                                        <th>Rate (before tax)</th>
                                        <th>Discount Rate (before tax)</th>
                                      
                                        <!--<th>GST %</th>-->
                                        <!--<th>GST Amount</th>-->
                                          <th>Amount</th>
                                      
                                    </tr>
                                </thead>
                                 <tbody>
                                     
                                   <?php 
                                             foreach ($result as  $value) {
                        
                                         $total_price_new+= $value['cart_price'] ;
                                         
                                         
                                                $befor_dis_sub_total+=  $value['price']*$value['quantity'];
                                                
                                                
                                         
                                             }
                                   ?>
                                     
                        <?php  $order_id = $result[0]['order_rand_id'] ;
                        
                        	$a = 1 ;
                            $percent_amount = array();
                            $discount = array() ;
                              $per_item_dicount = array() ; 
                                
                                    $i = 1 ;
                                     foreach ($result as  $value) {
                                   
                                         ?>
                                     <tr>
                                         <td><?= $i++ ; ?></td>
                                         <?php   $product_id = $value['product_id'] ;
                                         $product_detail  =  $this->db->get_where('product_detail', array('sku_code' => $product_id ,))->row() ;
                                         
                                         
                                         if(empty($product_detail)){
                                             
                                             $product_detail  =  $this->db->get_where('product', array('sku_code' => $product_id ,))->row() ;
                                        
                                         }
                                     
                                         $img = $product_detail->main_image1;
                                         
                                        
                                         
                                         ?>
                                         <td><img src="<?= $img ?>" class="img50"></td>
                                         <td><?= $value['product_id']; ?></td>
                                         
                                       
                                          <td><?php echo $value['customer_quantity']; ?> </td>
                                          
                                        <input type="hidden" id="selling_price_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->selling_price; ?>"> 
                                        
                                         <input type="hidden" id="gst_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->gst_per; ?>"> 
                                         
                                         <input type="hidden" id="user_id_<?php echo $value['product_id']; ?>" value="<?php echo $value['user_id']; ?>"> 
                                         
                                           <input type="hidden" id="box_volume_<?php echo $value['product_id']; ?>" value="<?php echo $product_detail->box_volume_weight ; ?>"> 
                                           
                                         <?php  
                                           $volume= $product_detail->box_volume_weight *$value['quantity'];
                                           
                                          $finalvolume+=$volume;
                                          
                                          
                                           $sub_gst =$value['productgst'];
                                          $total_gst+= $sub_gst ;
                                          
                                          
                                        //   $total_price+= $value['cart_price'] + $value['productgst'] ;
                                             $total_price+= $value['cart_price']  ;
                                          
                                        //   echo $total_price;
                                         
                                         ?>
                                        
                                         <td><?php echo $value['quantity']; ?></td>
                                        
                                           
                                         <td><?= $price = $value['price']; ?></td>
                                         <?php  
                                         //==================== % ratio =====                                
                                  
                                  
                                  $item_price = $price*$value['quantity'] ;
                                  
                                  if($befor_dis_sub_total >= '40000'   && $befor_dis_sub_total < '100000'  ){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  } elseif($befor_dis_sub_total >= '100000' ){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  }
                                  else{
                                      
                                      $per_item_dicount[$a] = 0 ; 
                                  }
                                  
                                      
                                    ?>
                                         <td><?php  echo  $amount = round($price - $per_item_dicount[$a], 2)  ; $a++ ;
                                         
                                         
                                             $sub_price = $amount*$value['quantity'];
                                          
                                          
                                        $after_discount+= $sub_price ;
                                         
                                         ?></td>
                                         <!--<td>175</td>-->
                                        
                                         <!--<td>12</td>-->
                                         <!--<td><?= $value['productgst'] ; ?></td>-->
                                          <td><?php  echo $sub_price ; ?></td>
                                         <!--<td><p class="btn btn-primary" onclick="onButtonClick()" style="width: 100%;">Add</p>-->
                                           <?php 
                                           $total_product = array() ;
                                            $pro_detail1 =  $this->db->get('product')->result() ;
                                            
                                              $pro_detail2 =  $this->db->get('product_detail')->result() ;
                                            
                                             $total_product[1] = $pro_detail1 ;
                                             
                                             $total_product[2] = $pro_detail2 ;
                                             
                                           ?>
                                        
                                             
                                                <!--<td><p class="btn btn-primary" onclick="add('<?=$value['id'];?>');" style="width: 100%;">Update</p>-->
                                         <input class="hide"  type="text" id="textInput" value="" onkeyup="myFunction()" style="margin-top:5px;"/>
                                         <ul id="myUL" style="display:none;">
  <li><a href="javascript:void(0)"> Add New Row </a></li>
  <li><a href="#">Agnes</a></li>
    <li><a href="#">Billy</a></li>
  <li><a href="#">Bob</a></li>

  <li><a href="#">Calvin</a></li>
  <li><a href="#">Christina</a></li>
  <li><a href="#">Cindy</a></li>
</ul>

    </td>

                                      </tr>
                                      
                                      <?php } ?>
                                      
                                        
                                      <tr>
                                          <td></td>
                                          <td></td>
                                           <td></td>
                                            <td></td>
                                          <!--<td></td>-->
                                          <!--<td></td>-->
                                          <td>Before Sub total</td>
                                          <td><?= $befor_dis_sub_total ?></td>

                                          <td>Sub Total </td>
                                          
                                           <td> <span id="pricereplaces"><?php  echo  $sub_total = round($after_discount,2); ?></span></td>
                                      </tr>
                                    
                                      
                                      
                                      
                                   
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
        </aside><input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>

<script>


function myFunction() {
   var ins = $("#textInput").val();
  
   if(ins != ''){
$('#myUL').show();
  var input, filter, ul, li, a, i;
  input = document.getElementById("textInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}else{
  $('#myUL').hide();
}
}
</script>
<script>
      function onButtonClick(){
          document.getElementById('textInput').className="show";
        }
  </script>
  <style>
      .hide{
  display:none;
}
.show{
  display:block;
}
                                      </style>
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
             
              location.reload();
                }
            });
}
 function add(id){
   var urls=$("#url").val();
      
        var name = $("#name_"+id).val();
        var quantity = $("#quantity_"+id).val();
        var pid = $("#pid_"+id).val();
      
           $.ajax({
            type: "POST",
            url: urls+"Admin/addsuggest",
            data: {id:id,name:name,quantity:quantity,pid:pid},
            cache: false,
            success: function(result){
            // alert(result);
             location.reload();
                }
            });
 }
 
// ===New row for New Prduct ====== 
  function addnew_product(id){
     
      
   var urls=$("#url").val();
      
         var sku = $("#product_sku_" +id).val();
         var req_id = $("#request_id").val();
         
         var ord_id = $("#ord_id").val();
         
         var old_sku = id ;
         
        // alert(req_id) ;
         
         if(sku ==''){
             
             alert("please insert sku code") ;
             exit; 
         }
         
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/new_product_add",
            data: {sku:sku,req_id:req_id , ord_id:ord_id ,old_sku:old_sku},
            cache: false,
            success: function(result){
             alert(result);
            
             location.reload();
                }
            });
 }
 
 
 
  function delete_product(id){
      
      
     
    
  var txt;
  var r = confirm("Are You Sure !");
  if (r == true) {
      
     
  //================================   
      
   var urls=$("#url").val();
      
         var sku = $("#product_sku_" +id).val();
         var req_id = $("#request_id").val();
         
         var ord_id = $("#ord_id").val();
         
         var old_sku = id ;
         
        //  alert(sku) ;
         
         if(sku ==''){
             
             alert("please insert sku code") ;
             exit; 
         }
         
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/delete_newproduct",
            data: {sku:sku,req_id:req_id , ord_id:ord_id ,old_sku:old_sku},
            cache: false,
            success: function(result){
            // alert(result);
            
             location.reload();
                }
            });
            
    //=============================   
      
      
    txt = "You pressed OK!";
    
    
    
    
    
  } else {
      
      
      
    txt = "You pressed Cancel!";
    
    
  }
  
  document.getElementById("demo").innerHTML = txt;

     
       
 }
 
 
 //=============Update product==========
 
  function update_product(id){
   var urls=$("#url").val();
      
        var name = $("#name_"+id).val();
        var quantity = $("#quantity_"+id).val();
        var pid = $("#pid_"+id).val();
        
        
    //    var user_id = $("#user_id_"+id).val();
      
           $.ajax({
            type: "POST",
            url: urls+"Admin/update_product",
            data: {id:id,name:name,quantity:quantity,pid:pid},
            cache: false,
            success: function(result){
            // alert(result);
             location.reload();
                }
            });
 }
 
 //============================
</script>
<script>
$('a').click( function(){
      var $parentTR = $(this).closest('tr');

      $parentTR.clone(true).insertAfter($parentTR);
    });
/*    $("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});*/

/*$('a').live('click', function(){
      var $this     = $(this),
          $parentTR = $this.closest('tr');

      $parentTR.clone().insertAfter($parentTR);
    });*/
/*    $('a').bind('click', function(){
  $('<tr><td>new td</td></tr>').insertAfter($(this).closest('tr'));
});*/
</script>