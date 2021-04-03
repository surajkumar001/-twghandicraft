<?php

//pr($message);die;

include('header.php');

include('sidebar.php');



?>

 <aside class="right-side">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Stock List</h1>

                <ol class="breadcrumb">

                    <li>

                        <a href="<?php echo base_url('Admin/Dashboard')?>">

                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="#">Stock</a>

                    </li>

                    <li class="active">Stock List</li>

                </ol>

            </section>

            <!-- Main content -->

            <section class="content paddingleft_right15">

                <div class="row">

                    <div class="panel panel-primary filterable">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Stock List

                            </h4>

                        </div>

                        <br />

                        <div class="panel-body" style="overflow-x: auto;">

                            <table class="table table-striped table-bordered" id="table1">

                                <thead>

                                    <tr >
                                        <th>S.no</th>

                                        <th>Product ID </th>
                                        <th>Product Sku code</th>
                                        <th>Product Name</th>

                                        
                                        <th>Parent Category</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>

                                        <th>Availability</th>

                                      

                                       

                                        

                                       

                                    </tr>

                                </thead>

                                

                                <tbody>

                                    <?php $i=1; foreach ($messages as  $value) {

                                    ?>

                                    <tr><td><?= $i++?></td>

                                        <td><?=$value['product_id'];?></td>

                                        <td><?=$value['product_code'];?></td>

                                        <td><?=$value['product_name'];?></td>
                                        <td><?=$value['p_cat_name'];?></td>
                                        <td><?=$value['catname'];?></td>
                                        <td><?=$value['subcat'];?></td>

                                        <td>

                                            <?=$value['availability'];?>

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
