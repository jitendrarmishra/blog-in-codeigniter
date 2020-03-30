<style type="text/css">
    /* isotope css */
    * { box-sizing: border-box; }

    /* force scrollbar, prevents initial gap */
    html {
        overflow-y: scroll; 
    }


    /* ---- grid ---- */


    /* clear fix */
    .grid:after {
        content: '';
        display: block;
        clear: both;
    }

    /* ---- .element-item ---- */

    /* 5 columns, percentage width */
    .grid-item,
    .grid-sizer {
        width: 30%;
        margin:1.5%;
    }

    .grid-item {
        float: left;
    }

    .grid-item--width2 { width: 40%; }
    .grid-item--height2 { height: 200px; }
    /* isotope css */

</style>


<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 nw_pro_fnt animate_bottom"><?php echo $education_show->title ?></h1>	
    </div>

    <div class="posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">

            <a class="training_back" href="<?php echo site_url('education-show') ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>

            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                <br /> <br />

                <div class="happy_box homecare_mrg_btm grid-80 prefix-10 mobile-grid-100 tablet-grid-100">
                    <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                        <div class="single-item1">
                            <?php
                            foreach ($slider as $row) {
                                ?>
                                <div class=""><img src="<?php echo base_url() ?>uploads/education/<?php echo $row->slider_image ?>" class="wdh" alt="" /></div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <?php
                $dateValue = $education_show->publish_date;
                $time = strtotime($dateValue);
                $month = date("F", $time);
                $year = date("Y", $time);
                $day = date("d", $time);
                $date = $month . " " . $day . ", " . $year;
                ?>
                <div class="education_show_info_box grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                    <div class="education_show_info_sub grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
                        <div class="grid-33 mobile-grid-50 tablet-grid-33">
                           <p class="service_offer_text3 animate_bottom" style="width:100%;"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date ?></p>
                        </div>
                        <div class="grid-33 mobile-grid-50 tablet-grid-33">
                            <p class="service_offer_text3 animate_bottom" style="width:100%;"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $education_show->place ?></p>
                        </div>
                        <div class="grid-33 mobile-grid-50 tablet-grid-33">
                            <p class="service_offer_text3 animate_bottom" style="width:100%;"><i class="fa fa-building-o" aria-hidden="true"></i> <?php echo $education_show->title ?></p>
                        </div>
                    </div>
                    <div class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
                        <p class="box2_text2 animate_bottom"><?php echo $education_show->text ?></p>
                        <!--<p class="box2_text2 animate_bottom">“Skin care that works” is the ethos we live by, and it has been our goal to constantly elevate and innovate the skin care experience you receive. We have treatments and rituals to treat a number of skin concerns like oily skin, dry skin, dehydrated skin, sensitivity.</p>-->
                    </div>
                </div>

            </div>

        </div>
    </div>


</div>
