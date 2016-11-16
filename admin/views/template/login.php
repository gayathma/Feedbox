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
        <!--toastr-->
        <link href="<?php echo base_url(); ?>admin_resources/temp/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">
        <header class="header">
            <a class="logo">Feedbox</a>
            <a class="logout" onclick="show_login()">Log in</a>
        </header>

        <div class="container">
            <div id="form_div">
                <form class="form-signin">
                    <h2 class="form-signin-heading">Feedback</h2>

                    <h1 class="form-signin-heading-sub">Capture awesomely</h1>

                    <div class="login-wrap">

                        <button type="button" class="btn btn-lg btn-login btn-block" onclick="show_login()">Create a form</button>

                    </div>
                </form>
            </div>

            <div id="login_div" style="display: none">
                <form class="form-signin" id="login_form" name="login_form" method="POST">
                    <h2 class="form-signin-heading">Feedback</h2>

                    <h1 class="form-signin-heading-sub">Capture awesomely</h1>

                    <div class="login-wrap">
                        <div >
                            <input id="txtusername" name="txtusername" type="text" class="form-control" placeholder="Username" autofocus>
                            <input id="txtpassword" name="txtpassword" type="password" class="form-control" placeholder="Password">

                        </div>
                        <button type="submit" class="btn btn-lg btn-sign-in btn-block" onclick="login()">Sign In</button>

                    </div>
                </form>
            </div>
        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>admin_resources/temp/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>admin_resources/temp/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin_resources/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>admin_resources/toastr-master/toastr.js"></script>

    </body>
</html>


<script type="text/javascript">

                            var base_url = '<?php echo base_url(); ?>';
                            var site_url = base_url + 'admin.php';


                            $(document).ready(function() {
                                $("#login_form").validate({
                                    focusInvalid: false,
                                    ignore: "",
                                    rules: {
                                        txtusername: "required",
                                        txtpassword: "required"
                                    }, submitHandler: function(form) {
                                    }
                                });
                            });

                            function show_login() {
                                $('#login_div').show();
                                $('#form_div').remove();
                            }

                            function login() {
                                var login_username = $('#txtusername').val();
                                var login_password = $('#txtpassword').val();

                                if ($('#login_form').valid()) {

                                    $.ajax({
                                        type: "POST",
                                        url: site_url + '/login/authenticate_user',
                                        data: "login_username=" + login_username + "&login_password=" + login_password,
                                        success: function(msg) {

                                            if (msg == 1) {
                                                setTimeout("location.href = site_url+'/login/load_login';", 100);
                                            } else {
                                                login_form.reset();
                                                toastr.error("Invalid Login details...", "Feedbox");
                                            }
                                        }
                                    });
                                }
                            }
</script>