<div class="oily_box1 posr grid-100 mobile-grid-100 tablet-grid-100">
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/o1.png" class="o1" alt="" />
    <div style="top:11%;" class="bullet_box animate_left hide-on-mobile hide-on-tablet">
        <a class="bullet_text" href="javascript:void(0);">Home</a> > salon-concern > <span class="bullet_text"><?php echo ucfirst($salon_concern->concern_name) ?></span>
    </div>
    <div style="margin-top:10%; margin-left:10%;" class="service_box1_sub parallax">
        <h1 style="text-align:center;" class="service_box1_text1 animate_left"><?php echo ucfirst($salon_concern->concern_name) ?></h1>
        <p class="service_box1_text2 oily_txt animate_bottom"><?php echo ucfirst($salon_concern->text) ?></p>   
    </div> <br /> <br />
    <span id="point1" class="blank1"></span>
    <div class="grid-container">
        <h1 class="box2_text1 animate_bottom">Cheryl’s Approach</h1> <br /> <br />
        <img src="<?php echo base_url() ?>uploads/concern/<?php echo $salon_concern->banner ?>" class="wdh im" alt="" />
    </div>
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/o2.png" class="o2 parallax" alt="" />
    <!--<img src="images/mouse.png" class="mouse" alt="" />-->
</div>

<div style="padding-top:2%;" class="service_box2 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">
        <div class="cause_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">The Causes</h1> <br /> <br />


            <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                <div class="single-item1 cause_slider">
                    <?php
                    $i = 1;
                    foreach ($causes as $row) {
                        ?>
                        <div class="">
                            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="cause_img_box pad0 grid-30 mobile-grid-100 tablet-grid-50">
                                    <img src="<?php echo base_url() ?>uploads/causes/<?php echo $row->image ?>" class="wdh c1" alt="" />
                                </div>
                                <div class="sbt1 grid-60 mobile-grid-100 tablet-grid-50">
                                    <h1 class="better_text1 btext"><?php echo $row->causes_title ?></h1>
                                    <div class="cause_span"></div>
                                    <p class="better_text2 btext1"><?php echo $row->causes_text ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div  class="no_name_box posr grid-100 mobile-grid-100 tablet-grid-100">
    <div class="black_layer"></div>
    <div class="grid-container">
        <img src="images/gl.png" class="gl parallax" alt="" />
        <p style="z-index:2;" class="no_name_text posr animate_top">Adipisicing elit, skin scan tempor incididunt ut labore et dolore <br /> lorem upsumna magna aliqua.</p>
        <div style="z-index:2;" class="wdh posr animate_bottom">
            <a class="service_a" href="javascript:void(0);">GET STARTED</a>
        </div>
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/hf-gl.png" class="hf-gl parallax1" alt="" />
    </div>
</div>

<div style="padding-top:2%;" class="service_box2 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">
        <h1 class="box2_text1 animate_bottom">Services Offered</h1> <br /> <br />
        <div class="service_offered_tab_box">
            <a class="service_offered_tab_a soa1 service_offered_tab_a_active" href="javascript:void(0);">Advanced Facial</a>
            <a class="service_offered_tab_a soa2" href="javascript:void(0);">Treatment</a>
        </div>
        <?php
        if (!empty($facial)) {
            ?>

            <?php
//            print_r($facial);
//            die;
            $i = 1;
            foreach ($facial as $row) {
                ?>
                <div class="service_offered_box sob1 pad0 grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="service_offer_sub pad0 grid-45 mobile-grid-100 tablet-grid-50 <?php echo $i % 2 == 0 ? 'float_right' : '' ?>">
                        <div class="sfs sfs_animate"><div class="sfs_sub sfs_sub_animate"><img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image1 ?>" class="si si_animate" alt="" /></div></div>
                    </div>
                    <div class="service_offer_sub1 grid-55 mobile-grid-100 tablet-grid-50">
                        <div id="mob_point2" class="blank2"></div>
                        <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                        <span id="point2" class="blank2"></span>
                        <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p>
                        <span id="point4" class="blank2"></span>
                        <img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image2 ?>" class="p1 animate_bottom" alt="" />
                        <p class="service_offer_text3 animate_left"><?php echo $row->bottom_text ?></p>
                        <p class="service_offer_text4 animate_right"><?php echo $row->bottom_subtext ?></p>
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $row->product_slug ?>">KNOW MORE</a></div>
                    </div>
                </div>

                <?php
                $i++;
            }
            ?>
        <?php } else { ?>

            <div class="product_box sob1 grid-100 mobile-grid-100 tablet-grid-100 " id="category_response">
                <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100" >
                    <h1>Sorry No Products Found!</h1>
                </div>
            </div>

        <?php } ?>


        <?php
        if (!empty($treatment)) {
            $i = 1;
            foreach ($treatment as $row) {
                ?>
                <div class="service_offered_box sob2 pad0 grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="service_offer_sub pad0 grid-45 mobile-grid-100 tablet-grid-50 <?php echo $i % 2 == 0 ? 'float_right' : '' ?>">
                        <div class="sfs sfs_animate"><div class="sfs_sub sfs_sub_animate"><img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image1 ?>" class="si si_animate" alt="" /></div></div>
                    </div>
                    <div class="service_offer_sub1 grid-55 mobile-grid-100 tablet-grid-50">
                        <div id="mob_point2" class="blank2"></div>
                        <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                        <span id="point2" class="blank2"></span>
                        <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p>
                        <span id="point4" class="blank2"></span>
                        <img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image2 ?>" class="p1 animate_bottom" alt="" />
                        <p class="service_offer_text3 animate_left"><?php echo $row->bottom_text ?></p>
                        <p class="service_offer_text4 animate_right"><?php echo $row->bottom_subtext ?></p>
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>/<?php echo $row->product_slug ?>">KNOW MORE</a></div>
                        <!--<div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>home/salon_product/<?php echo base64_encode($row->services_product_id) ?>">KNOW MORE</a></div>-->
                    </div>
                </div>

                <?php
                $i++;
            }
            ?>
        <?php } else { ?>

            <div class="product_box grid-100 sob2 mobile-grid-100 tablet-grid-100" id="category_response">
                <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100" >
                    <h1>Sorry No Products Found!</h1>
                </div>
            </div>

        <?php } ?>







        <div id="go_down" class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
            <p  class="box2_text2 animate_bottom"><?php echo ucfirst($salon_concern->btext) ?></p>
        </div>

    </div>
</div>

<div class="service_box3 pad0 grid-100 mobile-grid-100 tablet-grid-100">
    <div data-stellar-background-ratio="0.1" class="service_box_sub grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <div class="store_locator_box">
                <h1 style="color:#fff;" class="box2_text1 animate_bottom">Store Locator</h1> <br />
                <p style="color:#fff;" class="box2_text2 animate_top">Find our professional services at a salon near you.</p>
                <div class="wdh animate_bottom">
                    <a class="service_a" href="<?php echo $this->config->item('flagship_link') ?>">visit our flagship store</a>
                    <a class="service_a" href="<?php echo $this->config->item('salon_link') ?>">FIND A SALON</a>
                </div>
            </div>
        </div>
    </div>
</div>