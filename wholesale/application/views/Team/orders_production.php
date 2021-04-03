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
                <h1>Production Order List</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li class="active">Production Order List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>Production Order List
                            </h4>
                        </div>
                        <br />
                        <form action="<?php echo base_url('Admin/orderbycategories'); ?>" method="POST">
                             <div class="row" style="padding:12px 0px;">
                                    
                                       <!--  <div class="col-md-1">
                                         <button type="button" class="btn btn-default"><i class="fa fa-filter" aria-hidden="true"></i></button></div> -->
                                    
                                        <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                          <div class="col-md-1" style="margin-right:35px;">
                                          <a href="<?php echo base_url('Admin/production_orders'); ?>"><button type="button" class="btn btn-default  <?php  echo "active";  ?>">Not Approved</button></a>
                                        </div>
                                        <div class="col-md-1">
                                          <a href="<?php echo base_url('Admin/production_pending/Pending'); ?>"><button type="button" class="btn btn-default  <?php if($current_uris== "0"){ echo "active"; } ?>">Pending</button></a>
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
                                       
                                       
                                     
                                      <div class="col-md-3" style="margin-left: 14px;">
                                        <select class="form-control" name="cats" id="cat" onchange="showdate();">
                                               <option value="order" <?php if($current_uri== "order"){ echo "selected"; } ?>>All Orders</option>
                                          <option value="today" <?php if($current_uri=="today"){ echo "selected"; } ?>>Today</option>
                                          <option value="week" <?php if($current_uri=="week"){ echo "selected"; } ?>>Weekly</option>
                                          <option value="month" <?php if($current_uri=="month"){ echo "selected"; } ?> >Monthly</option>
                                          <option value="custom" <?php if($current_uri=="custom"){ echo "selected"; } ?>>Custom</option>
                                    
                                        </select> 

                                    </div>
                                     <div class="col-md-2" style="    margin-left: -11px;
">
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
                               <form action="<?php echo base_url('Admin/orderbydate') ?>" method="POST">
                                <input type="hidden" name="ordertype" value="<?php echo $current_uris; ?>">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Search Order By Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"  data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date"  class="form-control" id="rangepicker4" name="from" value="<?php pr($fromdate); ?>" />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon"    data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="date" id="rangepicker5" class="form-control"  name="to"  placeholder="Check-In Date" value="<?php pr($todate); ?>">
                                        </div>
                                    </div>
                                        <input type="hidden" id="url" value="<?php echo base_url(); ?>">
                                    <div class="col-md-4" style="padding-top: 27px">
                                        <button type="submit" class="btn btn-responsive btn-primary btn-sm">Search</button>
                                    </div>
                                    </form></span>
                     
                            </div>
                        <div class="panel-body">
                             <div class="row" style="padding: 12px 0px; margin-left: -15px; margin-top: -35px; margin-bottom: 10px;">
                                 <div class=" col-md-3">
                                    
                                     <select class="form-control">
                                          <option>---Search By---</option>
                                         <option>Order Date</option>
                                        <option>RM No.</option>
                                        <option>Order ID</option>
                                        <option>Customer Name</option>
                                      
                                        <option>Order Amount</option>
                                        <option>Payment Mode</option>
                                          
                                        <option>Receved Amount</option>
                                     </select>
                                 </div>
                                 <div class=" col-md-3">
                                    <input type="text" class="form-control" name="search" Placeholder="Enter For Search">
                                 </div>
                                 <div class=" col-md-2">
                                    <input type="submit" class="btn btn-success" value="Search">
                                 </div>
                             </div>
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr class="filters">
                                        <!--<th><input type="checkbox" id="chkSelectAll" name="all" value="all">&nbsp;<span style="display: inline;">SelectAll</span></th>-->
                                        <th>Order Date</th>
                                        <th>RM No.</th>
                                        <th>Order ID</th>
                                        <th>Customer Detail</th>
                                        <th>Delivery Mode</th>
                                        <th>Order Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Receved Amount</th>
                                        <th>OrderDetail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach ($message2 as  $value) {
                                 // pr($value);
                                    ?>

                                    <tr >
                                         <!--<td><input type="checkbox" class="aa " name="aa[]"  onclick="fil();" value="<?=$value['odd']?>"></td>-->
                                        <td><?=$value['order_Date'];?></td>
                                        <td>11</td>
                                        <td><?php  echo $value['order_id'];  ?></td>
                                        <td>
                                            <p class="">Name : <?= $value['Owner'] ; ?></p>
                                            <p class="">Mobile : <?= $value['phone'] ; ?></p>
                                            <!--<p class="lng">City :  <?= $value['phone'] ; ?></p>-->
                                            <!--<p class="lng">State :  <?= $value['phone'] ; ?></p>-->
                                            <p class="">PinCode :  <?= $value['pincode'] ; ?></p>
                                        </td>
                                        <td>  <?= $value['delievry_type'] ; ?> </td>
                                        <td>  <?= $value['finalamount'] ; ?> </td>
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
                                         <a href="<?php echo base_url('Admin/requestdetail/'.$value['order_id']);?>">

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
<?php
include 'footer.php';
?>
<script type="text/javascript">
   
  function filte(){

      var from = $("#rangepicker4").val();
      var todate = $("#rangepicker5").val();
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

