
<style type="text/css">
    .sticky{
        position:fixed;
        height:85%;
    }
</style>


<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">OUR training centres </h1>	
    </div>

    <div class="faqs_box3 posr grid-100 mobile-grid-100 tablet-grid-100">
        <div id="navbar" class="faqs_tab_box">
            <a class="faqs_tab_a faqs_tab_a_active center_all" href="javascript:void(0);"><i class="fa faqs_tab_icon faqs_tab_icon_active fa-angle-right" aria-hidden="true"></i> All</a>
            <?php
            foreach ($centers as $row) { ?>
            <a class="faqs_tab_a center_name" id="<?php echo $row->city_id ?>" href="javascript:void(0);"><i class="fa faqs_tab_icon fa-angle-right" aria-hidden="true"></i><?php echo $row->city_name ?></a>

        <?php } ?>
           <!--  <a class="faqs_tab_a" href="javascript:void(0);"><i class="fa faqs_tab_icon fa-angle-right" aria-hidden="true"></i> Delhi</a>
            <a class="faqs_tab_a" href="javascript:void(0);"><i class="fa faqs_tab_icon fa-angle-right" aria-hidden="true"></i> Pune</a>
            <a class="faqs_tab_a" href="javascript:void(0);"><i class="fa faqs_tab_icon fa-angle-right" aria-hidden="true"></i> Udaipur</a> -->
        </div>
        <div class="grid-container">
            <div class="faqs_sub grid-80 prefix-20 mobile-grid-100 tablet-grid-80 tablet-prefix-20">
                <?php
                foreach ($center_details as $row) { ?>
                    
                <div class="flag_store_box center_details prefix-5 pad0 grid-40 mobile-grid-100 tablet-grid-45" id="<?php echo $row->city_id ?>">
                    <div class="flag_store_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text2  center_name_two" ><?php echo $row->center_name ?></h1>
                        <h1 class="service_offer_text2 " style="color:#535353;" ><?php echo $row->center_area ?></h1> <br />
                        <p class="service_offer_text3 " style="width:100%;"><?php echo $row->center_address ?></p> <br />
                        <p class="service_offer_text3 " style="width:100%;"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> <?php echo $row->center_number ?></p><br />
                    </div>
                    <div class="flag_store_sub2 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="grid-50 mobile-grid-50 tablet-grid-50">
                            <a style="text-decoration:none;" href="<?php echo base_url() ?>our-training-centres/training-centres-gallery/<?php echo base64_encode($row->center_id) ?>"><p class="service_offer_text3 " style="width:100%;"><i class="fa fa-picture-o" aria-hidden="true"></i> View Gallery</p></a>
                        </div>
                        <div class="grid-50 mobile-grid-50 tablet-grid-50">
                            <a style="text-decoration:none;" href="https://www.google.com/maps/search/<?php echo $row->center_address ?>" target="_blank"><p class="service_offer_text3 " style="width:100%;"><i class="fa fa-map-marker" aria-hidden="true"></i> Get Directions</p></a>
                        </div>
                    </div>
                </div>


                <?php } ?>
           

            </div>	
        </div>
        <div id="ss" style="height:10px;" class="grid-100 mobile-grid-100 tablet-grid-100"></div>
    </div>


</div>
