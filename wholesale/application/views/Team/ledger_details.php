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
                <h1>Ledger Account</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Ledger Account</a>
                    </li>
                    <li class="active">Ledger Details</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Ledger Details
                            </h4>
                        </div>
                        <br />
                          <?php foreach($customer_detail as $row){ ?>
                                  <?php  $user_id = $row->user_id ;
                                             $debit= $row->debit ; 
                                             $dr+=$debit ;
                                             $credit=  $row->credit_amount ;
                                             $cr+= $credit ;?>
                                             <?php  $total=  $cr -$dr ;
                                             
                                    }
                                       
                                       $user_detail = $this->db->get_where('customerlogin',array('id'=>$user_id ))->row() ;      
                                  ?>
                        <div class="row">
                                <div class="col-md-6" style="margin-left:-15px; margin-top: 10px;">
                                    <p><b>Customer : <?= $user_detail->Owner ;?></b></p>
                                    <p><b>Business Name : <?= $user_detail->Business ;?></b></p>
                                    
                                </div>
                              <div class="col-md-6">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                       
                                        <th style="text-align:center">Total Amount Dr</th>
                                        <th style="text-align:center">Total Amount Cr</th>
                                        <th style="text-align:center">Balance Amount</th>
                                     </tr>
                                </thead>
                                
                                <tbody>
                                 
                                    <tr style="text-align:center">
                                        <td>
                                           <?php if($dr){ echo round($dr,2) ; }else{ echo "0"  ;} ?> 
                                        </td>
                                        <td>
                                           <?php if($cr){ echo round($cr ,2) ; }else{ echo "0"  ;} ?>
                                       </td>
                                         
                                         <?php   if($total >= 0){
                                            ?>
                                            <td style="color: green"> <?php  if($total){ echo round($total ,2 ) ; }else{ echo "0"  ;}  ?></td>
                                            
                                            <?php }else{ ?>
                                            <td style="color: red"> <?php  if($total){ echo round($total,2) ; }else{ echo "0"  ;}  ?></td>
                                            <?php } ?> 
                                             
                                     </tr>
                                  
                        
                                    
                                </tbody>
                            </table>
                                  
                                </div>
                            </div>
                            <div class="row" style="padding: 12px 0px; margin-left: -15px;">
                                <div class="col-md-10">
                                    
                                    <form action="<?=base_url('Admin/date_ledgerdetails');?>"  method="POST">
                                             <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                                    <div class="col-md-4">
                                    <input class="form-control" type="date" name="date1" >    
                                    </div>
                                    <div class="col-md-1" style="text-align: center; margin-top: 5px;">
                                        To
                                    </div>
                                    <div class="col-md-4">
                                    <input class="form-control" type="date" name="date2"  >    
                                    </div>
                                    <div class="col-md-2">
                                    <button type= "submit" class="btn btn-primary">Search</button>    
                                    </div>
                                    
                                    </form>
                                    </div>
                            </div>
                        <div class="panel-body">
                            
                            <table class="table table-bordered clienttable">
                                <thead>
                                    <tr class="filters">
                                        <th>Sr. No.</th>
                                        <th>Date</th>
                                   <th>Invoice No.</th> 
                                        <th>OrderID</th>
                                        <th>Transaction Mode</th>
                                    <th>Bank Name</th>
                                    <th>Bank Account No.</th>
                                        <th>Amount Dr</th>
                                        <th>Amount Cr</th>
                                        <!--<th>Balance</th>-->
                                     </tr>
                                </thead>
                                
                                <tbody>
                                    
                                    <?php $i=1; foreach($customer_detail as $row){ 
                             
                                            $order = $this->db->get_where('orders', array('order_id'=>$order_id ))->row();
                                        ?>
                                        
                                    <tr style="text-align: center;">
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                        <?php  $date =  $row->date ;
                                    if($date){
                                    $newDate = date("d-M-Y", strtotime($date));  
                                    echo  $newDate;  
                                    }
                                     ?>
                                        </td> 
                                        <td><?=  $order->invoice_id ?></td>
                                        <td><?= $order_id =$row->order_id; ?></td>
                                        <td><?= $row->transaction_mode ; ?></td>
                                      
                                    <td> <p> SBI</p>   </td>
                                      
                                    <td> <p> 30521245122</p>  </td>   
                                      
                                        <td>
                                            <?php  echo  $debit= $row->debit ; 
                                             $dr+=$debit ;
                                            
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo   $credit=  $row->credit_amount ;
                                            
                                            $cr+= $credit ;
                                            ?>
                                       </td>
                                         
                                          
                                          
                                       
                                             
                                     </tr>
                                  
                                  <?php } ?>
                                    
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
                }
            ],  
        });
    }
    
</script>

