<style type="text/css">
    .sticky{
        position:fixed;
        height:85%;
    }
</style>
<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_url = "http://$_SERVER[HTTP_HOST]/blog";
?>
<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "blog",
    "item": "<?php echo $actual_url ?>"
    },{
    "@type": "ListItem",
    "position": 2,
    "name": "<?php echo $category_data->category_name; ?>",
    "item": "<?php echo $actual_link ?>"
    }]
    }
</script>


<div class="container">

    <div class="grid-container">

        <div style="margin-bottom:5%; margin-top:13%;" class="blog_container grid-100 mobile-grid-100 tablet-grid-100">
            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="box2_text1"><?php echo $category_data->category_name; ?></h1> <br /> <br />
                <?php
                // print_r($post);
                if (!empty($post)) {
                    foreach ($post as $row) {
                        ?>
                        <div class="grid-33 mobile-grid-100 tablet-grid-33">
                            <div class="blog_info_box pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="blog_share_box">
                                    <div class="blog_share_sub">
                                        <div class="blog_share_width-box">


                                            <a class="blog_share_icons st-custom-button" data-network="twitter" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a class="blog_share_icons st-custom-button" data-network="facebook" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a class="blog_share_icons st-custom-button" data-network="whatsapp" data-title="<?php echo $row->post_title ?>" href="javascript:void(0);"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>

                                        </div>	
                                    </div>	
                                    <div class="blog_share_sub1">
                                        <a class="blog_share_icons share_click" href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    </div>	
                                </div>
                                <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                    <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $row->image ?>" class="wdh" alt="<?php echo $row->post_title ?>" />
                                </div>
                                <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                                    <h1 class="service_offer_text1 animate_left"><?php echo $row->category_name ?></h1>
                                    <h1 class="service_offer_text2 animate_right"><?php echo $row->post_title ?></h1>
                                    <span id="point2" class="blank2"></span>
                                    <p class="service_offer_text3 animate_bottom"><?php echo substr($row->post_text, 0, 150) ?>...</p> <br />
                                    <div class="wdh animate_bottom"><a class="slider_a bb_pd2" style="float:none;" href="<?php echo base_url() ?>blog/<?php echo $row->category_slug ?>/<?php echo $row->post_slug ?>">KNOW MORE</a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="grid-33 mobile-grid-100 tablet-grid-33">
                        <p>Data Not Found</p>

                    </div>


                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b769a0424af07001195117c&product=inline-share-buttons"></script>