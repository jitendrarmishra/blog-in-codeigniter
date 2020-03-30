
<style type="text/css">
    * { box-sizing:border-box; }

    body {
        /* font-family: Helvetica;
        background: #eee; */
        -webkit-font-smoothing: antialiased;
    }

    .group { 
        position: relative; 
        /* margin-bottom: 45px;  */
    }

    input,select,textarea {
        font-family: 'designio_mediumregular';
        font-size:1.3em;
        padding: 15px 10px 15px 10px;
        -webkit-appearance: none;
        display: block;
        background: transparent;
        color:#000;
        width: 100%;
        border: none;
        border-radius: 0;
        border: 1px solid #dbdbdb;
        outline:none;
    }

    select{
        cursor:pointer;
    }

    textarea{
        resize:none;
    }


    input:focus { outline: none; }


    /* Label */

    label {
        color: #000; 
        font-size: 1.3em;
        font-family: 'designio_mediumregular';
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 10px;
        top: 12px;
        transition: all 0.2s ease;
    }



    /* active */

    input:focus ~ label, input.used ~ label {
        top: -20px;
        /* transform: scale(.75); left: -2px; */
        transform: scale(.85); left: -2px;
        /* font-size: 14px; */
        color: rgba(0,0,0,0.50);
    }

    select:focus ~ label, select.used ~ label {
        top: -20px;
        /* transform: scale(.75); left: -2px; */
        transform: scale(.85); left: -2px;
        /* font-size: 14px; */
        color: rgba(0,0,0,0.50);
    }

    textarea:focus ~ label, textarea.used ~ label {
        top: -20px;
        /* transform: scale(.75); left: -2px; */
        transform: scale(.85); left: -2px;
        /* font-size: 14px; */
        color: rgba(0,0,0,0.50);
    }


    /* Underline */

    .bar {
        position: relative;
        display: block;
        width: 100%;
    }

    .bar:before, .bar:after {
        content: '';
        height: 2px; 
        width: 0;
        bottom: 0px; 
        position: absolute;
        background: rgba(0,0,0,0.50); 
        transition: all 0.2s ease;
    }

    .bar:before { left: 50%; }

    .bar:after { right: 50%; }


    /* active */

    input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }


    /* Highlight */

    .highlight {
        font-family: 'designio_mediumregular';
        color:#000;
        position: absolute;
        height: 60%; 
        width: 100px; 
        top: 25%; 
        left: 0;
        pointer-events: none;
        opacity: 0.5;
    }


    /* active */

    input:focus ~ .highlight {
        animation: inputHighlighter 0.3s ease;
    }

    .inpt{
        width:100%;
    }
</style>

<?php
$dateValue = $post->post_date;
$date_time = $post->date_time;
$time = strtotime($dateValue);
$month = date("F", $time);
$year = date("Y", $time);
$day = date("d", $time);
$date = ordinal($day) . " " . $month . ", " . $year;

function ordinal($num) {

    $last = substr($num, -1);
    if ($last > 3 or
            $last == 0 or ( $num >= 11 and $num <= 19 )) {
        $ext = 'th';
    } else if ($last == 3) {
        $ext = 'rd';
    } else if ($last == 2) {
        $ext = 'nd';
    } else {
        $ext = 'st';
    }
    return $num . $ext;
}
?>

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
    "name": "<?php echo $post->category_name; ?>",
    "item": "<?php echo base_url(); ?>blog/category/<?php echo $post->category_slug ?>"
    },{ 
    "@type": "ListItem",
    "position": 3,
    "name": "<?php echo $post->post_title ?>",
    "item": "<?php echo $actual_link ?>"
    }]
    }
</script>

<script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo $actual_link ?>"
    },
    "headline": "<?php echo $post->post_title ?>",
    "image": [
    "<?php echo base_url() ?>uploads/blog/<?php echo $post->image ?>"

    ],
    "datePublished": "<?php echo $dateValue ?>",
    "dateModified": "<?php echo $date_time ?>",
    "author": {
    "@type": "Person",
    "name": "<?php echo $user_name->f_name . " " . $user_name->l_name ?>"
    },
    "publisher": {
    "@type": "Organization",
    "name": "Cheryls",
    "logo": {
    "@type": "ImageObject",
    "url": "<?php echo $this->config->item('assets'); ?>fassets/images/logo.jpg"
    }
    },
    "description": "A most wonderful article"
    }
</script>


