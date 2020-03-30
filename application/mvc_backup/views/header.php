<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <?php
        if (!empty($title) && !empty($description) && !empty($keyword)) {
            ?>
            <title><?php echo $title ?></title>
            <meta name="description" content="<?php echo $description ?>"/>
            <meta name="keywords" content="<?php echo $keyword ?>"/>
            <?php
        } else {
            ?>
            <title>Welcome to cheryls's</title>
            <meta name="description" content="Welcome to cheryls's"/>
            <meta name="keywords" content="Welcome to cheryls's"/>


            <?php
        }
        ?>
        <!--[if lt IE 9]>
        <script src="./assets/javascripts/html5.js"></script>
        <![endif]-->

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/css/style.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/css/slick.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/css/slick-theme.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/css/jquery.fancybox.min.css" />
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/assets/stylesheets/demo.css" />
        <!--[if (gt IE 8) | (IEMobile)]><!-->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>fassets/assets/stylesheets/unsemantic-grid-responsive-tablet.css" />
        <!--<![endif]-->
        <!--[if (lt IE 9) & (!IEMobile)]>
        <link rel="stylesheet" href="./assets/stylesheets/ie.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $this->config->item('assets'); ?>assets/css/jitu.css"/>
        <script type="text/javascript">
            url = '<?php echo $this->config->item('assets'); ?>';
            function ajaxindicatorstart(text)
            {

                if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
                    jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src=' + url + 'fassets/images/ajax-loader.gif><div>' + text + '</div></div><div class="bg"></div></div>');

                }

                jQuery('#resultLoading').css({
                    'width': '100%',
                    'height': '100%',
                    'position': 'fixed',
                    'z-index': '10000000',
                    'top': '0',
                    'left': '0',
                    'right': '0',
                    'bottom': '0',
                    'margin': 'auto'
                });

                jQuery('#resultLoading .bg').css({
                    'background': '#000000',
                    'opacity': '0.7',
                    'width': '100%',
                    'height': '100%',
                    'position': 'absolute',
                    'top': '0'
                });

                jQuery('#resultLoading>div:first').css({
                    'width': '250px',
                    'height': '75px',
                    'text-align': 'center',
                    'position': 'fixed',
                    'top': '0',
                    'left': '0',
                    'right': '0',
                    'bottom': '0',
                    'margin': 'auto',
                    'font-size': '16px',
                    'z-index': '10',
                    'color': '#ffffff'

                });

                jQuery('#resultLoading .bg').height('100%');
                jQuery('#resultLoading').fadeIn(300);
                jQuery('body').css('cursor', 'wait');
            }

            function ajaxindicatorstop()
            {
                jQuery('#resultLoading .bg').height('100%');
                jQuery('#resultLoading').fadeOut(300);
                jQuery('body').css('cursor', 'default');
            }
        </script> 
    </head>
    <body>

        <div class="container">
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/loading.gif" id="loading-indicator" style="display:none" />

            <!--menu-->
            <div class="menu_box grid-100 mobile-grid-100 tablet-grid-100">
                <div class="menu_header grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="logo_box pad0 grid-10 mobile-grid-30 tablet-grid-10">
                        <a href="<?php echo $this->config->item('assets'); ?>"><img src="<?php echo $this->config->item('assets'); ?>fassets/images/logo.jpg" class="logo" alt="" /></a>
                    </div>
                    <div class="header_info_box pad0 grid-90 mobile-grid-70 tablet-grid-90">
                        <div class="menu_bar hide-on-desktop hide-on-tablet" onclick="myFunction(this)">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                        <ul class="header_ul hide-on-mobile">
                            <li class="header_li"><i class="fa ic fa-envelope-o" aria-hidden="true"></i> care@cheryls.in</li>
                            <li class="header_li"><i class="fa ic fa-phone" aria-hidden="true"></i> 0811 454 4423 / 24</li>
                        </ul>
                        <ul class="header_ul hide-on-mobile">
                            <li class="header_li"><a class="header_a" href="<?php echo site_url('salon-locator'); ?>">Salon Locator</a></li>
                            <li class="header_li"><a class="header_a hli posr" href="<?php echo site_url('flagship-store'); ?>">Flagship Store</a></li>
                            <li class="header_li"><a class="header_a" href="<?php echo site_url('contact-us'); ?>">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="menu hide-on-mobile posr grid-100 mobile-grid-100 tablet-grid-100">
                    <ul class="menu_ul">
                        <li class="menu_li">
                            <a class="menu_a" href="javascript:void(0);">SALON SERVICES <i class="fa main_menu_icon fa-angle-down" aria-hidden="true"></i></a>
                            <div class="submenu_box hide">
                                <div class="menu_left_box pad0 grid-20 mobile-grid-100 tablet-grid-20">
                                    <div class="header_box1 grid-100 mobile-grid-100 tablet-grid-100">
                                        <p class="submenu_text1">BY Concern</p>
                                    </div>
                                    <div class="mid_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <ul class="submenu_ul">
                                            <?php
                                            $salon_concern = salon_concern();
                                            foreach ($salon_concern as $row) {
                                                ?>

                                                <li class="submenu_li"><a class="submenu_a" href="<?php echo base_url() ?>salon-concern/<?php echo $row->concern_slug ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i><?php echo $row->concern_name ?></a></li>

                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="menu_right_box pad0 grid-80 mobile-grid-100 tablet-grid-80">
                                    <div class="header_box2 grid-100 mobile-grid-100 tablet-grid-100">
                                        <p class="submenu_text1">BY Category</p>
                                    </div>
                                    <div class="mid_box1 grid-100 mobile-grid-100 tablet-grid-100">

                                        <?php
                                        $salon_category = salon_category();
                                        foreach ($salon_category as $row) {
                                            $results = salon_product($row->service_id); // HELPER CONTROLLER
                                            ?>

                                            <div class="grid-20 mobile-grid-20 tablet-grid-25">
                                                <a class="submenu_a1" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>"><?php echo $row->service_name ?></a>
                                                <ul class="submenu_ul mrg_up">
                                                    <?php
                                                    foreach ($results as $r) {
                                                        ?>
                                                        <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $r->product_slug ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $r->black_text ?></a></li>

                                                        <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </div>

                                            <?php
                                            // $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_li">
                            <a class="menu_a" href="javascript:void(0);">HOMECARE PRODUCTS <i class="fa main_menu_icon fa-angle-down" aria-hidden="true"></i></a>
                            <div class="submenu_box hide">
                                <div class="menu_left_box pad0 grid-20 mobile-grid-100 tablet-grid-20">
                                    <div class="header_box1 grid-100 mobile-grid-100 tablet-grid-100">
                                        <p class="submenu_text1">BY Concern</p>
                                    </div>
                                    <div class="mid_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <ul class="submenu_ul">
                                            <?php
                                            $homecare_concern = homecare_concern();
                                            foreach ($homecare_concern as $row) {
                                                ?>
                                                <li class="submenu_li"><a class="submenu_a" href="<?php echo base_url() ?>homecare-concern/<?php echo $row->concern_slug; ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i><?php echo $row->homecare_concern_name ?></a></li>

                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="menu_right_box pad0 grid-80 mobile-grid-100 tablet-grid-80">
                                    <div class="header_box2 grid-100 mobile-grid-100 tablet-grid-100">
                                        <p class="submenu_text1">BY Category</p>
                                    </div>
                                    <div class="mid_box1 grid-100 mobile-grid-100 tablet-grid-100">

                                        <?php
                                        $homecare_category = homecare_category();
                                        foreach ($homecare_category as $row) {
                                            $result = homecare_product($row->homecare_id);
                                            ?>

                                            <div class="grid-25 mobile-grid-20 tablet-grid-25">
                                                <a class="submenu_a1" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug; ?>"><?php echo $row->homecare_category_name ?></a>
                                                <ul class="submenu_ul mrg_up">
                                                    <?php
                                                    foreach ($result as $r) {
                                                        ?>
                                                        <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $r->product_slug; ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $r->black_text ?></a></li>

                                                        <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </div>

                                            <?php
                                            // $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                        </li>
                        <li class="menu_li">
                            <a class="menu_a" href="javascript:void(0);">ABOUT CHERYL’S <i class="fa main_menu_icon fa-angle-down" aria-hidden="true"></i></a>
                            <div class="submenu_box sub_box1 hide">
                                <div class="mid_box1 m_b1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="grid-100 mobile-grid-100 tablet-grid-100">
                                        <ul class="submenu_ul">
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>our-story"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Story</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>mission-vision"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Mission & Vision</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>our-reach"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Reach</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_li"><a class="menu_a" href="javascript:void(0)">SKIN SCAN</a></li>
                        <?php $blog_category = blog_category(); ?>
                        <li class="menu_li">
                            <a class="menu_a" href="<?php echo site_url('blog') ?>">BLOG <i class="fa main_menu_icon fa-angle-down" aria-hidden="true"></i></a>
                            <div class="submenu_box sub_box2 hide">
                                <div class="mid_box1 m_b1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="grid-40 mobile-grid-100 tablet-grid-40">
                                        <ul class="submenu_ul">
                                            <?php
                                            foreach ($blog_category as $row) {
                                                ?>
                                                <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url(); ?>blog/category/<?php echo $row->category_slug ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $row->category_name ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php $blog_single_post = single_post(); ?>
                                    <div class="grid-60 mobile-grid-100 tablet-grid-60">
                                        <div class="wdh posr">
                                            <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $blog_single_post->image ?>" class="wdh" alt="" />
                                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/ft1.png" class="ft1" alt="" />
                                        </div>

                                        <div class="blog_menu_box">
                                            <p class="menu_blog_text1"><?php echo $blog_single_post->category_name ?></p>
                                            <p class="menu_blog_text1 mft"><?php echo $blog_single_post->post_title ?></p>
                                            <p class="menu_blog_text1" style="text-transform:initial;"><?php echo substr($blog_single_post->post_text, 0, 100) ?>..</p>
                                            <div style="margin:10px 0;" class="wdh"><center><a class="menu_blog_a" href="<?php echo base_url() ?>blog/<?php echo $blog_single_post->category_slug ?>/<?php echo $blog_single_post->post_slug ?>">READ MORE</a></center></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu_li">
                            <a class="menu_a" href="javascript:void(0);">FOR PROFESSIONALS <i class="fa main_menu_icon fa-angle-down" aria-hidden="true"></i></a>
                            <div class="submenu_box sub_box3 hide">
                                <div class="mid_box1 m_b1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="grid-30 mobile-grid-100 tablet-grid-30">
                                        <a class="submenu_a1" href="javascript:void(0);">EDUCATION</a>
                                        <ul class="submenu_ul mrg_up">
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>introduction"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Introduction</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>courses-offered"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Courses Offered</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>our-training-centres"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Training Centres</a></li>
                                        </ul>
                                    </div>
                                    <div class="grid-30 mobile-grid-100 tablet-grid-30">
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>education-show">EDUCATION SHOW</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>innovative-treatments">INNOVATIVE TREATMENTS</a></div>    <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>business-support">BUSINESS SUPPORT</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>experts-speaker">EXPERTS SPEAK</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>expert-faqs">EXPERT FAQS</a></div>    <br />
                                    </div>

                                    <?php
                                    $insta = insta();
                                    // print_r($insta);
                                    ?>


                                    <div class="grid-40 mobile-grid-100 tablet-grid-40">
                                        <div class="wdh posr">
                                            <img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $insta->image ?>" class="wdh" alt="" />
                                        </div>
                                        <div class="blog_menu_box">
                                            <p class="menu_blog_text1 mft">INSTA WOW</p>
                                            <p class="menu_blog_text1" style="text-transform:initial;"><?php echo $insta->bold_text ?></p>
                                            <div style="margin:10px 0;" class="wdh"><center><a class="menu_blog_a" href="<?php echo base_url() ?>innovative-treatments">READ MORE</a></center></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="search_icon menu_a hide-on-mobile hide-on-tablet" href="jacacript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="search_box hide">
                        <form action="<?php echo site_url('search'); ?>" method="post">
                            <div class="grid-80 mobile-grid-70 tablet-grid-80">
                                <input required="" type="text" class="menu_search_inpt" name="search" placeholder="Search" />
                                <input class="blog_search_img" type="image" src="<?php echo $this->config->item('assets'); ?>fassets/images/blog_search_img.jpg" alt="Submit">
                            </div>
                        </form> 
                        <div class="grid-20 mobile-grid-30 tablet-grid-20"><i class="fa search_close fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>

                <div class="mobile_menu_container hide posr hide-on-desktop hide-on-tablet grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="search_box mobile-grid-100">
                        <form action="<?php echo site_url('search'); ?>" method="post">
                            <div class="grid-80 mobile-grid-90 tablet-grid-90"><input type="text" required="" name="search" class="menu_search_inpt" placeholder="Search" /></div>
                            <div class="grid-20 mobile-grid-10 tablet-grid-10"><i class="fa mob_srch_icon fa-search" aria-hidden="true"></i></div>
                        </form>
                    </div> <br/>
                    <div class="mobile_menu_box grid-100 mobile-grid-100 tablet-grid-100">
                        <ul class="mobile_menu_ul">
                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Salon services <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> Salon services</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">By concern <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> By concern</a> <br />
                                        <ul class="mobile_menu_ul">

                                            <?php
                                            $salon_concern = salon_concern();
                                            foreach ($salon_concern as $row) {
                                                ?>
                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>salon-concern/<?php echo $row->concern_slug ?>"><?php echo $row->concern_name ?></a></li>

                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">BY CATEGORY <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> BY CATEGORY</a> <br />
                                        <ul class="mobile_menu_ul">
                                            <?php
                                            $salon_category = salon_category();
                                            foreach ($salon_category as $row) {
                                                $results = salon_product($row->service_id); // HELPER CONTROLLER
                                                ?>


                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);"><?php echo $row->service_name ?><i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                                <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                    <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> <?php echo $row->service_name ?></a> <br />
                                                    <ul class="mobile_menu_ul">
                                                        <?php
                                                        foreach ($results as $r) {
                                                            ?>
                                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $r->product_slug ?>"><?php echo $r->black_text ?></a></li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                                <?php
                                                // $i++;
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </ul>
                            </div>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">homecare products <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> homecare products</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">By concern <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> By concern</a> <br />
                                        <ul class="mobile_menu_ul">

                                            <?php
                                            $homecare_concern = homecare_concern();
                                            foreach ($homecare_concern as $row) {
                                                ?>
                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>homecare-concern/<?php echo $row->concern_slug; ?>"><?php echo $row->homecare_concern_name ?></a></li>

                                                <?php
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">BY CATEGORY <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> BY CATEGORY</a> <br />
                                        <ul class="mobile_menu_ul">
                                            <?php
                                            $homecare_category = homecare_category();
                                            foreach ($homecare_category as $row) {
                                                $results = homecare_product($row->homecare_id);
                                                ?>


                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);"><?php echo $row->homecare_category_name ?><i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                                <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                    <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> <?php echo $row->homecare_category_name ?></a> <br />
                                                    <ul class="mobile_menu_ul">
                                                        <?php
                                                        foreach ($results as $r) {
                                                            ?>
                                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $r->product_slug; ?>"><?php echo $r->black_text ?></a></li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                                <?php
                                                // $i++;
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </ul>
                            </div>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ABOUT CHERYL’S  <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> ABOUT CHERYL’S</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>our-story">Our Story</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>mission-vision">Mission & Vision</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>our-reach">Our Reach</a></li>
                                </ul>
                            </div>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/skin_scan">SKIN SCAN</a></li>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo site_url('blog') ?>">BLOG <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>

                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> BLOG</a> <br />
                                <ul class="mobile_menu_ul">
                                    <?php
                                    foreach ($blog_category as $row) {
                                        ?>
                                        <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo site_url('blog/category'); ?>/<?php echo $row->category_id ?>"><?php echo $row->category_name ?></a></li>

                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">FOR PROFESSIONALS <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> FOR PROFESSIONALS</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">EDUCATION <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> EDUCATION</a> <br />
                                        <ul class="mobile_menu_ul">
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>introduction">Introduction</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>courses-offered">Courses Offered</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>our-training-centres">Our Training Centres</a></li>
                                        </ul>
                                    </div>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>education-show">EDUCATION SHOW</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>innovative-treatments">INNOVATIVE TREATMENTS</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>business-support">BUSINESS SUPPORT</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>experts-speaker">EXPERTS SPEAK</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>expert-faqs">EXPERT FAQS</a></li>
                                </ul>
                            </div>

                        </ul>
                    </div> <br />
                    <div class="mobile_bottom_menu_box grid-100 mobile-grid-100 tablet-grid-100">
                        <ul class="header_ul">
                            <li class="header_li"><a class="header_a" href="<?php echo base_url() ?>salon-locator">Salon Locator</a></li>
                            <li class="header_li hli posr"><a class="header_a" href="<?php echo base_url() ?>flagship-store">Flagship Store</a></li>
                            <li class="header_li"><a class="header_a" href="<?php echo base_url() ?>contact-us">Contact Us</a></li>
                        </ul>
                        <ul class="header_ul">
                            <li class="header_li"><i class="fa ic fa-envelope-o" aria-hidden="true"></i> care@cheryls.in</li>
                            <li class="header_li"><i class="fa ic fa-phone" aria-hidden="true"></i> 0811 454 4423 / 24</li>
                        </ul>
                    </div>
                </div>

            </div>


