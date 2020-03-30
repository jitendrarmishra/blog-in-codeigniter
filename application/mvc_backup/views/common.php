<?php
if (isset($media)) {
    if (!empty($media)) {
        ?>

        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="ResponseDiv">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <?php
                    $i = 1;
                    foreach ($media as $row) {
                        ?>
                        <div class="grid-33 mobile-grid-100 tablet-grid-50">
                            <div class="media_info_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                <img src="<?php echo base_url() ?>uploads/media/<?php echo $row->photo ?>" class="media_img" alt="" />
                                <h1 class="better_text1 btext media_txt"><?php echo $row->title ?></h1>
                                <p class="better_text2 btext1 si_text2"><?php echo $row->publish_date ?></p>
                                <div class="media_article_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="media_article_sub pad0 grid-50 mobile-grid-50 tablet-grid-50"><a class="media_info_a" data-fancybox="gallery" href="<?php echo base_url() ?>uploads/media/<?php echo $row->photo ?>" title="Morning on Camaret (Tony N.)">VIEW ARTICLE</a></div>
                                    <div class="media_article_sub pad0 grid-50 mobile-grid-50 tablet-grid-50"><a class="media_info_a" href="javascript:void(0);">VIEW PRODUCT</a></div>
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

    <?php } else { ?>

        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="ResponseDiv">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <p>Data Not Found!</p>
                </div>
            </div>
        </div>



        <?php
    }
}
?>


<?php
if (isset($concern_products)) {
    if (!empty($concern_products)) {
        ?>
        <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100" id="category_response">

            <?php
            foreach ($concern_products as $row) {
//                print_r($concern_products);
//                die;
                ?>
                <div class="product_sub grid-30 mobile-grid-100 tablet-grid-33">
                    <img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->thum_image ?>" class="wdh home_img" alt="" />
                    <div class="text_box grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                        <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                        <p class="service_offer_text3" style="width:100%;"><?php echo $row->short_text ?></p>
                        <div class="homecare_a_box"><a class="homecare_a" href="<?php echo base_url() ?>homecare-category/<?php echo $row->category_slug ?>/<?php echo $row->product_slug; ?>">VIEW PRODUCT <img src="<?php echo $this->config->item('assets'); ?>fassets/images/right_arrow.png" class="right_arrow" alt="" /></a></div>
                    </div>	
                </div>
                <?php
            }
            ?>


        </div>

    <?php } else { ?>

        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="category_response">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <p>Data Not Found!</p>
                </div>
            </div>
        </div>

        <?php
    }
}
?>



<?php
if (isset($category_products)) {
    if (!empty($category_products)) {
        ?>


        <div class="product_box grid-100 mobile-grid-100 tablet-grid-100" id="concern_response">
            <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-100">

                <?php
                foreach ($category_products as $row) {
                    ?>
                    <div class="product_sub grid-30 mobile-grid-100 tablet-grid-33">
                        <img src="<?php echo base_url() ?>uploads/homecare/<?php echo $row->thum_image ?>" class="wdh home_img" alt="" />
                        <div class="text_box grid-100 mobile-grid-100 tablet-grid-100">
                            <h1 class="service_offer_text1 animate_left"><?php echo $row->green_text ?></h1>
                            <h1 class="service_offer_text2 animate_right"><?php echo $row->black_text ?></h1>
                            <p class="service_offer_text3" style="width:100%;"><?php echo $row->short_text ?></p>
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

        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <p>Data Not Found!</p>
                </div>
            </div>
        </div>



        <?php
    }
}
?>


<?php
if (isset($eventname)) {
    if (!empty($eventname)) {
        ?>


        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100 " id="event_div">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <?php
                    foreach ($eventname as $row) {
                        $dateValue = $row->publish_date;
                        $time = strtotime($dateValue);
                        $month = date("F", $time);
                        $year = date("Y", $time);
                        $day = date("d", $time);
                        $date = $month . " " . $day . ", " . $year;
                        ?>
                        <div class="animate_bottom grid-33 mobile-grid-100 tablet-grid-50">
                            <div class="pad0 speaker_box grid-100 mobile-grid-100 tablet-grid-100">
                                <a href="<?php echo site_url('home/education_show_inner/' . base64_encode($row->education_show_id)) ?>">
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
    <?php } else { ?>

        <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="event_div">
            <div class="grid-container">
                <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                    <p>No Events Found!</p>
                </div>
            </div>
        </div>



        <?php
    }
}
?>
