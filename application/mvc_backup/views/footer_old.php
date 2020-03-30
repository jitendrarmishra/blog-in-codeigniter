<!--footer-->
<form>
    <div class="form_box grid-100 mobile-grid-100 tablet-grid-100">
        <div class="grid-container pad0">
            <div class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
                <div class="grid-40 mobile-grid-100 tablet-grid-40">
                    <h1 class="box5_text1">Sign Up For Newsletter</h1>
                </div>
                <div class="grid-60 mobile-grid-100 tablet-grid-60">
                    <div class="animate_top grid-100 mobile-grid-100 tablet-grid-100">
                        <input required="" type="email" placeholder="Enter Email Address" class="inpt" />
                    </div>
                    <div class="animate_left grid-50 mobile-grid-50 tablet-grid-50">
                        <!--<a class="slider_a1 bbt" onclick="singup('for_me')" href="javascript:void(0);">FOR ME</a>-->
                        <input type="button" class="slider_a1 bbt" onclick="singup('for_me')" value="FOR ME">
                    </div>
                    <div class="animate_right grid-50 mobile-grid-50 tablet-grid-50">
                        <input type="button" class="slider_a1 bbt" onclick="singup('for_pro')" value="FOR PROFESSIONALS">
                        <!--<a class="slider_a1 bbt" onclick="singup('for_pro')" href="javascript:void(0);">FOR PROFESSIONALS</a>-->
                    </div>
                    <p id='email_message'></p>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="footer posr grid-100 mobile-grid-100 tablet-grid-100">
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/water1.jpg" class="water1 hide-on-mobile hide-on-tablet" alt="" />
    <img src="<?php echo $this->config->item('assets'); ?>fassets/images/water2.jpg" class="water2 hide-on-mobile hide-on-tablet" alt="" />
    <div class="grid-container posr pad0" style="z-index:2;">

        <div class="grid-90 prefix-5 mobile-grid-100 tablet-grid-100">
            <div class="animate_bottom mob_mg mb_ft grid-20 mobile-grid-100 tablet-grid-20">
                <h1 class="footer_text1">SALON SERVICES <i class="fa mob_footer_icon hide-on-desktop hide-on-tablet fa-angle-down" aria-hidden="true"></i></h1>
                <div class="wdh mob_footer_box">
                    <?php
                        $salon_category = salon_category();
                        foreach ($salon_category as $row) {
                    ?>

                        <a class="footer_text2" href="<?php echo base_url() ?>home/salon_category/<?php echo base64_encode($row->service_id); ?>"><?php echo $row->service_name ?></a>

                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="animate_bottom mob_mg mb_ft grid-20 mobile-grid-100 tablet-grid-20">
                <h1 class="footer_text1">HOMECARE PRODUCTS <i class="fa mob_footer_icon hide-on-desktop hide-on-tablet fa-angle-down" aria-hidden="true"></i></h1>
                <div class="wdh mob_footer_box">
                     <?php
                        $homecare_category = homecare_category();
                        foreach ($homecare_category as $row) {
                    ?>
                                             
                        <a class="footer_text2" href="<?php echo base_url() ?>home/homecare_category/<?php echo base64_encode($row->homecare_id); ?>"><?php echo $row->homecare_category_name ?></a>

                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="animate_bottom mob_mg mb_ft grid-20 mobile-grid-100 tablet-grid-20">
                <h1 class="footer_text1">THE CHERYL’S STORY <i class="fa mob_footer_icon hide-on-desktop hide-on-tablet fa-angle-down" aria-hidden="true"></i></h1>
                <div class="wdh mob_footer_box">
                    <a class="footer_text2" href="<?php echo base_url() ?>our-story">Our Story</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>mission-vision">Mission & Vision</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>our-reach">Our Reach</a>
                </div>
            </div>
            <div class="animate_bottom mob_mg mb_ft hide-on-desktop hide-on-tablet grid-20 mobile-grid-100 tablet-grid-20">
                <h1 class="footer_text1">QUICK LINKS <i class="fa mob_footer_icon hide-on-desktop hide-on-tablet fa-angle-down" aria-hidden="true"></i></h1>
                <div class="wdh mob_footer_box">
                    <a class="footer_text2" href="<?php echo base_url() ?>home/skin_scan">Skin Scan</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>blog">Blog</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>salon-locator">Salon Locator</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>salon-locator">Flagship Store</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>media">Media</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>contact-us">Contact Us</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>career">Careers</a>
                    <a class="footer_text2" href="<?php echo base_url() ?>faqs">FAQS</a>
                </div>
            </div>
            <div class="animate_bottom mob_mg hide-on-mobile grid-20 mobile-grid-100 tablet-grid-20">
                <a class="footer_text3" href="<?php echo base_url() ?>home/skin_scan">SKIN SCAN</a>
                <a class="footer_text3" href="<?php echo base_url() ?>blog">BLOG</a>
                <a class="footer_text3" href="<?php echo base_url() ?>salon-locator">SALON LOCATOR</a>
                <a class="footer_text3" href="<?php echo base_url() ?>flagship-store">FLAGSHIP STORE</a>
            </div>
            <div class="animate_bottom mob_mg hide-on-mobile grid-20 mobile-grid-100 tablet-grid-20">
                <a class="footer_text3" href="<?php echo base_url() ?>media">MEDIA</a>
                <a class="footer_text3" href="<?php echo base_url() ?>contact-us">CONTACT US</a>
                <a class="footer_text3" href="<?php echo base_url() ?>career">CAREERS</a>
                <a class="footer_text3" href="<?php echo base_url() ?>faqs">FAQS</a>
            </div>
            <div class="animate_bottom ft_mg_up mb_ft left-to-right grid-100 mobile-grid-100 tablet-grid-100">
                <h1 class="footer_text1" style="text-align:center;">FOR PROFESSIONALS <i class="fa mob_footer_icon hide-on-desktop hide-on-tablet fa-angle-down" aria-hidden="true"></i></h1>
                <div class="wdh mob_footer_box">
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>introduction">Introduction</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>courses-offered">Courses Offered</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>training-centres">Our Training Centres</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>education-show">Education Show</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>innovative-treatments">Innovative Treatments</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>business-support">Business Support</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>experts-speaker">Experts Speak</a>
                    <a class="footer_text2 ff_a" href="<?php echo base_url() ?>expert-faqs">Experts FAQs</a>
                </div>
            </div>
            <img src="<?php echo $this->config->item('assets'); ?>fassets/images/water1.jpg" class="water1 hide-on-desktop" alt="" />
            <div class="footer_icon_box animate_bottom grid-100 mobile-grid-100 tablet-grid-100">
                <a class="footer_text2 ff_a1" href="javascript:void(0);"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a class="footer_text2 ff_a1" href="javascript:void(0);"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <a class="footer_text2 ff_a1" href="javascript:void(0);"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

    </div>
</div>

<div class="footer_bottom grid-100 mobile-grid-100 tablet-grid-100">
    <div class="grid-50 mobile-grid-100 tablet-grid-50">
        <p class="footer_text4">All Rights Reserved &#169; Cheryl’s Cosmeceuticals</p>
    </div>
    <div class="grid-50 mobile-grid-100 tablet-grid-50">
        <p class="footer_text4 al_rh">Crafted By Togglehead</p>
    </div>
</div>
<!--footer-->

</div>

<script src="<?php echo $this->config->item('assets'); ?>fassets/assets/javascripts/jquery.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/slick.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/parallax.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/jquery.waypoints.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/scrollreveal.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/jquery.fancybox.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/script.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/assets/javascripts/demo.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/jquery.stellar.js"></script>




<script type="text/javascript">
                            var scene = document.getElementById('scene');
                            var scene1 = document.getElementById('scene1');
                            var scene2 = document.getElementById('scene2');
                            var parallax = new Parallax(scene);
                            var parallax = new Parallax(scene1);
                            var parallax = new Parallax(scene2);

                            $(document).ready(function () {
                                $('.responsive').slick({
                                    dots: false,
                                    infinite: true,
                                    speed: 2000,
                                    autoplay: true,
                                    autoplaySpeed: 2000,
                                    arrows: false,
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    responsive: [
                                        {
                                            breakpoint: 1024,
                                            settings: {
                                                slidesToShow: 3,
                                                slidesToScroll: 3,
                                                infinite: true,
                                                dots: true
                                            }
                                        },
                                        {
                                            breakpoint: 600,
                                            settings: {
                                                slidesToShow: 1,
                                                slidesToScroll: 1
                                            }
                                        },
                                        {
                                            breakpoint: 480,
                                            settings: {
                                                slidesToShow: 1,
                                                slidesToScroll: 1
                                            }
                                        }
                                        // You can unslick at a given breakpoint now by adding:
                                        // settings: "unslick"
                                        // instead of a settings object
                                    ]
                                });

                                $('.home_tab_click1').click(function () {
                                    $('.tab_box1').animate({"left": "0%"});
                                    $('.home_tab2').css({"z-index": "-1", "opacity": "0"});
                                    $('.home_tab1').css("opacity", "1");
                                    /* $("#slider2").slick('destroy');
                                     $("#slider1").slick('init'); */
                                });

                                $('.home_tab_click2').click(function () {
                                    $('.tab_box1').animate({"left": "50%"});
                                    $('.home_tab2').css({"z-index": "1", "opacity": "1"});
                                    $('.home_tab1').css("opacity", "0");
                                    /* $("#slider1").slick('destroy');
                                     $("#slider2").slick('init'); */
                                });

                            });
</script>


<script type="text/javascript">
    var pageWidth = $(window).width();
    if (pageWidth > 1024) {
        $(window).stellar();
    }

    //This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // This function creates an iframe and YouTube player
    // after the API code downloads.
    var ik_player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('video', {
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        // console.log('player is ready');
    }

    // The API calls this function when the player's state changes.
    function onPlayerStateChange(event) {
        switch (event.data) {
            case YT.PlayerState.UNSTARTED:
                // console.log('unstarted');
                $('.si_text_box').animate({"width": "200px"});
                break;
            case YT.PlayerState.ENDED:
                // console.log('ended');
                $('.si_text_box').animate({"width": "300px"});
                break;
            case YT.PlayerState.PLAYING:
                // console.log('playing');
                $('.si_text_box').animate({"width": "200px"});
                break;
            case YT.PlayerState.PAUSED:
                // console.log('paused');
                $('.si_text_box').animate({"width": "300px"});
                break;
            case YT.PlayerState.BUFFERING:
                // console.log('buffering');
                $('.si_text_box').animate({"width": "200px"});
                break;
            case YT.PlayerState.CUED:
                // console.log('video cued');
                break;
        }
    }

    $(document).ready(function () {
        $('.responsive').slick({
            dots: false,
            infinite: true,
            speed: 2000,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $('.responsive1').slick({
            dots: false,
            infinite: true,
            speed: 2000,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

    var pageWidth = $(window).width();
    if (pageWidth > 767) {
        // When the user scrolls the page, execute myFunction
        window.onscroll = function () {
            myFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop * 4.95;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    } else {
        // When the user scrolls the page, execute myFunction
        window.onscroll = function () {
            myFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop / 1.2;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    }
    ;

</script>

<!-------------------------  OUR STORY PAGE JS STARTS ----------------------------------->

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on("scroll", onScroll);

            /* menu anchor tag scroll animation */
            // Add smooth scrolling to all links
            $(".story_tab_a").on('click', function (event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
            /* menu anchor tag scroll animation */

            $("#button").click(function () {
                $('html, body').animate({
                    scrollTop: $("#play_box").offset().top
                }, 20000);
            });

        });

        var pageWidth = $(window).width();
        if (pageWidth > 767) {
            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                myFunction()
            };

            // Get the navbar
            var navbar = document.getElementById("navbar");
            var navbar1 = document.getElementById("ss");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop * 3.8;
            // console.log(sticky);
            var sticky1 = navbar1.offsetTop * 1.16;
            // console.log(sticky1);

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky && window.pageYOffset <= sticky1) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        } else {
            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                myFunction()
            };

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop / 1.2;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        }
        ;



        function onScroll(event) {
            var scrollPos = $(document).scrollTop() / 1.19;
            $('.story_tab_a').each(function () {
                var currLink = $(this);
                var refElement = $(currLink.attr("href"));
                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() >= scrollPos) {
                    $('.story_tab_a').removeClass("story_tab_a_active");
                    $('.story_tab_span').removeClass('story_tab_span_active');
                    currLink.addClass("story_tab_a_active");
                    currLink.find('.story_tab_span').addClass('story_tab_span_active');
                } else {
                    currLink.removeClass("story_tab_a_active");
                    currLink.removeClass("story_tab_span_active");
                }
            });
        }
    </script>

<!-------------------------  OUR STORY PAGE JS ENDS ------------------------------------->



<!-------------------------- Media ajax for month and year starts ----------------------->

    <script>

        $(document).ready(function () {
            var year = $('.media_year').val();

            $(".media_select").change(function () {
                var month = $('.media_month').val();
                var year = $('.media_year').val();

                var ur = '<?php echo base_url(); ?>home/month_media';
                $.ajax({
                    type: 'post',
                    url: ur,
                    data: {field1: month, field2: year},
                    success: function (data)
                    {

                        $('#ResponseDiv').html(data);
                    }

                })


            });
        });

    </script>

<!-------------------------- Media ajax for month and year ends ------------------------->


<!-------------------------- Homecare Concern page script ends  ------------------------->

    <script type="text/javascript">
        var pageWidth = $(window).width();
        if (pageWidth > 1024) {
            $(window).stellar();
        }
    </script>

<!-------------------------- Homecare Concern page script ends   ------------------------>

<!-------------------------- Homecare Concern Inner page script ends -------------------->

    <script type="text/javascript">
        var pageWidth = $(window).width();
        if (pageWidth > 1024) {
            $(window).stellar();
        }

        var pageWidth = $(window).width();
        if (pageWidth > 767) {
            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                myFunction()
            };

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop * 4.07;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        } else {
            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                myFunction()
            };

            // Get the navbar
            var navbar = document.getElementById("navbar");

            // Get the offset position of the navbar
            var sticky = navbar.offsetTop / 1.2;

            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        }
        ;
    </script>


<!-------------------------- Homecare concern Inner page script ends -------------------->


<!-------------------------- Homecare category page script ends ------------------------->

    <script type="text/javascript">
        var pageWidth = $(window).width();
        if (pageWidth > 1024) {
            $(window).stellar();
        }
    </script>

<!-------------------------- Homecare category page script ends ------------------------->

<!-------------------------- Homecare Category page Ajax script ends -------------------->

    <script>

        $(document).ready(function () {
            var concern = $('.concern_list').val();

            $(".concern_list").change(function () {
                var concern = $('#concern_list_data').val();
                var category = $('#homecare_category_id').val();
                var sortby = $('#sort_by_category').val();


                var url = '<?php echo base_url(); ?>home/concern_filter';
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {concern_id: concern, category_id: category},
                    success: function (data)
                    {
                        $('#category_response').html(data);

                    }

                })


            });
        });

    </script>

<!-------------------------- Homecare category page Ajaxscript ends --------------------->

<!-------------------------- Homecare Concern page Ajaxscript ends --------------------->

    <script>

        $(document).ready(function () {
            var concern = $('.category_list').val();

            $(".category_list").change(function () {
                var category = $('#category_list_data').val();
                var sortby = $('#sort_by_concern').val();
                var concern_id = $('#homecare_concern_id').val();


                var url = '<?php echo base_url(); ?>home/category_filter';
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {category_id: category, concern_id: concern_id},
                    success: function (data)
                    {
                        $('#concern_response').html(data);

                    }

                })


            });
        });

    </script>

<!-------------------------- Singup page script ends ----------------------------------->

    <script>

        function singup(buttonVal)
        {
            var email = $('.inpt').val();

            status = isEmail(email)

            if ((email != "") && (status == 'true'))
            {
               
                var url = '<?php echo base_url(); ?>home/send_email';
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {email: email, type: buttonVal},
                    success: function (data)
                    {
                        $('.inpt').val("");
                        $('#email_message').html("<p id='email_message'>Thank you</p>");
                        $("#email_message").show();
                        setTimeout(function () {
                            $("#email_message").hide();
                        }, 3000);
                    }

                })
            } else
            {

                $('#email_message').html("<p id='email_message'>Please Enter email</p>");
                $("#email_message").show();
                setTimeout(function () {
                    $("#email_message").hide();
                }, 3000);
            }

        }
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    </script>

