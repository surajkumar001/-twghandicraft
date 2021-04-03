<!DOCTYPE html>
<html>

<head>
    <title>ArtnHub Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('admin/css/bootstrap.min.css');?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/css/pages/login.css');?>" />
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="<?php echo base_url('Admin/admin_login');?>" autocomplete="on" method="post">
                                <h3 class="black_bg">
                                   <!--  <img src="<?php echo base_url('/admin/img/logo.png');?>" style="width: 100%;" > -->
                                    <br>Log in</h3>
                                <p>
                                    <label style="margin-bottom:0px;" for="username" class="uname"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        E- mail or Username
                                    </label>
                                    <input id="username" name="username" required type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" placeholder="username or e-mail" />
                                </p>
                                <p>
                                    <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Password
                                    </label>
                                    <input id="password" name="password" required type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="eg. X8df!90EO" />
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Login" class="btn btn-success" />
                                </p>
                                <p class="change_link">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="<?php echo base_url('admin/s/jquery-1.11.1.min.js');?>" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('admin/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo base_url('admin/vendors/livicons/minified/raphael-min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('admin/vendors/livicons/minified/livicons-1.4.min.js');?>" type="text/javascript"></script>
   <script src="<?php echo base_url('admin/js/josh.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('admin/js/metisMenu.js');?>" type="text/javascript"> </script>
    <script src="<?php echo base_url('admin/vendors/holder-master/holder.js');?>" type="text/javascript"></script>
    <!-- end of global js -->
</body>
</html>
