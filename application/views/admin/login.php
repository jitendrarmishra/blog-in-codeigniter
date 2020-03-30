<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Login Page - Admin</title>
<?php
        header_remove("X-Powered-By"); 
        ?>

<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- text fonts -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
<![endif]-->

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body class="login-layout">
    
    <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
            <div class="center">
            <h1>
            <i class="ace-icon fa fa-leaf green"></i>
            <span class="red">Assignment</span>
            </h1>
            </div>

            <div class="space-6"></div>

            <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
            <div class="widget-body">
            <div class="widget-main">
            <h6 class="header blue lighter bigger">
            <?php echo validation_errors(); ?>
            <span style="color:red">

            <?php
            if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            }
            ?>
            </span>
           
            </h6>

            <div class="space-6"></div>

            <form action="<?php echo site_url('admin/login/check'); ?>" method="post" autocomplete="off">
            <fieldset>
            <label class="block clearfix">
            <span class="block input-icon input-icon-right">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            <input class="form-control" tabindex="1" autocomplete="off" placeholder="Username"  name="email" id="username" type="text" required="">
            <i class="ace-icon fa fa-user"></i>
            </span>
            </label>

            <label class="block clearfix">
            <span class="block input-icon input-icon-right">


            <input class="form-control" tabindex="2" autocomplete="off" placeholder="********" name="password" id="password" type="password" required>
            <i class="ace-icon fa fa-lock"></i>
            </span>
            </label>


            <label class="block clearfix">
            <span class="block input-icon input-icon-right">


            <p><span id="captImg"><?php echo $captchaImg; ?></span> Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>

            <!--  <input class="form-control" tabindex="2" autocomplete="off" placeholder="********" name="password" id="password" type="password">
            <i class="ace-icon fa fa-lock"></i> -->
            </span>
            </label>



            <label class="block clearfix">
            <span class="block input-icon input-icon-right">


            <input required class="form-control" tabindex="2" autocomplete="off"  name="captcha"  type="text">
            <i class="ace-icon fa fa-lock"></i>
            </span>
            </label>

            <div class="space"></div>

            <div class="clearfix">
            <!--                                                        <label class="inline">



            <input type="checkbox" class="ace" />
            <span class="lbl"> Remember Me</span>
            </label>-->


            <button type="submit" name="submit" value='submit' class="width-35 pull-right btn btn-sm btn-primary">
            <i class="ace-icon fa fa-key"></i>
            <span class="bigger-110">Login</span>
            </button>
            </div>

            <div class="space-4"></div>
            </fieldset>
            </form>



<div class="space-6"></div>

</div>


<!-- /.widget-main -->
 <div class="toolbar clearfix">
<div>
<a href="#" data-target="#forgot-box" class="forgot-password-link">
<i class="ace-icon fa fa-arrow-left"></i>
I forgot my password
</a>
</div>


</div>
</div><!-- /.widget-body -->
</div><!-- /.login-box -->

                                <div id="forgot-box" class="forgot-box widget-box no-border">
<div class="widget-body">
<div class="widget-main">
<h4 class="header red lighter bigger">
<i class="ace-icon fa fa-key"></i>
Retrieve Password
</h4>

<div class="space-6"></div>
<p>
Enter your email and to receive instructions
</p>

<form method="post" action="<?php echo site_url('admin/login/forgot_password') ?>">
<fieldset>
<label class="block clearfix">
<span class="block input-icon input-icon-right">
<input type="email" class="form-control" required="" placeholder="Email" name="email"/>
<i class="ace-icon fa fa-envelope"></i>
</span>
</label>

<label class="block clearfix">
            <span class="block input-icon input-icon-right">


            <p><span id="captImg"><?php echo $captchaImg; ?></span> Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.</p>

            <!--  <input class="form-control" tabindex="2" autocomplete="off" placeholder="********" name="password" id="password" type="password">
            <i class="ace-icon fa fa-lock"></i> -->
            </span>
            </label>



            <label class="block clearfix">
            <span class="block input-icon input-icon-right">


            <input required class="form-control" tabindex="2" autocomplete="off"  name="captcha"  type="text">
            <i class="ace-icon fa fa-lock"></i>
            </span>
            </label>

<div class="clearfix">
<button type="submit" name="submit" value="submit" class="width-35 pull-right btn btn-sm btn-danger">
<i class="ace-icon fa fa-lightbulb-o"></i>
<span class="bigger-110">Send Me!</span>
</button>
</div>
</fieldset>
</form>
</div> 

<div class="toolbar center">
<a href="#" data-target="#login-box" class="back-to-login-link">
Back to login
<i class="ace-icon fa fa-arrow-right"></i>
</a>
</div>
</div> 
</div> 



            </div><!-- /.position-relative -->

 
            </div>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->


    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
    document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
    jQuery(function ($) {
    $(document).on('click', '.toolbar a[data-target]', function (e) {
    e.preventDefault();
    var target = $(this).data('target');
    $('.widget-box.visible').removeClass('visible');//hide others
    $(target).addClass('visible');//show target
    });
    });



    //you don't need this, just used for changing background
    jQuery(function ($) {
    $('#btn-login-dark').on('click', function (e) {
    $('body').attr('class', 'login-layout');
    $('#id-text2').attr('class', 'white');
    $('#id-company-text').attr('class', 'blue');

    e.preventDefault();
    });
    $('#btn-login-light').on('click', function (e) {
    $('body').attr('class', 'login-layout light-login');
    $('#id-text2').attr('class', 'grey');
    $('#id-company-text').attr('class', 'blue');

    e.preventDefault();
    });
    $('#btn-login-blur').on('click', function (e) {
    $('body').attr('class', 'login-layout blur-login');
    $('#id-text2').attr('class', 'white');
    $('#id-company-text').attr('class', 'light-blue');

    e.preventDefault();
    });

    });
    </script>
    <script>
    $(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
    $.get('<?php echo base_url().'home/refresh'; ?>', function(data){
    $('#captImg').html(data);
    });
    });

    });
    </script>
</body>
</html>