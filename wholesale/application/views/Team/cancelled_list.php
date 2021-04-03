  <?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
<style>
    .lng{
        line-height: 0.6;
    }
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Order</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Order</a>
                    </li>
                    <li class="active">Order List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Order List
                            </h4>
                        </div>
                        <br />
                     
                             <div class="row">
                                  <?php   $rm_list = $this->db->get('rm')->result(); ?>
 		
                                       <!--  <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div> -->
                                 <form action="<?php echo base_url('Admin/filterbystatus'); ?>" method="POST">
                                        
                                     <input type="hidden" name="ordertype" value="<?php echo $status; ?>">
                                              
                                          <div class="col-md-1" style="padding-left: 0px; padding-right: 0px;">
                                            <select class="form-control" name="rm_id" required style="font-size: 13px;">
                                       <option value="All">Search by RM </option>
                                       <?php foreach($rm_list as $rm){ ?>
                                       <option  value="<?=  $rm->id ?>" ><?php echo $rm->rm_name ; ?></option>
                                      <?php } ?>
                                      </select>
                                        </div>
                                          <div class="col-md-1" style="margin-right:35px;">
                                          <a href="<?php echo base_url('Admin/orders'); ?>"><button type="button" class="btn btn-default <?php if($status == 'Not') {echo "active"; }  ?>">Not Approved</button></a>
                                        </div>
                                        <div class="col-md-1">
                                          <a href="<?php echo base_url('Admin/orderbystatus/Pending'); ?>"><button type="button" class="btn btn-default  <?php if($current_uris== "0"){ echo "active"; } ?>">Pending</button></a>
                                        </div>
                                        <div class="col-md-2">
                                           <a href="<?php echo base_url('Admin/orderbystatus/ReadyShipped'); ?>"> <button type="button" class="btn btn-default  <?php if($current_uris== "1"){ echo "active"; } ?>">Ready To Shipped</button></a>
                                        </div>
                                        <div class="col-md-1" style="margin-left: -29px;">
                                            <a href="<?php echo base_url('Admin/orderbystatus/Shipped'); ?>"> <button type="button" class="btn btn-default  <?php if($current_uris== "4"){ echo "active"; } ?>">Shipped</button></a>
                                        </div>
                                        <div class="col-md-1">
                                           <a href="<?php echo base_url('Admin/orderbystatus/Delievered'); ?>"> <button type="button" class="btn btn-default  <?php if($current_uris== "5"){ echo "active"; } ?>">Delivered</button></a>
                                        </div>
                                         
                                        <div class="col-md-1" style="margin-left:5px;">
                                           <a href="<?php echo base_url('Admin/CancelledorderList/cancelled'); ?>"> <button type="button" class="btn btn-default  <?php if($status== "Cancelled"){ echo "active"; } ?>">Cancelled</button></a>
                                        </div>
                                         <div class="col-md-1" style="margin-right:5px;">
                                          <a href="<?php echo base_url('Admin/Allorders'); ?>"><button type="button" class="btn btn-default <?php if($status == 'All') {echo "active"; }  ?>">All Order</button></a>
                                        </div>
                                           
                                      <div class="col-md-1">
                                           
                                        <select class="form-control" name="cats" id="cat" onchange="showdate();">
                                            
                                            <option value="order" <?php if($current_uri== "order"){ echo "selected"; } ?>>All </option>
                                            <option value="month" <?php if($current_uri=="month"){ echo "selected"; } ?> >Monthly</option>
                                            <option value="week" <?php if($current_uri=="week"){ echo "selected"; } ?>>Weekly</option>
                                            <option value="today" <?php if($current_uri=="today"){ echo "selected"; } ?>>Today</option>
                                            <option value="custom" <?php if($current_uri=="custom"){ echo "selected"; } ?>>Custom</option>
                                    
                                        </select> 

                                    </div>
                                      
                                     <div class="col-md-1">
                                        <input type="submit" id="hidebtn" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                      
                                       </div>
                                   </form>
                             <!--<div class="row">
                                    
                                        <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div>
                                     <form action="<?php echo base_url('Admin/orderbycategories'); ?>" method="POST">
                                        <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                      <div class="col-md-3">
                                        <select class="form-control" name="cats" id="cat" onchange="showdate();">
                                               <option value="order" <?php if($current_uri== "order"){ echo "selected"; } ?>>All Orders</option>
                                          <option value="today" <?php if($current_uri=="today"){ echo "selected"; } ?>>Today</option>
                                          <option value="week" <?php if($current_uri=="week"){ echo "selected"; } ?>>Weekly</option>
                                          <option value="month" <?php if($current_uri=="month"){ echo "selected"; } ?> >Monthly</option>
                                          <option value="custom" <?php if($current_uri=="custom"){ echo "selected"; } ?>>Custom</option>
                                    
                                        </select> 

                                    </div>

                                     
                                        <div class="col-md-2">
                                        <input type="submit" id="hidebtn" name="submit" class="btn btn-success" value="Apply">
                                      </div>
                                        </form>
                                    </div>-->
                                    
                                    <div class="row" style="padding: 12px 0px;">
                                    <span id="datepick" style="display: none;">
                               <form action="<?php echo base_url('Admin/filter_orderdate') ?>" method="POST">
                                   
                                   
                                <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Search Order By Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date"  class="form-control" id="rangepicker4" name="date1" value="<?php pr($fromdate); ?>" />
                                        </div>
                                       
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"    data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" id="rangepicker5" class="form-control"  name="date2"  placeholder="Check-In Date" value="<?php pr($todate); ?>">
                                        </div>
                                    </div>
                                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                                    <div class="col-md-4" style="padding-top: 27px">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
                                    </div>
                                    </form></span>
                     
                            </div>
                        <div class="panel-body">
                               <form action="<?php echo base_url('Admin/order_filter'); ?>" method="POST">
                             <div class="row" style="padding: 12px 0px; margin-left: -15px; margin-top: -35px; margin-bottom: 10px;">
                                  <input type="hidden" name="ordertype" value="<?php echo $status; ?>">
                                 <div class=" col-md-3">
                                    
                                     <select class="form-control" name="type" required>
                                          <option value="">---Search By---</option>
                                         <!--<option value="date">Order Date</option>-->
                                        <!--<option value="Rm">RM No.</option>-->
                                       
                                        <option value="Customer">Customer Name</option>
                                         <option value="Moblie">Customer Moblie</option>
                                       <option value="order_id">Order ID</option>
                                       
                                        <option value="Payment_Mode">Payment Mode</option>
                                          
                                        <!--<option value="Receved_Amount">Receved Amount</option>-->
                                     </select>
                                 </div>
                                 
                                 <div class=" col-md-3">
                                    <input type="text" class="form-control" name="search" Placeholder="Enter For Search">
                                 </div>
                                 <div class="col-md-3">
                                           
                                        <select class="form-control" name="date" id="selectbox">
                                            
                                            <option value="All">Duration</option>
                                            <option value="month">Today</option>
                                            <option value="week">Weekly</option>
                                            <option value="today">Monthly</option>
                                            <option value="#myModal3">Custom Date</option>
                                    
                                        </select> 

                                    </div>
                                 <div class=" col-md-2">
                                    <input type="submit" class="btn btn-success" value="Search">
                                 </div>
                             </div>
                             </form>
                              <table class="table table-bordered " id="table1">
                                <thead>
                                  
                                    <tr class="filters">
                                       <!--<th><input type="checkbox" id="chkSelectAll" name="all" value="all">&nbsp;<span style="display: inline;">SelectAll</span></th>-->
                                        <th>Order Date</th>
                                        <th>RM No.</th>
                                        <th>Order ID</th>
                                        <th>Customer Detail</th>
                                        <th>Order Amount</th>   
                                        <th>Discount Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Receved Amount</th>
                                        <th>Reason </th>
                                         

                                     </tr>
                                </thead>
                                
                                <tbody>
                                 <?php foreach ($message2 as  $value) {
                                 // pr($value);
                                    ?>

                                    <tr>
                                         <!--<td><input type="checkbox" class="aa " name="aa[]"  onclick="fil();" value="<?=$value['order_id']?>"></td>-->
                                        <td><?=$value['order_Date'];?></td>
                                        <td><?php 
                                        $user_id = $value['user_id'] ;
                                        
                                        $rm_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                        
                                        echo $rm_detail->Rm_id ; 
                                        ?></td>
                                        <td><?php  echo $value['order_id'];  ?></td>
                                        <td>
                                            <p class="">Name : <?= $value['Owner'] ; ?></p>
                                            <p class="">Mobile : <?= $value['phone'] ; ?></p>
                                            <!--<p class="lng">City :  <?= $value['phone'] ; ?></p>-->
                                            <!--<p class="lng">State :  <?= $value['phone'] ; ?></p>-->
                                            <p class="">PinCode :  <?= $value['pincode'] ; ?></p>
                                        </td>
                                        <td>  <?= $value['finalamount'] ; ?> </td>
                                        
                                        <td>  <?= $value['discountcharge'] ; ?> </td>
                                      <td>
                                            <?php if($value['offline_file']){
                                            
                                            ?>
                                            <a href="<?php echo $value['offline_file'] ; ?>" download>Download File </a>
                                            <?php }
                                             elseif($value['utr_number']){?>
                                             UTR No :
                                          <?php  echo $value['utr_number'] ;
                                            ?>
                                           
                                            <?php }else{?>
                                            Online Payment
                                            <?php } ?>
                                            </td>
                                        <td><?= $value['advance_payment'] ; ?></td>
                                                                                      
                                        <td>
                                         <!--<a href="<?php echo base_url('Admin/orderdetail/'.$value['order_id']);?>">-->

                                         <!--       <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail-->

                                         <!--   </a>-->
                                         <?= $value['cancle_reason'] ; ?>
                                        
                                  <a href="<?php echo base_url('Admin/order_detail_confirm/'.$value['order_id']);?>" target="_blank">
                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>Order Detail
                            </a>
                                        </td> 
                                        
                                     
                     
                                    </tr>
                                   <?php $i++; } ?>
                                  
                                   
                                </tbody>
                            </table>
                        
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
        
        
<!--Popup Model         -->


  <div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button> 
                <h4 class="modal-title">Custom date</h4>
            </div>
        <div class="modal-body">
                       <form action="<?php echo base_url('Admin/filter_orderdate') ?>" method="POST">
                                   
                                   
                                <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Search Order By Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date"  class="form-control" id="rangepicker4" name="date1" value="<?php pr($fromdate); ?>" />
                                        </div>
                                       
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"    data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" id="rangepicker5" class="form-control"  name="date2"  placeholder="Check-In Date" value="<?php pr($todate); ?>">
                                        </div>
                                    </div>
                                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                                    <div class="col-md-3" style="padding-top: 27px ;margin-left:20px;">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
                                    </div>
                                    </form>
        </div>
        <div class="modal-footer">
            <!--<button type="submit" class="btn btn-success pull-right">Submit</button>-->
        </div>
      </div>
    </div>
  </div>





