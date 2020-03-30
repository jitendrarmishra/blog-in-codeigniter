<style type="text/css">
    .sticky{
        position:fixed;
        height:85%;
    }
</style>


<div class="container">

    <div class="slider_box posr pad0 pad_tp_5 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="single-item">
            <div class="posr">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/innovative_img1.jpg" class="wdh" alt="" />
                <div class="slider_text_box">
                    <h1 class="slider_text st">Innovative Treatment</h1>
                    <p class="innovation_text1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br /> tempor incididunt ut labore et dolore magna aliqua. </p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> 15 minutes services tailored for individual skin type</p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Fast acting treatment designed for quick results</p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Scientific formulations that are dermalogically tested</p>
                </div>
            </div>
            <div class="posr">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/innovative_img1.jpg" class="wdh" alt="" />
                <div class="slider_text_box">
                    <h1 class="slider_text st">Innovative Treatment</h1>
                    <p class="innovation_text1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br /> tempor incididunt ut labore et dolore magna aliqua. </p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> 15 minutes services tailored for individual skin type</p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Fast acting treatment designed for quick results</p>
                    <p class="slider_text1 in_mrg"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Scientific formulations that are dermalogically tested</p>
                </div>
            </div>
        </div>
    </div>

    <div class="innovative_tab_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="animate_left a_sub grid-50 mobile-grid-50 tablet-grid-50">
            <a class="slider_a1 in_a in_active" href="javascript:void(0);">INSTA WOW TREATMENT</a>
        </div>
        <div class="animate_bottom a_sub grid-50 mobile-grid-50 tablet-grid-50">
            <a class="slider_a1 in_a" href="javascript:void(0);">ALTERNATIVE THERAPY</a>
        </div>
    </div>

    <div class="grid-container">
        <div class="box2 posr grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Insta Wow Treatment</h1> <br /> <br />
            <div class="insta_box grid-100 mobile-grid-100 tablet-grid-100">
                <div class="grid-50 mobile-grid-100 tablet-grid-50">
                    <img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $wow_treatmensts_details->image ?>" class="wdh" alt="" />
                </div>
                <div class="grid-50 mobile-grid-100 tablet-grid-50">
                    <p class="sbt_text"><?php echo $wow_treatmensts_details->bold_text ?></p>
                    <p class="sbt_text2"><?php echo $wow_treatmensts_details->normal_text ?></p>
                </div>
            </div>
        </div>
        <div class="benefit_box grid-100 mobile-grid-100 tablet-grid-100">
            <p style="text-align:center;" class="sbt_text"><?php echo $wow_treatmensts_details->image_below_text ?></p>

            <?php foreach ($insta_points as $row) { ?>

                <div class="grid-20 mobile-grid-100 tablet-grid-50">
                    <img src="<?php echo $this->config->item('assets'); ?>uploads/common/<?php echo $row->point_photos ?>" class="benefit_img animate_top" alt="" />
                    <h1 class="skin_span animate_bottom btext"><?php echo $row->point_title ?></h1>
                </div>

            <?php } ?>
            
        </div>
    </div>

    <div class="box2 posr grid-100 mobile-grid-100 tablet-grid-100">
        <span id="point1" class="blank1"></span>
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/side1.png" class="side1 hide-on-mobile hide-on-tablet parallax" alt="" />
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/side2.png" class="side2 hide-on-mobile hide-on-tablet parallax1" alt="" />
        <h1 class="box2_text1 animate_bottom">Services Offered</h1>
        <p class="box2_text2 animate_bottom"><?php echo wordwrap($wow_treatmensts_details->service_offerd_top_text, 100, "<br>\n"); ?></p>
        <div class="box2_sub posr grid-85 prefix-15 mobile-grid-100 tablet-grid-100">
            <div style="width:30%;" class="gre_box"></div>
            <div class="gre_box1"></div>
            <div class="responsive home_service_slider">
                <?php
                $i = 1;
                foreach ($insta_services as $row) {
                    ?>

                    <div class="bb1">
                        <h1 class="bb_text1"><span class="bb_span">0<?php echo $i ?></span> <?php echo $row->service_name ?></h1>
                        <p class="bb_text2"><?php echo $row->service_heading ?></p>
                        <p class="bb_text3"><?php echo $row->text ?></p>
                    </div>
                    <?php
                    $i++;
                }
                ?>
                
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="benefit_box grid-100 mobile-grid-100 tablet-grid-100">
            <p style="text-align:center; margin-bottom:2%;" class="sbt_text"><?php echo $wow_treatmensts_details->service_offerd_bottom_text ?></p>
            <div class="grid-30 prefix-35"><a class="slider_a bb_pd" style="float:none;" href="<?php echo site_url('salon-locator'); ?>">SALON LOCATOR</a></div>
        </div>
    </div>

    <div style="padding-top:2%;" class="service_box2 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <h1 class="box2_text1 animate_bottom">Alternative Therapy</h1> <br /> <br />
            <?php 
           // print_r($insta_products);die;
            foreach ($insta_products as $row) { ?>

                <div class="service_offered_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="service_offer_sub pad0 grid-45 mobile-grid-100 tablet-grid-50">
                        <div class="sfs sfs_animate"><div class="sfs_sub sfs_sub_animate"><img src="<?php echo $this->config->item('assets'); ?>uploads/services_product/<?php echo $row->image1 ?>" class="si si_animate" alt="" /></div></div>
                    </div>
                    <div class="service_offer_sub1 grid-55 mobile-grid-100 tablet-grid-50">
                        <div id="mob_point2" class="blank2"></div>
                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                        <span id="point2" class="blank2"></span>
                        <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p>
                        <img src="<?php echo $this->config->item('assets'); ?>uploads/services_product/<?php echo $row->image2 ?>" class="p1 animate_bottom" alt="" />
                        <p class="service_offer_text3 animate_left"><?php echo $row->bottom_text ?></p>
                        <p class="service_offer_text4 animate_right"><?php echo $row->bottom_subtext ?></p>
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $row->product_slug ?>">KNOW MORE</a></div>
                    </div>
                </div>

            <?php } ?>


            <?php 
//              print_r($insta_products2);die;
            foreach ($insta_products2 as $row) { ?>

                <div class="service_offered_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="service_offer_sub pad0 grid-45 mobile-grid-100 tablet-grid-50">
                        <div class="sfs sfs_animate"><div class="sfs_sub sfs_sub_animate"><img src="<?php echo $this->config->item('assets'); ?>uploads/homecare/<?php echo $row->thum_image ?>" class="si si_animate" alt="" /></div></div>
                    </div>
                    <div class="service_offer_sub1 grid-55 mobile-grid-100 tablet-grid-50">
                        <div id="mob_point2" class="blank2"></div>
                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                        <span id="point2" class="blank2"></span>
                        <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p>
                         <!--<img src="<?php echo $this->config->item('assets');   ?>uploads/homecare/<?php echo $row->thum_image   ?>" class="p1 animate_bottom" alt="" />-->
<!--                        <p class="service_offer_text3 animate_left"><?php echo $row->bottom_text   ?></p>
                        <p class="service_offer_text4 animate_right"><?php echo $row->bottom_subtext   ?></p> -->
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $row->product_slug ?>">KNOW MORE</a></div>
                    </div>
                </div>

            <?php } ?>

        </div>

    </div>
