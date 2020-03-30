<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Media</h1>
    </div>

    <div class="media_box2 pad0 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container pad0">
            <div class="media_select_box posr grid-30 prefix-20 mobile-grid-50 tablet-grid-40 tablet-prefix-30">


                <select class="media_select media_month">
                    <option value="0">Month</option>
                    <?php for ($iM = 1; $iM <= 12; $iM++) { ?>
                        <option value="<?php echo $iM ?>"><?php echo date("M", strtotime("$iM/12/10")) ?></option>

                    <?php } ?>
                </select>
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/select_arrow.jpg" class="select_arrow1" alt="" />
            </div>
            <div class="media_select_box posr grid-30 prefix-5 mobile-grid-50 tablet-grid-40 tablet-prefix-30">

                <select class="media_select media_year">

                    <option value="0">Year</option>
                    <?php for ($i = 2010; $i <= date('Y'); $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>

                </select>
                <img src="<?php echo $this->config->item('assets'); ?>fassets/images/select_arrow.jpg" class="select_arrow1" alt="" />
            </div>
        </div>
    </div>

    <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100" id="ResponseDiv">
        <div class="grid-container">
            <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">
                <?php
                $i = 1;
                foreach ($media as $row) {
                    $dateValue = $row->publish_date;
                    $time = strtotime($dateValue);
                    $month = date("F", $time);
                    $year = date("Y", $time);
                    $day = date("d", $time);
                    $date = $month . " " . $day . ", " . $year;
                    ?>
                    <div class="grid-33 mobile-grid-100 tablet-grid-50">
                        <div class="media_info_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                            <img src="<?php echo base_url() ?>uploads/media/<?php echo $row->photo ?>" class="media_img" alt="" />
                            <h1 class="better_text1 btext media_txt"><?php echo $row->title ?></h1>
                            <p class="better_text2 btext1 si_text2"><?php echo $date ?></p>
                            <div class="media_article_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="media_article_sub pad0 grid-50 mobile-grid-50 tablet-grid-50"><a class="media_info_a" data-fancybox="gallery" href="<?php echo base_url() ?>uploads/media/<?php echo $row->photo ?>" title="Morning on Camaret (Tony N.)">VIEW ARTICLE</a></div>
                                <div class="media_article_sub pad0 grid-50 mobile-grid-50 tablet-grid-50"><a class="media_info_a" href="<?php echo $row->view_product_link ?>">VIEW PRODUCT</a></div>
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

</div>

<div id="div1"></div>
