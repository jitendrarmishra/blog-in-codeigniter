<div class="container">
    <input type="hidden" name="" id="homecare_category_id" value="<?php echo $home_category->homecare_id ?>">
    <div data-stellar-background-ratio="0.5" style="background: url(<?php echo base_url() ?>uploads/homecare/<?php echo $home_category->banner ?>) no-repeat;height:100vh;background-size:cover;" class="homecare_box1 posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="bullet_box animate_left hide-on-mobile hide-on-tablet">
            <a class="bullet_text" href="javascript:void(0);">Home</a> > <span class="bullet_text"><?php echo $home_category->homecare_category_name ?></span>
        </div>
        <div class="service_box1_sub parallax">
            <h1 style="color:#e6e6e6;" class="service_box1_text1 animate_left"><?php echo ucfirst($home_category->homecare_category_name) ?></h1>
            <p class="service_box1_text2 animate_bottom"><?php echo $home_category->text ?></p>
        </div>
        <span id="point1" class="blank1"></span>
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/mouse.png" class="mouse1 hide" alt="" />
    </div>

    <div class="homecare_box2 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <div class="filter_box grid-100 mobile-grid-100 tablet-grid-100">
                <div class="grid-80 prefix-10 mobile-grid-100 tablet-grid-100">
                    <div class="filter_sub grid-40 prefix-5 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-30 mobile-grid-30 tablet-grid-30"><span class="filter_span">By Concern</span></div>
                        <div class="pad0 posr grid-70 mobile-grid-70 tablet-grid-70">
                            <select class="filter_select concern_list" id="concern_list_data">
                                <option value="0">All</option>
                                <?php
                                $i = 1;
                                foreach ($concern_list as $row) {
                                    ?>
                                    <option value="<?php echo $row->homecare_concern_id ?>"><?php echo $row->homecare_concern_name ?></option>

                                    <?php
                                    $i++;
                                }
                                ?>
                            </select>
                            <img src="images/select_arrow.jpg" class="select_arrow" alt="" />
                        </div>
                    </div>
                    <div class="filter_sub posr grid-40 prefix-10 mobile-grid-100 tablet-grid-100">
                        <div class="pad0 grid-30 mobile-grid-30 tablet-grid-30"><span class="filter_span">Sort By</span></div>
                        <div class="pad0 posr grid-70 mobile-grid-70 tablet-grid-70">
                            <select class="filter_select concern_list" id="sort_by_category">
                                <option value="0">Best Matches</option>
                              
                            </select>
                            <img src="images/select_arrow.jpg" class="select_arrow" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($products)) {
                if (!empty($products)) {
                    ?>

                    <div class="product_box grid-100 mobile-grid-100 tablet-grid-100" id="category_response">
                        <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100" >

                            <?php
                            foreach ($products as $row) {
                                ?>
                                <div class="product_sub grid-30 mobile-grid-100 tablet-grid-33">
                                    <img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->thum_image ?>" class="wdh home_img" alt="xxxxxx" />
                                    <div class="text_box grid-100 mobile-grid-100 tablet-grid-100">
                                        <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                                        <p class="service_offer_text3" style="width:100%;"><?php echo character_limiter($row->short_text, 100) ?></p>
                                        <div class="homecare_a_box"><a class="homecare_a" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $row->product_slug; ?>">VIEW PRODUCT <img src="images/right_arrow.png" class="right_arrow" alt="" /></a></div>
                                    </div>	
                                </div>
                                <?php
                            }
                            ?>


                        </div>
                        <span id="point4" class="blank2"></span>
                    </div>

                <?php } else { ?>

                    <div class="product_box grid-100 mobile-grid-100 tablet-grid-100" id="category_response">
                        <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100" >
                            <h1>Sorry No Products!</h1>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>	

            <div class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
                <p class="box2_text2 animate_bottom">Cheryls Cosmeceuticals is India’s first professional skincare brand, that has for three decades, through science, technology, chemistry and true human ingenuity transformed for face of skin care. It is our endeavour to transform the beautician to a skin expert, the salon into a skin clinic and the consumer with efficient and visible results.</p>
                <p class="box2_text2 animate_bottom">“Skin care that works” is the ethos we live by, and it has been our goal to constantly elevate and innovate the skin care experience you receive. We have treatments and rituals to treat a number of skin concerns like oily skin, dry skin, dehydrated skin, sensitivity.</p>
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

</div>





