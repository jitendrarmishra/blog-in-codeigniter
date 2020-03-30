<style type="text/css">
    .sticky{
        position:fixed;
        height:85%;
    }
</style>


<div class="container">

    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">FAQS</h1>
    </div>

    <div class="faqs_box2 grid-100 mobile-grid-100 tablet-grid-100 hide">
        <div class="grid-container">
            <div class="faqs_search_box grid-30 prefix-35 mobile-grid-100 tablet-grid-40 tablet-prefix-30">
                <i class="fa faqs_icon fa-search" aria-hidden="true"></i><input type="text" class="faqs_search" placeholder="Search answers..." name="ssearch" />
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>

    <div class="faqs_box3 posr grid-100 mobile-grid-100 tablet-grid-100">
        <div id="navbar" class="faqs_tab_box">
            <?php
            $i = 1;
            foreach ($faqs_category as $row) {
                ?>

                <a class="faqs_tab_a" href="#faq_id<?php echo $i ?>"><i class="fa faqs_tab_icon fa-angle-right" aria-hidden="true"></i> <?php echo $row->faqs_category ?></a>

                <?php
                $i++;
            }
            ?>

        </div>
        <div class="grid-container">
            <div class="faqs_sub grid-80 prefix-20 mobile-grid-100 tablet-grid-80 tablet-prefix-20">

                <?php
                $i = 1;
                foreach ($faqs_category as $row) {
                    $results = faqs_qa($row->faqs_category_id);
                    ?>

                    <div class="frequently_box homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100" id="faq_id<?php echo $i ?>">
                        <h1 class="faqs_text1 animate_right"><?php echo $row->faqs_category ?><span class="faqs_blank_span animate_left"></span></h1>
                        <div class="frequently_box grid-100 mobile-grid-100 tablet-grid-100">
                            <ol class="frequent_ol">


                                <?php
                                foreach ($results as $r) {
                                    ?>
                                    <li class="frequent_li">

                                        <a class="frequent_a" href="javascript:void(0);"><span class="frequent_span"><?php echo $r->faqs_question ?></span> <i class="fa frequent_i fa-angle-down" aria-hidden="true"></i></a>
                                        <p class="frequent_text hide"><?php echo $r->faqs_answer ?></p>

                                    </li>
                                    <?php
                                }
                                ?>

                            </ol>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>

            </div>
        </div>
        <div id="ss" style="height:10px;" class="grid-100 mobile-grid-100 tablet-grid-100"></div>
    </div>


</div>
