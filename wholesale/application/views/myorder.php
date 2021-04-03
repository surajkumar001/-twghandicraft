<?php 

include 'headcss.php';
include 'header.php';
?>
 <?php include 'navbar.php'; ?>
<style>
 /*   @media (max-width: 767px){
.table-responsive tbody, .table-responsive thead, .table-responsive tr, .table-responsive td, .table-responsive th {
    display: flex;
}
}*/
</style>
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Order</li>
            </ol>
        </nav>
    </div>
</div>

<!-- /.breadcrumb -->
<section class="home-bg-color">
    <div class="container">
            <div class="col-md-12">
                <div class="clearfix">
                    <div class="heading-title">
                        <h3>My Order</h3>
                    </div>
					
					<?php

					$id=$_SESSION['session_id'];
					$where='user_id';
					$table='orders';
					$order_detail=$this->Model->select_order_where($table,$where,$id);
					
					$i=5 ;
					foreach ($order_detail as  $value) {
					?>
					 
                    <div class="box-1 box-color">
                        <div class="box-body">
                           <!-- <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6">
                                    <div class="mg-top-10"><span class="order-no">OrderId : <?php echo $value['order_id']; ?></span></div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                                    <button class="btn btn-primary" style="width:30%;"><i class="fa fa-question-circle"></i>&nbsp;<span>Need Help</span></button>
                                    <button class="btn btn-primary mg-left-2" style="width:30%;"><i class="fa fa-map-marker"></i>&nbsp;<span>Track</span></button>
                                    <button class="btn btn-primary mg-left-2" style="width:30%;">&nbsp;<span>View All</span></button>
                                </div>
                            </div>
                            <hr>-->
                            
							
							<div class="row">
                                <div class="col-md-12">
                                    <div style="overflow-x: auto;">
                                        <table style="width:100%">
                                            <thead>
                                               
                                                    <tr>
                                                        <th class="table-date">Date</th>
                                                        <th class="table-odrid">OrderID</th>
                                                        <th class="table-odramt">Order Amount</th>
                                                        <th class="table-shipby">Ship By</th>
                                                        <th class="table-detail">View Details</th>
                                                      
                                                        <th class="table-docdownload">Document Download</th>
                                                         
                                                        <th class="table-makepay">Make payment</th> 
                                                        
                                                        <th class="table-status">Status </th>
                                                        
                                                        <th class="table-feedback">Feedback</th>
                                                    </tr>
                                                     <tbody>
                                                        <tr>
                                                        <td><?php echo $value['show_date']; ?></td>
                                                        <td><?php echo $order_id= $value['order_id']; ?></td>
                                                        <td><?php echo $value['finalamount']; ?></td>
                                                        <td><?php echo $value['delievry_type']; ?></td>
                                                        <td>
                                                            <form action="<?php echo base_url('user_order_detail'); ?>" method=post>
                                                                <input type="hidden" name="request_id" value="<?php echo $value['order_id']; ?>" >
                                                                <button class="btn btn-primary" type="submit" style="width: 80px;padding: 6px;"> view detail</button>
                                                                
                                                            </form>
                                                        </td> 
                                                        <td>
                                                       <?php if($value['invoice_file']){ ?> 
                                                         
                                                           <a href="<?php echo $value['invoice_file'] ; ?>" class="btn btn-success" style="padding: 3px 5px 3px 5px;" download>Invoice </a>
                                                        
                                                       <?php } ?>
                                                       <br>
                                                         <?php if($value['trasnport_document']){ ?>
                                                       
                                                           <a href="<?php echo $value['trasnport_document'] ; ?>" class="btn btn-success" style="padding: 3px 5px 3px 5px; margin-top:5px;" download>Trasnport slip </a>
                                                          
                                                        <?php } ?>
                                                        </td>
                                                        
                                                            <!--<a href="<?php echo base_url('Artnhub/user_order_detail'); ?>" class="btn btn-primary" style="width: 40%;padding: 10px;">View Details</a>-->
                                               <?php $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id , 'payment_no'=> 2))->row() ;
