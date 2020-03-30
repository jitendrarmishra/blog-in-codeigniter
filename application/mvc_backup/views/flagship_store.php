<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
    <div class="career_box1_sub"></div>
    <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">flagship stores</h1>	
</div>

<div class="mission_box2 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">

        <div style="margin-bottom:5%;" class="slider_box2 homecare_mrg_btm pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-100">
            <div class="single-item1">
                <?php 
                foreach ($slider as $row) { ?>
                   
                
                <div class="">
                    <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <img src="<?php echo base_url() ?>uploads/flagship/<?php echo $row->image ?>" class="wdh" alt="" />
                        <h1 style="font-size:2em;" class="skin_span btext"><?php echo $row->title ?></h1>
                    </div>
                </div>
            <?php } ?>
                <!-- <div class="">
                    <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <img src="<?php //echo $this->config->item('assets'); ?>fassets/images/flagship_slider_img1.jpg" class="wdh" alt="" />
                        <h1 style="font-size:2em;" class="skin_span btext">Venus Salon, Ludhiana</h1>
                    </div>
                </div>	 -->
            </div>
        </div>

        <div class="mission_vision_box homecare_mrg_btm new_marg grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom msn_mrg_btm">Why A Flagship?</h1> <br /> <br />

            <?php
            $i =1; 
            foreach ($why_flagship as $row) {  ?>
                
            <div class="mission_vision_sub grid-100 mobile-grid-100 tablet-grid-100">
                <div class="mission_sub ms mob_ms posr parallax2 <?php echo $i == 2 || $i == 4? "float_right" : '' ?> grid-50 mobile-grid-100 tablet-grid-50"><img src="<?php echo base_url() ?>uploads/flagship/<?php echo $row->image ?>" class="wdh" alt="" /></div>
                <div class="mission_sub1 fs<?php echo $i ?> posr parallax1 <?php echo $i == 2 || $i == 4? "float_left" : '' ?> grid-55 mobile-grid-100 tablet-grid-50">
                    <h1 style="text-align:left;" class="skin_span btext txt_trnsfrm"><?php echo $row->title ?></h1>
                    <p class="skin_text1"><?php echo $row->text ?></p>
                </div>
            </div>

            <?php 
                $i++; 
                }  
            ?>

        </div>

        <div class="homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 mob_up_mrg animate_bottom">The New Experience In Skincare</h1> <br /> <br /> <br />
            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                 <?php
                foreach ($experience as $row) { ?>
                    
                <div class="ms_mob_mrg grid-50 mobile-grid-100 tablet-grid-50">
                    <img src="<?php echo base_url() ?>uploads/flagship/<?php echo $row->image ?>" class="wdh" alt="" /> <br /> <br />
                    <p class="skin_text1 animate_bottom"><?php echo $row->text ?></p>
                </div>

            <?php } ?>
            </div>
        </div>

        <div class="homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <h1 class="box2_text1 animate_bottom">Our Flagship Stores</h1> <br /> <br /> <br />
            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                 <?php 
                    foreach ($store as $row) { ?>
                <div class="flag_store_box prefix-5 pad0 grid-40 mobile-grid-100 tablet-grid-45">
                   
                        
                    <div class="flag_store_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text2 animate_left" style="text-align:left;"><?php echo $row->center_name ?></h1> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><?php echo $row->center_address ?></p> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i><?php echo $row->center_number ?></p>
                        <a class="contact_a" href="javscript:void(0);"><p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-envelope-o" aria-hidden="true"></i><?php echo $row->email ?></p></a> <br />
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="display:block; width:100%; padding: 3% 0%;" href="https://www.google.com/maps/search/<?php echo $row->center_address ?>" target="_blank">GET DIRECTIONS</a></div>
                    </div>


                    <div class="flag_store_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-10 mobile-grid-15 tablet-grid-5">
                            <i style="font-size:1.2em; margin-top: 13%; text-align:left;" class="fa service_offer_text3 animate_bottom fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="pad0 grid-90 mobile-grid-85 tablet-grid-95">
                            <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Open every day <br /><?php echo $row->store_open_time1 ?><br /> <?php echo $row->store_open_time2 ?></p>
                        </div>
                    </div>
                </div>

                 <?php } ?>

               <!--  <div class="flag_store_box prefix-10 pad0 grid-40 mobile-grid-100 tablet-grid-45">
                    <div class="flag_store_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text2 animate_left" style="text-align:left;">Harbour Redwood, Pathankot</h1> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Ground Floor, SCO 2, Near Krishna Mandir, Model Town Extension, Ludhiana, Punjab 141 002</p> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> 091 98154 02917</p>
                        <a class="contact_a" href="javscript:void(0);"><p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-envelope-o" aria-hidden="true"></i> care@cheryls.com</p></a> <br />
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="display:block; width:100%; padding: 3% 0%;" href="javascript:void(0);">GET DIRECTIONS</a></div>
                    </div>
                    <div class="flag_store_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-10 mobile-grid-15 tablet-grid-5">
                            <i style="font-size:1.2em; margin-top: 13%; text-align:left;" class="fa service_offer_text3 animate_bottom fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="pad0 grid-90 mobile-grid-85 tablet-grid-95">
                            <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Open every day <br />Mon-Sat: 11am – 7pm <br /> Sun: 11am – 4pm</p>
                        </div>
                    </div>
                </div>

                <div class="flag_store_box prefix-5 pad0 grid-40 mobile-grid-100 tablet-grid-45">
                    <div class="flag_store_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text2 animate_left" style="text-align:left;">Lookwell Salon, Mumbai</h1> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Ground Floor, SCO 2, Near Krishna Mandir, Model Town Extension, Ludhiana, Punjab 141 002</p> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> 091 98154 02917</p>
                        <a class="contact_a" href="javscript:void(0);"><p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-envelope-o" aria-hidden="true"></i> care@cheryls.com</p></a> <br />
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="display:block; width:100%; padding: 3% 0%;" href="javascript:void(0);">GET DIRECTIONS</a></div>
                    </div>
                    <div class="flag_store_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-10 mobile-grid-15 tablet-grid-5">
                            <i style="font-size:1.2em; margin-top: 13%; text-align:left;" class="fa service_offer_text3 animate_bottom fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="pad0 grid-90 mobile-grid-85 tablet-grid-95">
                            <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Open every day <br />Mon-Sat: 11am – 7pm <br /> Sun: 11am – 4pm</p>
                        </div>	
                    </div>
                </div>

                <div class="flag_store_box prefix-10 pad0 grid-40 mobile-grid-100 tablet-grid-45">
                    <div class="flag_store_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text2 animate_left" style="text-align:left;"> ID Salon, Jamshedpur</h1> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Ground Floor, SCO 2, Near Krishna Mandir, Model Town Extension, Ludhiana, Punjab 141 002</p> <br />
                        <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> 091 98154 02917</p>
                        <a class="contact_a" href="javscript:void(0);"><p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;"><i class="fa contact_icon fa-envelope-o" aria-hidden="true"></i> care@cheryls.com</p></a> <br />
                        <div class="wdh animate_bottom"><a class="slider_a bb_pd" style="display:block; width:100%; padding: 3% 0%;" href="javascript:void(0);">GET DIRECTIONS</a></div>
                    </div>
                    <div class="flag_store_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-10 mobile-grid-15 tablet-grid-5">
                            <i style="font-size:1.2em; margin-top: 13%; text-align:left;" class="fa service_offer_text3 animate_bottom fa-clock-o" aria-hidden="true"></i>
                        </div>
                        <div class="pad0 grid-90 mobile-grid-85 tablet-grid-95">
                            <p class="service_offer_text3 animate_bottom" style="width:100%; text-align:left;">Open every day <br />Mon-Sat: 11am – 7pm <br /> Sun: 11am – 4pm</p>
                        </div>	
                    </div>
                </div> -->
            </div>
        </div>

    </div>	
</div>