<?php
include 'footer.php';
?>

<!--Model-->
<script>
      $("#selectbox").change(function () {
    if ($(this).val() == "#myModal3") {
        $('#myModal3').modal('show');
      }
  });
</script>




<script type="text/javascript">
   
  function filte(){

      var from = $("#rangepicker4").val();
      var todate = $("#rangepicker5").val();
      
      alert(from) ;
      
      alert(todate) ;
      
      /*alert(from+"========="+todate);exit();*/
      var urls =  $("#url").val();
      $.ajax({
            type: "POST",
            url: urls+"Admin/orderbydate",
            data: {from:from,todate:todate},
            cache: false,
            success: function(result){
               
             $("#fil").html(result);              
                }
            });

    }
</script>
<script type="text/javascript">
     function addshipment(id){
        
         var urls=$("#url").val();
     
        var staus = $("#"+id+"_addship").val();
       alert(id);exit();
    

        $.ajax({
            type: "POST",
            url: urls+"Admin/add",
            data: {id:id,status:staus},
            cache: false,
            success: function(result){
            alert('Status updated');
       
             //window.location.reload();    
       
                }
            });
    }

function showdate(){
    
//alert("sdf");
    var id=$("#cat").val();

if(id=="custom"){
   $("#datepick").show();
   $("#hidebtn").hide();

}else{
   $("#datepick").hide();
   $("#hidebtn").show();

}
}
</script>