<!-------------------------- Singup page script ends ----------------------------------->


<!-------------------------- Homecare Concern page Ajaxscript ends --------------------->


<!-------------------------- Faq page Ajax script ends --------------------------------->

    <script type="text/javascript">
        // When the user scrolls the page, execute myFunction
        window.onscroll = function () {
            myFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");
        var navbar1 = document.getElementById("ss");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop * 17.95;
        // console.log(sticky);
        var sticky1 = navbar1.offsetTop * 0.7;
        // console.log(sticky1);

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky && window.pageYOffset <= sticky1) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

<!-------------------------- Faq page Ajax script ends --------------------------------->


<!-------------------------- Homecare inner page steps script starts ------------------->

    <script>

        $(".benefit-steps").each(function () {
            $(this).hide();
            if ($(this).attr('id') == 'step_1') {
                $(this).show();
            }
        });


        $('.indulge_tab_a').on("click", function (e) {
            e.preventDefault();
            var id = $(this).data("related");
            $('.indulge_tab_a').removeClass('indulge_tab_a_active');
            $('.indulge_tab_span').removeClass('indulge_tab_span_active');
            $(this).addClass('indulge_tab_a_active');
            $(this).find('.indulge_tab_span').addClass('indulge_tab_span_active');
            // console.log(id);
            $(".benefit-steps").each(function () {
                $(this).hide();
                if ($(this).attr('id') == id)
                {
                    $(this).show();
                }
            });
        });


    </script>

