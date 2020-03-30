
<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">education show</h1>	
    </div>

    <div class="faqs_box2 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <div class="faqs_search_box grid-30 prefix-25 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <i class="fa faqs_icon fa-search" aria-hidden="true"></i><input type="text" id="event_search" class="faqs_search" placeholder="" name="search" />
                <div style="clear:both;"></div>
            </div>
            <div class="faqs_search_box grid-15 prefix-5 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <div class="pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                    <select style="width:100%;" class="faqs_search" id="event_year">
                        <option value="0">Year</option>
                    <?php for ($i = 2015; $i <= date('Y'); $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>
                    </select>
                    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/select_arrow.jpg" class="edu_select_arrow" alt="" />
                </div>
                <div style="clear:both;"></div>
            </div>	
        </div>	
    </div>


    <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="event_div">
        <div class="grid-container">
            <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                <?php
                foreach ($education_show as $row) {
                    $dateValue = $row->publish_date;
                    $time = strtotime($dateValue);
                    $month = date("F", $time);
                    $year = date("Y", $time);
                    $day = date("d", $time);
                    $date = $month . " " . $day . ", " . $year;
                    ?>
                    <div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
                        <div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
                            <a href="<?php echo site_url('education-show/education-show-inner/' . base64_encode($row->education_show_id)) ?>">
                                <img src="<?php echo base_url(); ?>uploads/education/<?php echo $row->photo ?>" class="wdh" alt="" />
                                <div class="animate_left"><h1 class="better_text1 speaker_txt"><?php echo $row->title ?> <i class="fa speaker_i fa-angle-right" aria-hidden="true"></i></h1></div>
                                <p class="service_offer_text3 animate_bottom" style="width:100%;"><?php echo $date ?></p> <br />
                                <p class="service_offer_text3 animate_bottom" style="width:100%;"> <?php echo $row->place ?></p> <br />
                            </a>	
                        </div>
                    </div>
                    <?php
                }
                ?>






            </div>	
        </div>	
    </div>


</div>
