<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_url = "http://$_SERVER[HTTP_HOST]";
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
 
<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "blog",
    "item": "<?php echo $actual_link ?>"
    }]
    }
</script>
<style type="text/css">
    .sticky{
        position:fixed;
        height:85%;
    }
</style>
<div class="container">
    <div class="grid-container">
        <div style="margin-bottom:5%; margin-top:15%;" class="slider_box2 homecare_mrg_btm pad0 grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
            <div class="single-item1">
                <?php
                foreach($single_slider as $s)
                {
                ?>
                
                <div class="">
                    <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $s->image ?>" class="wdh" alt="" />
                        <div class="blog_slider_text_box grid-100 mobile-grid-100 tablet-grid-100">
                            <h1 class="service_offer_text1"><?php echo $s->category_name ?></h1>
                            <h1 class="service_offer_text2"><?php echo $s->post_title ?></h1>
                        </div>	
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="blog_container grid-100 mobile-grid-100 tablet-grid-100">
            <div class="grid-70 mobile-grid-100 tablet-grid-70">

                <div class="blog_info_overlay grid-50 mobile-grid-100 tablet-grid-50">
                    <div class="blog_info_box pad0 posr grid-100 mobile-grid-100 tablet-grid-100">

                        <div class="blog_share_box">
                            <div class="blog_share_sub">
                                <div class="blog_share_width-box">
                                    <a class="blog_share_icons st-custom-button" data-network="twitter" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a class="blog_share_icons st-custom-button" data-network="facebook" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a class="blog_share_icons st-custom-button" data-network="whatsapp" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                </div>	
                            </div>	
                            <div class="blog_share_sub1">
                                <a class="blog_share_icons share_click" href="javascript:void(0);"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>	
                        </div>
                        <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                            <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $single_post->image ?>" class="wdh" alt="<?php echo $single_post->post_title ?>" />
                        </div>
                        <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                            <h1 class="service_offer_text1 animate_left"><?php echo $single_post->category_name ?></h1>
                            <h1 class="service_offer_text2 animate_right"><?php echo $single_post->post_title ?></h1>
                            <span id="point2" class="blank2"></span>
                            <p class="service_offer_text3 animate_bottom"><?php echo substr($single_post->post_text, 0, 150) ?>...</p> <br />
                            <div class="wdh animate_bottom"><a class="slider_a bb_pd2" style="float:none;" href="<?php echo base_url() ?>blog/<?php echo $single_post->category_slug ?>/<?php echo $single_post->post_slug ?>">KNOW MORE</a></div>
                        </div>
                    </div>
                </div>
                <?php
                foreach ($post as $row) {
                    ?>
                    <div class="blog_info_overlay grid-50 mobile-grid-100 tablet-grid-50">
                        <div class="blog_info_box pad0 posr grid-100 mobile-grid-100 tablet-grid-100">
                            <div class="blog_share_box">
                                <div class="blog_share_sub">
                                    <div class="blog_share_width-box">
                                        <a class="blog_share_icons st-custom-button" data-network="twitter" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a class="blog_share_icons st-custom-button" data-network="facebook" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a class="blog_share_icons st-custom-button" data-network="whatsapp" data-title="<?php echo $single_post->post_title ?>" href="javascript:void(0);"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
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
                                <div id="mob_point2" class="blank2"></div>
                                <h1 class="service_offer_text1 animate_left"><?php echo $row->category_name ?></h1>
                                <h1 class="service_offer_text2 animate_right"><?php echo $row->post_title ?></h1>
                                <span id="point2" class="blank2"></span>
                                <p class="service_offer_text3 animate_bottom"><?php echo substr($row->post_text, 0, 150) ?>...</p> <br />
                                <div class="wdh animate_bottom"><a class="slider_a bb_pd2" style="float:none;" href="<?php echo base_url() ?>blog/<?php echo $row->category_slug ?>/<?php echo $row->post_slug ?>">KNOW MORE</a></div>
                          
                            <?php // echo str_replace(" ", "_", $row->post_title) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="grid-30 mobile-grid-100 tablet-grid-30">
                <div class="blog_search_box grid-100 mobile-grid-100 tablet-grid-100">
                    <h1 class="blog_header">Search</h1>
                    
                    <form action="<?php echo site_url('blog/search'); ?>" method="post">
                    <div class="blog_search_input_box posr pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <input type="text" placeholder="Search for..." class="blog_search_input" name="search" />
                        
                          <input class="blog_search_img" type="image" src="<?php echo $this->config->item('assets'); ?>fassets/images/blog_search_img.jpg" alt="Submit">

                        <!--<a href="javascript:void(0);"><img src="<?php // echo $this->config->item('assets'); ?>fassets/images/blog_search_img.jpg" class="blog_search_img" alt="" /></a>-->
                    </div>
                    </form>
                    
                </div>
                <div class="blog_category_box grid-100 mobile-grid-100 tablet-grid-100">
                    <h1 class="blog_header">Categories</h1>
                    <div class="blog_search_input_box posr pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <ul class="blog_ul">
                            <?php
                            foreach ($category as $row) {
                                ?>
                                <li class="blog_li"><a class="blog_a" href="<?php echo base_url(); ?>blog/category/<?php echo $row->category_slug ?>"><?php echo $row->category_name ?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div> <br />
                <div class="blog_search_box grid-100 mobile-grid-100 tablet-grid-100">
                    <h1 class="blog_header">Featured Posts</h1>
                    <div class="blog_search_input_box posr pad0 grid-100 mobile-grid-100 tablet-grid-100">
                        <div class="blog_featured_posts_slider">

                            <?php
                            foreach ($featured as $ro) {
                                ?>
                            <a style="float:none;" href="<?php echo base_url() ?>blog/<?php echo $ro->category_slug ?>/<?php echo $ro->post_slug ?>">
                                <div class="posts_sub">
                                    <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                        <img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $ro->image ?>" class="wdh" alt="" />
                                        <h1 class="service_offer_text1"><?php echo $ro->category_name ?></h1>
                                        <h1 class="service_offer_text2"><?php echo $ro->post_title ?></h1>
                                    </div>
                                </div>
                            </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//platform-api.sharethis.com/js/sharethis.js#property=5b769a0424af07001195117c&product=inline-share-buttons"></script>
