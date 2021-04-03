<!DOCTYPE html>

<html>



<head>

    <meta charset="UTF-8">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/fav3.jpg"/>

    <title>TWG Handicraft</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

    <!-- global css -->

    <link href="<?php echo base_url();?>admin/css/app.css" rel="stylesheet" type="text/css" />

    <!-- end of global css -->

    <!--page level css -->

    <link href="<?php echo base_url();?>admin/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>admin/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" media="all" href="<?php echo base_url();?>admin/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>admin/vendors/animate/animate.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">

     <link href="<?php echo base_url();?>admin/vendors/daterangepicker/css/daterangepicker.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url();?>admin/css/pages/only_dashboard.css" />

    <!--end of page level css-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/dataTables.bootstrap.css" />

    <link href="<?php echo base_url();?>admin/css/pages/tables.css" rel="stylesheet" type="text/css" />



    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/buttons.bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/colReorder.bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/dataTables.bootstrap.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/rowReorder.bootstrap.css">

    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin/vendors/datatables/css/scroller.bootstrap.css" />

  <?php      $logo  = $this->db->get_where('cms', array('id' => 9 ,))->row() ;
?>
<link rel="icon" href="<?= $logo->terms ;?>" type="image/gif" sizes="16x16">


</head>



<body class="skin-josh">

    <header class="header">

        <a href="<?php echo base_url('Admin/Dashboard');?>" class="logo">

          <!--   <img src="<?php echo base_url();?>admin/img/logo.png" style="    width: 75%;"> -->

        </a>

        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->

           

               <!--  <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
 -->
                    <div class="responsive_nav"></div>

                </a>

            

            <div class="navbar-right">

                <ul class="nav navbar-nav">

                  

                  

                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                           

                            <div class="riot">

                                <div>

                                   TWG Handicraft

                                    <span>

                                        <i class="caret"></i>

                                    </span>

                                </div>

                            </div>

                        </a>

                        <ul class="dropdown-menu">

                            <!-- User image -->

                           

                            <!-- Menu Body -->

                            

                            <!-- Menu Footer-->

                            <li class="user-footer">

                               

                                <div class="text-center">

                                    <a href="<?php echo base_url('Admin/logouts');?>">

                                        <i class="livicon" data-name="sign-out" data-s="18"></i> Logout

                                    </a>

                                </div>

                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </nav>

    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">