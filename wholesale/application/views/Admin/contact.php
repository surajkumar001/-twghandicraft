 <?php

//pr($message);die;

include('header.php');

include('sidebar.php');

?>

 <aside class="right-side">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Contact Detail</h1>

                <ol class="breadcrumb">

                    <li>

                        <a href="<?php echo base_url('Admin/Dashboard');?>">

                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard

                        </a>

                    </li>

                    <li>

                        <a href="#">Contact</a>

                    </li>

                    <li class="active">Contact us List</li>

                </ol>

            </section>

            <!-- Main content -->

            <section class="content paddingleft_right15">

                <div class="row">

                      <div class="panel panel-primary filterable">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Contact List

                            </h4>

                        </div>

                        <br />

                        <div class="panel-body" style="overflow-x: auto;">
                             <div class="table-responsive">

                            <table class="table table-striped table-bordered" id="table1">

                                <thead>

                                    <tr class="filters">

                                        <th>S.No</th>

                                         <th>Name</th>
                                         <th>Phone</th>
                                         <th>Email</th>
                                         <th>Subject</th>
                                         <th>Message</th>
                                         <th>Date</th>
                                         <!--<th>mailing</th>-->

                                    
                                    </tr>

                                </thead>

                                

                                <tbody>

                                    <?php $i=1; foreach ($contact as  $value) {

                                    ?>

                                    <tr>

                                        <td><?=$i;?></td>

                                            <td><?=$value['name'];?></td>
                                            <td><?=$value['phone'];?></td>
                                            <td><?=$value['email'];?></td>
                                            <td><?=$value['subject'];?></td>
                                            <td><?=$value['msg'];?></td>
                                            <!--<td><?=$value['content'];?></td>-->
                                            <td><?=$value['date'];?></td>
                                            
                                        

                                    </tr>

                                   <?php $i++; } ?>

                                  

                                   

                                </tbody>

                            </table></div>

                            <!-- Modal for showing delete confirmation -->


                        </div>

                    </div>

                </div>

                <!-- row-->

            </section>

        </aside>
<input type="hidden" id="url" value="<?php echo base_url(); ?>">
<?php

include 'footer.php';

?>
<script type="text/javascript">
    function status(id){
        
         var urls=$("#url").val();
     
        var staus = $("#"+id+"_status").val();
    

        $.ajax({
            type: "POST",
            url: urls+"Admin/active",
            data: {id:id,status:staus},
            cache: false,
            success: function(result){
            alert('Status updated');
       
             //window.location.reload();    
       
                }
            });
    }
    </script>