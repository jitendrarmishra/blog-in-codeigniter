<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Search</h1>	
    </div>


    <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <p style="margin-top:3%;" class="contact_text3">Search Results for "<?php echo $search ?>"</p>

            <div class="search_result_box grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="box2_text1 animate_bottom">Blog</h1> <br /> <br />

                <?php
                // print_r($post);
                if (!empty($post)) {
                    foreach ($post as $row) {
                        ?>
                        <div class="grid-33 mobile-grid-100 tablet-grid-33">
                            <div class="blog_info_box pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="blog_share_box">
                                    <div class="blog_share_sub">
                                        <div class="blog_share_width-box">


                                            <a class="blog_share_icons st-custom-button" data-network="twitter" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a class="blog_share_icons st-custom-button" data-network="facebook" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a class="blog_share_icons st-custom-button" data-network="whatsapp" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>

                                        </div>	
                                    </div>	
                                    <div class="blog_share_sub1">
                                        <a class="blog_share_icons share_click" href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    </div>	
                                </div>
                                <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                    <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $row->image ?>" class="wdh" alt="<?php echo $row->post_title ?>" />
                                </div>
                                <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <h1 class="service_offer_text1 animate_left"><?php echo $row->category_name ?></h1>
                                    <h1 class="service_offer_text2 animate_right"><?php echo $row->post_title ?></h1>
                                    <span id="point2" class="blank2"></span>
                                    <p class="service_offer_text3 animate_bottom"><?php echo substr($row->post_text, 0, 150) ?>...</p> <br />
                                    <div class="wdh animate_bottom"><a class="slider_a bb_pd2" style="float:none;" href="<?php echo base_url() ?>blog/<?php echo $row->category_slug ?>/<?php echo $row->post_slug ?>">KNOW MORE</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Blog Not Found!";
                }
                ?>
            </div>	
            <div class="search_result_box grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="box2_text1 animate_bottom">Homecare Products</h1> <br /> <br />
                <?php
                // print_r($post);
                if (!empty($homecare)) {
                    foreach ($homecare as $row) {
                        ?>
                        <div class="product_sub grid-30 mobile-grid-100 tablet-grid-33">
                            <img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->thum_image ?>" class="wdh home_img" alt="<?php echo $row->black_text ?>" />
                            <div class="text_box grid-100 mobile-grid-100 tablet-grid-100">
                                <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                                <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                                <p class="service_offer_text3" style="width:100%;"><?php echo character_limiter($row->short_text, 100) ?></p>
                                <div class="homecare_a_box"><a class="homecare_a" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $row->product_slug; ?>">VIEW PRODUCT <img src="images/right_arrow.png" class="right_arrow" alt="" /></a></div>
                            </div>	
                        </div>
                        <?php
                    }
                } else {
                    echo "Homecare Products Not Found!";
                }
                ?>


            </div>

            <div class="search_result_box grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="box2_text1 animate_bottom">Salon Service</h1> <br /> <br />
                <?php
//print_r($salon);die;
                if (!empty($salon)) {
                    foreach ($salon as $row) {
                        ?>
                        <div class="grid-33 mobile-grid-100 tablet-grid-33">
                            <div class="blog_info_box pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                    <img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image1 ?>" class="wdh" alt="<?php echo $row->black_text ?>" />
                                </div>
                                <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                                    <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                                    <span id="point2" class="blank2"></span>
                                    <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p> <br />
                                    <div class="wdh animate_bottom"><a class="slider_a bb_pd2" style="float:none;" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $row->product_slug ?>">KNOW MORE</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Service Not Found!";
                }
                ?>
            </div>
        </div>	
    </div>
</div>
<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b769a0424af07001195117c&product=inline-share-buttons"></script>