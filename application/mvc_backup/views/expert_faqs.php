
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



<div class="container">


    <div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
        <div class="career_box1_sub"></div>
        <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">expert FAQs</h1>
    </div>


    <div class="media_box3 grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container">
            <div class="media_info_box grid-100 mobile-grid-100 tablet-grid-100">

                <div class="frequently_box grid-100 mobile-grid-100 tablet-grid-100">
                    <ol class="frequent_ol">

                        <?php
                        foreach ($expert_faqs as $row) {
                            ?>
                            <li class="frequent_li">
                                <a class="frequent_a" href="javascript:void(0);"><span class="frequent_span"><?php echo $row->faq_q ?></span> <i class="fa frequent_i fa-angle-down" aria-hidden="true"></i></a>
                                <p class="frequent_text hide"><?php echo $row->faq_ans ?></p>
                            </li>

    <?php
}
?>

                    </ol>
                </div>

                <div style="margin-top:5%;" class="career_form_sub career_form1 grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="cfs grid-100 mobile-grid-100 tablet-grid-100">
                        <h1 class="box2_text1 animate_bottom">Ask Us A Question</h1> <br /> <br />
                        <div class="grid-80 prefix-10 mobile-grid-100 tablet-grid-50">
                            <p class="skin_text1 animate_bottom" style="text-align:center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <form class="demo-form" method="post" action="<?php echo site_url('home/expertfaqs') ?>" data-parsley-validate>
                            <div class="pad0 grid-100 mobile-grid-100 tablet-grid-100">
                                <div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
                                    <div class="group">
                                        <input required="" type="text" name="name" ><span class="highlight"></span><span class="bar"></span>
                                        <label>Name*</label>
                                    </div>
                                </div>
                                <div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
                                    <div class="group">
                                        <input data-parsley-trigger="change" required="" type="email" name="email" ><span class="highlight"></span><span class="bar"></span>
                                        <label>E-mail Id*</label>
                                    </div>
                                </div>
                                <div class="cfb animate_bottom grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="group">
                                        <textarea required="" rows="8" cols="50" name="message"></textarea><span class="highlight"></span><span class="bar"></span>
                                        <label>Type your question here*</label>
                                    </div>
                                </div>
                                <div class="cfb animate_bottom posr grid-100 mobile-grid-100 tablet-grid-100">
                                    <input type="submit" class="career_submit" value="SUBMIT">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>



<script type="text/javascript">

    /* form input field plugin */
    $(window, document, undefined).ready(function () {

        $('input,select,textarea').blur(function () {
            var $this = $(this);
            if ($this.val())
                $this.addClass('used');
            else
                $this.removeClass('used');
        });

    });
    /* form input field plugin */

</script>
