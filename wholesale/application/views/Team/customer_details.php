 <?php
 //pr($messag);die;
include('header.php');
include('sidebar.php');
?>
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Customer</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Customer</a>
                    </li>
                    <li class="active">Customer Details</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Customer Details
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><b>Business Name : </b><?php echo $messag[0]['Business']?></div>
                                <div class="col-md-4"><b>Owner Name : </b><?php echo $messag[0]['Owner']?></div>
                                 <div class="col-md-4"><b>Email ID : </b><?php echo $messag[0]['email']?></div>
                            </div>
                            <div class="row">
                               
                                <div class="col-md-4"><b>Mobile No : </b><?php echo $messag[0]['phone']?></div>
                                <div class="col-md-4"><b>Landline No : </b><?php echo $messag[0]['landline']?></div>
                                 <div class="col-md-4"><b>Address : </b><?php echo $messag[0]['Address']?></div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-4"><b>Pincode : </b><?php echo $messag[0]['PinCode']?></div>
                                <div class="col-md-4"><b>City : </b><?php echo $messag[0]['city']?></div>
                                <div class="col-md-4"><b>State : </b><?php echo $messag[0]['state']?></div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-4"><b>RM No : </b><?php echo $messag[0]['']?></div>
                                <div class="col-md-4"><b>Business Type : </b><?php echo $messag[0]['btype']?></div>
                              <div class="col-md-4"><b>Ownership Type : </b><?php echo $messag[0]['ownertype']?></div>
                              
                            </div>
                            
                            <div class="row">
                               
                                <div class="col-md-3"><b>Gst No : </b><?php echo $messag[0]['GSTNumber']?><br>
                                <?php if($messag[0]['gstimg'] ){ ?>
                                <a href="#myModal" data-toggle="modal" class="btn btn-primary"> View </a>
                                <!--<a href="<?php echo $messag[0]['gstimg']?>" target="_blank" class="btn btn-primary">View</a>-->
                                <a href="<?php echo $messag[0]['gstimg']?>" download class="btn btn-success" download="">Download</a>
                                <?php } ?>
                                </div>
                                
                        
                        <!--Model-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $messag[0]['gstimg']?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  <div class="row">
                                   <!--<a href="<?php echo $value['offline_file'] ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 310px;"> Download File </a>-->
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                  </div>
                                   
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                
                                
                                
                                <div class="col-md-3"><b>PAN No : </b><?php echo $messag[0]['PANNumber']?><br>
                                <?php if($messag[0]['panimg'] ){ ?>
                                <a href="#myModal2" data-toggle="modal" class="btn btn-primary"> View </a>
                                <a href="<?php echo $messag[0]['panimg']?>" download class="btn btn-success" download="">Download</a>
                                <?php } ?>
                                </div>
                                
                                  <!--Model-->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $messag[0]['panimg']?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  <div class="row">
                                   <!--<a href="<?php echo $value['offline_file'] ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 310px;"> Download File </a>-->
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                  </div>
                                   
                              </div>
                            </div>
                        
                          </div>
                        </div>  
                                
                                <div class="col-md-3"><b>Aadhar No : </b><?php echo $messag[0]['adhaar_no']?><br>
                                <?php if($messag[0]['adhaar_img'] ){ ?>
                                <a href="#myModal3" data-toggle="modal" class="btn btn-primary"> View </a>
                                <!--<a href="<?php echo $messag[0]['adhaar_img']?>" target="_blank" class="btn btn-primary">View</a>-->
                                <a href="<?php echo $messag[0]['adhaar_img']?>" download class="btn btn-success" download="">Aadhar Download</a>
                                <?php }  ?>
                                </div> 
                                       <!--Model-->
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $messag[0]['adhaar_img']?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  <div class="row">
                                   <!--<a href="<?php echo $value['offline_file'] ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 310px;"> Download File </a>-->
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                  </div>
                                   
                              </div>
                            </div>
                        
                          </div>
                        </div>  
                                
                                
                                 
                                 <div class="col-md-3"><b>Visting Card : </b><?php echo $messag[0]['']?><br>
                                 <?php if($messag[0]['vcard'] ){ ?>
                                 <a href="#myModal4" data-toggle="modal" class="btn btn-primary"> View </a>
                                <!--<a href="<?php echo $messag[0]['vcard']?>" target="_blank" class="btn btn-primary">View</a>-->
                                <a href="<?php echo $messag[0]['vcard']?>" download class="btn btn-success" download="">Download</a>
                                <?php } ?>
                                </div>
                                
                              <!--Model  -->
                                
                                <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                             
                              <div class="modal-body">
                               <img src="<?php echo $messag[0]['vcard']?>" width="550px" height="450px">
                              </div>
                              <div class="modal-footer">
                                  <div class="row">
                                   <!--<a href="<?php echo $value['offline_file'] ; ?>" class="btn btn-primary" download style="padding-left: 33px; padding-right: 120px; margin-bottom: -34px; margin-left: 310px;"> Download File </a>-->
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                  </div>
                                   
                              </div>
                            </div>
                        
                          </div>
                        </div>
                                
                                </div>
                                <div class="row">
                                
                                 <div class="col-md-4"><b>Check Ledger Account :</b><br>
                                 <?php $user_id = $messag[0]['id'] ;  ?>
                                    <form action="<?=base_url('Admin/ledger_details');?>"  method="POST">
                                       <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                                   
                                        <button type= "submit" class="btn btn-primary">Ledger Account</button>
                                    </form>
                                    </div>
                               </div>
                        </div>
                    </div>
                    
                      <?php if($messag[0]['valid']=='1'){
                                $rm_id = $messag[0]['Rm_id'] ;
                                
                         $Rm_detail = $this->db->get_where('rm', array('id' => $rm_id ,))->row();
                         
                        ?>
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RM Details
                            </h4>
                        </div>
                        <br />
                        
                           
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><b>RM Name : </b><?= $Rm_detail->rm_name ;?></div>
                                <div class="col-md-4"><b>RM Email ID : </b><?= $Rm_detail->rm_email ;?></div>
                                 <div class="col-md-4"><b>RM Mobile No : </b><?= $Rm_detail->rm_mobile ;?></div>
                                
                            </div>
                            
                        </div>
                    </div>
                  <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Address Details
                            </h4>
                        </div>
                        <br />
                        
                         <?php 
                         
                       $id =  $messag[0]['id'] ;
                         $address = $this->db->get_where('user_address' , array('user_id' => $id))->result();
                         
                         foreach($address as $add){
                         ?>  
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><b> Name : </b><?= $add->name ;?></div>
                                
                                 <div class="col-md-4"><b> Mobile No : </b><?= $add->mobile ;?></div>
                                 <div class="col-md-4"><b> Pincode : </b><?= $add->pincode ;?></div>
                                 <div class="col-md-4"><b> Address : </b><?= $add->address ;?></div>
                                 <div class="col-md-4"><b> city : </b><?= $add->city ;?></div>
                                 <div class="col-md-4"><b> state : </b><?= $add->state ;?></div>
                                 <div class="col-md-4"><b> locality : </b><?= $add->locality ;?></div>
                                
                            </div>
                            
                        </div>
                        <?php } ?>
                    </div>
                    <?php }elseif($messag[0]['valid']=='2'){ ?>
                    
                      <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> User Rejected
                            </h4>
                        </div>
                        <br />
                        
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><b>Reason : </b><?= $messag[0]['reason'] ; ?></div>
                              
                            </div>
                            
                        </div>
                        
                        <?php } ?>
                    </div>
                    
                </div>
                <!-- row-->
            </section>
        </aside>
<?php
include 'footer.php';
?>