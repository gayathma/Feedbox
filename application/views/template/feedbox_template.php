<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Feedbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<link href="<?php echo base_url(); ?>application_resources/css/datepicker.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>application_resources/css/template.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>application_resources/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Wizard -->
    <link href="<?php echo base_url(); ?>application_resources/css/gsdk-base.css" rel="stylesheet" media="screen">

<link href="<?php echo base_url(); ?>application_resources/css/animate.css" rel="stylesheet" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript"
            src="<?php echo base_url(); ?>application_resources/js/jquery-1.10.2.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url(); ?>application_resources/js/bootstrap.min.js"></script>

    <!--   plugins 	 -->
    <script src="<?php echo base_url(); ?>application_resources/js/jquery.bootstrap.wizard.js"
            type="text/javascript"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="<?php echo base_url(); ?>application_resources/js/jquery.validate.min.js"></script>

    <!--  methods for manipulating the wizard and the validation -->
    <script src="<?php echo base_url(); ?>application_resources/js/wizard.js"></script>
<script src="<?php echo base_url(); ?>application_resources/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application_resources/js/custom.js"></script>

    <script type="text/javascript">

        var base_url = '<?php echo base_url(); ?>';
        var site_url = base_url + 'index.php/' + '<?php echo $this->lang->lang(); ?>';
        var user_site_url = base_url + '<?php echo $this->lang->lang(); ?>';

    </script>

</head>

<body>
<div>
    <div class="container-fluid">
        <div id="main_content">
            <?php echo $content; ?>
        </div>
    </div>
    <script type="text/javascript">

        jQuery(document).ready(function($){
            // browser window scroll (in pixels) after which the "back to top" link is shown
            var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
            //duration of the top scrolling animation (in ms)
                scroll_top_duration = 700,
            //grab the "back to top" link
                $back_to_top = $('.cd-top');

            //hide or show the "back to top" link
            $(window).scroll(function(){
                ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
                if( $(this).scrollTop() > offset_opacity ) {
                    $back_to_top.addClass('cd-fade-out');
                }
            });

            //smooth scroll to top
            $back_to_top.on('click', function(event){
                event.preventDefault();
                $('body,html').animate({
                        scrollTop: 0
                    }, scroll_top_duration
                );
            });

$('#patient_admission_date').datepicker({
               autoclose:"true",
    format: 'yyyy-mm-dd'
            });
$('#patient_discharge_date').datepicker({
    autoclose:"true",
    format: 'yyyy-mm-dd'
});

        });
    </script>
</body>
</html>
