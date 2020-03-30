<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <?php
        header_remove("X-Powered-By"); 
        ?>
        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

       
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jitu.css"/>
        <script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="javascript:void(0)" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Test Admin
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->session->userdata['logged_in']['f_name'] . " " . $this->session->userdata['logged_in']['l_name'] ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li class="divider"></li>
                                 <li>
                                 <?php
                                   $user_id =  $this->session->userdata['logged_in']['user_id'];
                                 ?>
                                    <a href="<?php echo base_url() ?>admin/home/blog_user/<?php echo base64_encode($user_id)?>">
                                       <i class="fa fa-key" aria-hidden="true"></i>

                                        Change Password
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('admin/login/logout'); ?>">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {
                    }
                </script>


                <?php
                $uri = $this->uri->segment(3);
                $blog = array("blog_slider", "blog_posts", "category", "blog_comments", "blog_user");
                ?>
                <ul class="nav nav-list">
                    
                    <li class="<?php echo in_array($uri, $blog) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Blog </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>


                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'category' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/category'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Category
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'blog_posts' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/blog_posts'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Posts
                                </a>

                                <b class="arrow"></b>
                            </li>

                          

                            <li class="<?php echo $uri == 'blog_comments' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/blog_comments'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Post Comments
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'blog_user' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/blog_user'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Blog User
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>