<!-------------------------- Homecare inner page steps script ends  -------------------->

<!-------------------------- Education shoe page script starts  ------------------------>

    <script>
        $(".faqs_search").on('keyup change', function (){
            var min_length = 3; 
            var keyword = $('#event_search').val(); 
            
            if (keyword.length >= min_length) {
                var event = $("#event_search").val();
                var year = $('#event_year').val(); 
                var ur = '<?php echo base_url(); ?>home/education_show_year';
                $.ajax({

                    type: 'post',
                    url: ur,
                    data: {event: event,year:year},
                    success:function(data){
                        //alert(data);
                       $('#event_div').html(data);
                    }
                });
            } 
            else
            {
                var event = $("#event_search").val();
                var year = $('#event_year').val(); 
                var ur = '<?php echo base_url(); ?>home/education_show_year';
                $.ajax({

                    type: 'post',
                    url: ur,
                    data: {event: event,year:year},
                    success:function(data){
                        //alert(data);
                       $('#event_div').html(data);
                    }
                });
            }
        });
    </script>

<!-------------------------- Education shoe page script ends  -------------------------->


<script src="<?php echo $this->config->item('assets'); ?>assets/js/jitu.js"></script>
<script type="text/javascript">
$(function () {
    $('.demo-form').parsley();
//  $('.demo-form').parsley().on('field:validated', function() {
//    var ok = $('.parsley-error').length === 0;
//    $('.bs-callout-info').toggleClass('hidden', !ok);
//    $('.bs-callout-warning').toggleClass('hidden', ok);
//  })
//  .on('form:submit', function() {
//    return false; // Don't submit form for this demo
//  });
});
</script>



<!-------------------------- Training Center page script Starts  ------------------------>

    <script>
        $('.center_name').click(function(){
          var id =  $(this).attr('id');
          $(".center_details").each(function () {
                $(this).hide();
                if ($(this).attr('id') == id)
                {
                    $(this).show();
                    
                }


            });
        })
        $(".center_all").click(function(){
             $(".center_details").each(function () {
                 $(this).show();
             });
        })
    </script>

<!-------------------------- Training Center page script ends  -------------------------->





</body>
</html>