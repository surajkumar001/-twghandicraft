<?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}
.html5buttons {
    margin-left: 30px;
}
a.btn.btn-default.buttons-pdf.buttons-html5 {
    display: none;
}
#DataTables_Table_0_filter {
    display: none;
}
#DataTables_Table_0_length {
    display: none;
}

#DataTables_Table_0_paginate {
    display: none;
}

#DataTables_Table_0_info {
    display: none;
}
</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Payment</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                   
                    <li class="active">Payment </li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Confirm Payment
                            </h4>
                        </div>
                       
                        <div class="panel-body">
                            
                               <form action="<?php echo base_url('Admin/filter_payment'); ?>" method="POST">
                            <div class="row">
                                
                              <div class="col-md-3">
                                   <select class="form-control" name="cat_date" id="selectbox">
                                       <option value="All" <?php if($date == 'All'){ echo 'selected' ;} ?> >All Dates</option>
                                       <option value="Today"  <?php if($date == 'Today'){ echo 'selected' ;} ?>>Today Payment</option>
                                       <option value="3Days"  <?php if($date == '3Days'){ echo 'selected' ;} ?> >Last 3 Days</option>
                                       <option value="week" <?php if($date == 'week'){ echo 'selected' ;} ?> >Last 7 Days</option>
                                       <option value="Month" <?php if($date == 'Month'){ echo 'selected' ;} ?> >Last Month</option>
                                       <option value="custom" <?php if($date == 'custom'){ echo 'selected' ;} ?>>Custom Date Range</option>
                                   </select>
                               </div>
                                  
                                  
                                  <div class="col-md-3">
                                        <select class="form-control" name="type" id="select_type" required>
                                          <option value="All">All </option>
                                       
                                         <option   value="Name"  <?php if($type == 'Name'){ echo 'selected' ;} ?> >Customer Name</option>
                                         <option   value="phone" <?php if($type == 'phone'){ echo 'selected' ;} ?> >Customer Mobile No </option>
                                         
                                         
                                       <option value="order_id"  <?php if($type == 'order_id'){ echo 'selected' ;} ?>  >Order id</option>
                                       <option value="utr_number"  <?php if($type == 'utr_number'){ echo 'selected' ;} ?> >UTR No</option>
                                       <!--<option value="online_transaction_id"  <?php if($type == 'online_transaction_id'){ echo 'selected' ;} ?> >Transaction Id</option>-->
                                       <option value="online_transaction_id"  <?php if($type == 'online_transaction_id'){ echo 'selected' ;} ?> >Transaction Id/Paytm Tr Id.</option>
                                       <option value="payment_mode"  <?php if($type == 'payment_mode'){ echo 'selected' ;} ?> >Payment Mode</option>
                                       <option value="Rm_id"  <?php if($type == 'Rm_id'){ echo 'selected' ;} ?> >RM No.</option>
                                       <option value="confirm_payment"  <?php if($type == 'confirm_payment'){ echo 'selected' ;} ?> >Confirm </option>
                                          </select>
                                  </div> 
                                  
                                   <!--<div class="col-md-3" id="search_input">-->
                                   <!--    <input type="text"  class="form-control" name="search"  placeholder="Search by Selected Field" value="<?= $search ; ?>">-->
                                   <!--    </div> -->
                                       
                                       <!--suggation---->
                                       
                                        <div class=" col-md-3" id="search_name" <?php if($type != 'Name'){ echo "style='display:none' ;" ;} ?> >
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    <?php $user = $this->db->get('customerlogin')->result(); ?>
                                    <input  name="search" list="cars" placeholder="Enter For Search"  type="text"  class="form-control" autocomplete="off">
                                      <datalist id="cars" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option><?= $res->Owner ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_phone" <?php if($type != 'phone'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_phone" list="phone" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="phone" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->phone ; ?>"><?= $res->phone ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                 <div class=" col-md-3" id="search_order" <?php if($type != 'order_id'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                   <?php $order = $this->db->get('orders')->result(); ?>
                                    <input  name="search_order" list="order" placeholder="Enter For Search" value="<?php echo $_POST['search_order']?>" type="text"  class="form-control"  >
                                      <datalist id="order" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($order as $row)
                                              {
                                          ?>
                                            <option value="<?= $row->order_id ; ?>"><?= $row->order_id ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                   <div class=" col-md-3" id="search_utr" <?php if($type != 'utr_number'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                   <?php $order = $this->db->get('orders')->result(); ?>
                                    <input  name="search_utr" list="utr" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="utr" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($order as $row)
                                              {
                                          ?>
                                            <option value="<?= $row->utr_number ; ?>"><?= $row->utr_number ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                  <div class=" col-md-3" id="search_transaction_id" <?php if($type != 'online_transaction_id'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                   <?php $order = $this->db->get('orders')->result(); ?>
                                    <input  name="search_transaction_id" list="transaction_id" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="transaction_id" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($order as $row)
                                              {
                                          ?>
                                            <option value="<?= $row->online_transaction_id ; ?>"><?= $row->online_transaction_id ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                      <div class=" col-md-3" id="search_mode" <?php if($type != 'payment_mode'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_mode" list="mode" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="mode" style="overflow-y: scroll; height: 200px;">
                                          
                                            <option value="Online">Online</option>
                                             <option value="Bank Transfer">Bank Transfer</option>
                
                                      </datalist>
                                 </div>
                                 
                                 <div class=" col-md-3" id="search_rm" <?php if($type != 'Rm_id'){ echo "style='display:none' ;" ;} ?>>
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                    
                                 <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                                    <input  name="search_rm" list="rm" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="rm" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($rm_list as $row)
                                              {
                                          ?>
                                            <option value="<?= $row->id ; ?>"><?= $row->rm_name ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class="col-md-3">
                                       
                                            <input type="submit" class="btn btn-primary btn-block" id="apply_btn" style="<?php if($date == 'custom') {echo"display: none;"; } ?>" value="Apply">
                                         
                                </div>
                               </div>  
                                 <!-------end suggation-->
                                       
                        <div class="row">    
                              <span id="datepick2" style="<?php if($date != 'custom') {echo"display: none;"; } ?>">
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
                                       
                                            <input type="submit" class="btn btn-success btn-block" value="Apply">
                                         
                                    </div>
                                    </span>
                                         
                               </div>
                            </form>
                            <br>
                         
                            <table class="table table-bordered <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->download == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?> clienttable <?php } ?>"  style=" margin: 0 auto;
                                                                                      width: 99%;
                                                                                      clear: both;
                                                                                      border-collapse: collapse;
                                                                                      table-layout: fixed; 
                                                                                      word-wrap:break-word; 
                                                                                     display: none">
                               <thead>
                                    <tr class="filters">
                                        <th>Payment Date</th>
                                        <th>Order Date</th>
                                        <th>Order ID</th>
                                        <th>Transaction ID</th> 
                                        <th>Customer Name </th>
                                         <th>Business Name </th>
                                         <th>City </th>
                                         <th>State </th>
                                         <th>Moblie No.</th>
                                        <th>Payment Mode</th>
                                        <th>Transation Detail</th>
                                        <th>Bank Name</th>
                                        <th>Bank Account No.</th>
                                        <th>Amount</th>
                                        <th>Confirm Amount</th>
                                        <th>Invoice No</th>
                                        <th>RM No</th>
                                       <th>Action</th>
                                      
                                     </tr>
                                </thead>
                                
                                <tbody>
                                 <?php foreach($result as $row){ ?> 
                                    <tr style="text-align: center;">
                                        <td><?php 
                                                $payment_date = $row->offline_transferdate ;
                                            if($payment_date){
                                            $newDate = date("d-M-Y", strtotime($payment_date));  
                                            echo  $newDate;  
                                            }    
                                                ?></td>
                                        <td><?= $row->show_date ?> </td>
                                        <td> <?= $order_id =$row->order_id ;  ?></td>
                                            <?php   $user_id = $row->user_id  ;
                                            
                                            $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                            ?>
                                        <td><?php $trid =  $row->online_transaction_id ; if($trid){ echo "TRID:" ; echo $trid ; }else{ echo "UTR: ";  echo  $row->utr_number ;  }?></td>
                                        <td><?=$user_detail->Owner ; ?></td>
                                        <td>    <?=$user_detail->Business ; ?> </td>
                                        <td>    <?= $user_detail->city ; ?></td>
                                        <td>   <?= $user_detail->state ; ?></d>
                                        <td>    <?= $user_detail->phone ; ?></td>
                                        <td>
                                                   <?= $payment_mode = $row->payment_mode ; ?>
                                                    <?php if($payment_mode == 'Online' ) {
                                                        
                                                   echo "TRID:" ;  echo $row->online_transaction_id; 
                                                }else{
                                                
                                               if($row->utr_number){
                                                   
                                                  echo "UTR : " ; echo $row->utr_number ; 
                                               }
                                            }?> 
                                               </td>
                                        <td>
                                                   <?= $payment_mode = $row->payment_mode ; ?>
                                                   <?php if($payment_mode == 'Online' ) {
                                                   echo "TRID:" ;  echo $row->online_transaction_id; 
                                                }else{
                                                
                                               if($row->utr_number){
                                                   
                                                  echo "UTR : " ; echo $row->utr_number ; 
                                               }
                                            }?> 
                                         </td>
                                         <td>   Bank Name: SBI</td>
                                          <td>    30521245122 </td>
                                             <?php 
                                             
                                             if($row->confirm_payment == 'done'){
                                                  $customer_amount = $row->customer_advance ;
                                                  
                                                $confirm_amt = $row->advance_payment ;
                                             }else{
                                                  $customer_amount = $row->advance_payment ; 
                                                 $confirm_amt = 0 ;
                                             }  
                                             
                                             ?>
                                         <td> <?php echo  $customer_amount  ;?></td>
                                         <td> <?=  $confirm_amt ; ?></td>
                                         <td><?= $row->invoice_id ; ?></td>
                                         <td><?= $row->Rm_id ; ?></td>
                                         <td>
                                             <?php
                                                $id =   $row->id ; 
                                             
                                             ?>  
                                            <?php if($row->confirm_payment){ ?>
                                            
                                            
                                             Modify 1st payment   
                                             
                                             <?php  }else{?>
                                             
                                                Confirm 1st payment     
                                                 <?php } ?>
                                                 <br>
                                                 <br> <br> <br>  <br> <br> <br> <br>
                                                
                                         </td>
                                         
                                         
                                     </tr>
                                 
                                 
                                   <!------ Pending Payment--->
                                       
                                  <?php   $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2 ))->row();
                                    if($pend_row){
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $row->show_date ?> </td>
                                        <td> <?= $order_id =  $row->order_id ;  ?></td>
                                        <td>
                                        <?php $trid_pend =  $pend_row->pend_transition_id;  if($trid_pend){ echo "TRID:" ; echo $trid_pend ; }else{ echo "UTR: ";
                                        echo  $pend_row->pend_utr_number ;  }?></td>
                                        <td><?=$user_detail->Owner ; ?></td>
                                        <td><?=$user_detail->Business ; ?> </td>
                                        <td>    <?= $user_detail->city ; ?></td>
                                        <td>  <?= $user_detail->state ; ?></d>
                                        <td>   <?= $user_detail->phone ; ?></td>

                                        <td> <?php
                                         $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2))->row();
                                         
                                         ?>
                                    <?= $pend_payment_mode = $pend_row->pend_payment_type ; ?> </td>
                                         <td>    <?php if($pend_payment_mode == 'Online' ) {
                                             
                                           echo "TRID:" ;  echo $pend_row->pend_transition_id; 
                                        }else{
                                        
                                       if($pend_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_row->pend_utr_number ; 
                                       }
                                    }?>
                                    
                                    
                                        </td>
                                        <td> SBI</td>
                                        <td> 30521245122   </td>
                                       
                                        <?php 
                                         
                                         if($pend_row->confirm_payment == 'done'){
                                              $amount = $pend_row->customer_advance ;
                                              
                                            $confirm_amt = $pend_row->pend_amount ;
                                         }else{
                                              $amount = $pend_row->pend_amount ; 
                                             $confirm_amt = 0 ;
                                         }
                                         
                                         ?>
                                         <td> <?= $amount  ?></td>
                                         <td> <?= $confirm_amt ; ?></td>
                                        
                                    
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                            
                                           <td>        
                                         <?php
                                            $id =   $row->id ; 
                                         
                                            ?>
                                                   
                                                <?php if($pend_row->confirm_payment){ ?>
                                                
                                                
                                                 Modify 2nd payment   
                                                 
                                                 <?php  }else{?>
                                                 
                                                     Confirm 2nd payment    
                                                     <?php } ?>
                                         
                                    </td>     
                                 
                                             <!-----end---->
                                        
                                 </tr>
                                 
                                 <?php }   
                                    ?>


                         <!------ Pending 3 Payment--->
                                       
                                  <?php   $pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();
                                  
                                      if($pend_3_row){
                                      
                                         
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_3_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $row->order_Date ?> </td>
                                        <td> <?= $order_id =  $row->order_id ;  ?></td>
        <td><?php $trid_pend =  $pend_3_row->pend_transition_id;  if($trid_pend){ echo "TRID:" ; echo $trid_pend ; }else{ echo "UTR: ";  echo  $pend_3_row->pend_utr_number ;  }?></td>
                                        <td><?=$user_detail->Owner ; ?></td>
                                        <td><?=$user_detail->Business ; ?> </td>
                                        <td>    <?= $user_detail->city ; ?></td>
                                        <td>  <?= $user_detail->state ; ?></d>
                                        <td>   <?= $user_detail->phone ; ?></td>

                                        <td> 
                                    <?= $pend_payment_mode = $pend_3_row->pend_payment_type ; ?> </td>
                                         <td>    <?php if($pend_payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $pend_3_row->pend_transition_id; 
                                        }else{
                                        
                                       if($pend_3_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_3_row->pend_utr_number ; 
                                       }
                                    }?>
                                    
                                      </td>
                                        <td> Bank Name: SBI</td>
                                        <td> 30521245122   </td>
                                          <?php 
                                         
                                         if($pend_3_row->confirm_payment == 'done'){
                                              $amount = $pend_3_row->customer_advance ;
                                              
                                            $confirm_amt = $pend_3_row->pend_amount ;
                                         }else{
                                              $amount = $pend_3_row->pend_amount ; 
                                             $confirm_amt = 0 ;
                                         }
                                         
                                         ?>
                                         <td> <?=  $amount  ?></td>
                                         <td> <?= $confirm_amt ; ?></td>
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                   <td>        
                                         <?php
                                            $id =   $row->id ; 
                                        
                                            ?>
                                       
                                           
                                        <?php if($pend_3_row->confirm_payment){ ?>
                                        
                                        
                                         Modify 3rd payment   
                                         
                                         <?php  }else{?>
                                         
                                             Confirm 3rd payment    
                                             <?php } ?>
                                            
                                         
                                    </td>   
                                              <!-----end---->
                                        
                                 </tr>
                                 
                                 <?php }  
                                     ?>

                                       <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="myModal_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $row->offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $row->offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                        
                         <div id="confirm_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm 1st Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirm_payment')?>" method="post" enctype="multipart/form-data">
                                         <div class="row">
                                          <?php $invoice_no  =  $row->invoice_id;   $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?> 
                                            <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                          
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text" disabled  class="form-control" name="DipositAmount" value="<?php echo  $row->customer_advance ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $row->advance_payment ?>" required>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                                  <?php } ?>
                                   
                                </tbody>
                            </table> 
                          
                           <div style="overflow-x:auto;">
                            <table class="table table-bordered " id="table"  style="width: 99%;overflow-y:auto; ">
                                <thead>
                                    <tr class="filters">
                                        <th>Payment Date</th>
                                        <th>Order Date</th>
                                        <th>Order ID</th>
                                        <th>Customer  Detail</th>
                                        <th>Payment Mode</th>
                                        <th>Payment TR ID </th>
                                        <th>Bank Name</th>
                                        <th>Amount</th> 
                                        <th>Invoice No</th>
                                        <th>RM No</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($result as $row){ ?>
                                    <?php   $user_id = $row->user_id  ;
                                        
                                        $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                        
                                        $rm_user = $user_detail->Rm_id ;
                                        ?>
                                 <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->rm_no == $rm_user   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                    <tr style="text-align: center;">
                                         <?php
                                         $order_id =  $row->order_id ;
                                         
                                         ?>
                                        <td><?php 
                                        $payment_date = $row->offline_transferdate ;
                                    if($payment_date){
                                    $newDate = date("d-M-Y", strtotime($payment_date));  
                                    echo  $newDate;  
                                    }    
                                        ?>
                                        </td>
                                        <td><?= $row->show_date ?> </td>
                                        <td>
                                            <p> <?= $order_id =  $row->order_id ;  ?></p>
                                            <!--<p> <?php $trid =  $row->online_transaction_id ; if($trid){ echo "TRID:" ; echo $trid ; }else{ echo "UTR: ";  echo  $row->utr_number ;  }?></p>-->
                                        </td>
                                        
                                     
                                        <td>
                                        
                                            <p class="" >Name : <?=$user_detail->Owner ; ?></p>
                                             <p>Business: <?=$user_detail->Business ; ?> </p>
                                            <p class="lng">Mobile : <?= $user_detail->phone ; ?></p>
                                          
                                            <p class="lng">PinCode :  <?= $row->pincode ; ?></p>
                                        </td>
                                        <td>
                                            <p><?= $payment_mode = $row->payment_mode ; ?></p> </td>
                                         
                                           <td>
                                               
                                           <p><?php if($payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $row->online_transaction_id;
                                        ?>   
                                            <p> <a href="#payment_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Payment Details</button> </p>
                                    
                                    <br> <br>
                                    <br>
                                     <?php   }else{
                                        
                                       if($row->utr_number){
                                           
                                          echo "UTR : " ; echo $row->utr_number ; 
                                       }
                                    }?> </p>
                                    
                                   
                              
                                         </td>
                                         
                                       <!--Payment Details-->
                        <div id="payment_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Payment Details</h4>
                              </div>
                              <div class="modal-body">
                                       <div class="row">
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-12">
                                                <label>Paytm Transaction Id : </label>
                                                <p><?= $row->online_transaction_id  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Paytm Order Id : </label>
                                                <p><?= $row->paytm_orid  ?></p>
                                            </div>
                                           <div class="col-md-6">
                                                <label>Transaction Date : </label>
                                                <p><?= $row->paytm_date  ?></p>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Paytm Payment Mode : </label>
                                                <p><?= $row->paytm_mode  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Transaction Id : </label>
                                                <p><?= $row->paytm_banktxdid  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Amount : </label>
                                                <p>₹ <?= $row->advance_payment  ?></p>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <!--<button type="submit" class="btn btn-success" >Confirm</button>-->
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                            
                                         
                                         <td>
                                             <p>Bank Name: <?= $row->BankName ; ?></p>
                                             <p>Bank Account No: <?= $row->BankAccountNo ; ?></p>
                                         </td>
                                         <td> <?= $row->advance_payment ; ?>
                                         
                                         </td> 
                                         
                                         <td><?= $row->invoice_id ; ?></td>
                                         <td><?= $row->Rm_id ; ?></td>
                                         <td>
                                         <?php
                                            $id =   $row->id ; 
                                         
                                         if($row->offline_file ){
                                        
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#myModal_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-primary" >View Slip 1st payment</button><br><br>
                                        <?php } } ?>   
                                        <?php if($row->confirm_payment){ ?>
                                        
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#confirm_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Modify 1st payment</button>   
                                        <?php } ?> 
                                         <?php  }else{?>
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                             <a href="#confirm_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Confirm 1st payment </button>    
                                             <?php } 
                                                       } ?>
                                             <br>
                                             <br> <br> <br>  <br> <br> <br> <br>
                                            
                                         </td>
                                       
                                     </tr>
                                 
                                   <!------ Pending Payment--->
                                       
                                  <?php   $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2))->row();
                                     
                                     if($pend_row){
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $row->order_Date ?> </td>
                                        <td>
                                            <p> <?= $order_id =  $row->order_id ;  ?></p> 
                                          
                                           </td>
        
                                         <td>
                                        
                                            <p class="" >Name : <?=$user_detail->Owner ; ?></p>
                                             <p>Business: <?=$user_detail->Business ; ?> </p>
                                            <p class="lng">Mobile : <?= $user_detail->phone ; ?></p>
                                          
                                            <p class="lng">PinCode :  <?= $row->pincode ; ?></p>
                                        </td>
                                        <td>
                                            
                                                   <?php
                                         $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2))->row();
                                         
                                         ?>
                                     <p><?= $pend_payment_mode = $pend_row->pend_payment_type ; ?></p> </td>
                                     <td>        <p><?php if($pend_payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $pend_payment_mode->pend_transition_id; 
                                           
                                         ?>
                                         <p> <a href="#paymentpend_<?=$pend_row->id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Payment Details</button> </p>
                                    
                                             <!--Payment Details-->
                        <div id="paymentpend_<?=$pend_row->id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Payment Details</h4>
                              </div>
                              <div class="modal-body">
                                       <div class="row">
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-12">
                                                <label>Paytm Transaction Id : </label>
                                                <p><?= $row->online_transaction_id  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Paytm Order Id : </label>
                                                <p><?= $row->paytm_orid  ?></p>
                                            </div>
                                           <div class="col-md-6">
                                                <label>Transaction Date : </label>
                                                <p><?= $row->paytm_date  ?></p>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Paytm Payment Mode : </label>
                                                <p><?= $row->paytm_mode  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Transaction Id : </label>
                                                <p><?= $row->paytm_banktxdid  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Amount : </label>
                                                <p>₹ <?= $row->advance_payment  ?></p>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <!--<button type="submit" class="btn btn-success" >Confirm</button>-->
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                       
                                      <?php  }else{
                                        
                                       if($pend_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_row->pend_utr_number ; 
                                       }
                                    }?> </p>
                                    
                                    
                                        </td>
                                        <td>
                                       <p>Bank Name: <?= $pend_row->BankName ; ?></p>
                                             <p>Bank Account No: <?= $pend_row->BankAccountNo ; ?></p>
                                        </td>
                                        <td> <?= $pend_row->pend_amount ; ?>
                                        </td>
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                            
                                         
                                    <td>        
                                         <?php
                                            $id =   $row->id ; 
                                         
                                         if($pend_row->pend_offline_file ){
                                        
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           
                                         <a href="#myModalpend_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-primary" >View Slip 2nd payment </button> </a><br><br>
                                        <?php }  }  ?>   
                                        <?php if($pend_row->confirm_payment){ ?>
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                        
                                         <a href="#confirmpending_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Modify 2nd payment</button> </a>  
                                         <?php } ?>
                                         <?php  }else{?>
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                             <a href="#confirmpending_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Confirm 2nd payment</button>    
                                             <?php }  }  ?>
                                            
                                         
                                    </td>     
                                             <!-----end---->
                                            
                                        
                                 </tr>
                                 
                                 <?php } ?>
                                 
                                   <!------ Pending 3 Payment--->
                                       
                                  <?php   $pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();
                                  
                                     
                                     if($pend_3_row){
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_3_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $row->order_Date ?> </td>
                                        <td>
                                            <p> <?= $order_id =  $row->order_id ;  ?></p>
                                            <td>
                                        
                                            <p class="" >Name : <?=$user_detail->Owner ; ?></p>
                                             <p>Business: <?=$user_detail->Business ; ?> </p>
                                            <p class="lng">Mobile : <?= $user_detail->phone ; ?></p>
                                          
                                            <p class="lng">PinCode :  <?= $row->pincode ; ?></p>
                                        </td>
                                        <td>
                                            
                                                
                                     <p><?= $pend_payment_mode = $pend_3_row->pend_payment_type ; ?></p>
                                        </td>
                                        <td>
                                            <p><?php if($pend_payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $pend_3_row->pend_transition_id; 
                                        }else{
                                        
                                       if($pend_3_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_3_row->pend_utr_number ; 
                                       }
                                    }?> </p>
                                    
                                    
                                        </td>
                                        <td>
                                             <p>Bank Name: SBI</p>
                                             <p>Bank Account No: 30521245122</p>
                                        </td>
                                        <td> <?= $pend_3_row->pend_amount ; ?>
                                        </td>
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                            
                                         
                                    <td>        
                                         <?php
                                            $id =   $row->id ; 
                                         
                                         if($pend_3_row->pend_offline_file ){
                                        
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#myModalpend3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-primary" >View Slip 3rd payment</button><br><br>
                                        <?php } } ?>   
                                        <?php if($pend_3_row->confirm_payment){ ?>
                                        
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#confirmpending3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Modify 3rd payment</button>   
                                         <?php } ?>
                                         <?php  }else{?>
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                             <a href="#confirmpending3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Confirm 3rd payment</button>    
                                             <?php } }  ?>
                                            
                                         
                                    </td>     
                                             <!-----end---->
                                            
                                        
                                 </tr>
                                 
                                 <?php } ?>


                                 
                                       <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="myModal_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $row->offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $row->offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                         <div class="modal fade" id="myModalpend_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_row->pend_offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $pend_row->pend_offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                     <div class="modal fade" id="myModalpend3_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_3_row->pend_offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $pend_3_row->pend_offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                        
                         <div id="confirm_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirm_payment')?>" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                             <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                                          <?php $invoice_no  =  $row->invoice_id; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <label>Invoice No :<?= $invoice_no?> </label>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                         <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text" disabled  class="form-control" name="DipositAmount" value="<?php echo  $row->advance_payment ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $row->advance_payment ?>" required >
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                        
                      
                        
                         <div id="confirmpending_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm Pending Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirmpending_payment')?>" method="post" enctype="multipart/form-data">
                                      
                                         <div class="row">
                                            
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                            <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                              <input type="hidden" class="form-control" name="payment_no"  value="2">
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                            <?php if($pend_row->customer_advance){ 
                                                
                                                $customer = $pend_row->customer_advance ;
                                            }else{
                                                $customer = $pend_row->pend_amount ;
                                                
                                            }
                                            
                                            
                                            ?>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text"  class="form-control" disabled name="DipositAmount" value="<?php echo $customer  ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $pend_row->pend_amount ?>" required>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                        <div id="confirmpending3_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm 3rd Pending Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirmpending_payment')?>" method="post" enctype="multipart/form-data">
                                      
                                         <div class="row">
                                            
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                            <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                            <input type="hidden" class="form-control" name="payment_no"  value="3">
                                           
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                             <?php if($pend_3_row->customer_advance){ 
                                                
                                                $customer = $pend_3_row->customer_advance ;
                                            }else{
                                                $customer = $pend_3_row->pend_amount ;
                                                
                                            }
                                            
                                            
                                            ?>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text"  class="form-control" disabled  name="DipositAmount" value="<?php echo  $customer; ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $pend_3_row->pend_amount ?>" required>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                                  <?php } }  ?>
                                  
                                  
                                  
                                  
                                      <!------ 2 Pending Payment--->
                                       
                                  <?php   //$pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2))->row();
                                    //   echo $type ; 
                                  if($type == 'payment_mode'){ 
                                      
                                      $pend_result = $this->db->get_where('order_transition', array('pend_payment_type'=>$search  ,'payment_no' => 2))->result();
                                      
                                  }elseif( $type =='online_transaction_id'){
                                      
                                         $pend_result = $this->db->get_where('order_transition', array('pend_transition_id'=>$search  ,'payment_no' => 2))->result();
                                  
                                  }elseif( $type =='utr_number'){
                                      
                                         $pend_result = $this->db->get_where('order_transition', array('pend_utr_number'=>$search  ,'payment_no' => 2))->result();
                                  
                                  }
                                    
                                      foreach($pend_result as $pend_row){
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $pend_row->order_Date ?> </td>
                                        <td>
                                            <p> <?= $order_id =  $pend_row->order_id ;  ?></p> 
                                          
                                           </td>
                                      <?php
                                                
                                                $order_id  =$this->db->get_where('orders', array('order_id'=>$order_id))->row();
                                                $user_id = $order_id->user_id ;
                                                $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                         
                                                 ?>
                                      
                                         <td>
                                        
                                            <p class="" >Name : <?=$user_detail->Owner ; ?></p>
                                             <p>Business: <?=$user_detail->Business ; ?> </p>
                                            <p class="lng">Mobile : <?= $user_detail->phone ; ?></p>
                                          
                                            <p class="lng">PinCode :  <?= $row->pincode ; ?></p>
                                        </td>
                                        <td>
                                            
                                                   <?php
                                         $pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2))->row();
                                         
                                         ?>
                                     <p><?= $pend_payment_mode = $pend_row->pend_payment_type ; ?></p> </td>
                                     <td>        <p><?php if($pend_payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $pend_payment_mode->pend_transition_id; 
                                           
                                         ?>
                                         <p> <a href="#paymentpend_<?=$pend_row->id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Payment Details</button> </p>
                                    
                                             <!--Payment Details-->
                        <div id="paymentpend_<?=$pend_row->id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Payment Details</h4>
                              </div>
                              <div class="modal-body">
                                       <div class="row">
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-12">
                                                <label>Paytm Transaction Id : </label>
                                                <p><?= $row->online_transaction_id  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Paytm Order Id : </label>
                                                <p><?= $row->paytm_orid  ?></p>
                                            </div>
                                           <div class="col-md-6">
                                                <label>Transaction Date : </label>
                                                <p><?= $row->paytm_date  ?></p>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Paytm Payment Mode : </label>
                                                <p><?= $row->paytm_mode  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Transaction Id : </label>
                                                <p><?= $row->paytm_banktxdid  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Amount : </label>
                                                <p>₹ <?= $row->advance_payment  ?></p>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <!--<button type="submit" class="btn btn-success" >Confirm</button>-->
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                       
                                      <?php  }else{
                                        
                                       if($pend_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_row->pend_utr_number ; 
                                       }
                                    }?> </p>
                                    
                                    
                                        </td>
                                        <td>
                                       <p>Bank Name: <?= $pend_row->BankName ; ?></p>
                                             <p>Bank Account No: <?= $pend_row->BankAccountNo ; ?></p>
                                        </td>
                                        <td> <?= $pend_row->pend_amount ; ?>
                                        </td>
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                            
                                         
                                    <td>        
                                         <?php
                                            $id =   $pend_row->id ; 
                                         
                                         if($pend_row->pend_offline_file ){
                                        
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
           
                                         <a href="#myModalpend2_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-primary" >View Slip 2nd payment </button> </a><br><br>
                                        <?php }  }  ?>   
                                        <?php if($pend_row->confirm_payment){ ?>
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                        
                                         <a href="#confirmpending2_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Modify 2nd payment</button> </a>  
                                         <?php } ?>
                                         <?php  }else{?>
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                             <a href="#confirmpending_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Confirm 2nd payment</button>    
                                             <?php }  }  ?>
                                            
                                         
                                    </td>     
                                             <!-----end---->
                                            
                                        
                                 </tr>
                                 
                                 <?php } ?>
                                 
                                  
                                  
                                  
                                     <!------ Pending 3 Payment--->
                                       
                                  <?php   //$pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();
                                  
                                  echo $type ; 
                                  if($type == 'payment_mode'){ 
                                      
                                      $pend_3_result = $this->db->get_where('order_transition', array('pend_payment_type'=>$search  ,'payment_no' => 3))->result();
                                      
                                  }elseif( $type =='online_transaction_id'){
                                      
                                         $pend_3_result = $this->db->get_where('order_transition', array('pend_transition_id'=>$search  ,'payment_no' => 3))->result();
                                  
                                  }elseif( $type =='utr_number'){
                                      
                                         $pend_3_result = $this->db->get_where('order_transition', array('pend_utr_number'=>$search  ,'payment_no' => 3))->result();
                                  
                                  }
                                    
                                    $j=1 ; 
                                  
                                      foreach($pend_3_result as $pend_3_row){
                                        ?>
                                 <tr>
                                   
                                        <td><?=  $pend_3_row->pend_offline_transferdate ; ?></td>
                                        <td><?= $pend_3_row->pend_offline_transferdate ?> </td>
                                        <td>
                                            <p> <?= $order_id =  $pend_3_row->order_id ;  ?></p>
                                            <td>
                                                
                                                <?php
                                                
                                                $order_id  =$this->db->get_where('orders', array('order_id'=>$order_id))->row();
                                       $user_id = $order_id->user_id ;
                                          $user_detail  =$this->db->get_where('customerlogin' , array('id' =>$user_id))->row(); 
                                         
                                                 ?>
                                        
                                            <p class="" >Name : <?=$user_detail->Owner ; ?></p>
                                             <p>Business: <?=$user_detail->Business ; ?> </p>
                                            <p class="lng">Mobile : <?= $user_detail->phone ; ?></p>
                                          
                                            <p class="lng">PinCode :  <?= $row->pincode ; ?></p>
                                        </td>
                                        <td>
                                            
                                                
                                     <p><?= $pend_payment_mode = $pend_3_row->pend_payment_type ; ?></p>
                                     
                                         <p> <a href="#paymentpend2_<?=$pend_3_row->id ?>" data-toggle="modal" ><button type="button" class="btn btn-success" >Payment Details</button> </a></p>
                                    
                                             <!--Payment Details-->
                        <div id="paymentpend2_<?=$pend_3_row->id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Payment Details</h4>
                              </div>
                              <div class="modal-body">
                                       <div class="row">
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $pend_3_row->order_id; ?>">
                                                 <div class="col-md-12">
                                                <label>Paytm Transaction Id : </label>
                                                <p><?= $pend_3_row->pend_transition_id  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Paytm Order Id : </label>
                                                <p><?= $pend_3_row->paytm_orid  ?></p>
                                            </div>
                                           <div class="col-md-6">
                                                <label>Transaction Date : </label>
                                                <p><?= $pend_3_row->paytm_date  ?></p>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Paytm Payment Mode : </label>
                                                <p><?= $pend_3_row->paytm_mode  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Transaction Id : </label>
                                                <p><?= $pend_3_row->paytm_banktxdid  ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Amount : </label>
                                                <p>₹ <?= $pend_3_row->pend_amount  ?></p>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <!--<button type="submit" class="btn btn-success" >Confirm</button>-->
                                            <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        </div>
                                          
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                                        </td>
                                        <td>
                                            <p><?php if($pend_payment_mode == 'Online' ) {
                                           echo "TRID:" ;  echo $pend_3_row->pend_transition_id; 
                                        }else{
                                        
                                       if($pend_3_row->pend_utr_number){
                                           
                                          echo "UTR : " ; echo $pend_3_row->pend_utr_number ; 
                                       }
                                    }?> </p>
                                    
                                    
                                        </td>
                                        <td>
                                             <p>Bank Name: SBI</p>
                                             <p>Bank Account No: 30521245122</p>
                                        </td>
                                        <td> <?= $pend_3_row->pend_amount ; ?>
                                        </td>
                                        <td><?= $row->invoice_id ; ?></td>
                                        <td><?= $row->Rm_id ; ?></td>
                                        <!------Pending payment----->
                                            
                                         
                                    <td>        
                                         <?php
                                            $id =   $j ; 
                                         
                                         if($pend_3_row->pend_offline_file ){
                                        
                                            ?>
                                             <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#myModalpend3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-primary" >View Slip 3rd payment</button><br><br>
                                        <?php } } ?>   
                                        <?php if($pend_3_row->confirm_payment){ ?>
                                        
                                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                         <a href="#confirmpending3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Modify 3rd payment</button>   
                                         <?php } ?>
                                         <?php  }else{?>
                                          <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'Payment' ))->row();
                
                
                
               }
            
           if($user_rm->edit == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                                             <a href="#confirmpending3_<?=$id ?>" data-toggle="modal" ><button type="submit" class="btn btn-success" >Confirm 3rd payment</button>    
                                             <?php } }  ?>
                                            
                                         
                                    </td>     
                                             <!-----end---->
                                            
                                        
                                 </tr>
                                 
                               

                                 
                                       <!-- Modal for showing delete confirmation -->
                
                           
                      <div class="modal fade" id="myModal2_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $row->offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $row->offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                         <div class="modal fade" id="myModalpend2_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_row->pend_offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $pend_row->pend_offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                     <div class="modal fade" id="myModalpend3_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $pend_3_row->pend_offline_file ; ?>" width="550px" height="500px">
                              </div>
                              <div class="modal-footer">
                                  
                                   <a href="<?php echo $pend_3_row->pend_offline_file ; ?>" class="btn btn-primary" download>Download File </a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                        
                         <div id="confirm_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirm_payment')?>" method="post" enctype="multipart/form-data">
                                          <div class="row">
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                             <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                                          <?php $invoice_no  =  $row->invoice_id; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <label>Invoice No :<?= $invoice_no?> </label>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                         <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required >
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text" disabled  class="form-control" name="DipositAmount" value="<?php echo  $row->advance_payment ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $row->advance_payment ?>" required >
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                        
                      
                        
                         <div id="confirmpending2_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm Pending Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirmpending_payment')?>" method="post" enctype="multipart/form-data">
                                      
                                         <div class="row">
                                            
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                            <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                              <input type="hidden" class="form-control" name="payment_no"  value="2">
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                            <?php if($pend_row->customer_advance){ 
                                                
                                                $customer = $pend_row->customer_advance ;
                                            }else{
                                                $customer = $pend_row->pend_amount ;
                                                
                                            }
                                            
                                            
                                            ?>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text"  class="form-control" disabled name="DipositAmount" value="<?php echo $customer  ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $pend_row->pend_amount ?>" required>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                        <div id="confirmpending3_<?=$id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm 3rd Pending Payment</h4>
                              </div>
                              <div class="modal-body">
                                  
                                  
                                  <form  action="<?= base_url('Admin/confirmpending_payment')?>" method="post" enctype="multipart/form-data">
                                      
                                         <div class="row">
                                            
                                          <?php $invoice_no  =  $row->invoice_id; $invoice_date  =  $row->invoice_date; ?>
                                          <?php if($invoice_no){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice No :<?= $invoice_no ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                            <?php if($invoice_date){ ?>
                                          <div class="col-md-6">
                                                <h4>Invoice Date :<?= $invoice_date ;?> </h4>
                                                
                                            </div>
                                            <?php } ?>
                                          </div>
                                      <div class="row">
                        
                                              <input type="hidden" class="form-control" name="req_id"  value="<?php echo $row->order_id; ?>">
                                            <input type="hidden" class="form-control" name="payment_no"  value="3">
                                           
                                                 <div class="col-md-6">
                                                <label>Bank Name : </label>
                                                <input type="text" class="form-control" name="BankName" value="SBI" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Bank Account Number : </label>
                                                <input type="text" class="form-control" name="BankAccountNumber" Value="30521245122" required>
                                            </div>
                                             <?php if($pend_3_row->customer_advance){ 
                                                
                                                $customer = $pend_3_row->customer_advance ;
                                            }else{
                                                $customer = $pend_3_row->pend_amount ;
                                                
                                            }
                                            
                                            
                                            ?>
                                             <div class="col-md-6">
                                                <label>Deposit Amount : </label>
                                                <input type="text"  class="form-control" disabled  name="DipositAmount" value="<?php echo  $customer; ?>" required>
                                            </div>
                                             <div class="col-md-6">
                                                <label>Confirm Deposit Amount : </label>
                                                <input type="text" class="form-control" name="ConfirmDipositAmount"  value="<?php echo $pend_3_row->pend_amount ?>" required>
                                            </div>
                                     
                                      </div>
                                    
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" >Confirm</button>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                        </div>
                                          </form>
                                 </div>
                             
                            </div>
                        
                          </div>
                        </div>
                        
                       
                          <?php  $j++ ; } ?>

                        
                        
                        
                        
                                   
                                </tbody>
                            </table> 
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
      $("#selectbox").change(function () {
    if ($(this).val() == "custom") {
        // $('#myModal3').modal('show');
         $("#datepick2").show();
          $("#apply_btn").hide();
         
      }else{
           $("#datepick2").hide();
            $("#apply_btn").show();
      }
  });