//================================  
   $pend_3_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id , 'payment_no'=> 3))->row() ;
                                                   
            if($value['order_status'] == 'Cancelled'){ ?>
                
                <td><?php $value['cancle_reason']; ?> </td>
                
           <?php  }elseif(empty($pend_row)){
                                                    if($value['finalamount'] == $value['advance_payment']  ) { ?>
                                                      <td>Completed </td> 
                                                      <?php }else{?>
                                                    <td>Rs. <?php  echo  $pending_amount =  $value['finalamount']  - $value['advance_payment']  ; ?> <a class="btn btn-primary" style="width: 65px; padding: 6px;" data-toggle="modal" data-target="#myModal<?=$i ;?>">  Pay Now  </a></td> 
                                                    <?php }
               
           }elseif(empty($pend_3_row)){
                                                       
                                 
               if($value['finalamount'] <= $value['advance_payment'] + $pend_row->pend_amount) { ?>
                                                      <td>Completed </td> 
                                                      <?php }else{?>
                                                    <td>Rs. <?php  echo  $pending_amount =  $value['finalamount']  - ($value['advance_payment'] + $pend_row->pend_amount )  ; ?>  <a class="btn btn-primary" style="width: 65px;padding: 6px;" data-toggle="modal" data-target="#myModal2<?=$i ;?>"> Pay Now </a></td> 
                                                    <?php }
               
               
               
               }else{
                                                      $pend_3_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id , 'payment_no'=> 3))->row() ;
                                                      
                                                      $pending_amount =  $value['finalamount']  - $value['advance_payment'] - $pend_row->pend_amount  ;
                                                     $total_amount =  $value['finalamount']  - $value['advance_payment']  ;
                                                      
                                                       if($pend_3_row) { ?>
                                                      <td>Completed </td> 
                                                      <?php }elseif($pending_amount == 0 ) { ?>
                                                      <td>Completed </td> 
                                                      <?php }else{ ?>
                                                       <td>Rs. <?php echo $pending_amount; ?> <a class="btn btn-primary" style="width: 65px;padding: 6px;" data-toggle="modal" data-target="#myModal2<?=$i ;?>"> Pay Now </a></td> 
                                                     <?php } }?>
                                                     <td><?php
                                                     if($value['order_status'] == 'Not')
                                                     {
                                                         echo 'Processing';
                                                     }
                                                     elseif($value['order_status'] == 'Pending')
                                                     {
                                                         echo 'Approved';
                                                     }
                                                     elseif($value['order_status'] == 'Readyshipped')
                                                     {
                                                         echo 'Ready to shipped';
                                                     }
                                                     else
                                                     {
                                                         echo $value['order_status']; 
                                                     }
                                                     ?></td>
                                                   <td>  
                                                    <?php 
                                                    $feed =  $value['feedback']; 
                                                     if($feed)
                                                       { ?>
                                                        <a class="btn btn-success" style="width:55px; padding:7px 10px;" data-toggle="modal" data-target="#feedbackview<?= $i ;?>">View</a> 
                                                        
                                                    <?php } else{
                                                     
                                                     ?>
                                                     <a class="btn btn-primary" style="width:55px; padding:7px 10px;" data-toggle="modal" data-target="#feedback<?= $i ;?>">Send</a>
                                               <?php     }?>
                                                  </td>
                                                  <!--<td><a data-toggle="modal" data-target="#feedback<?= $i ;?>">Feedback</a></td>-->
                                                    </tr>
                                                     <?php 

                        							$id=$value['order_id'];
                        							
                        							$where='order_rand_id';
                        							$table='order_detail';
                        							$product=$this->Model->select_common_where($table,$where,$id);
                                                    foreach ($product as $values) {
                                                   
                                                    $id=$values['product_id'];
                        						
                        							$where='sku_code';
                        							$table='product_detail';
                        							$products=$this->Model->select_common_where($table,$where,$id);
                        								?>
                                                   
                                                    	<?php } ?>
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           <!-- <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3 text-center order-imgsize text-center">
                                    <img src="<?php echo $products[0]['main_image1']; ?>" class="img-responsive">
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <h5><a href="" style="font-size: 12px;"><?php echo $products[0]['pro_name']; ?></a></h5>
                                    <p><?php echo $products[0]['relation']; ?>: <?php echo $products[0]['varient']; ?></p>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <p><i class="fa fa-inr"></i>  
								<?php if(empty($values['discount_price'])){
									echo  $values['cart_price'];
                                } else { echo $values['discount_price']; } ?> </p>
                                
                                </div>
                                
                                 <div class="col-md-1 col-sm-1 col-xs-1">
                                    <p>Qty : 
								<?php if(empty($values['quantity'])){
									echo  $values['quantity'];
                                } else { echo $values['quantity']; } ?> </p>
                                  
                                </div>
                                
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <p><?php if(!empty($value['expected_days']))
                                    { 
                                    echo $value['expected_days'];
                                    } 
                                    echo " by " ;
                                    echo $value['delievry_type'];  ?></p>
                                </div>
                                
                            </div>-->
							<hr>
						
                            
                            <!--<div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6">
                                    <p>Ordered On: <strong><?php  $date=date_create($value['order_Date']); echo date_format($date,"d-m-Y"); ?></strong> </p>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                                    <p>Order Total: <strong> <i class="fa fa-inr"></i>  <?php echo $value['finalamount']; ?> </strong> </p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    
                    
                  <!-- Modal 2 -->
                  
                  <div class="modal fade" id="myModal<?=$i ;?>" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"> Order ID  <?php echo $value['order_id']; ?> </h4>
                          
                         
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">
                                <div class = "body">
                                      <h4 class="modal-title"> Pending Order 2: <?php  echo  $pending_amount =  $value['finalamount']  - $value['advance_payment']  ; ?> 
                                      <!--<input type="number" min="1" value="<?php echo $pending_amount ; ?>" name="pend_amount" id="pend_amount_id<?=$i ;?>"  >-->
                                       Rs. </h4>
                                                       
                                </div>
                                  <h5>Choose One Method </h5>
                                                    <div class="radio">
                                                        <label><input type="radio" name="credit" value="atm" id="cod" onchange="cod();"  ><p>Bank Transfer / Cash Deposit (In Company Account)</p></label>
                                                    </div>
                                                    
                                                    <div class="radio">
                                                        <label><input type="radio" name="credit" value="atm" onchange="paytm();" ><p>Payment online With PayTm</p></label>
                                                    </div>
                                                    <div style="display:none" id="processed" class="processed">
                                                        
                                                        <form action ="<?= base_url('Artnhub/pend_online_payment'); ?>" method="post">
                                                        
                                                        <input type="hidden" value="<?php echo $value['order_id']; ?>" name="order_id" >
                                                        <input type="hidden" value="<?php echo $pending_amount ; ?>" id="max_<?php echo $value['order_id']; ?>" >
                                                        
                                                        <input type="text" class="form-control" value="<?php echo $pending_amount ; ?>" onkeypress="return isNumberKey(event)" name="pend_amount" id="pend_online<?=$i ;?>" >
                                                         <input type="hidden" value="2" name="payment_no" >
                                                     
                                                              <button type= "submit">Processed </button>
                                                
                                                        </form>
                                                        
                                                        
                                                        </div>
                                                        
                                                        <script>
                                                              
                                                            $('#pend_online<?=$i ;?>').keyup(function (e){       
                                                            var max_amount = $('#max_<?php echo $value['order_id']; ?>').val() ;
                                                            
                                                            alert('max_amount') ;
                                                            
                                                            var amount  = $('#pend_amount_online<?=$i ;?>').val() ; 
                                                            
                                                            if (Number(amount) <= Number(max_amount) ) {
                                                             return true;
                                                            } else {
                                                                alert('Please Enter Maximum Amount');
                                                                $("#pend_amount_online<?=$i ;?>").val('');
                                                                $("#pend_amount_online<?=$i ;?>").focus();
                                                            }
                                                            
                                                        });
                                                        </script>
                                                    
                                                        <div style="display:none" id="upload" class="upload">
                                                            
                                                       <form action ="<?= base_url('Artnhub/pend_uploadslip'); ?>" method="post" >
                                                        
                                                       <input type="hidden" value="<?php echo $value['order_id']; ?>" name="order_id" >
                                                        
                                                        <input type="text"  class="form-control" value="<?php echo $pending_amount ; ?>" onkeypress="return isNumberKey(event)" name="pend_amount"  >
                                                          <input type="hidden" value="2" name="payment_no" >
                                                      
                                                        
                                                     <button type= "submit" >Processed</button>
                                                
                                                        </form>  
                                                            
                                                        </div>
                                                    
                                            <script>
                                              $(document).on('change',".amount", function(){    
                                                  
                                                  $("input:radio").removeAttr("checked");
                                                  
                                                var inputvalues = $(this).val();
                                                
                                                var min_amount = $('#10Advance').val() ;
                                                
                                                var amount  = $('#Advance').val() ; 
                                                
                                                if (Number(amount) >= Number(min_amount) ) {
                                                 return true;
                                                } else {
                                                    alert('Please Enter Minmum 10% Advance Amount');
                                                    $("#Advance").val('');
                                                    $("#Advance").focus();
                                                }
                                                
                                            });
                                            </script>
                                       
                                                   </div>
                 
                        </div>
                        <!--<div class="modal-footer">-->
                        <!--  <input type="button" class="btn btn-primary" style="width: 15%;" value="Submit">-->
                        <!--</div>-->
                      </div>
                      
                    </div>
                  </div>              
                  <!-- Modal 3rd -->
                  
                  <div class="modal fade" id="myModal2<?=$i ;?>" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"> 3rd Payment Order ID  <?php echo $value['order_id']; ?> </h4>
                        
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">
                                <div class = "body">
                                      <h4 class="modal-title"> Pending Order : <?php echo $pending_amount =  $value['finalamount']  -($value['advance_payment'] + $pend_row->pend_amount ) ; ?>  Rs. </h4>
                                </div>
                                  <h5>Choose One Method </h5>
                                                    <div class="radio">
                                                        <label><input type="radio" name="credit" value="atm" id="cod" onchange="cod();"  ><p>Bank Transfer / Cash Deposit (In Company Account)</p></label>
                                                    </div>
                                                    
                                                    <div class="radio">
                                                        <label><input type="radio" name="credit" value="atm" onchange="paytm();" ><p>Payment online With PayTm</p></label>
                                                    </div>
                                                    <div style="display:none" id="processed" class="processed">
                                                        
                                                        <form action ="<?= base_url('Artnhub/pend_online_payment'); ?>" method="post">
                                                        
                                                        <input type="hidden" value="<?php echo $value['order_id']; ?>" name="order_id" >
                                                        
                                                        <input type="hidden" value="<?php echo $pending_amount ; ?>" name="pend_amount" >
                                                        <input type="hidden" value="3" name="payment_no" >
                                                        
                                                        <button type= "submit">Processed </button>
                                                
                                                        </form>
                                                        
                                                        </div>
                                                    
                                                        <div style="display:none" id="upload" class="upload">
                                                            
                                                       <form  action ="<?= base_url('Artnhub/pend_uploadslip'); ?>" method="post" >
                                                        
                                                       <input type="hidden" value="<?php echo $value['order_id']; ?>" name="order_id" >
                                                        
                                                        <input type="hidden" value="<?php echo $pending_amount ; ?>" name="pend_amount" >
                                                       <input type="hidden" value="3" name="payment_no" >
                                                          
                                                        
                                                     <button type= "submit" >Processed</button>
                                                
                                                        </form>  
                                                            
                                                        </div>
                                                      
                                     </div>
                 
                        </div>
                        <!--<div class="modal-footer">-->
                        <!--  <input type="button" class="btn btn-primary" style="width: 15%;" value="Submit">-->
                        <!--</div>-->
                      </div>
                      
                    </div>
                  </div>
                  <!----Feedback------>
    <div class="modal fade" id="feedback<?= $i ;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
       <form action="<?php echo base_url('Artnhub/addfeeback'); ?>" method=post>
      <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Give Feedback</h4>
          
           <input type="hidden" name="order_id" value="<?php echo $value['order_id']; ?>">
        </div>
        <div class="modal-body">
          <textarea class="form-control" name="feedback" style="height: 100px !important;" placeholder="Please Give Feedback"></textarea>
        </div>
        <div class="modal-footer">
          <input type="Submit" class="btn btn-primary" value="Submit">
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
                <!----Feedback view------>
    <div class="modal fade" id="feedbackview<?= $i ;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
       <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Feedback</h4>
          
           <!--<input type="hidden" name="order_id" value="<?php echo $value['order_id']; ?>">-->
        </div>
        <div class="modal-body">
            <?php echo  $value['feedback']; ?>
        </div>
        <div class="modal-footer">
          <input class="btn btn-danger" data-dismiss="modal" style="padding: 9px 0px;" value="Close">
        </div>
      </div>
    </div>
  </div>
  
             <?php
				 $i++ ;
				 } ?>
                
                </div>
            </div>
        </div>
    </div>
