<div class="oily_box1 posr grid-100 mobile-grid-100 tablet-grid-100">
    <div style="top:11%;" class="bullet_box animate_left hide-on-mobile hide-on-tablet">
        <a class="bullet_text" href="<?php echo base_url(); ?>">Home</a> > <span class="bullet_text"><?php echo $concern_product->black_text ?></span>
    </div>
    <div style="margin-top:10%;" class="service_box1_sub parallax">
        <h1 style="text-align:center;" class="service_box1_text1 animate_left"><?php echo $concern_product->black_text ?></h1>
        <p class="temp_text animate_top"><?php echo $concern_details->inner_title ?></p>
        <p class="service_box1_text2 oily_txt animate_bottom"><?php echo $concern_details->text ?></p>	
    </div> <br /> <br />
    <div class="grid-container">
        <div class="service_video_box posr grid-100 mobile-grid-100 tablet-grid-100">
            <div class="si_text_box parallax">
                <h1 class="skin_h1 animate_right">The Process</h1>
                <p class="si_text animate_bottom">Duration: <?php echo $concern_details->duration ?></p>
            </div>
            <div class="service_video_sub posr grid-60 prefix-25 mobile-grid-100 tablet-grid-100">
                <iframe class="service_video" id="video"s src="<?php echo $concern_details->image ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <div class="si_slider_box  posr pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
            <div class="gre_box"></div>
            <div class="gre_box1"></div>
            <div class="responsive">
                <?php
                $i = 1;
                foreach ($steps as $row) {
                    ?>
                    <div class="si_slider_sub">
                        <h1 class="better_text1 btext si_text1">Step <?php echo $i ?></h1>
                        <p class="better_text2 btext1 si_text2"><?php echo $row->text ?> </p>
                    </div>
                    <?php
                    $i++;
                }
                ?>

            </div>
        </div>
    </div>
</div>

<div class=" pad0 grid-100 mobile-grid-100 tablet-grid-100">
    <h1 class="box2_text1 animate_bottom">What’s In It</h1> <br /> <br />
    <img src="<?php echo base_url() ?>uploads/concern/<?php echo $concern_details->image1 ?>" class="wdh" alt="" />	
</div>

<div class="gg grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container pad0">
        <div class="grid-100 mobile-grid-100 tablet-grid-100">
            <div class="ing_list_box grid-100 mobile-grid-100 tablet-grid-100">
                <a class="list_a" href="javascript:void(0);"><span class="list_span">Show</span> Complete Ingredients List <i class="fa list_arrow fa-angle-down" aria-hidden="true"></i></a>
                <div class="list_main hide pad0 grid-100 mobile-grid-100 tablet-grid-100">
                    <?php
                    foreach ($ingredients as $row) {
                        ?>

                        <div class="ing_list_sub grid-33 mobile-grid-100 tablet-grid-100">
                            <h1 class="better_text1 btext"><?php echo $row->title ?></h1>
                            <div class="line1"></div>
                            <p class="better_text2 btext1"><?php echo $row->text ?></p>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div> <br /> <br />

<div class="grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">

<!--         <div class="happy_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Happy Customers</h1> <br /> <br />
            <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                <div class="single-item1">

                    <?php
                    foreach ($customer as $row) {
                        ?>
                        <div class="">
                            <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="pad0 grid-50 mobile-grid-100 tablet-grid-50">
                                    <img src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>" class="wdh" alt="" />
                                </div>
                                <div class="sbt grid-50 mobile-grid-100 tablet-grid-50">
                                    <p class="sbt_text"><?php echo $row->text ?></p>
                                    <p class="sbt_text1"><?php echo $row->name ?></p>
                                    <p class="sbt_text2"><?php echo $row->designation ?></p>

                                    <div class="wdh"><a class="slider_a bb_pd" href="<?php echo $row->link ?>">VIEW PRODUCT</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div> -->

        <div class="happy_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Homecare Products</h1> <br /> <br />
            <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                <div class="responsive1">
                    <div class="">
                        <div class="happy_sub shadow_box">
                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/h1.png" class="wdh sgh" alt="" />
                            <h1 class="service_offer_text2">Dermalite Facewash</h1>
                        </div>
                    </div>
                    <div class="">
                        <div class="happy_sub shadow_box">
                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/h2.png" class="wdh sgh" alt="" />
                            <h1 class="service_offer_text2">Dermalite Lotion</h1>
                        </div>
                    </div>
                    <div class="">
                        <div class="happy_sub shadow_box">
                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/h3.png" class="wdh sgh" alt="" />
                            <h1 class="service_offer_text2">Clarimoist</h1>
                        </div>
                    </div>
                    <div class="">
                        <div class="happy_sub shadow_box">
                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/h1.png" class="wdh sgh" alt="" />
                            <h1 class="service_offer_text2">Dermalite Facewash</h1>
                        </div>	
                    </div>	
                </div>
            </div>
        </div>

        <div class="frequently_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Frequently Asked Questions</h1> <br /> <br />
            <div class="frequently_box grid-100 mobile-grid-100 tablet-grid-100">
                <ol class="frequent_ol">
                    <?php
                    foreach ($faq as $row) {
                        ?>
                        <li class="frequent_li">
                            <a class="frequent_a" href="javascript:void(0);"><span class="frequent_span"><?php echo $row->faq_q ?></span> <i class="fa frequent_i fa-angle-down" aria-hidden="true"></i></a>
                            <p class="frequent_text hide"><?php echo $row->faq_ans ?></p>
                        </li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
        </div>

        <div class="other_service_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Other Services Offered</h1> <br /> <br />
            <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                <div class="responsive1">

                    <?php
                    foreach ($related_product as $row) {
                        ?>
                        <a href="javascript:void(0);">
                            <div class="">
                                <div class="other_service_sub shadow_box">
                                    <img src="<?php echo $this->config->item('assets'); ?>uploads/concern/<?php echo $row->banner ?>" class="wdh sgh" alt="" />
                                    <h1 class="service_offer_text2"><?php echo $row->concern_name ?></h1>
                                </div>
                            </div>
                        </a>

    <?php
}
?>

                </div>
            </div>
        </div>

    </div>
</div>

<div id="navbar" class="locator_box hide-on-mobile grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container pad0">
        <div class="grid-40 mobile-grid-100 tablet-grid-100"><p class="locator_text">Lorem ipsum dolor sit amet consectetur</p></div>
        <div class="grid-60 mobile-grid-100 tablet-grid-100">
            <div class="wdh">
                <a class="service_a" href="<?php echo $this->config->item('flagship_link')  ?>">visit our flagship store</a>
<a class="service_a" href="<?php echo $this->config->item('salon_link')  ?>">FIND A SALON</a>
            </div>
        </div>
    </div>
</div>


