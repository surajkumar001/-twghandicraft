 <?php
include('header.php');
include('sidebar.php');

?>
<style>
.img50{
    height:75px;
    width:100px;
}
.dt-buttons.btn-group {
    margin-left: 15px;
}
#table1_info {
    display: none;
}
#table1_paginate {
    display: none;
}
#table1_filter {
    display: none;
}
</style>

 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add Products in Cart</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                   
                    <li class="active">Add Products in Cart</li>
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
                            <div class="row" style="padding:0px;">
                            
                               
                                <div class="col-md-4">
                                    <p><b>Business Name :</b>  <?=  $result->Business;?> </p>
                                </div>
                                 <div class="col-md-4">
                                    <p><b>Owner Name :</b>  <?=  $result->Owner;?> </p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>Email ID :</b> <?=  $result->email;?> </p>
                                </div>
                                </div>
                                <div class="row" style="padding:0px;">
                                <div class="col-md-6">
                                    <p><b>Mobile No :</b> <?=  $result->phone;?> </p>
                                </div>
                               </div>
                                
                              <div class="row" style="padding:0px;">
                                <div class="col-md-12">
                                    <p><b>Address :</b> <?=  $result->Address ;?> </p>
                                </div>
                                </div>
                             <div class="row" style="padding:0px;">
                                 <div class="col-md-4">
                                    <p><b>PinCode :</b>  <?= $pincode =  $result->PinCode;?></p>
                                </div>
                                
                                <?php  $pincode = $this->db->get_where('pincode', array('name'=> $pincode))->row() ;
                                
                                        $city = $pincode->area ;
                                          $state = $pincode->state ;
                                
                                ?>
                                
                                <div class="col-md-4">
                                    <p><b>City :</b>  <?=  $city =  $result->city ; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><b>State :</b>  <?= $state =  $result->state  ;?></p>
                                </div>
                                
             </div>
                                 
                            </div>
                            
                                              <?php 
                              
                              
                                $id=$result->id;
    $where='user_id';
    $table='cart';
    $data=$this->Adminmodel->select_com_where($table,$where,$id);
    
    
     
    ?>
    
    <div class="row" style="padding:0px 15px;">
        
        <?php  $userid =  $result->id; 
                         $mob =$result->phone ;
                         ?>
                         <?php  if($this->session->flashdata('msg')){ ?>
                                    <div class="row alert alert-danger" >
                                        <h5>
                                            <?php echo $this->session->flashdata('msg') ;  ?>
                                        
                                        </h5>
                                    </div>
                                      <?php } ?>   
                                
                                 <div class="col-md-6">
                                     
                                        <label>Add Product </label>
                                    <input type="text" onkeyup="myFunction()"  id="textInput" class="form-control" placeholder="Enter Product SKU Code">
                                    
                                     <input type="hidden" name="user_id_admin" id="user_id_admin" value="<?php echo $userid =  $result->id; ?>" >
                                         
                                    <ul id="myUL" style="display:none;border: 1px solid #418bca;padding: 5px;">
                                        
                                       
                                          <?php foreach($product_detail as $pro ){ 
                                              
                                                           ?>
                                                           <?php $sku = $pro->sku_code ; ?> 
                                                       
                 <li><a href="<?= base_url('Admin/addcartadmin2')?>?product_sku=<?=$sku;?>&user_id=<?=$userid;?>&mobile=<?=$mob;?>"><?=$pro->sku_code ; ?></a></li>
                                                       <?php  }?>
                                     </ul>
                                     
                                     
                                  
                                    <!--<input type="text" onkeyup="myFunction()" list="browsers2" id="textInput" class="form-control" placeholder="Enter Product Name">-->
                                    
                                                 
                                                      
                                                      
        
    </div>
    <div class="col-md-6"></div>
    </div>
    <div class="row">
     <table class="table"          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'NewOrder' ))->row();
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           id="table1" <?php } ?> style="display:none">
                   <thead>
        <tr class="hdn">
          
          <th class="cart-description item">Image</th>
          <th class="cart-product-name item">Product</th>
           <th class="cart-qty item">Price</th>
          <th class="cart-qty item">Quantity</th><!-- 
                    <th class="cart-sub-total item">Product Price</th> -->
                    <th class="cart-sub-total item">W.P.</th>
                    <th class="cart-sub-total item">GST</th>
          <!--<th class="cart-sub-total item">Discount</th>-->
          <th class="cart-total last-item">Total</th>
                    <!--<th class="cart-romove item">Remove</th>-->
        </tr>
      </thead><!-- /thead -->
                              <tbody>
                                           <?php     foreach ($data as  $cart) {
                                              $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);
                                                    if(empty($product)){
                                                       $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id) ; 
                                                 
                                                 
                                                
                                                 }
                                                    if(empty($product)){
                                                    $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                 
                                        $cartusersums+=$cart['cart_price'];
                                        $volume=$product[0]['box_volume_weight']*$cart['quantity'];
                                         
                                                 
                                              
                                            if($product[0]['gst']=='1'){
                                              $addgst=100+$product[0]['gst_per'];
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/$addgst;

                                            }else{
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/100;
                                        }
                                        ?>
                                        <tr>
                    
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank">
                            <img src="<?php echo base_url('assets/product/'.$product[0]['main_image1'])   ?>" class="img50">
                        </a>
                    </td>
                    
                    
                   <td>
                        <p class='cart-product-description'><a href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank"><?php echo $product[0]['sku_code']; ?> </a></h4>
                        <?php if(empty($product[0]['promotion_price'])){
                         if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['selling_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['selling_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['selling_price'];
                             }  ?>
                       <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['selling_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                      
                     <?php } else { 
                       if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['promotion_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['promotion_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['promotion_price'];
                             }
                      ?>
                <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['promotion_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span>
                     <?php } ?>
 
                    </td>
                    <td> <span class=""><span ><?php echo $var; ?></span></span></td>
                    <!--<input type="text" id="gstinc_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">-->
    
    
    
       <td class="cart-product-quantity">
                       
                                
                                <?php echo $cart['quantity']; ?>
                          
                    </td>
             
                 <td class="cart-product-sub-total"><span class="cart-sub-total-price"> <?php if($product[0]['gst']=='2'){ echo round($cart['cart_price'],2); }else{ echo round($cart['cart_price'],2); } ?>.00</span>
                    </td>
     <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($cart['gst']);     $gst_total+= $cart['gst'] ; ?>(<?php echo $product[0]['gst_per']; ?>%)</span></td>
    
             <?php 
                if($product[0]['gst']=='2'){
       $carttt= round($cart['cart_price']+$cart['gst'] ,2);
       
                 ?>   

                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price']+$cart['gst'],2); }else{ echo round($cart['discount_price']+$cart['gst'] ,2); } ?></span></td>
                <?php } else{
                  
       $carttt= round($cart['cart_price']+$cart['gst'] ,2);
       
    //   print_r($carttt) ;
        ?>
                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price'],2); }else{ echo round($cart['discount_price'],2); } ?></span></td>
                <?php } ?>
                
                 <!--<td class="romove-item"><a href="#" title="cancel" class="icon" onclick="delcartadmin('<?php echo $cart['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>-->
                 
                
                </tr>
        <?php
               
                 $finalvolume+=$volume;
                 $carttotal+=$carttt;
                 
            //    print_r($carttotal) ; 

                 }
                 ?>
                 
                 </tbody>
          
         </table> 
         
         <table class="table" id="table">
                   <thead>
        <tr class="hdn">
          
          <th class="cart-description item">Image</th>
          <th class="cart-product-name item">Product</th>
          <th class="cart-qty item">Quantity</th><!-- 
                    <th class="cart-sub-total item">Product Price</th> -->
                    <th class="cart-sub-total item">W.P.</th>
                    <th class="cart-sub-total item">GST</th>
          <!--<th class="cart-sub-total item">Discount</th>-->
          <th class="cart-total last-item">Total</th>
                    <th class="cart-romove item">Remove</th>
        </tr>
      </thead><!-- /thead -->
                              <tbody>
                                           <?php     foreach ($data as  $cart) {
                                              $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);
                                                    if(empty($product)){
                                                       $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id) ; 
                                                 
                                                 
                                                
                                                 }
                                                    if(empty($product)){
                                                    $id=$cart['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                 
                                        $cartusersums+=$cart['cart_price'];
                                        $volume=$product[0]['box_volume_weight']*$cart['quantity'];
                                         
                                                 
                                              
                                            if($product[0]['gst']=='1'){
                                              $addgst=100+$product[0]['gst_per'];
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/$addgst;

                                            }else{
                                          $gst=$cart['cart_price']*$product[0]['gst_per']/100;
                                        }
                                        ?>
                                        <tr>
                    
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank">
                            <img src="<?php echo base_url('assets/product/'.$product[0]['main_image1'])   ?>" class="img50">
                        </a>
                    </td>
                    
                    
                   <td>
                        <p class='cart-product-description'><a href="<?php echo base_url(''.$product[0]['url']); ?>" target="_blank"><?php echo $product[0]['sku_code']; ?> </a></h4>
                        <?php if(empty($product[0]['promotion_price'])){
                         if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['selling_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['selling_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['selling_price'];
                             }  ?>
                       <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['selling_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span>
                     <?php } else { 
                       if(!empty($cart['discount_price'])){
                         $discount_prices=($product[0]['promotion_price']*$cart['discount_slab'])/100;
                             $var=$product[0]['promotion_price']-$discount_prices;  
                          }
                             else{
                             $var=$product[0]['promotion_price'];
                             }
                      ?>
                <input type="hidden" id="selling_price_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['promotion_price']; ?>"> 
                        <input type="hidden" id="gst_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst_per']; ?>"> 
                        <input type="hidden" id="gstinc_<?php echo $cart['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">
                       <span class="">Product Price : <span >Rs <?php echo $var; ?></span></span>
                     <?php } ?>
 
                    </td>
                    <!--<input type="text" id="gstinc_<?php echo $value['product_id']; ?>" value="<?php echo $product[0]['gst']; ?>">-->
    
    
    
       <td class="cart-product-quantity">
                       
                                
                                <input type="number" onkeydown="return false" value="<?php echo $cart['quantity']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>"  max="<?php echo $product[0]['availability']; ?>"  id="quantity_<?php echo $cart['product_id']; ?>" onchange="quantitycartadmin_('<?php echo $cart['product_id']; ?>');">
                          
                    </td>
             
                 <td class="cart-product-sub-total"><span class="cart-sub-total-price"> <?php if($product[0]['gst']=='2'){ echo round($cart['cart_price'],2); }else{ echo round($cart['cart_price'],2); } ?>.00</span>
                    </td>
     <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo round($cart['gst']);     $gst_total+= $cart['gst'] ; ?>(<?php echo $product[0]['gst_per']; ?>%)</span></td>
    
             <?php 
                if($product[0]['gst']=='2'){
       $carttt= round($cart['cart_price']+$cart['gst'] ,2);
       
                 ?>   

                    <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price']+$cart['gst'],2); }else{ echo round($cart['discount_price']+$cart['gst'] ,2); } ?></span></td>
                <?php } else{
                  
       $carttt= round($cart['cart_price']+$cart['gst'] ,2);
       
    //   print_r($carttt) ;
        ?>
                   <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php if(empty($cart['discount_price'])){ echo round($cart['cart_price'],2); }else{ echo round($cart['discount_price'],2); } ?></span></td>
                <?php } ?>
                
                 <td class="romove-item"><a href="#" title="cancel" class="icon" onclick="delcartadmin('<?php echo $cart['product_id']; ?>');"><i class="fa fa-trash-o"></i></a></td>
                 
                
                </tr>
        <?php
               
                 $finalvolume+=$volume;
                 $carttotal+=$carttt;
                 
            //    print_r($carttotal) ; 

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
  function addcartadmin(){
      
    
   var urls=$("#url").val();
      
         var product_sku = $("#product_sku_admin").val();
         
         var user_id = $("#user_id_admin").val();
         
         var qunatity = $("#quantity_admin").val();
         
         
        //  alert(qunatity) ;
      
        // var pid = $("#pid_"+id).val();
      
      
     // alert(sku);
           $.ajax({
            type: "POST",
            url: urls+"Admin/addcartadmin",
            data: {product_sku:product_sku,user_id:user_id , qunatity:qunatity ,},
            cache: false,
            success: function(result){
            //  alert(result);
            
             location.reload();
                }
            });
 }
 
 //====================================
 
   function quantitycartadmin_(id){
       
     
        var urls=$("#url").val();
        var selling_price=$("#selling_price_"+id).val();
        var gst=$("#gst_"+id).val();
        var gstinc=$("#gstinc_"+id).val();
        
          var user_id = $("#user_id_admin").val();
      
        var quantity=$("#quantity_"+id).val();
        
        // alert(quantity) ;
        
          $.ajax({
            type: "POST",
            url: urls+"Admin/addcartadmin",
            data: {product_sku:id,user_id:user_id , qunatity:quantity ,},
            cache: false,
            success: function(result){
                
            //  alert(result);
            
            location.reload();
              
                }
            });

    }
    
//=================================================    
 
       function delcartadmin(id){
           
        
        var urls=$("#url").val();
        
          var user_id = $("#user_id_admin").val();
          
        $.ajax({
            type: "POST",
            url: urls+"Admin/delcartadmin",
            data: {id:id , user_id : user_id },
            cache: false,
            success: function(result){
              //alert(result);
            location.reload();
              
                }
            });

    }
 
 
 //=====cancelled order =====
 
  
  function cancelled_(id){
      
  var txt;
  var r = confirm("Are You Sure  Want to Cancelled Order !");
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
            url: urls+"Admin/cancelled_done",
            data: {req_id:req_id , },
            cache: false,
            success: function(result){
            // alert(result);
            
              window.open(urls+"Admin/orderbystatus/Cancelled");
            
            //  location.reload();
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
</script>
