<?php 

include 'headcss.php';
include 'header.php';
?>
 <?php include 'navbar.php'; ?>

<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Ledger</li>
            </ol>
        </nav>
    </div>
</div>

<!-- /.breadcrumb -->
<section class="home-bg-color">
    <div class="container">
        <div class="row" style="padding: 3% 0% 0% 0%;">
            <div class="col-md-12">
                <div class="clearfix">
                    <div class="heading-title">
                        <h3>Ledger Details</h3>
                    </div>
                    
                     <?php
                     
                     $this->db->select_sum('credit_amount');
                    $result = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->row();  
                    $cr =  $result->credit_amount;
                     
                     $this->db->select_sum('debit');
                    $result = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->row();  
                    $dr =  $result->debit;
                     
                     foreach($customer_detail as $row){ ?>
                                  <?php  $user_id = $row->user_id ;
                                             $debit= $row->debit ; 
                                            //  $dr+=$debit ;
                                             $credit=  $row->credit_amount ;
                                            //  $cr+= $credit ;
                                             
                                             ?>
                                             <?php  $total=  $cr -$dr ;
                                    }
                                             
                                  ?>
					<div class="row">
                                <div class="col-md-6">
                                    <br>
                                    <form action="#" method="POST">
                                        <div class="row">
                                             <form action="<?php echo base_url('Artnhub/date_ledgerdetails');?>"  method="POST">
                                             <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                                
                                  
                                            <div class="col-md-4 mgtb-10">
                                                <input type="date" class="form-control" name="date1">
                                            </div>
                                            <div class="col-md-4 mgtb-10">
                                                <input type="date" class="form-control" name="date2">
                                            </div>
                                            <div class="col-md-4 mgtb-10">
                                                 <button type= "submit" class="btn btn-primary" style="width: 50%;padding: 10px;">Search</button>
                                    </form>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                              <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                       <th class="text-center">Total Amount Dr</th>
                                        <th class="text-center">Total Amount Cr</th>
                                        <th class="text-center">Balance</th>
                                     </tr>
                                </thead>
                                <tbody>
                                   <tr style="text-align: center;">
                                         <td>
                                           <?php if($dr){ echo round($dr,2) ; }else{ echo "0"  ;} ?> 
                                        </td>
                                        <td>
                                           <?php if($cr){ echo round($cr,2) ; }else{ echo "0"  ;} ?>
                                       </td>
                                         
                                         <?php   if($total >= 0){
                                            ?>
                                            <td style="color: green"> <?php  if($total){ echo round($total,2) ; }else{ echo "0"  ;}  ?></td>
                                            
                                            <?php }else{ ?>
                                            <td style="color: red"> <?php  if($total){ echo round($total,2) ; }else{ echo "0"  ;}  ?></td>
                                            <?php } ?> 
                                           
                                       </tr>
                                  </tbody>
                            </table>
                                  
                                </div>
                            </div>
										 
                    <div class="box-1 box-color">
                        <div class="box-body">
                       <div class="panel-body" style="overflow-x: auto;">
                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>OrderID</th>
                                        <th>Transaction Mode</th>
                                        <th>Amount Dr</th>
                                        <th>Amount Cr</th>
                                     </tr>
                                </thead>
                                 <tbody>
                                     <?php foreach($customer_detail as $row){ ?>
                              
                                    <tr style="text-align: center;">
                                        <td> <?php 
                                                $payment_date = $row->date ;
                                            if($payment_date){
                                            $newDate = date("d-M-Y", strtotime($payment_date));  
                                            echo  $newDate;  
                                            }    
                                                ?></td>
                                        <td><?= $row->order_id; ?></td>
                                        <td><?= $row->transaction_mode ; ?></td>
                                        
                                      
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
                           
                            
                        </div>
                        </div>
                    </div>
				
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>