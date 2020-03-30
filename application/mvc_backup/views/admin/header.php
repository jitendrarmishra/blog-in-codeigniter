<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Admin Panel - Cherlys</title>

        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/ace-skins.min.css"/>
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/ace-rtl.min.css"/>
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/jitu.css"/>
        <!--<link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/sample.css"/>-->
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo $this->config->item('assets'); ?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
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
                            Cherly's Admin
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo $this->config->item('assets'); ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->session->userdata['logged_in']['f_name'] . " " . $this->session->userdata['logged_in']['l_name'] ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li class="divider"></li>

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
                $home = array("salon_locator","center_details","center_city", "insta_points", "insta_services", "innovative_treatments", "education_show", "education_show_slider", "contact_us_form_data", "faqs_form_data", "courses_offered", "courses_offered_lists", "our_reach", "media", "expert_speak_qa", "experts_speak", "index", "happy_customers", "singup", "Topmenu", "expert_faq");
                $menu = array("causes", "concern", "ingredients", "services", "services_happy_customers", "service_product", "service_product_page", "steps", "faq", "happy_customers_product");
                $concern = array("concern_ingredients", "concern_steps", "concern_faq", "causes", "concern", "category", "sub_category", "concern_product", "concern_product_page");
                $centers = array("center_city", "center_details", "center_gallery");
                $homecare = array("homecare_happy_customers", "homecare_ingredients_photos", "homecare_benefits", "homecare_concern", "homecare_ingredients_list", "homecare", "happy_customers_homecare", "homecare_product", "homecare_product_page", "homecare_steps", "homecare_faq");
                $faq = array("faqs", "faqs_category");
                $flagship = array("flagship_experience", "flagship_slider", "why_flagship", "flagship_store");
                $blog = array("blog_slider", "blog_posts", "category", "blog_comments", "blog_user");
                ?>
                <ul class="nav nav-list">
                    <li class="<?php echo in_array($uri, $home) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> CMS Page </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
<!--                            <li class="<?php echo $uri == 'Topmenu' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/Topmenu'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Top Menu
                                </a>

                                <b class="arrow"></b>
                            </li>-->
                            <li class="<?php echo $uri == 'center_city' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/center_city'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add City
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'happy_customers' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/happy_customers'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Happy Customers
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'expert_faq' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/expert_faq'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Expert FAQ
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'experts_speak' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/experts_speak'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Expert Speak
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'media' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/media'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Media
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'our_reach' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/our_reach'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Our Reach
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'courses_offered' ? "active" : '' ?> <?php echo $uri == 'courses_offered_lists' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/courses_offered'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Courses Offered
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'education_show' ? "active" : '' ?> <?php echo $uri == 'education_show_slider' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/education_show'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Education Shows
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'innovative_treatments' ? "active" : '' ?> <?php echo $uri == 'insta_services' ? "active" : '' ?> <?php echo $uri == 'insta_points' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/innovative_treatments'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Innovative treatments
                                </a>
                                <b class="arrow"></b>
                            </li>

                            
                            <li class="<?php echo $uri == 'center_details' ? "active" : '' ?> <?php echo $uri == 'center_gallery' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/center_details'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Training Centers
                                </a>

                                <b class="arrow"></b>
                            </li>
                             <li class="<?php echo $uri == 'salon_locator' ? "active" : '' ?> <?php echo $uri == 'center_gallery' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/salon_locator'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Salon locator
                                </a>

                                <b class="arrow"></b>
                            </li>




                            <li class="<?php echo $uri == 'singup' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/singup'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sign Up
                                </a>

                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'faqs_form_data' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/faqs_form_data'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    FAQ Form Data
                                </a>

                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'contact_us_form_data' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/contact_us_form_data'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Contact Us Form Data
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <?php $b_support = array("business_insta_wow", 'business_bottom_slider', 'business_support', 'business_support_slider', "business_advantage", "business_promotions"); ?>

                    <li class="<?php echo in_array($uri, $b_support) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Business support</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'business_support' ? "active" : '' ?> <?php echo $uri == 'insta_services' ? "active" : '' ?> <?php echo $uri == 'insta_points' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_support'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Page Text
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'business_support_slider' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_support_slider'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Top Slider
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'business_advantage' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_advantage'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Advantage
                                </a>

                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'business_promotions' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_promotions'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Promotions
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'business_insta_wow' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_insta_wow'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Insta Wow
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'business_bottom_slider' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/business_bottom_slider'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Bottom Slider
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>

<!--                    <li class="<?php echo in_array($uri, $centers) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Training Centers </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'center_city' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/center_city'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add City
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'center_details' ? "active" : '' ?> <?php echo $uri == 'center_gallery' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/center_details'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Training Centers
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>-->

                    <li class="<?php echo in_array($uri, $flagship) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Flagship </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'flagship_slider' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/flagship_slider'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Flagship Slider
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'why_flagship' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/why_flagship'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Why Flagship
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'flagship_experience' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/flagship_experience'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Flagship Experience
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'flagship_store' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/flagship_store'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Flagship Store
                                </a>

                                <b class="arrow"></b>
                            </li>


                        </ul>
                    </li>


                    <li class="<?php echo in_array($uri, $blog) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Blogs </span>
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

                            <li class="<?php echo $uri == 'blog_slider' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/blog_slider'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Blog Slider
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

                    <li class="<?php echo in_array($uri, $faq) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> FAQS </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'faqs_category' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/faqs_category'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add FAQ Category
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'faqs' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/faqs'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add FAQ
                                </a>

                                <b class="arrow"></b>
                            </li>


                        </ul>
                    </li>



                    <li class="<?php echo in_array($uri, $menu) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text">Salon Services </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'services' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/services'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salon Category
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'concern' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/concern'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salon Concern
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'service_product' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/service_product'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salon Products
                                </a>
                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'service_product_page' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/service_product_page'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salon Product Inner Page
                                </a>
                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'services_happy_customers' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/services_happy_customers'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salon Happy Customer
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

<!--                    <li class="<?php echo in_array($uri, $concern) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text">Salon Concern </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">

                            <li class="<?php echo $uri == 'concern' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/concern'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Concern
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'concern_product' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/concern_product'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Concern Products
                                </a>
                                <b class="arrow"></b>
                            </li>


                            <li class="<?php echo $uri == 'concern_product_page' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/concern_product_page'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Product Inner page
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'category' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/category'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Category
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'sub_category' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/sub_category'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Category Menu
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>-->

                    <li class="<?php echo in_array($uri, $homecare) ? "open" : "" ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Homecare </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="<?php echo $uri == 'homecare' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/homecare'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Homecare Category
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'homecare_concern' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/homecare_concern'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Homecare Concern
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="<?php echo $uri == 'homecare_product' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/homecare_product'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Homecare Products
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="<?php echo $uri == 'homecare_happy_customers' ? "active" : '' ?>">
                                <a href="<?php echo site_url('admin/home/homecare_happy_customers'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Homecare Happy Customers
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>