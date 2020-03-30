<div class="slider_box posr pad0 pad_tp_5 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="homebanner">
        <div class="innerslides posr">
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/slider.jpg" class="wdh hide-on-mobile" alt="" />
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/home_slider_mobile_img.jpg" class="wdh hide-on-desktop hide-on-tablet" alt="" />
            <div class="slider_text_box">
                <!-- <h3 class="slider_text">Bringing</h3> -->
                <h1 class="slider_text st">The Professional Skincare Experts</h1>
                <p class="slider_text1">Discover advanced skincare solutions and <br/> treatments that fit your skin just right</p>
                <div class="wdh"><a class="slider_a" href="javascript:void(0);">VIEW OUR SALON SERVICES</a></div>
            </div>
        </div>
        <div class="innerslides posr">
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/slider.jpg" class="wdh hide-on-mobile" alt="" />
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/home_slider_mobile_img.jpg" class="wdh hide-on-desktop hide-on-tablet" alt="" />
            <div class="slider_text_box">
                <h1 class="slider_text st">The Story Behind Cheryls</h1>
                <p class="slider_text1">Skincare products and services developed for <br/> the Indian skin,
                    developed by Indian beauticians, engineered by an Indian innovator</p>
                <div class="wdh"><a class="slider_a" href="javascript:void(0);">VIEW OUR SALON SERVICES</a></div>
            </div>
        </div>
        <div class="innerslides posr">
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/slider.jpg" class="wdh hide-on-mobile" alt="" />
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/home_slider_mobile_img.jpg" class="wdh hide-on-desktop hide-on-tablet" alt="" />
            <div class="slider_text_box">
                <h1 class="slider_text st">Skincare That Works</h1>
                <p class="slider_text1">Visible results from the moment the product touches your skin</p>
                <div class="wdh"><a class="slider_a" href="javascript:void(0);">VIEW OUR SALON SERVICES</a></div>
            </div>
        </div>
    </div>

    <div class="anchor_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="animate_left a_sub grid-33 mobile-grid-100 tablet-grid-33">
            <a class="slider_a1 mb_hd sa0 active" href="javascript:void(0);">The Professional Skincare Experts</a>
        </div>
        <div class="animate_bottom a_sub grid-33 mobile-grid-100 tablet-grid-33">
            <a class="slider_a1 mb_hd sa1" href="javascript:void(0);">The Story Behind Cheryls</a>
        </div>
        <div class="animate_right a_sub grid-33 mobile-grid-100 tablet-grid-33">
            <a class="slider_a1 mb_hd sa2" href="javascript:void(0);">Skincare That Works</a>
        </div>
    </div>
</div>

