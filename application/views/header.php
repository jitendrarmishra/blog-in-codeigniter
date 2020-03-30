<!DOCTYPE html>
<html>

<head>
    <?php
    if(!empty($title)) 
    { ?>
        <title><?php echo $title ?></title>
   <?php 
    }
    else
    {?>
        <title>Welcome To Website</title>
    <?php
    }
    ?>

    <?php
    if(!empty($description)) 
    { ?>
        
        <meta name="description" content="<?php echo $description ?><">
   <?php 
    }
    else
    {?>
        <meta name="description" content="">
    <?php
    }
    ?>

    <?php
    if(!empty($keyword)) 
    { ?>
        <meta name="keyword" content="<?php echo $title ?>">
   <?php 
    }
    else
    {?>
       <meta name="keyword" content="">
    <?php
    }
    ?>
    
    
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    <!-- css file load -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>vendor/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>vendor/font-awesome/font-awesome.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>vendor/wow/animate.min.css" type="text/css" />
   
    <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/main.css" type="text/css">
    </head>

<body>

   
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-condensed" href="<?php echo base_url() ?>">
                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mt-2">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>blog">Blog</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  
                    <li class="nav-item">
                        <?php
                        if(isset($this->session->userdata['logged_in']['register_id']))
                        {?>
                            <a class="nav-link" href="<?php echo site_url('login/logout') ?>" target="_new" title="Login">Logout</a>
                        <?php
                        }
                        else
                        {  ?>
                            <a class="nav-link" href="<?php echo site_url('login') ?>" target="_new" title="Login">Login <i class="fas fa-lock fa-fw"></i></a>
                        <?php
                        }
                        ?>
                        
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>