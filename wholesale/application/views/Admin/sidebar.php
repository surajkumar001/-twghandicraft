<?php 
//pr($_SESSION);die;
$id =$_SESSION['session_iid'];
    
      $where='id';
          $table='admin';
          $message=$this->Adminmodel->select_common_where($table,$where,$id);
        //   $priv = $prv[0]['role'];
// $priveledges =  (explode(",",$priv));

?>

<aside class="left-side sidebar-offcanvas" style="width: 200px !important;">

            <section class="sidebar ">

                <div class="page-sidebar  sidebar-nav">

                    <div class="nav_icons">

                     
                    </div>

                    <div class="clearfix"></div>

                    <!-- BEGIN SIDEBAR MENU -->

                    <ul id="menu" class="page-sidebar-menu">

                        <li>

                            <a href="<?php echo base_url('Admin/index');?>">

                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>

                                <span class="title">Dashboard</span>

                            </a>

                        </li>
                        <li>

                            <a href="<?php echo base_url('Admin/manageOrder');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Orders</span>

                            </a>

                            

                        </li>
                        <li>

                            <a href="<?php echo base_url('Admin/manageProduct');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Product Update</span>

                            </a>

                            

                        </li>
                         <li>

                            <a href="<?php echo base_url('Admin/manageSales');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Sales</span>

                            </a>

                            

                        </li>
                        
                        <li>

                            <a href="<?php echo base_url('Admin/manageCategory');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Manage Category</span>

                            </a>

                            

                        </li>
                        
                          <?php   if( $_SESSION['session_namee'] == 'admin' ){ ?>
                      
                        <li>

                            <a href="<?php echo base_url('Admin/manageUser');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Manage User</span>

                            </a>

                        </li>
                       <?php } ?> 
                       
                         <?php if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'cms' ))->row();
                
               }
            
           if($user_rm->view == 'Yes'   || $_SESSION['session_namee'] == 'admin' ){ ?>
                        <li>

                            <a href="<?php echo base_url('Admin/manageCms');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">CMS</span>

                            </a>

                            

                        </li>
                          <?php } ?> 
                          
                            <?php   if( $_SESSION['session_namee'] == 'admin' ){ ?>
                      
                        <li>

                            <a href="<?php echo base_url('Admin/managePolicy');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Policy Update</span>

                            </a>

                            

                        </li>
                        
                        <?php } ?> 
                          
                   <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->

                        <!--    <a href="<?php echo base_url('Admin/Previleges');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Team Member</span>-->

                        <!--    </a>-->

                            

                        <!--</li>-->
                    <?php } ?>
                    <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->

                        <!--    <a href="<?php echo base_url('Admin/inventory');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Inventory</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                    <?php } ?>
                     <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->

                        <!--    <a href="<?php echo base_url('Admin/rmlist');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">RM List</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                    <?php } ?>
                     <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->
                        <!--    <a href="<?php echo base_url('Admin/productmanagment');?>">-->
                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->
                        <!--         <span class="title">Product Management</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                    <?php } ?>
                    <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->

                        <!--    <a href="<?php echo base_url('Admin/neworder');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">New Order</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                    <?php } ?>
                    
                     <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--  <li>-->

                        <!--    <a href="<?php echo base_url('Admin/ProductionNewOrder');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Production New Order</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                    <?php } ?>
                    
                       <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                          <!--<li>-->

                          <!--          <a href="<?php echo base_url('Admin/orders');?>">-->

                          <!--             Order List-->

                          <!--          </a>-->

                          <!--</li> -->
                          
                          <!--<li>-->

                          <!--          <a href="<?php echo base_url('Admin/production_orders');?>">-->

                          <!--          Production Order List-->

                          <!--          </a>-->

                          <!--</li>-->
                      <?php }else{ ?>
                          <?php if (in_array("1", $priveledges)){ ?>
                              <li>

                                    <a href="<?php echo base_url('Admin/orders');?>">

                                       Order List

                                    </a>

                          </li>
                          
                            <li>

                                    <a href="<?php echo base_url('Admin/production_orders');?>">

                                      Production Order List

                                    </a>

                          </li>
                      <?php } } ?>

                          <!--<?php if($_SESSION['session_namee'] == 'admin'){ ?>
                          <li>

                                    <a href="<?php echo base_url('Admin/returnpro');?>">

                                      Order Return Detail

                                    </a>

                          </li>
                      <?php }else{ ?>
                          <?php if (in_array("28", $priveledges)){ ?>
                              <li>

                                    <a href="<?php echo base_url('Admin/returnpro');?>">

                                      Order Return Detail

                                    </a>

                          </li>
                      <?php } } ?>-->


                    
 <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--<li>-->
                        <!--    <a href="<?php echo base_url('Admin/Customers');?>">-->
                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->
                        <!--        <span class="title">Customers</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                      <?php }else{ ?>
                          <?php if (in_array("7", $priveledges)){ ?>
                        <!--                <li>-->
                        <!--    <a href="<?php echo base_url('Admin/Customers');?>">-->
                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->
                        <!--        <span class="title">Customers</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                      <?php } } ?>  
                      
                      
                       <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--            <li>-->

                        <!--    <a href="<?php echo base_url('Admin/payment');?>">-->
                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->
                        <!--        <span class="title">Payment</span>-->
                        <!--    </a>-->

                        <!--</li>-->
                      <?php }?>
                      
                      
                         <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--            <li>-->

                        <!--    <a href="<?php echo base_url('Admin/sales_detailed');?>">-->
                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->
                        <!--        <span class="title">Sale Report </span>-->
                        <!--    </a>-->

                        <!--</li>-->
                      <?php }?>
                      
                        <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--            <li>-->
                        <!--    <a href="<?php echo base_url('Admin/ledger');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Manage Ledger</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                      <?php }else{ ?>
                          <?php if (in_array("7", $priveledges)){ ?>
                        <!--                <li>-->

                        <!--    <a href="<?php echo base_url('Admin/ledger');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Manage Ledger</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                      <?php } } ?>  
                         <!--<li>-->

                         <!--           <a href="<?php echo base_url('Admin/ListProduct');?>">-->

                         <!--                List Product-->

                         <!--           </a>-->

                         <!--       </li>-->
          <!--   <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                             <li>

                            <a href="<?php echo base_url('Admin/inventory');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Inventory</span>

                               

                            </a>

                            

                        </li>
                      <?php }else{ ?>
                          <?php if (in_array("8", $priveledges)){ ?>
                           <li>

                            <a href="<?php echo base_url('Admin/inventory');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">Inventory</span>

                               

                            </a>

                            

                        </li>
                      <?php } } ?>   -->

                      <!-- <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--       <li>-->

                      <!--      <a href="<?php echo base_url('Admin/price');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Bulk Price</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("", $priveledges)){ ?>-->
                      <!--     <li>-->

                      <!--      <a href="<?php echo base_url('Admin/price');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Bulk Price</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php } } ?>  -->
                       
                         
                      <!--          <li>-->

                                    
                      <!--              <a href="javascript:void(0)" class="slide_menu">-->
                      <!--                 Nav Bar <i class="glyphicon glyphicon-menu-down menu_toggle"></i>-->
                      <!--              </a>-->
                                  
                      <!--              <ul class="inner_menu">-->
                      <!--                   <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--      <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listparentcategory');?>">-->
                      <!--                      List Parent Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("9", $priveledges)){ ?>-->
                      <!--     <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listparentcategory');?>">-->
                      <!--                      List Parent Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php } } ?> -->
                      <!--    <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--     <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listcategory');?>">-->
                      <!--                      List Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("10", $priveledges)){ ?>-->
                      <!--     <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listcategory');?>">-->
                      <!--                      List Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php } } ?>                  -->
                      <!--      <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--    <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listsubcategory');?>">-->

                      <!--                List Sub Category-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("11", $priveledges)){ ?>-->
                      <!--   <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Listsubcategory');?>">-->

                      <!--                List Sub Category-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?>               -->
                                        
                      <!--              </ul>-->

                      <!--          </li>-->
                       

             <!--                    <li>
                                <a href="javascript:void(0)" class="slide_menu">
                                       Nav Bar 2<i class="glyphicon glyphicon-menu-down menu_toggle"></i>
                                    </a>
                                    <ul class="inner_menu">
                                             <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                          <li>
                                            <a href="<?php echo base_url('Admin/Listparentcategory2');?>">
                                            List Parent Category

                                    </a>

                                        </li>
                      <?php }else{ ?>
                          <?php if (in_array("12", $priveledges)){ ?>
                         <li>
                                            <a href="<?php echo base_url('Admin/Listparentcategory2');?>">
                                            List Parent Category

                                    </a>

                                        </li>
                      <?php } } ?> 
                                      <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <li>
                                            <a href="<?php echo base_url('Admin/Listcategory2');?>">
                                            List Category

                                    </a>

                                        </li>
                      <?php }else{ ?>
                          <?php if (in_array("13", $priveledges)){ ?>
                      <li>
                                            <a href="<?php echo base_url('Admin/Listcategory2');?>">
                                            List Category

                                    </a>

                                        </li>
                      <?php } } ?>                
                                      
                                        <li>
                                            <a href="<?php echo base_url('Admin/Listsubcategory2');?>">

                                      List Sub Category

                                    </a>
                                        </li> 
                                    </ul>

                                </li> -->


    <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!-- <li>-->

                        <!--    <a href="<?php echo base_url('Admin/listpincode');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">List Pincode</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                      <?php }else{ ?>
                          <?php if (in_array("14", $priveledges)){ ?>
                        <!-- <li>-->

                        <!--    <a href="<?php echo base_url('Admin/listpincode');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">List Pincode</span>-->

                               

                        <!--    </a>-->

                            

                        <!--</li>-->
                      <?php } } ?> 

                      <!--<?php if($_SESSION['session_namee'] == 'admin'){ ?>
                         <li>

                            <a href="<?php echo base_url('Admin/listdiscountslab');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">List Discount Slab</span>

                               

                            </a>

                            

                        </li>
                      <?php }else{ ?>
                          <?php if (in_array("15", $priveledges)){ ?>
                        <li>

                            <a href="<?php echo base_url('Admin/listdiscountslab');?>">

                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>

                                <span class="title">List Discount Slab</span>

                               

                            </a>

                            

                        </li>
                      <?php } } ?> -->

                              
                      <!--  <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!-- <li>-->

                      <!--      <a href="<?php echo base_url('Admin/listimage');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">List Bulk Image </span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("16", $priveledges)){ ?>-->
                      <!--  <li>-->

                      <!--      <a href="<?php echo base_url('Admin/listimage');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">List Bulk Image </span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php } } ?> -->

                      <!--   <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!-- <li>-->

                      <!--      <a href="<?php echo base_url('Admin/review');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Rating & Review</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("17", $priveledges)){ ?>-->
                      <!-- <li>-->

                      <!--      <a href="<?php echo base_url('Admin/review');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Rating & Review</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php } } ?> -->
                           
                       
                           <?php if($_SESSION['session_namee'] == 'admin'){ ?>
                        <!--<li>-->

                        <!--    <a href="<?php echo base_url('Admin/video');?>">-->

                        <!--        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                        <!--        <span class="title">Video List</span>-->

                        <!--    </a>-->

                        <!--</li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("23", $priveledges)){ ?>-->
                      <!-- <li>-->

                      <!--      <a href="<?php echo base_url('Admin/video');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Video List</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php } } ?>           -->
                      <!--   <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--    <li>-->

                      <!--      <a href="<?php echo base_url('Admin/Broucher');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Broucher List</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("24", $priveledges)){ ?>-->
                      <!--    <li>-->

                      <!--      <a href="<?php echo base_url('Admin/Broucher');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Broucher List</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->
                      <!--<?php } } ?> -->
                      <!--<?php if($_SESSION['session_namee']=='admin'){ ?>    -->
                      <!--<li>-->
                      <!--      <a href="<?php echo base_url('Admin/excelsheet');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Excel Sheet List</span>-->

                               

                      <!--      </a></li>-->
                      <!--    <?php  }else{ ?>-->
                      <!--    <?php if (in_array("25", $priveledges)){ ?>-->
                      <!--    <li>-->

                      <!--         <a href="<?php echo base_url('Admin/excelsheet');?>">-->

                      <!--          <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>-->

                      <!--          <span class="title">Excel Sheet List</span>-->

                               

                      <!--      </a>-->

                            

                      <!--  </li>-->

                      <!--       <?php } } ?>-->
                      <!--          <li>-->

                      <!--              <a href="javascript:void(0)" class="slide_menu" >-->
                      <!--                Promotion <i class="glyphicon glyphicon-menu-down menu_toggle"></i>-->
                      <!--              </a>-->
                                    
                      <!--              <ul class="inner_menu">-->

                      <!--         <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--<li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Promotioncategory');?>">-->
                      <!--                      Promotion Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("26", $priveledges)){ ?>-->
                      <!--    <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Promotioncategory');?>">-->
                      <!--                      Promotion Category-->

                      <!--              </a>-->

                      <!--                  </li>-->
                      <!--<?php } } ?>   -->
                      <!--        <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--<li>-->
                      <!--                       <a href="<?php echo base_url('Admin/Promotionproduct');?>">-->
                      <!--                      Promotion Product-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("27", $priveledges)){ ?>-->
                      <!--  <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/Promotionproduct');?>">-->
                      <!--                      Promotion Product-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?> -->
                      <!--              </ul>-->
                                    
                         
                                            <!--<?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--<li>-->
                      <!--                       <a href="<?php echo base_url('Admin/Listsidebanner');?>">-->
                      <!--                      Side banner List-->

                      <!--              </a>-->
                      <!--                  </li>-->
                                    <!--    <li>-->
                                    <!--         <a href="<?php echo base_url('Admin/addsidebanner');?>">-->
                                    <!--       Side banner Add-->

                                    <!--</a>-->
                                    <!--    </li>-->
                                        
                                    <!--    <li>-->
                                    <!--         <a href="<?php echo base_url('Admin/Listhome_deals');?>">-->
                                    <!--      Home Page Category-->

                                    <!--</a>-->
                                    <!--    </li>-->
                      <?php } ?>  
                                </li>
                      <!--            <li>-->

                      <!--              <a href="javascript:void(0)" class="slide_menu">-->
                      <!--               CMS<i class="glyphicon glyphicon-menu-down menu_toggle"></i>-->
                      <!--              </a>-->
                                    
                      <!--              <ul class="inner_menu">-->

                      <!--   <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--     <li>-->
                      <!--      <a href="<?php echo base_url('Admin/faq');?>">-->
                      <!--      FAQ-->
                      <!--      </a>-->

                      <!--  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("2", $priveledges)){ ?>-->
                      <!--        <li>-->
                      <!--      <a href="<?php echo base_url('Admin/faq');?>">-->
                      <!--      FAQ-->
                      <!--      </a>-->

                      <!--  </li>-->
                      <!--<?php } } ?>               -->
                      <!--    <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--    <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/terms');?>">-->

                      <!--                Terms And Conditions-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("3", $priveledges)){ ?>-->
                      <!--        <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/terms');?>">-->

                      <!--                Terms And Conditions-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?>   -->
                      <!--        <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--    <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/returns');?>">-->

                      <!--                Return Policy-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("4", $priveledges)){ ?>-->
                      <!--        <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/returns');?>">-->

                      <!--                Return Policy-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?>          -->
                      <!--          <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--   <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/about');?>">-->

                      <!--                About-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("5", $priveledges)){ ?>-->
                      <!--       <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/about');?>">-->

                      <!--                About-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?>                   -->
                                       
                      <!-- <?php if($_SESSION['session_namee'] == 'admin'){ ?>-->
                      <!--                 <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/shoppingguide');?>">-->

                      <!--              Shopping Guide-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php }else{ ?>-->
                      <!--    <?php if (in_array("6", $priveledges)){ ?>-->
                      <!--                     <li>-->
                      <!--                      <a href="<?php echo base_url('Admin/shoppingguide');?>">-->

                      <!--              Shopping Guide-->

                      <!--              </a>-->
                      <!--                  </li>-->
                      <!--<?php } } ?>               -->
                      <!--                  </ul>-->

                      <!--          </li>-->
                     
                     
                 </ul>
                    <!-- END SIDEBAR MENU -->

                </div>

            </section>

            <!-- /.sidebar -->
<style type="text/css">
.skin-josh .sidebar li ul {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-in-out;
    -webkit-transition: max-height 0.5s ease-in-out;
    -o-transition: max-height 0.5s ease-in-out;
    -ms-transition: max-height 0.5s ease-in-out;
    -moz-transition: max-height 0.5s ease-in-out;
}
.skin-josh .sidebar li ul.active{
    max-height: 100%;
    transition: max-height 0.5s ease-in-out;
    -webkit-transition: max-height 0.5s ease-in-out;
    -o-transition: max-height 0.5s ease-in-out;
    -ms-transition: max-height 0.5s ease-in-out;
    -moz-transition: max-height 0.5s ease-in-out;
}
.skin-josh .sidebar .page-sidebar-menu > li {
    position: relative;
}
.menu_toggle{
position: absolute;
    right: 0;
    top: 10px;
    font-size: 10px;
    z-index: 1000;
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    cursor: pointer;
}
.active.glyphicon-menu-down:before{
    content: "\e260" !important;
}
.sidebar {
    width: 100%;
}
</style>
        </aside>