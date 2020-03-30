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
    $whaturl =  base_url()."blog/$post->category_slug/$post->post_slug";
    ?>

            <div class="container-fluid">

                    <?php
                    if (!empty($post->post_id)) {
                        ?>

                        <div>
                            <h1><?php echo $post->post_title ?></h1>
                            <p>By <?php echo $user_name->f_name . " " . $user_name->l_name ?> /
                                <?php echo $date ?></p>


                                <img class="col-lg-12 col-sm-12" src="<?php echo base_url() ?>uploads/blog/<?php echo $post->image ?>" class="wdh blg_mrg" alt="" />
                                <p class="blog_inner_text"><?php echo $post->post_text ?></p>
                            </div>



                            <div id="success">
                                <div>
                                    <div>
                                        <h1>Join The Conversation</h1> <br />
                                        <span><?php echo count($comments) ?> Comment</span> <br />
                                    </div>
                                    <p class="error"><?php echo validation_errors(); ?></p>
                                    <span style="color:red">

                                        <?php
                                        if ($this->session->flashdata('message')) {
                                            echo $this->session->flashdata('message');
                                        }
                                        ?>
                                    </span>

                                    <?php
                                    foreach ($comments as $row) {

                                        $dateValue = $row->date;
                                        $time = strtotime($dateValue);
                                        $month = date("F", $time);
                                        $year = date("Y", $time);
                                        $day = date("d", $time);
                                        $date = ordinal($day) . " " . $month . ", " . $year;
                                        ?>
                                        <img src="<?php echo $this->config->item('assets'); ?>fassets/images/comment_profile.png" class="comment_profile" alt="" />

                                        <h1 style="color: red; font-size: 18px"><?php echo $row->user_name ?></h1>
                                        <span><?php echo $date ?></span>
                                        <p><?php echo $row->comment ?></p>
                                    <?php } ?>

                                </div>

                                <?php
                                if(isset($this->session->userdata['logged_in']['register_id']))
                                {
                                    ?>
                                
                                <div style="border:none; border-bottom: 1px solid #ebebeb;" id="top">

                                    <h1 style="color: red; font-size: 24px">Leave a Comment</h1>
                                    <form method="post" action="<?php echo site_url('blog/comment') ?>" class="demo-form">
                                        <label>Name*</label><br>
                                        <input required="" type="hidden" value="<?php echo $category_slug ?>"
                                       name="category_slug">
                                       <input required="" type="hidden" value="<?php echo $post_slug ?>" name="post_slug">
                                       <input required="" type="hidden" value="<?php echo $post->post_id ?>"
                                       name="post_id">
                                       <input required="" readonly="" value="<?php echo $this->session->userdata['logged_in']['name'] ?>"  type="text" name="name">
                                       <br><br>

                                       <label>E-mail*</label><br>
                                       <input required="" readonly="" value="<?php echo $this->session->userdata['logged_in']['email'] ?>" type="email" name="email">
                                       <br><br>
                                        <label>Comment*</label><br>
                                       <textarea required="" data-parsley-maxlength="500" rows="5" cols="50"
                                       name="message"></textarea>
                                       <br>
                                            <input type="submit" name='submit' class="btn btn-info" value="SUBMIT">


                                        </form>
                                    </div>
                                    <?php
                                    }
                                    else
                                    {?>
                                        <p>Click here to <a href="<?php echo site_url('login') ?>">login</a> for join Conversation</p>
                                    <?php
                                    }
                                    ?>







                                </div>


                                <?php
                            }
                            ?>



                    </div>
                