</script>
<script>
      $("#select_type").change(function () {
    if ($(this).val() == "Name") {
        // $('#myModal3').modal('show');
         $("#search_name").show();
          $("#search_phone").hide();
          $("#search_order").hide();
          $("#search_mode").hide();
          
      } else if ($(this).val() == "phone") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").show();
           $("#search_order").hide();
          $("#search_mode").hide();
          
             $("#search_utr").hide();
       $("#search_transaction_id").hide();
       $("#search_rm").hide();
          
      }else if ($(this).val() == "order_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").show();
           $("#search_mode").hide();
          
             $("#search_utr").hide();
       $("#search_transaction_id").hide();
       $("#search_rm").hide();
          
      }else if ($(this).val() == "payment_mode") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").show();
        
           $("#search_utr").hide();
       $("#search_transaction_id").hide();
       $("#search_rm").hide();  
          
      }
      else if ($(this).val() == "utr_number") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           
            $("#search_utr").show();
        
       $("#search_transaction_id").hide();
       $("#search_rm").hide();
          
      }else if ($(this).val() == "online_transaction_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           
            $("#search_utr").hide();
       $("#search_transaction_id").show();
       
       $("#search_utr").hide();
    
       $("#search_rm").hide();
      
      }else if ($(this).val() == "Rm_id") {
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           
            $("#search_utr").hide();
       $("#search_transaction_id").hide();
       $("#search_rm").show();
      
      }else{
          
          
        // $('#myModal3').modal('show');
         $("#search_name").hide();
          $("#search_phone").hide();
           $("#search_order").hide();
           $("#search_mode").hide();
           
            $("#search_utr").hide();
       $("#search_transaction_id").hide();
       $("#search_rm").hide();
      
      
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
