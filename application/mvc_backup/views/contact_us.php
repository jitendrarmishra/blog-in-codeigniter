
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

<div class="career_box1 mrg_top posr grid-100 mobile-grid-100 tablet-grid-100">
    <div class="career_box1_sub"></div>
    <h1 style="text-align:center;" class="service_box1_text1 animate_bottom">Contact us</h1>	
</div>

<div class="career_box3 pad0 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-container">
        <div class="career_form_box pad0 homecare_mrg_btm grid-100 mobile-grid-100 tablet-grid-100">
            <div class="career_form_sub pad0 career_form1 grid-100 mobile-grid-100 tablet-grid-100">
                <div class="contact_form_box contact_animate grid-100 mobile-grid-100 tablet-grid-100">
                    <div class="pad0 grid-80 prefix-10 mobile-grid-100 tablet-grid-50">
                        <p class="skin_text1 animate_bottom" style="text-align:center; margin-bottom:2%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo</p>
                        <div class="contact_text_box grid-60 prefix-20 mobile-grid-100 tablet-grid-60 tablet-prefix-20">
                            <h1 class="contact_h1"><i class="fa contact_icon fa-phone" aria-hidden="true"></i> 0811 454 4423 / 24</h1>
                            <p class="contact_text1">Speak directly with Customer Care - Mon to Fri: 9:00 am. – 5:00 p.m. IST</p>
                            <p class="contact_text2">OR</p>
                            <p class="contact_text3">make an enquiry</p>
                        </div>
                        <form class="demo-form" action="<?php echo site_url('home/contactus') ?>" method="post" data-parsley-validate>
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
                                <div class="cfb animate_bottom grid-50 mobile-grid-100 tablet-grid-50">
                                    <div class="group">
                                        <input data-parsley-type="number" required="" type="text" name="number" ><span class="highlight"></span><span class="bar"></span>
                                        <label>Phone Number*</label>
                                    </div>
                                </div>
                                <div class="cfb animate_bottom posr grid-50 mobile-grid-100 tablet-grid-50">
                                    <img src="images/down_arrow.png" class="down_arow" alt="" />
                                    <div class="group">
                                        <select required="" name="type">
                                            <option value="0"></option>
                                            <option value="Manager">Manager</option>
                                            <option value="Tech Lead">Tech Lead</option>
                                        </select><span class="highlight"></span><span class="bar"></span>
                                        <label>Enquiry type</label>
                                    </div>
                                </div>
                                <div class="cfb animate_bottom grid-100 mobile-grid-100 tablet-grid-100">
                                    <div class="group">
                                        <textarea required="" rows="8" cols="50" name="message"></textarea><span class="highlight"></span><span class="bar"></span>
                                        <label>Message</label>
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

<div class="contact_info_box pad0 grid-100 mobile-grid-100 tablet-grid-100">
    <div class="contact_info_sub grid-50 mobile-grid-100 tablet-grid-50">
        <div class="grid-85 prefix-15 mobile-grid-100 tablet-grid-85 tablet-prefix-15">
            <h1 class="box2_text1 contact_header animate_bottom">Write To Us</h1> <br />
            <p class="skin_text1 animate_bottom" style="margin-bottom:4.4%; margin-top:4%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo</p>
            <a class="contact_a" href="javscript:void(0);"><p class="skin_text1 animate_bottom" style="margin-bottom:2%; margin-top:4%;"><i class="fa contact_icon fa-envelope-o" aria-hidden="true"></i> care@cheryls.com</p></a>
        </div>
    </div>
    <div class="contact_info_sub grid-50 mobile-grid-100 tablet-grid-50">
        <div class="grid-85 prefix-15 mobile-grid-100 tablet-grid-85 tablet-prefix-15">
            <h1 class="box2_text1 contact_header animate_bottom">Connect With Us</h1> <br />
            <p class="skin_text1 animate_bottom" style="margin-bottom:2%; margin-top:2%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo</p>
            <a class="skin_text1 contact_a1" href="javscript:void(0);"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a class="skin_text1 contact_a1" href="javscript:void(0);"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            <a class="skin_text1 contact_a1" href="javscript:void(0);"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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
