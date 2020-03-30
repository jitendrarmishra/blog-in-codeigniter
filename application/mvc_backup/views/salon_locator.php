<div data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url() ?>uploads/services/<?php echo $services->banner ?>) no-repeat;height:100vh;background-size:cover;" class=" posr grid-100 mobile-grid-100 tablet-grid-100">
    <div class="bullet_box animate_left hide-on-mobile hide-on-tablet">
        <a class="bullet_text" href="<?php echo base_url() ?>">Home</a> > <span class="bullet_text"><?php echo ucfirst($services->service_name) ?></span>
    </div>
    <div class="service_box1_sub parallax">
        <h1 class="service_box1_text1 animate_left"><?php echo ucfirst($services->service_name) ?></h1>
        <p class="service_box1_text2 animate_bottom"><?php echo ucfirst($services->text) ?></p>
        <div class="animate_bottom">
            <a class="service_box1_text2 service_text_a animate_bottom" href="#go_down">Learn More About Treatments <i class="fa service_i fa-angle-down" aria-hidden="true"></i></a>
        </div>	
    </div>
    <span id="point1" class="blank1"></span>
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/mouse.png" class="mouse" alt="" />
</div>

<div class="service_box2 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">
        <h1 class="box2_text1 animate_bottom">Services Offered</h1> <br /> <br />

        <?php
        $i = 1;
        foreach ($products as $row) {
           
            ?>
            <div class="service_offered_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                <div class="service_offer_sub pad0 grid-45 mobile-grid-100 tablet-grid-50 <?php echo $i % 2 == 0 ? 'float_right' : '' ?>">
                    <div class="sfs sfs_animate"><div class="sfs_sub sfs_sub_animate"><img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image1 ?>" class="si si_animate" alt="" /></div></div>
                </div>
                <div class="service_offer_sub1 grid-55 mobile-grid-100 tablet-grid-50">
                    <div id="mob_point2" class="blank2"></div>
                    <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                    <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                    <span id="point2" class="blank2"></span>
                    <p class="service_offer_text3 animate_bottom"><?php echo $row->short_text ?></p>
                    <img src="<?php echo base_url() ?>uploads/services_product/<?php echo $row->image2 ?>" class="p1 animate_bottom" alt="" />
                    <p class="service_offer_text3 animate_left"><?php echo $row->bottom_text ?></p>
                    <p class="service_offer_text4 animate_right"><?php echo $row->bottom_subtext ?></p>
                    <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="float:none;" href="<?php echo base_url() ?>index/product/<?php echo base64_encode($row->services_product_id)  ?>">KNOW MORE</a></div>
                </div>
            </div>

    <?php
    $i++;
}
?>

        <div id="go_down" class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
            <p  class="box2_text2 animate_bottom"><?php echo ucfirst($services->btext) ?></p>
            <!--<p class="box2_text2 animate_bottom">“Skin care that works” is the ethos we live by, and it has been our goal to constantly elevate and innovate the skin care experience you receive. We have treatments and rituals to treat a number of skin concerns like oily skin, dry skin, dehydrated skin, sensitivity.</p>-->
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
                    <a class="service_a" href="<?php echo $this->config->item('flagship_link')  ?>">visit our flagship store</a>
<a class="service_a" href="<?php echo $this->config->item('salon_link')  ?>">FIND A SALON</a>
                </div>
            </div>
        </div>
    </div>
</div>