<div class="container">

    <div class="grid-container">
        <?php
        if (!empty($post->post_id)) {
            ?>

            <div class="blog_inner_box grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="blog_inner_title"><?php echo $post->post_title ?></h1>
                <p class="blog_inner_text">By <?php echo $user_name->f_name . " " . $user_name->l_name ?> / <?php echo $date ?></p>


                <img src="<?php echo base_url() ?>uploads/blog/<?php echo $post->image ?>" class="wdh blg_mrg" alt="" />
                <p class="blog_inner_text"><?php echo $post->post_text ?></p>
                <?php
                $next = $post->post_id + 1;
                $pre = $post->post_id - 1;
                ?>

                <div class="blog_prev_box">
                    <a class="blog_prev_text blog_inner_text" href="<?php echo site_url("blog/blog_inner/") . $pre ?>"><img src="<?php echo $this->config->item('assets'); ?>fassets/images/slider_left_img.png" class="blog_prev_icon" alt="" /> Previous</a>
                </div>
                <div class="blog_next_box">
                    <a class="blog_prev_text blog_inner_text" href="<?php echo site_url("blog/blog_inner/") . $next ?>">Next <img src="<?php echo $this->config->item('assets'); ?>fassets/images/slider_right_img.png" class="blog_prev_icon" alt="" /></a>
                </div>
            </div>

            <div class="blog_chat_box grid-100 mobile-grid-100 tablet-grid-100">
                <div class="comment_box grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="comment_box_sub grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="box2_text1">Join The Conversation</h1> <br />
                        <span class="comment_span"><?php echo count($comments) ?> Comment</span> <br />
                    </div>
                    <?php
                    foreach ($comments as $row) {

                        $dateValue = $row->date;
                        $time = strtotime($dateValue);
                        $month = date("F", $time);
                        $year = date("Y", $time);
                        $day = date("d", $time);
                        $date = ordinal($day) . " " . $month . ", " . $year;
                        ?>
                        <div class="comment_info_box grid-100 mobile-grid-100 tablet-grid-100">
                            <div class="grid-5 mobile-grid-10 tablet-grid-5"><img src="<?php echo $this->config->item('assets'); ?>fassets/images/comment_profile.png" class="comment_profile" alt="" /></div>
                            <div class="grid-95 mobile-grid-90 tablet-grid-95">	
                                <h1 class="blog_inner_text1 pad0 marg0"><?php echo $row->user_name ?></h1>
                                <span class="comment_span1"><?php echo $date ?></span>
                                <p class="blog_inner_text"><?php echo $row->comment ?></p>
                            </div>	
                        </div>
                    <?php } ?>

                </div>
                <div style="border:none; border-bottom: 1px solid #ebebeb;" class="cfs grid-100 mobile-grid-100 tablet-grid-100">
                    <h1 class="box2_text1">Leave a Comment</h1> <br /> <br />
                    <form method="post" action="<?php echo site_url('blog/comment') ?>" class="demo-form">
                        <div class="grid-100 mobile-grid-100 tablet-grid-100">
                            <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="cfb grid-50 mobile-grid-100 tablet-grid-50">
                                    <div class="group">
                                        <input required="" type="hidden" value="<?php echo $post->post_id ?>" name="post_id" >
                                        <input required="" type="text" name="name" ><span class="highlight"></span><span class="bar"></span>
                                        <label>Name*</label>
                                    </div>
                                </div>
                                <div class="cfb grid-50 mobile-grid-100 tablet-grid-50">
                                    <div class="group">
                                        <input required="" type="email" name="email" ><span class="highlight"></span><span class="bar"></span>
                                        <label>E-mail*</label>
                                    </div>
                                </div>
                                <div class="cfb grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="group">
                                        <textarea required="" rows="5" cols="50" name="message"></textarea><span class="highlight"></span><span class="bar"></span>
                                        <label>Message</label>
                                    </div>
                                </div>
                                <div class="cfb posr grid-100 mobile-grid-100 tablet-grid-100">
                                    <input type="submit" class="career_submit" value="SUBMIT">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="other_blogs homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="box2_text1">You May Also Like</h1> <br /> <br />
                <div class="pad0 grid-90 prefix-5 mobile-grid-90 mobile-prefix-5 tablet-grid-60 tablet-prefix-20">
                    <div class="responsive1">
                        <?php
                        foreach ($related_post as $row) {
                            ?>
                            <a href="<?php echo base_url() ?>blog/blog_inner/<?php echo $row->post_id ?>">
                                <div class="">
                                    <div style="border: 1px solid #ebebeb;" class="other_service_sub shadow_box">
                                        <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                            <!--<img src="<?php echo $this->config->item('assets'); ?>uploads/blog/<?php echo $row->image ?>" class="wdh" alt="" />-->
                                            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/blog_pic1.png" class="wdh" alt="" />
                                        </div> <br />
                                        <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                                            <h1 class="service_offer_text1"><?php echo $row->category_name ?></h1>
                                            <h1 class="service_offer_text2"><?php echo $row->post_title ?></h1>
                                            <p style="width:100%;" class="service_offer_text3"><?php echo substr($row->post_text, 0, 150) ?>...</p> <br />
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                        ?>


                        <!--                                            <a href="javascript:void(0);">
                                                                        <div class="">
                                                                            <div style="border: 1px solid #ebebeb;" class="other_service_sub shadow_box">
                                                                                <div class="service_offer_sub pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                                                                    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/blog_pic1.png" class="wdh" alt="" />
                                                                                </div> <br />
                                                                                <div class="service_offer_sub1 grid-100 mobile-grid-100 tablet-grid-100">
                                                                                    <h1 class="service_offer_text1">Oiliness</h1>
                                                                                    <h1 class="service_offer_text2">Lorem Ipsum Dolar</h1>
                                                                                    <p style="width:100%;" class="service_offer_text3">Adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p> <br />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>	-->
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
