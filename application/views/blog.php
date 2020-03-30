<div class="blog-page">
    <div class="container-fluid">
                <div class="row row card-body">
                    <div class="col-sm-12">
                       <div class="row card-body">
                        <?php
                        foreach ($post as $row) {
                       $whaturlrow =  base_url()."news/$row->category_slug/$row->post_slug";
                        ?>
                        <div class="col-lg-3 col-sm-3 border p-3">
                                    <img class="col-lg-12 col-sm-12" src="<?php echo base_url() ?>uploads/blog/<?php echo $row->image ?>"
                                        class="wdh" alt="<?php echo $row->post_title ?>" />
                                    <h1 style="color: red; font-size: 18px"><?php echo $row->category_name ?></h1>
                                    <h1 style="font-size: 18px"><?php echo $row->post_title ?></h1>
                                    <p>
                                        <?php echo substr($row->post_text, 0, 150) ?>...</p> <br />
                                        <a class="slider_a bb_pd2" style="float:none;"
                                            href="<?php echo base_url() ?>blog/<?php echo $row->category_slug ?>/<?php echo $row->post_slug ?>">READ
                                            MORE</a>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    </div>


                   
            </div>
        </div>
    </div>
