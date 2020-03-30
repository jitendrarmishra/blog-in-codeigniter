
<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">STORE LOCATOR</h1>	
    </div>

    <div class="faqs_box2 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <div class="faqs_search_box grid-40 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <i style="margin-top:3.8%;" class="fa faqs_icon fa-search" aria-hidden="true"></i><input type="text" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" class="faqs_search pincode_search" placeholder="Enter postal code or area..." name="search" />
                <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                <div style="clear:both;"></div>
            </div>
            <div class="faqs_search_box grid-25 prefix-5 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <div class="pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                    <select style="width:100%;" class="faqs_search store_search" id="city_dropdown">
                        <?php foreach ($salon_centers as $row) { ?>

                            <option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option> 

                        <?php } ?>

                    </select>
                    <img style="width:12%; right:-3%;" src="<?php echo $this->config->item('assets'); ?>fassets/images/select_arrow.jpg" class="edu_select_arrow" alt="" />
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="faqs_search_box grid-25 prefix-5 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <a class="location_button" href="javascript:void(0);"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> use current location</a>
                <div style="clear:both;"></div>
            </div>	
        </div>	
    </div>

    <!-- <div id="result"></div> -->


    <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">

            <div class="top_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                <div class="top_box_sub pad0 grid-20 mobile-grid-50 tablet-grid-20">
                    <p class="city_text"></p>
                </div>
                <!-- 	<div class="top_box_sub pad0 grid-20 prefix-60 mobile-grid-50 tablet-grid-20">
                                <select class="distance_inpt">
                                        <option value="0">Distance Radius</option>
                                        <option value="1">1 miles</option>
                                        <option value="2">2 Miles</option>
                                        <option value="3">3 Miles</option>
                                </select>
                        </div>	 -->
            </div>	


            <div class="store_locator_container pad0 grid-100 mobile-grid-100 tablet-grid-100">
                <div class="store_locator_address_box grid-45 mobile-grid-100 tablet-grid-45">

                    <div class="error_msg" style="color: Red;"></div>	
                    <?php
                    $i = 1;
                    foreach ($salon_details as $row) {
                        ?>
                        <div class="store_locator_info_box pad0 grid-100 mobile-grid-100 tablet-grid-100" id="<?php echo $row->city_id ?>" data-pin= "<?php echo $row->pincode ?>">
                            <div class="store_locator_info_sub grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="pad0 grid-10 mobile-grid-10 tablet-grid-10">
                                    <h1 class="service_offer_text2 text_align_left" ><?php echo $i ?></h1>
                                </div>
                                <input type="hidden" name="myHiddenValue" value="<?php echo $row->city_id ?>" /> 
                                <div class="pad0 grid-90 mobile-grid-90 tablet-grid-90">
                                    <h1 class="service_offer_text2 text_align_left" ><?php echo $row->name ?></h1>
                                    <p class="service_offer_text3 text_align_left" style="width:100%;"><?php echo $row->address ?></p> <br />
                                    <p class="service_offer_text3 text_align_left" style="width:100%;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> <?php echo $row->number ?></p><br />
                                </div>
                            </div>
                            <div class="store_locator_info_sub2 grid-100 mobile-grid-100 tablet-grid-100">
                                <?php if (isset($distance)) { ?> 
                                    <div class="grid-50 mobile-grid-50 tablet-grid-50">
                                        <p class="service_offer_text3" style="width:100%;"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $distance ?></p>
                                    </div>

                                <?php } ?>
                                <div class="grid-50 mobile-grid-50 tablet-grid-50">
                                    <a style="text-decoration:none;" href="https://www.google.com/maps/search/<?php echo $row->address ?>" target="_blank"><p class="service_offer_text3" style="width:100%;"><i class="fa fa-location-arrow" aria-hidden="true"></i> Get Directions</p></a>
                                </div>
                            </div>
                        </div>

                        <?php $i++;
                    } ?>

                </div>
                <div class="store_locator_map_box grid-55 mobile-grid-100 tablet-grid-55" >

                    <div id="info" class="hide"></div>
                    <div id="map" style="height: 500px;width: 700px;"></div>
                </div>




            </div>

        </div>	
    </div>

    <div class="flagship_store_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
        <h1 class="box2_text1">Flagship Store</h1> <br />
        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/store_locator_img1.jpg" class="wdh" alt="" />
    </div>

    <div class="grid-container">
        <div class="benefit_box grid-100 mobile-grid-100 tablet-grid-100">
            <p style="text-align:center; margin-bottom:2%;" class="sbt_text">Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut. aliquip ex eacommodo nom </p>
            <div class="grid-30 prefix-35"><a class="slider_a bb_pd" style="float:none;" href="<?php echo $this->config->item('flagship_link')  ?>">VIEW STORES</a></div>
        </div>
    </div> <br /> <br />

</div>


