 <?php
 //pr($messa);die;
include('header.php');
include('sidebar.php');
?>
<style>
    tr td a {
    display: inline !important;
}

a.btn.btn-default.buttons-pdf.buttons-html5 {
    display: none;
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
                    <li class="active">Customer List</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Customer List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <?php   $rm_list = $this->db->get_where('rm' ,array('profile'=> 'RM'))->result(); ?>
                             
                             
 		        <form action="<?php echo base_url('Admin/ledger_filter'); ?>" method="POST">
                            <div class="row" style="padding: 12px 0px; margin-left: -15px;">
                               
                                <div class="col-md-2">
                                          <select class="form-control" name="rm_id" required>
                                           <option value="All">Search by RM </option>
                                           <?php foreach($rm_list as $rm){ ?>
                                           <option  value="<?=  $rm->id ?>" <?php if($rm_id == $rm->id ) { echo "selected";}?>><?php echo $rm->rm_name ; ?></option>
                                          <?php } ?>
                                          </select>
                                  </div> 
                                  
                                  <div class="col-md-3">
                                        <select class="form-control" name="type" id="select_type" required>
                                          <option value="All">All </option>
                                          <option value="Pending_Approval" <?php if($type == 'Pending_Approval'){ echo 'selected' ;} ?> >Pending Approval</option>
                                         <option   value="Owner"  <?php if($type == 'Owner'){ echo 'selected' ;} ?> >Customer Name</option>
                                         <option   value="Business" <?php if($type == 'Business'){ echo 'selected' ;} ?>  >Business name</option>
                                         <option   value="phone" <?php if($type == 'phone'){ echo 'selected' ;} ?> >Customer Mobile No </option>
                                          <option  value="city"  <?php if($type == 'city'){ echo 'selected' ;} ?> > Customer City</option>
                                          <option  value="state" <?php if($type == 'state'){ echo 'selected' ;} ?>  > Customer State</option>
                                          <option  value="email"  <?php if($type == 'email'){ echo 'selected' ;} ?> >Customer Email </option>
                                          <option  value="ownertype" <?php if($type == 'ownertype'){ echo 'selected' ;} ?>  > Ownership Type</option>
                                          <option  value="btype" <?php if($type == 'btype'){ echo 'selected' ;} ?>  >Business Type </option>
                                          </select>
                                  </div> 
                                  
                                  <div class="col-md-3" id="ownership" style="display:none ; " >
                                         <select class="form-control" name="ownership" >
                                            <option value="">--Select Ownership Type--</option>
                                            <option>Sole Proprietorship</option>
                                            <option>Partnership</option>
                                            <option>Private LTD</option>
                                            <option>Public LTD</option>
                                            <option>Corporation</option>
                                            <option>Limited Liability Company(LLC)</option>
                                            <option>Trust</option>
                                            <option>Non-Profit Organization</option>
                                        </select>
                                  </div> 
                                  <div class="col-md-3" id="btype"  style="display:none ; " >
                                       <select class="form-control" name="btype" >
                                            <option value ="">--Select Business Type--</option>
                                            <option>Gift Shop</option>
                                            <option>Wholesale</option>
                                            <option>Buying House</option>
                                            <option>Agency</option>
                                            <option>Interior Designing</option>
                                            <option>Freelance</option>
                                        </select>
                                  </div> 
                                  
                                  
                                   <!--<div class="col-md-3" id="search_input">-->
                                   <!--    <input type="text"  class="form-control" name="search"  placeholder="Search">-->
                                   <!--</div> -->
                                   
                                    <div class=" col-md-3" id="search_name"  style="display:none ;">
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
                                 <div class=" col-md-3" id="search_business" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_business" list="business" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="business" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->Business ; ?>"><?= $res->Business ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                  <div class=" col-md-3" id="search_phone" style="display:none">
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
                                  <div class=" col-md-3" id="search_city" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_city" list="city" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="city" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->city ; ?>"><?= $res->city ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_state" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_state" list="state" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="state" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->state ; ?>"><?= $res->state ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 <div class=" col-md-3" id="search_email" style="display:none">
                                    <!--<input type="text" class="form-control" name="search" Placeholder="Enter For Search">-->
                                  
                                    <input  name="search_email" list="email" placeholder="Enter For Search"  type="text"  class="form-control"  >
                                      <datalist id="email" style="overflow-y: scroll; height: 200px;">
                                          <?php foreach($user as $res)
                                              {
                                          ?>
                                            <option value="<?= $res->email ; ?>"><?= $res->email ; ?></option>
                
                                            <?php
                                              }
                                                ?>
                                      </datalist>
                                 </div>
                                 
                                       <div class="col-md-1">
                                      <button type="submit" class="btn btn-primary"> Apply</button>
                                       </div>
                            </div>
                            </form>
                          
                            <table class="table table-bordered clienttable">
                                <thead>
                                    <tr class="filters">
                                        <th>S.No</th>
                                        <th>Customer Name</th>
                                        <th>Customer E-mail</th>
                                        <th>Customer Mobile</th>
                                        <th>Total Credit</th>
                                        <th>Total Debit</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                
                                <tbody>
                                  <?php foreach($custom_list as $value){ ?>
                                  
                                    <tr style="text-align: center;">
                                        <td><?= $user_id = $value['id']  ?></td>
                                        <td><?=$value['Owner'];?></td>
                                        <td><?= $value['email'] ; ?></td>
                                        <td>
                                            <?=  $value['phone'] ; ?>
                                        </td>
                                        <td>
                                        <!--====TOTAL CREDIT =====-->
                                      
                                         
                                            <?php 
                                        $qury  = $this->db->select_sum('credit_amount')
                                        ->where('user_id' , $user_id )
                                        ->from('ledger_account')
                                        ->get();
                                        
                                        
                                        $result = $qury->row() ;
                                        
                                        
                                      $total_credit = $result->credit_amount  ;
                                        
                                        if($total_credit){
                                            
                                            echo round($total_credit,2) ;
                                        }else{
                                            
                                            echo "0" ;
                                        }
                                        
                                        
                                         ?>
                                         
                                         
                                        <td>
                                        
                                         <!--====TOTAL DEBITT =====-->
                                         <?php 
                                        $qury  = $this->db->select_sum('debit')
                                        ->where('user_id' , $user_id )
                                        ->from('ledger_account')
                                        ->get();
                                        
                                        
                                        $result = $qury->row() ;
                                        
                                        
                                      $total_debit = $result->debit  ;
                                        
                                        if($total_debit){
                                            
                                            echo round($total_debit,2) ;
                                        }else{
                                            
                                            echo "0" ;
                                        }
                                        
                                        
                                         ?>
                                         
                                      </td>
                                             <td style="text-align: center;">
                                            <!--<a href="<?php echo base_url('Admin/ledger_details/'.$user_id );?>" class="btn btn-primary">-->
                                            
                                          <form action="<?=base_url('Admin/ledger_details');?>"  method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                                   
                                    <button type= "submit" class="btn btn-primary">View Details</button>
                                    </form>
                                                
                                            </a>
                                            
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
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {},
                    title: 'List',
                }
            ],  
        });
    }
    
        $("#select_type").change(function (){
        
        var type = $('#select_type').val(); 
        if(type=='ownertype'){
            
            $('#ownership').show();
            
            $('#search_input').hide();
            
            $('#btype').hide();
              $('#search_business').hide();
             $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_name').hide();
        }
        else if (type=='btype') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').show();
            
              $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_name').hide();
              $('#search_business').hide();
        }else if (type=='Owner') {
            
            $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
             $('#search_business').hide();
            $('#search_name').show();
        }else if (type=='Business') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').hide(); 
            $('#search_name').hide();
             $('#search_phone').hide();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').show();
        }
        else if (type=='phone') {
            
             $('#ownership').hide();
            
            $('#search_input').hide();
            
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').show();
             $('#search_city').hide();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').hide();
        }
        else if (type=='city') {
            
             $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').show();
             $('#search_state').hide();
             $('#search_email').hide();
            $('#search_business').hide();
        }
        else if (type=='state') {
            
             $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').hide();
            $('#search_state').show();
            $('#search_business').hide();
            $('#search_email').hide();
        }
        else if (type=='email') {
            
            $('#ownership').hide();
            $('#search_input').hide();
            $('#btype').hide(); 
            $('#search_name').hide();
            $('#search_phone').hide();
            
            $('#search_city').hide();
            $('#search_state').hide();
            $('#search_email').show();
            $('#search_business').hide();
        }
        else {
            
            $('#ownership').hide();
            
            $('#search_input').show();
            
            $('#btype').hide();
        }
    });
    
    
    
</script>

