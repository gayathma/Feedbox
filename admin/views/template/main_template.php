<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Hemas">
    <meta name="keyword" content="Feedbox">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/temp/img/favicon.html">

    <title>Feedbox</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>admin_resources/temp/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_resources/temp/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>admin_resources/temp/assets/font-awesome/css/font-awesome.css"
          rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>admin_resources/temp/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_resources/temp/css/style-responsive.css" rel="stylesheet"/>

    <!--dynamic table-->
    <link href="<?php echo base_url(); ?>admin_resources/temp/assets/advanced-datatable/media/css/demo_page.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>admin_resources/temp/assets/advanced-datatable/media/css/demo_table.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_resources/temp/assets/data-tables/DT_bootstrap.css"/>

    <!--toastr-->
    <link href="<?php echo base_url(); ?>admin_resources/temp/assets/toastr-master/toastr.css" rel="stylesheet"
          type="text/css"/>

    <link href="<?php echo base_url(); ?>admin_resources/temp/css/animate.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>admin_resources/css/datepicker.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_resources/dist/sweetalert.css">


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>admin_resources/temp/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/temp/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/temp/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/toastr-master/toastr.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(
    ); ?>admin_resources/temp/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>

    <script src="<?php echo base_url(); ?>admin_resources/dist/clipboard.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/js/form-builder.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/js/form-render.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>admin_resources/js/jscolor.js"></script>
    <!-- This is what you need -->
    <script src="<?php echo base_url(); ?>admin_resources/dist/sweetalert-dev.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

        var base_url = '<?php echo base_url(); ?>';
        var site_url = base_url + 'admin.php';

    </script>
</head>

<body class="login-body">
<header class="header">
    <a class="logo" href="<?php echo site_url(); ?>/login/load_login">Feedbox</a>

    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle-a" href="#">
                    <i class="fa fa-user"></i>

                    <span class="username"><?php echo ucfirst($this->session->userdata('USER_NAME')); ?></span>
                    <b class="caret"></b>
                </a>

              


                <ul class="dropdown-menu" role="menu" >
                    <div class="log-arrow-up"></div>
                    <?php if ($this->session->userdata('USER_TYPE') != '3') { ?>
                    <li><a href="<?php echo site_url(); ?>/users/manage_users"><i
                                class=" fa fa-suitcase"></i>Users</a></li>
                    <?php } ?>
                    <?php if ($this->session->userdata('USER_TYPE') == '1') { ?>
                        <li><a href="<?php echo site_url(); ?>/locations/manage_locations"><i
                                    class="fa fa-location-arrow"></i> Locations</a></li>
                    <?php
                    }
                    if ($this->session->userdata('USER_TYPE') != '1') {
                        ?>
                        <li><a href="<?php echo site_url(); ?>/reports/report_dashboard"><i class="fa fa-align-justify"></i> Reports</a></li>
                    <?php } ?>
                    <li><a href="<?php echo site_url(); ?>/login/logout"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>

<div id="container">
    <div id="main-content">
        <div class="wrapper">
            <?php echo $content;?>
        </div>
    </div>

</div>
<script>
$(document).ready(function(){
    $(".dropdown-toggle-a").dropdown();
});
</script>

</body>
</html>