<div class="box2 posr grid-100 mobile-grid-100 tablet-grid-100">
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/side1.png" class="side1 hide-on-mobile hide-on-tablet parallax" alt="" />
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/side2.png" class="side2 hide-on-mobile hide-on-tablet parallax1" alt="" />
    <h1 class="box2_text1 animate_bottom">Services Offered</h1>
    <p class="box2_text2 animate_bottom">Customised solutions for every skin concern curated specifically keeping the Indian skin concerns and care in mind. Our products <br/> and rituals are trusted, loved and
        performed by beauty professionals across India.</p>


    <div class="box2_sub posr grid-85 prefix-15 mobile-grid-100 tablet-grid-100">
        <div style="width:30%;" class="gre_box"></div>
        <div class="gre_box1"></div>
        <div class="responsive home_service_slider">

            <?php
            $i = 1;
            foreach ($services as $row) {
                ?>
                <div class="bb1">
                    <h1 class="bb_text1"><span class="bb_span"><?php echo "0" . $i ?></span> <?php echo $row->service_name ?></h1>
                    <p class="bb_text2"> <?php echo $row->service_heading ?></p>
                    <p class="bb_text3"> <?php echo $row->text ?></p>
                    <div class="wdh"><a class="slider_a bb_pd" href="<?php echo base_url() ?>salon-category/<?php echo $row->services_slug ?>">KNOW MORE</a></div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>
</div>

<div class="box2 pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
    <h1 class="box2_text1 animate_bottom">Homecare Products</h1>
    <p class="box2_text2 mb_pd animate_bottom">Cheryls Cosmeceuticals are not just products, they are expert solutions to exponentially drive the results for the services used.<br/> Expert solutions, maintained
        at home to have continual and long lasting results.</p>
    <div class="product_box posr pad0 grid-100 mobile-grid-100 tablet-grid-100">
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/layer3.png" class="wdh mob_img1" alt="" />


        <ul id="scene2" class="parallax_div pd2 parallax1 marg0">
            <li class="layer im1 marg0" data-depth="0.25"><img src="<?php echo $this->config->item('assets'); ?>fassets/images/layer2.png" class="wdh" alt="" /></li>
        </ul>
        <ul id="scene1" class="parallax_div pd1 parallax marg0">
            <li class="layer im1 marg0" data-depth="0.15"><img src="<?php echo $this->config->item('assets'); ?>fassets/images/layer1.png" class="wdh" alt="" /></li>
        </ul>
        <ul id="scene" class="parallax_div marg0">
            <li class="layer icon1 marg0" data-depth="0.10">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube1.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa1" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi1 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
            <li class="layer icon2 marg0" data-depth="0.20">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube2.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa2" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi2 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
            <li class="layer icon3 marg0" data-depth="0.30">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube3.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa3" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi3 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
            <li class="layer icon4 marg0" data-depth="0.10">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube4.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa4" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi4 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
            <li class="layer icon5 marg0" data-depth="0.40">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube5.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa5" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi5 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
            <li class="layer icon6 marg0" data-depth="0.05">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/tube6.png" class="wdh" alt="" />
                <div class="home_product_hover">
                    <a class="product_a pa6" href="javascript:void(0)"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    <div class="product_info pi6 hide">
                        <p class="box2_text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> <br />
                        <div class="wdh"><a class="slider_a mn bb_pd" style="float:none;" href="javascript:void(0);">KNOW MORE</a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="box2 posr grid-100 mobile-grid-100 tablet-grid-100">
    <h1 class="box2_text1 animate_bottom">Happy Customers</h1>
    <div class="tab_box grid-20 prefix-40 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
        <div class="grid-50 mobile-grid-50 tablet-grid-50"><a class="box2_text2 bt1 home_tab_click1" href="javascript:void(0);">CUSTOMERS</a></div>
        <div class="grid-50 mobile-grid-50 tablet-grid-50"><a class="box2_text2 bt1 home_tab_click2" href="javascript:void(0);">SALON OWNERS</a></div>
        <div class="tab_box1"></div>
    </div>
    <div class="slider_box1 posr pad0 grid-60 prefix-20 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
        <div class="home_tab1 pad0 grid-100 mobile-grid-100 tablet-grid-100">
            <div id="slider1" class="happy-hm-slider slider_boxshadow ">


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
                                <p class="sbt_text2"><?php echo $row->name ?></p>

                                <div class="wdh"><a class="slider_a bb_pd" href="<?php echo $row->link ?>">VIEW PRODUCT</a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div> <br />

            <div class="grid-50 prefix-25 mobile-grid-100 tablet-grid-50 tablet-prefix-25">
                <div class="slider-nav">
                    <?php
                    foreach ($customer as $row) {
                        ?>
                        <div class="sl_sb">
                            <img src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>" class="wdh" alt="" />
                            <div class="slider_loader_box"><div class="slider_loader_sub"></div></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>	
            </div>

        </div>
        <div class="home_tab2 pad0 grid-100 mobile-grid-100 tablet-grid-100">	
            <div id="slider2" class="happy-hm-slider1 slider_boxshadow">

                <?php
                foreach ($owner as $row) {
                    ?>
                    <div class="">
                        <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                            <div class="pad0 grid-50 mobile-grid-100 tablet-grid-50">
                                <img src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>" class="wdh" alt="" />
                            </div>
                            <div class="sbt grid-50 mobile-grid-100 tablet-grid-50">
                                <p class="sbt_text"><?php echo $row->text ?></p>
                                <p class="sbt_text1"><?php echo $row->name ?></p>
                                <p class="sbt_text2"><?php echo $row->name ?></p>
                                <div class="wdh"><a class="slider_a bb_pd" href="<?php echo $row->link ?>">VIEW PRODUCT</a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div> <br />

            <div class="grid-50 prefix-25 mobile-grid-100 tablet-grid-50 tablet-prefix-25">
                <div class="slider-nav1">
                    <?php
                    foreach ($owner as $row) {
                        ?>
                        <div class="sl_sb">
                            <img src="<?php echo base_url() ?>uploads/customer/<?php echo $row->photo ?>" class="wdh" alt="" />
                            <div class="slider_loader_box"><div class="slider_loader_sub"></div></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>	
            </div>

        </div>	
    </div>
</div>

<div class="box2 posr grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container posr">
        <div class="grid-50 prefix-5 mobile-grid-100 tablet-grid-60">
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/img1.jpg" class="wdh" alt="" /> <br /> <br />
            <div class="pad0 grid-50 mobile-grid-100 tablet-grid-50">
                <h1 class="box4_text1 animate_left">Store Locator</h1>
                <p class="bb_text3 nm animate_right">Find our professional services at a salon near you.</p>
                <div class="wdh animate_left"><a class="slider_a bb_pd1" href="<?php echo $this->config->item('flagship_link') ?>">VISIT OUR FLAGSHIP STORE</a></div> <br /> <br /> <br />
                <div class="wdh animate_left"><a class="slider_a bb_pd1" href="<?php echo $this->config->item('salon_link') ?>">FIND A SALON</a></div>
            </div>
            <div class="pad0 hk grid-50 mobile-grid-50 tablet-grid-50">
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/img2.jpg" class="wdh" alt="" />
            </div>
        </div>
        <div class="grid-30 prefix-10 mobile-grid-100 tablet-grid-40">
            <h1 class="box4_text1 animate_left">Skin Scan</h1>
            <p class="bb_text3 nm1 animate_right">Have you tried many skincare treatments, but are dissatisfied with the results? Try the Cheryls Skin Scan to find the perfect solution for your skin related woes.</p>
            <div class="wdh animate_left"><a class="slider_a bb_pd1" href="javascript:void(0);">GET STARTED</a></div> <br /> <br /> <br />
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/img3.jpg" class="wdh" alt="" />
        </div>
        <div class="bordr hide-on-mobile hide-on-tablet"></div>
    </div>
    <div class="grid-container">
        <div class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
            <p class="box2_text2 animate_bottom">Cheryls Cosmeceuticals is India’s first professional skincare brand that has for three decades, through science, technology, chemistry and true human ingenuity transformed the face of skin care. It is our endeavour to transform the beautician to a skin expert, the salon into a skin clinic and the consumer with efficient and
                visible results.</p>
            <p class="box2_text2 animate_bottom">“Skin care that works” is the ethos we live by, and it has been our goal to constantly elevate and innovate the skin care experience you receive. We have treatments and rituals to treat a number of skin concerns like oily skin, dry skin, dehydrated skin, sensitivity, acne and many more, leaving you with lustrous, radiant and supple skin. We also create and curate products to address your concerns ranging from creams, masks, moisturizers to serums and targeted treatments.</p>
        </div>	
    </div>
</div>