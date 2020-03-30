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
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/isotope.pkgd.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/imagesloaded.pkgd.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/script.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/assets/javascripts/demo.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>fassets/js/jquery.stellar.js"></script>


<?php if (isset($js)) { ?>
    <script type="text/javascript" src="<?php echo $this->config->item('assets'); ?>fassets/js/<?php echo $js; ?>"></script>
<?php } ?>






<!-------------------------  OUR STORY PAGE JS STARTS ----------------------------------->



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
                                            ajaxindicatorstop();
                                        },
                                        beforeSend: function () {
                                            //   jQuery(window).scrollTop($('.sortable').offset().top);
                                            ajaxindicatorstart('Loading data......');
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
                    ajaxindicatorstop();
                }
                ,
                beforeSend: function () {
                    //   jQuery(window).scrollTop($('.sortable').offset().top);
                    ajaxindicatorstart('Loading data......');
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
            //alert('22')
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
                    ajaxindicatorstop();
                },
                beforeSend: function () {
                    //   jQuery(window).scrollTop($('.sortable').offset().top);
                    ajaxindicatorstart('Loading data......');
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
    $(".faqs_search").on('keyup change', function () {
        var min_length = 3;
        var keyword = $('#event_search').val();

        if (keyword.length >= min_length) {
            var event = $("#event_search").val();
            var year = $('#event_year').val();
            var ur = '<?php echo base_url(); ?>home/education_show_year';
            $.ajax({
                type: 'post',
                url: ur,
                data: {event: event, year: year},
                success: function (data) {
                    //alert(data);
                    $('#event_div').html(data);
                    ajaxindicatorstop();
                },
                beforeSend: function () {
                    //   jQuery(window).scrollTop($('.sortable').offset().top);
                    ajaxindicatorstart('Loading data......');
                }
            });
        } else
        {
            var event = $("#event_search").val();
            var year = $('#event_year').val();
            var ur = '<?php echo base_url(); ?>home/education_show_year';
            $.ajax({

                type: 'post',
                url: ur,
                data: {event: event, year: year},
                success: function (data) {
                    //alert(data);
                    $('#event_div').html(data);
                    ajaxindicatorstop();
                },
                beforeSend: function () {
                    //   jQuery(window).scrollTop($('.sortable').offset().top);
                    ajaxindicatorstart('Loading data......');
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

    });
</script>



<!-------------------------- Training Center page script Starts  ------------------------>

<script>
    $('.center_name').click(function () {
        var id = $(this).attr('id');
        $(".center_details").each(function () {
            $(this).hide();
            if ($(this).attr('id') == id)
            {
                $(this).show();

            }


        });
    })
    $(".center_all").click(function () {
        $(".center_details").each(function () {
            $(this).show();
        });
    })
</script>

<!-------------------------- Salon Locator page script Starts  -------------------------->
<?php if ($this->uri->segment(1) == "salon-locator") { ?>
    <script>

        $(document).ready(function () {

            $(".store_locator_info_box").each(function () {
                $(this).hide();

                if ($(this).attr('id') == 1)
                {
                    $(this).show();

                }


            });

            $(".city_text").append($("#city_dropdown option:selected").text());

            // $('.store_search').change(function(){ 
            $('.location_button').click(function () {
                var id = $('.store_search').val();
                $(pincode).val('');
                var city_name = $("#city_dropdown option:selected").text();
                // console.log(city_name);

                $(".city_text").empty();
                $(".city_text").append($("#city_dropdown option:selected").text());
                var pincode = $('.pincode_search').val();
                //console.log(pincode)

                $(".store_locator_info_box").each(function () {
                    var pin = null;
                    // console.log(pin);
                    $(this).hide();
                    // console.log(id);
                    if ($(this).attr('id') == id && $(this).data("pin") == pincode)
                    {
                        $(".error_msg").empty();
                        //console.log("perfect match");
                        $(this).show();

                    }
                    if ($(this).attr('id') == id && pincode == "") {
                        $(".error_msg").empty();
                        //console.log("id match");
                        $(this).show();
                    }
                    if ($(this).attr('id') == id && $(this).data("pin") != pincode && pincode !== "") {
                        $errorDiv = $('<div><h1>Sorry No Store Found For This Pincode</h1><h2>Related Stores in ' + city_name + '</h2></div>').addClass('error');
                        $(".error_msg").html($errorDiv.html());
                        //console.log("id match pincode not matching");
                        $(this).show();
                    }


                });
            });



        });


        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }

        var customLabel = {};

        function initialize() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(19.015985, 72.820213),
                zoom: 15
            });
            var geocoder = new google.maps.Geocoder();
            $(".location_button").click(function () {
                address = $("#city_dropdown :selected")[0].text;
                geocodeAddress(address, geocoder, map);
            });
            var address = $("#city_dropdown :selected")[0].text;
            geocodeAddress(address, geocoder, map);
            var infoWindow = new google.maps.InfoWindow;

            // Change this depending on the name of your PHP or XML file
            downloadUrl('<?php echo base_url(); ?>/home/xml', function (data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('markers');
                Array.prototype.forEach.call(markers, function (markerElem) {
                    var id = markerElem.getAttribute('id');
                    var name = markerElem.getAttribute('name');
                    var address = markerElem.getAttribute('address');
                    var number = markerElem.getAttribute('number');
                    var type = markerElem.getAttribute('city_id');
                    var point = new google.maps.LatLng(
                            parseFloat(markerElem.getAttribute('lat')),
                            parseFloat(markerElem.getAttribute('lng')));

                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = name
                    infowincontent.appendChild(strong);
                    infowincontent.appendChild(document.createElement('br'));

                    var text = document.createElement('text');
                    text.textContent = address
                    infowincontent.appendChild(text);
                    var icon = customLabel[type] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        label: icon.label
                    });
                    marker.addListener('click', function () {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                    });
                });
            });
        }
        google.maps.event.addDomListener(window, "load", initialize);

        function geocodeAddress(address, geocoder, resultsMap) {
            document.getElementById('info').innerHTML = address;
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    resultsMap.fitBounds(results[0].geometry.viewport);
                    document.getElementById('info').innerHTML += "<br>" + results[0].geometry.location.toUrlValue(6);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }



        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

            request.onreadystatechange = function () {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        function doNothing() {}


    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbkiR1Rbp26eUAzT6cWmhLmua7LiO5yBQ&callback=initialize"></script>

<?php } ?>

<!-------------------------- Salon Locator page script ends  ---------------------------->

</body>
</html>