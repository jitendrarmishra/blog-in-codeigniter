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

    </head>
    <body>

        <div class="container">

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
                            <li class="header_li"><a class="header_a" href="<?php echo site_url('home/salon_locator'); ?>">Salon Locator</a></li>
                            <li class="header_li"><a class="header_a hli posr" href="<?php echo site_url('home/flagship_store'); ?>">Flagship Store</a></li>
                            <li class="header_li"><a class="header_a" href="<?php echo site_url('home/contact_us'); ?>">Contact Us</a></li>
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
                                                <li class="submenu_li"><a class="submenu_a" href="<?php echo base_url() ?>home/salon_concern/<?php echo base64_encode($row->concern_id); ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i><?php echo $row->concern_name ?></a></li>

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
                                                <a class="submenu_a1" href="<?php echo base_url() ?>home/salon_category/<?php echo base64_encode($row->service_id); ?>"><?php echo $row->service_name ?></a>
                                                <ul class="submenu_ul mrg_up">
                                                    <?php
                                                    foreach ($results as $r) {
                                                        ?>
                                                        <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/salon_product/<?php echo base64_encode($r->services_product_id); ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $r->black_text ?></a></li>

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
                                                <li class="submenu_li"><a class="submenu_a" href="<?php echo base_url() ?>home/homecare_concern/<?php echo base64_encode($row->homecare_concern_id); ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i><?php echo $row->homecare_concern_name ?></a></li>

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
                                                <a class="submenu_a1" href="<?php echo base_url() ?>home/homecare_category/<?php echo base64_encode($row->homecare_id); ?>"><?php echo $row->homecare_category_name ?></a>
                                                <ul class="submenu_ul mrg_up">
                                                    <?php
                                                    foreach ($result as $r) {
                                                        ?>
                                                        <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/homecare_product/<?php echo base64_encode($r->homecare_product_id); ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $r->black_text ?></a></li>

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
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/our_story"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Story</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/mission_vision"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Mission & Vision</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/our_reach"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Reach</a></li>
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


                                                <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo site_url('blog/category'); ?>/<?php echo $row->category_id ?>"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> <?php echo $row->category_name ?></a></li>
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
                                            <div style="margin:10px 0;" class="wdh"><center><a class="menu_blog_a" href="<?php echo base_url() ?>blog/blog_inner/<?php echo $blog_single_post->post_id ?>">READ MORE</a></center></div>
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
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/introduction"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Introduction</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/courses_offered"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Courses Offered</a></li>
                                            <li class="submenu_li mrg1"><a class="submenu_a" href="<?php echo base_url() ?>home/training_centres"><i class="fa submenu_i fa-angle-right" aria-hidden="true"></i> Our Training Centres</a></li>
                                        </ul>
                                    </div>
                                    <div class="grid-30 mobile-grid-100 tablet-grid-30">
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>home/education_show">EDUCATION SHOW</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>home/innovative_treatments">INNOVATIVE TREATMENTS</a></div>    <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>home/business_support">BUSINESS SUPPORT</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>home/experts_speaker">EXPERTS SPEAK</a></div>  <br />
                                        <div class="wdh"><a class="submenu_a1" href="<?php echo base_url() ?>home/expert_faqs">EXPERT FAQS</a></div>    <br />
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
                                            <div style="margin:10px 0;" class="wdh"><center><a class="menu_blog_a" href="<?php echo base_url() ?>home/innovative_treatments">READ MORE</a></center></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="search_icon menu_a hide-on-mobile hide-on-tablet" href="jacacript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="search_box hide">
                        <div class="grid-80 mobile-grid-70 tablet-grid-80"><input type="text" class="menu_search_inpt" placeholder="Search" /></div>
                        <div class="grid-20 mobile-grid-30 tablet-grid-20"><i class="fa search_close fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>

                <div class="mobile_menu_container hide posr hide-on-desktop hide-on-tablet grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="search_box mobile-grid-100">
                        <div class="grid-80 mobile-grid-90 tablet-grid-90"><input type="text" class="menu_search_inpt" placeholder="Search" /></div>
                        <div class="grid-20 mobile-grid-10 tablet-grid-10"><i class="fa mob_srch_icon fa-search" aria-hidden="true"></i></div>
                    </div> <br />
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
                                            <!-- <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Fairness</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Anti Acne</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Radiance</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Oily Skin</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Sensitive Skin Care</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Hydration</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Anti-Ageing</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Anti-Pigmentation</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Foot Care</a></li> -->
                                            <?php
                                            $salon_concern = salon_concern();
                                            foreach ($salon_concern as $row) {
                                                ?>
                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/salon_concern/<?php echo base64_encode($row->concern_id); ?>"><?php echo $row->concern_name ?></a></li>

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
                                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/salon_product/<?php echo base64_encode($r->services_product_id); ?>"><?php echo $r->black_text ?></a></li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                                <?php
                                                // $i++;
                                            }
                                            ?>
        <!--    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">BLEACH <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> bleach</a> <br />
                <ul class="mobile_menu_ul">
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Oxderm Bleach</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Oxderm Gold Bleach</a></li>
                </ul>
            </div>
             <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">CLEAN-UP <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> clean -up</a> <br />
                <ul class="mobile_menu_ul">
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SnoVite Normal To Dry</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SnoVite Oily to Combination</a></li>
                </ul>
            </div>
            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ESSENTIAL FACIALS <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> essential facials</a> <br />
                <ul class="mobile_menu_ul">
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">GloVite Facial</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">OxyBlast Facial</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">TanClear Facial</a></li>
                </ul>
            </div>
            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ADVANCED FACIALS <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> ADVANCED facials</a> <br />
                <ul class="mobile_menu_ul">
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ClariGlow Facial</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SensiGlow Facial</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">VitaLift Facial</a></li>
                </ul>
            </div>
            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">TREATMENTS <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> TREATMENTS</a> <br />
                <ul class="mobile_menu_ul">
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">DermaLitet</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">O2C2 Radiance</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">HydraMoist Facial</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ClariNzyme</a></li>
                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SensiAcne Sensitive Skin Acne Control </a></li>
                </ul>
            </div> -->
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
                                                <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/homecare_concern/<?php echo base64_encode($row->homecare_concern_id); ?>"><?php echo $row->homecare_concern_name ?></a></li>

                                                <?php
                                            }
                                            ?>
                                            <!-- <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Fairness</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Anti Acne</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Radiance</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Oily Skin</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Sensitive Skin Care</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Hydration</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Sun Protection</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Eye Care</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Foot Care</a></li> -->
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
                                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/homecare_product/<?php echo base64_encode($r->homecare_product_id); ?>"><?php echo $r->black_text ?></a></li>
                                                            <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                                <?php
                                                // $i++;
                                            }
                                            ?>



                   <!--                          <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Cleanser <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> Cleanser</a> <br />
                                                <ul class="mobile_menu_ul">
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SensiWash</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">DermaLite (FW)</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ClariWash</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Clari-Fi</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Clenzima</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Derma Cleanse</a></li>
                                                </ul>
                                            </div>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Moisturizer <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> Moisturizer</a> <br />
                                                <ul class="mobile_menu_ul">
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">SensiMoist</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">HydraMoist</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">DermaLite (FL)</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ClariMoist</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">HeelPeel Eliminator</a></li>
                                                </ul>
                                            </div>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Sunblock <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> Sunblock</a> <br />
                                                <ul class="mobile_menu_ul">
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">DermaShade (Spray)</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">DermaShade</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">TanClear Facial</a></li>
                                                </ul>
                                            </div>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Repair <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> Repair</a> <br />
                                                <ul class="mobile_menu_ul">
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">O2C2</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ClarifiAcne (Serum)</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">Clarifying Acne (Spray)</a></li>
                                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">I-Brite</a></li>
                                                </ul>
                                            </div> -->
                                        </ul>
                                    </div>
                                </ul>
                            </div>

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">ABOUT CHERYL’S  <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> ABOUT CHERYL’S</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/our_story">Our Story</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/mission_vision">Mission & Vision</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/our_reach">Our Reach</a></li>
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

                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">fOR PROFESSIONALS <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                            <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> fOR PROFESSIONALS</a> <br />
                                <ul class="mobile_menu_ul">
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="javascript:void(0);">EDUCATION <i class="fa mobile_menu_i fa-angle-right" aria-hidden="true"></i></a></li>
                                    <div class="mobile_menu_box_sub mobile_next_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <a class="mobile_menu_a1" href="javascript:void(0);"><i class="fa mobile_menu_i1 fa-angle-left" aria-hidden="true"></i> EDUCATION</a> <br />
                                        <ul class="mobile_menu_ul">
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/introduction">Introduction</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/courses_offered">Courses Offered</a></li>
                                            <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/training_centres">Our Training Centres</a></li>
                                        </ul>
                                    </div>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/education_show">EDUCATION SHOW</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/innovative_treatments">INNOVATIVE TREATMENTS</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/business_support">BUSINESS SUPPORT</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/experts_speaker">EXPERTS SPEAK</a></li>
                                    <li class="mobile_menu_li"><a class="mobile_menu_a" href="<?php echo base_url() ?>home/expert_faqs">EXPERT FAQS</a></li>
                                </ul>
                            </div>

                        </ul>
                    </div> <br />
                    <div class="mobile_bottom_menu_box grid-100 mobile-grid-100 tablet-grid-100">
                        <ul class="header_ul">
                            <li class="header_li"><a class="header_a" href="<?php echo base_url() ?>home/salon_locator">Salon Locator</a></li>
                            <li class="header_li hli posr"><a class="header_a" href="javascript:void(0);">Flagship Store</a></li>
                            <li class="header_li"><a class="header_a" href="<?php echo base_url() ?>home/contact_us">Contact Us</a></li>
                        </ul>
                        <ul class="header_ul">
                            <li class="header_li"><i class="fa ic fa-envelope-o" aria-hidden="true"></i> care@cheryls.in</li>
                            <li class="header_li"><i class="fa ic fa-phone" aria-hidden="true"></i> 0811 454 4423 / 24</li>
                        </ul>
                    </div>
                </div>

            </div>
            <!--menu-->