</section>

<!--<div class="body-content outer-top-xs">
  <div class='container mg-bt-4'>
    <div class='row'>
      <div class='col-md-12 wow fadeInUp'>       
            <div class="clearfix filters-container">
                <div class="heading-title">
                    My Order
                </div>
<?php

$id=$_SESSION['session_id'];
$where='user_id';
$table='orders';
$order_detail=$this->Model->select_common_where($table,$where,$id);
foreach ($order_detail as  $value) {
?>
<div class="panel panel-default">
  <?php 

$id=$value['id'];
$where='order_id';
$table='order_detail';
$product=$this->Model->select_common_where($table,$where,$id);


foreach ($product as $values) {

$id=$values['product_id'];
$where='id';
$table='product';
$products=$this->Model->select_common_where($table,$where,$id);

if(empty($products)){
	   $id=$values['product_id'];

 $where='id';

	$table='product_detail';

 $products=$this->Adminmodel->select_com_where($table,$where,$id); 
 }

?>
                    <div class="panel-body">
                        <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6">
                                    <div class="mg-top-10"><span class="order-no"><?php echo $values['order_rand_id']; ?></span></div>
                                </div>

                            <div class="col-md-4 col-sm-6 col-xs-6 pd-14">
                                <button class="btn btn-color-1"><i class="fa  fa-question-circle"></i> <span> Need Help</span></button>
                                <button class="btn btn-color-1 mg-left-2"><i class="fa fa-map-marker"></i> <span> Track</span></button>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3 text-center">
                                <img src=" <?php echo $products[0]['main_image1']; ?>" class="order-imgsize" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3" style="margin-top: 4%;">
                                <a href="#"> <?php echo $products[0]['pro_name']; ?></a><br />
                                <p> <?php echo $products[0]['relation']; ?>: <?php echo $products[0]['varient']; ?> <br />
                            
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3" style="margin-top: 4%;">
                                <p><i class="fa fa-inr"></i>  
								<?php if(empty($values['discount_price'])){
									echo  $values['cart_price'];
                                } else { echo $values['discount_price']; } ?> </p>
                                <span>Expected Delievery-: <?php 
                                if(!empty($value['expected_days'])){ echo $value['expected_days']; }else { echo "Self"; } ?></span>
                            </div>
                        </div>
                      
                    </div>
                     <?php } ?> 
                       <hr/>
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6">
                                <p> Ordered On: <strong> <?php  $date=date_create($value['order_Date']);
                                                echo date_format($date,"d-m-Y"); ?></strong> </p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 text-right">
                                <p> Order Total: <strong> <i class="fa fa-inr"></i>  <?php echo $value['finalamount']; ?> </strong> </p>
                            </div>
                        </div> 
                </div> 
<?php } ?>
             

            </div>
        </div>
      </div>

    </div>

 </div>-->
<!-- /.container --> 
  
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Give Feedback</h4>
        </div>
        <div class="modal-body">
          <textarea class="form-control" style="height: 100px !important;" placeholder="Please Give Feedback"></textarea>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-primary" style="width: 15%;" value="Submit">
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  <?php 
include 'footer.php';
      ?>
     <?php 
     $i=5 ;
					foreach ($order_detail as  $value) {
					?>
      <script>
          
          function paytm(){
    
    $(".processed").show() ;
    $(".upload").hide() ;
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}
function cod(){
    
   $(".processed").hide() ;
     $(".upload").show() ;
   
   
    
    // $( "#paytm2" ).trigger( "click" );
    
}

 
                            $("#pend_amount_id<?=$i ;?>").keyup(function (){
                    		var value = this.value;
                    	
                             $("#pend_amount_online<?=$i ;?>").val(null);
                             $("#pend_amount_offline<?=$i ;?>").val(null);
                      
                        });
                        
                        
     function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
                                                       
   </script>
      <?php  $i++ ; 
}?>
      